<?php

namespace App\Services\User;

use Exception;
use Illuminate\Http\Request;

use App\Repositories\User\GetAllUserRepository;

class GetAllUserService {
    public function __construct(
        private GetAllUserRepository $userRepository
    ) {}

    /**
     * Get all user
     * @return array
     */
    public function getAllUser(Request $request) {
        try {
            return $this->userRepository->getAllUser();

        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
