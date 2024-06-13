<?php

namespace App\Repositories\User;

use Exception;

use App\Models\User;
use App\DTO\UserDTO;

class GetAllUserRepository
{
    public function getAllUser()
    {
        try{
            $users = User::all();

            $userDTOs = [];
            foreach ($users as $user) {
                $userDTO = new UserDTO(
                    id: $user->id,
                    nickname: $user->nickname,
                    fullName: $user->fullName,
                    phoneNumber : $user->phoneNumber,
                    address : $user->address,
                    role : $user->role,
                    status : $user->status,
                );

                array_push($userDTOs, $userDTO);
            }

            return $userDTOs;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}
