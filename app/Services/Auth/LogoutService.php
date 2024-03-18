<?php

namespace App\Services\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Exception;

class LogoutService {
    public function logout(Request $request) {
        try {
            $request->user()->currentAccessToken()->delete();
            Auth::guard("web")->logout();

            return 'Successfully logged out';

        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
