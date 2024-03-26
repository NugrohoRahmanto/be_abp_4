<?php

namespace App\Repositories\Auth;

use Illuminate\Http\Request;

use Exception;
use App\DTO\UserDTO;
use Illuminate\Support\Facades\Auth;

use App\Repositories\Auth\LoginRepository;

class ValidateRepository {
    public function __construct(
        private LoginRepository $loginRepository
    ) {}

    /**
     * Check if user data validate
     * @param UserDTO $userDTO
     * @return UserDTO
     */

    public function login(Request $request) {
        try {
            $request->validate([
                'nickname' => 'required|exists:users',
                'password' => 'required',
            ]);

            $userDTO = new UserDTO(
                id: null,
                nickname: $request->nickname,
                password: $request->password,
            );

            $validUserDTO = $this->loginRepository->login($userDTO);

            if (Auth::attempt(['nickname' => $userDTO->getNickname(), 'password' => $userDTO->getPassword()])) {
                return [
                    'fullName' => $validUserDTO->getFullName(),
                    'nickname' => $validUserDTO->getNickname(),
                    'role' => $validUserDTO->getRole(),
                    'status' => $validUserDTO->getStatus(),
                    'token' => $validUserDTO->getToken(),
                ];
            } else {
                return [
                    'status' => 'failed',
                    'message' => 'Invalid credentials',
                ];
            }

        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>