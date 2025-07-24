<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\App;
use App\Models\User;

class LoginRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'email' => ['required', 'string', 'email', function ($attribute, $value, $fail) {
                $tenant = App::make('tenant');

                if (!User::where('email', $value)->where('tenant_id', $tenant->id)->exists()) {
                    $fail('The provided email does not belong to this tenant. Please check your login URL or contact support.');
                }
            }],
            'password' => 'required|string|min:6',
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => 'Please enter your email address.',
            'email.email' => 'Please enter a valid email address.',
            'password.required' => 'Please enter your password.',
            'password.min' => 'Your password must be at least :min characters long.',
        ];
    }
}
