<?php

namespace App\Services\User;

use Exception;
use Illuminate\Http\Request;

use App\DTO\UserDTO;

use App\Repositories\User\EditUserRepository;

class EditUserService {
    public function __construct(
        private EditUserRepository $userRepository
    ) {}

    /**
     * Edit user
     * @param Request $request
     * @return UserDTO
     */
    public function editUser(Request $request) {
        try {
            // Validate request
            $request->validate([
                'id' => 'required|exists:users,id',
                'fullName' => 'required',
                'phoneNumber' => 'required',
                'address' => 'required',
            ]);

            $userDTO = new UserDTO(
                id: $request->id,
                nickname: $request->nickname,
                fullName: $request->fullName,
                phoneNumber: $request->phoneNumber,
                role: $request->role,
                address: $request->address
            );

            $userDTO = $this->userRepository->editUser($userDTO);

            return $userDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
