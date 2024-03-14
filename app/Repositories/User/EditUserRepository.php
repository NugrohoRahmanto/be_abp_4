<?php

namespace App\Repositories\User;

use Exception;

use App\DTO\UserDTO;
use App\Models\User;

class EditUserRepository {
    /**
     * Edit User
     * @param UserDTO $UserDTO
     * @return UserDTO
     */
    public function editUser(UserDTO $userDTO) {
        try {
            $user = User::find($userDTO->id);
            $user->fullName = $userDTO->fullName;
            $user->phoneNumber = $userDTO->phoneNumber;
            $user->address = $userDTO->address;
            if($userDTO->role != null) {
                $user->role = $userDTO->role;
            }
            $user->save();

            return $user;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
