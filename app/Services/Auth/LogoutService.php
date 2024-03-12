<?php

namespace App\Services\Auth;

use Illuminate\Http\Request;

use Exception;

class LogoutService {
    // public function logout(Request $request) {
    //     try {
    //         $user = $request->user();

    //         if ($user) {
    //             $user->tokens()->where('name', 'auth_token')->delete();
    //             $request->user()->currentAccessToken()->delete();
    //             return [
    //                 'status' => 'success',
    //                 'message' => 'User logged out successfully',
    //             ];
    //         } else {
    //             return [
    //                 'status' => 'failed',
    //                 'message' => 'Token access not found or user not authenticated',
    //             ];
    //         }
    //     } catch (Exception $error) {
    //         throw new Exception($error->getMessage());
    //     }
    // }
    public function logout(Request $request) {
        try {
            // Periksa apakah pengguna terautentikasi
            if ($request->user()) {
                // Hapus semua token yang terkait dengan pengguna
                $request->user()->tokens()->delete();

                return [
                    'status' => 'success',
                    'message' => 'User logged out successfully',
                ];
            } else {
                // Jika pengguna tidak terautentikasi, kembalikan pesan kesalahan
                return [
                    'status' => 'failed',
                    'message' => 'User is not authenticated',
                ];
            }
        } catch (Exception $error) {
            // Tangani kesalahan dengan melemparnya kembali
            throw new Exception($error->getMessage());
        }
    }
}

?>
