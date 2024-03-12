<?php

namespace App\Repositories\Auth;

use Exception;
use App\DTO\UserDTO;

use App\Models\User;

class RegisterRepository {
    /**
     * Register new user
     * @param UserDTO $userDTO
     * @return UserDTO
     */
    public function register(UserDTO $userDTO) {
        try {
            $user = new User();
            $user->nickname = $userDTO->nickname;
            $user->password = $userDTO->password;
            $user->fullName = $userDTO->fullName;
            $user->phoneNumber = $userDTO->phoneNumber;
            $user->role = $userDTO->role;
            $user->address = $userDTO->address;
            $user->save();

            return $userDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
