<?php

namespace App\Services\Auth;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use App\Mail\PasswordResetMail;
use Exception;
use Illuminate\Support\Str;

class PasswordResetService
{
    public function sendResetLink(array $data): array
    {
        try {

            $token = Str::random(120);

            DB::table('user_tokens')->updateOrInsert(
                ['email' => $data['email'], 'type' => 'password_reset'],
                ['token' => $token, 'created_at' => now(), 'tenant_id' => tenantId()],

            );

            Mail::to($data['email'])->queue(new PasswordResetMail($token, $data['email']));

            return [
                'success' => true,
                'message' => 'Reset link sent to your email. token for reset password is '. $token,
                'redirect' => route('password.reset', ['token' => $token, 'email' => $data['email']]),

            ];
        } catch (Exception $e) {
            return ['success' => false, 'message' => 'Failed to send reset link. ' . $e->getMessage()];
        }
    }

    public function resetPassword(array $data): array
    {
        $record = DB::table('user_tokens')
            ->where('type', 'password_reset')
            ->where('token', $data['token'])
            ->first();

        if (!$record || !($data['token'] == $record->token)) {
            return ['success' => false, 'message' => 'Invalid or expired token.'];
        }

        $user = User::where('email', $record->email)->first();

        if (!$user) {
            return ['success' => false, 'message' => 'User not found.'];
        }

        $user->password = Hash::make($data['password']);
        $user->save();

        DB::table('user_tokens')->where('email', $user['email'])->where('type', 'reset')->delete();

        return ['success' => true, 'message' => 'Password has been reset. You can now login.'];
    }
}
