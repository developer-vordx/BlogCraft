<?php

namespace App\Services\Auth;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Exception;

class LoginService
{
    public function authenticate( Request $request): array
    {
        try {
            $credentials = $request->only('email', 'password');
            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();

                if (Auth::user()->status == 'admin'){
                    return [
                        'success' => true,
                        'redirect_to' => '/admin/dashboard',
                        'message' => 'Login successful.'
                    ];
                } else {
                    return [
                        'success' => true,
                        'redirect_to' => '/dashboard',
                        'message' => 'Login successful.'
                    ];
                }


            }

            return [
                'success' => false,
                'errors' => ['email' => 'The provided credentials do not match our records.']
            ];
        } catch (Exception $e) {
            return [
                'success' => false,
                'errors' => ['error' => 'Login failed. Please try again.']
            ];
        }
    }
}
