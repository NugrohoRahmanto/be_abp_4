<?php

namespace App\Services\Auth;

use Illuminate\Http\Request;

use App\DTO\UserDTO;
use Exception;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

use App\Repositories\Auth\ValidateRepository;
use App\Services\Auth\GetUserInfoService;

class LoginService {
    public function __construct(
        private ValidateRepository $validateRepository,
        private GetUserInfoService $getUserInfoService
    ) {}

    /**
     * Login user
     * @param Request $request
     * @return UserDTO
     */
    public function login(Request $request) {
        try {
            $user = User::where('nickname', $request->nickname)->first();

            if (!$user) {
                return [
                    'status' => 'failed',
                    'message' => 'User not found',
                ];
            }

            $existingToken = DB::table('personal_access_tokens')
            ->where('tokenable_type', 'App\Models\User')
            ->where('tokenable_id', $user->id)
            ->first();

            if ($existingToken) {
                $tokenCreatedAt = $existingToken->created_at;
                $tokenExpirationTime = Carbon::parse($tokenCreatedAt)->addMinutes(60);

                if ($tokenExpirationTime > now()){
                    return [
                        'status' => 'failed',
                        'message' => 'This account already logged in',
                    ];
                }

                if ($tokenExpirationTime < now()) {
                    DB::table('personal_access_tokens')
                        ->where('id', $existingToken->id)
                        ->delete();

                    $user = $request->user();

                    if ($user !== null && isset($user['nickname'])) {
                        $final = User::where('nickname', $user['nickname'])->update([
                            'status' => 'offline'
                        ]);
                    } else {
                        throw new \Exception("User information not found or invalid.");
                    }
                    
                    return [
                        'status' => 'failed',
                        'message' => 'Token expired',
                    ];
                }
            }

            $resultData = $this->validateRepository->login($request);

            return [
                'data' => $resultData
            ];

        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
