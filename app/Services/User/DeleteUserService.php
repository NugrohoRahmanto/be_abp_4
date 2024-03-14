<?php

namespace App\Services\User;

use Exception;
use Illuminate\Http\Request;

use App\DTO\UserDTO;

use App\Repositories\User\DeleteUserRepository;

class DeleteUserService {
    public function __construct(
        private DeleteUserRepository $userRepository
    ) {}

    /**
     * Delete User
     * @param Request $request
     * @return UserDTO
     */
    public function deleteUser(Request $request) {
        try {
            // Validate request
            $request->validate([
                'id' => 'required|exists:users,id',
            ]);

            $userDTO = new UserDTO(
                id : $request->id
            );

            $userDTO = $this->userRepository->deleteUser($userDTO);

            return $userDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
