<?php

namespace App\Http\Requests\Admin\Users;

use App\Enums\News\Status;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

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
            'name' => ['required', 'string', 'min:3', 'max:25'],
            'email' => ['required', 'email'],
            'password1' => ['required', 'string', 'min:8', 'max:20'],
            'is_admin' => ['required', 'int'],
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => 'Имя',
            'email' => 'E-mail',
            'password1' => 'Введите пароль',
            'is_admin' => 'Права Администратора'
        ];
    }
}
