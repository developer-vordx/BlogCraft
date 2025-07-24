<?php

namespace App\Http\Requests\Auth;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\App;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules()
    {
        return [
            'email',
            Rule::unique('users')->where(function ($query) {
                return $query->where('tenant_id', App::get('currentTenant')->id);
            }),
            'password' => [
                'required',
                'string',
                'min:8',
                'regex:/[A-Z]/',
                'regex:/[0-9]/',
                'regex:/[@$!%*#?&]/',
                'confirmed',
            ],
            'first_name' => ['required', 'string', 'max:50'],
            'last_name' => ['required', 'string', 'max:50'],
            'phone' => ['required', 'regex:/^[0-9]{6,15}$/'],
            'country_code' => ['required', 'regex:/^\+\d{1,4}$/'],
            'country' => ['required', 'string', 'max:100'],
            'city' => ['required', 'string', 'max:100'],
            'state' => ['required', 'string', 'max:100'],
            'zip' => ['required', 'string', 'max:20'],
            'address' => ['required', 'string', 'max:255'],
            'terms' => ['accepted'],
            'privacy' => ['accepted'],
            'sharing' => ['accepted'],
        ];
    }

    public function messages()
    {
        return [
            'country_code.regex' => 'Country code must start with "+" followed by 1–4 digits.',
            'password.regex' => 'Password must include at least one uppercase letter, one digit, and one special character.',
            'terms.accepted' => 'You must accept the Terms of Service.',
            'privacy.accepted' => 'You must accept the Privacy Policy.',
            'sharing.accepted' => 'You must accept the data sharing agreement.',
            'email.unique' => 'This email is already registered under your tenant.',
        ];
    }

}
