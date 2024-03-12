<?php

namespace App\Repositories\User;

use Exception;

use App\DTO\UserDTO;
use App\Models\User;

class DeleteUserRepository {
    /**
     * Delete User
     * @param UserDTO $UserDTO
     * @return UserDTO
     */
    public function deleteUser(UserDTO $userDTO) {
        try {
            $user = User::findOrFail($userDTO->id);
            $user->delete();

            return $user;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
