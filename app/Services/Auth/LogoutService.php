<?php

namespace App\Services\Auth;

use Illuminate\Http\Request;
use App\Models\User;

use Exception;

class LogoutService {
    public function logout(Request $request) {
        try {
            $user = $request->user();

            if ($user !== null && isset($user['nickname'])) {
                $final = User::where('nickname', $user['nickname'])->update([
                    'status' => 'offline'
                ]);
            } else {
                throw new \Exception("User information not found or invalid.");
            }
            
            $request->user()->currentAccessToken()->delete();

            return 'Successfully logged out';

        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
