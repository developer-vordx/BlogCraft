<?php

namespace App\Http\Requests\Admin;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;

class UpdatePostRequest extends FormRequest
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
        $postParam = $this->route('post');
        $postId = is_object($postParam) ? $postParam->id : $postParam;

        return [
            'id' => [
                'required',
                'integer',
                function ($attribute, $value, $fail) {
                    if (!DB::table('posts')
                        ->where('id', $value)
                        ->exists()) {
                        $fail('The post does not exist or does not belong to your workspace.');
                    }
                },
            ],
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category_id' => [
                'nullable',
                'integer',
                function ($attribute, $value, $fail) {
                    if (!DB::table('categories')
                        ->where('id', $value)
                        ->exists()) {
                        $fail('The selected category is invalid or does not belong to your workspace.');
                    }
                }
            ],
            'featured_image' => 'nullable|image|max:2048',
        ];
    }

    /**
     * Modify input before validation runs
     */
    protected function prepareForValidation()
    {
        $postParam = $this->route('post');
        $postId = is_object($postParam) ? $postParam->id : $postParam;

        $this->merge([
            'id' => $postId,
        ]);
    }
}
