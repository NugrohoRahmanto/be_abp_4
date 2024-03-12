<?php

namespace App\Services\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Exception;

class LogoutService {
    public function logout(Request $request) {
        try {
            Auth::guard('web')->logout();

            $request->user()->tokens()->delete();

            return 'Successfully logged out';

        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
