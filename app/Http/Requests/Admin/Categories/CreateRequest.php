<?php

namespace App\Http\Requests\Admin\Categories;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'category' => ['required', 'string', 'min:3', 'max:100'],
            'description' => ['required', 'string', 'min:20', 'max:250'],
            'img' => ['nullable', 'image', 'mimes:svg, png', 'max:100'],
        ];
    }

    public function attributes(): array
    {
        return [
            'category' => 'Название категории',
            'description' => 'Прикрепите иконку для категории',
            'img' => 'иконка',
        ];
    }
}
