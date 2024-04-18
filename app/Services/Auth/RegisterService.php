<?php

namespace App\Services\Auth;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

use App\DTO\UserDTO;
use App\Models\User;
use Exception;

use App\Repositories\Auth\RegisterRepository;
use App\Services\Booking\AddBookingService;

class RegisterService {
    public function __construct(
        private RegisterRepository $registerRepository,
        private AddBookingService $addBookingService,
    ) {}

    /**
     * Register new user
     * @param Request $request
     * @return UserDTO
     */
    public function register(Request $request) {
        try {
            $request->validate([
                'nickname' => 'required|unique:users',
                'password' => 'required|min:8|max:20',
                'fullName' => 'required',
                'phoneNumber' => 'required|unique:users',
                'role' => 'required',
                'address' => 'required'
            ]);

            $hashedPassword = Hash::make($request->password);

            $userDTO = new UserDTO(
                id : null,
                fullName : $request->fullName,
                nickname : $request->nickname,
                password : $hashedPassword,
                phoneNumber : $request->phoneNumber,
                address : $request->address,
                role : $request->role
            );

            $userResult = $this->registerRepository->register($userDTO);
            
            if ($userResult->getRole() == 'Buyer') {
                $user = User::latest('id')->first();
                $addBooking = $this->addBookingService->addBooking($request, $user->id);
            }

            return ([
                'fullName' => $userResult->getFullName(),
                'nickname' => $userResult->getNickname(),
                'role' => $userResult->getRole(),
            ]);

        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
