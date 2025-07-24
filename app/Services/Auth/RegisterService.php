<?php

namespace App\Services\Auth;

use App\Jobs\SendVerificationEmailJob;
use App\Models\User;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Exception;

class RegisterService
{
    public function register($request): array
    {
        try {
            // Hash password


            $user = User::create([
                'email' => $request->email, // ✅ Add this
                'password' => Hash::make($request->password),
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'phone' => $request->phone,
                'country_code' => $request->country_code,
                'country' => $request->country,
                'city' => $request->city,
                'state' => $request->state,
                'zip' => $request->zip,
                'address' => $request->address,
                'tenant_id' => App::get('currentTenant')->id,
            ]);
            session(['pending_email' => $user->email]);
            // Send verification email
            $otp = rand(100000, 999999);
            $this->sendVerificationMail($user->email,$otp);

            return [
                'success' => true,
                'message' => 'Registration successful. Please verify your email. your Otp is '.$otp,
                'redirect' => '/verify-email'
            ];

        } catch (Exception $e) {
            return [
                'success' => false,
                'message' => 'Registration failed. ' . $e->getMessage()
            ];
        }
    }

    private function sendVerificationMail(string $email,$otp): void
    {

        // Generate a 6-digit numeric token


        DB::table('user_tokens')->updateOrInsert(
            ['email' => $email, 'type' => 'email_verification'],
            [
                'token' => Hash::make($otp),
                'tenant_id' => App::get('currentTenant')->id,
                'created_at' => now(),
            ]
        );

        dispatch(new SendVerificationEmailJob($email, $otp));
    }
}
