<?php

namespace App\Services\Auth;

use Illuminate\Http\Request;

use Exception;
use App\DTO\UserDTO;

class GetUserInfoService {
    /**
     * Get user by checking authentication
     * @param Request $request
     * @return UserDTO
     */
    public function getUserInfo(Request $request) {
        try {
            $user = $request->user();

            if (!$user) {
                throw new Exception('User not authenticated');
            }

            return new UserDTO(
                id: $user->id,
                nickname: $user->nickname,
                fullName: $user->fullName,
                role: $user->role,
                status: $user->status
            );
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
