<?php

namespace App\Http\Requests\Admin\Resource;

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
            'linkResource' => ['required', 'url:http,https'],
            'name_site' => ['nullable', 'string', 'min:3', 'max:30'],
            'link_site' => ['nullable', 'string', 'min:10', 'max:30'],
        ];
    }

    public function attributes(): array
    {
        return [
            'linkResource' => 'Ссылка на RSS',
            'name_site' => 'Название сайта',
            'link_site' => 'Ссылка на сайт',
        ];
    }
}
