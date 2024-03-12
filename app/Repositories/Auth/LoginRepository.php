<?php

namespace App\Repositories\Auth;

use Exception;
use App\DTO\UserDTO;

use App\Models\User;

class LoginRepository {
    /**
     * Check if user exists
     * @param UserDTO $userDTO
     * @return UserDTO
     */

    public function login(UserDTO $userDTO) {
        try {
            $user = User::where('nickname', $userDTO->nickname)->first();

            if (!$user || !password_verify($userDTO->getPassword(), $user->password)) {
                throw new Exception('Invalid credentials');
            }

            $token = $user->createToken('auth_token')->plainTextToken;

            if ($token == null) {
                throw new Exception('Token is missing or invalid.');
            }

            return new UserDTO(
                $user->id,
                $user->fullName,
                $user->nickname,
                $user->password,
                $user->phoneNumber,
                $user->address,
                $user->role,
                $token
            );

        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
