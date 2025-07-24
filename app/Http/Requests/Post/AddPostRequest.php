<?php

namespace App\Http\Requests\Post;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;

class AddPostRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category_id' => [
                'nullable',
                'integer',
                function ($attribute, $value, $fail) {
                    if (!DB::table('categories')
                        ->where('id', $value)
                        ->where('tenant_id', tenantId())
                        ->exists()) {
                        $fail('The selected category is invalid or does not belong to your workspace.');
                    }
                }
            ],
            'featured_image' => 'nullable|image|max:2048',
        ];
    }
}
