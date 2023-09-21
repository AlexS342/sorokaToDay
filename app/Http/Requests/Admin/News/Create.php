<?php

namespace App\Http\Requests\Admin\News;

use App\Enums\News\Status;
use App\Models\Category;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class Create extends FormRequest
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
        $tableNameCategory = (new Category)->getTable();
        return [
            'id_category' => ['required', 'integer', "exists:{$tableNameCategory},id"],
            'title' => ['required', 'string', 'min:5', 'max:250'],
            'author' => ['required', 'min:3', 'max:150'],
            'status' => ['required', new Enum(Status::class)],
            'miniDescription' => ['required', 'string', 'min:150', 'max:300'],
            'description' => ['required', 'string', 'min:250', 'max:2000'],
            'image' => ['nullable', 'image'],
        ];
    }

    public function attributes(): array
    {
        return [
            'id_category' => 'ID категории',
            'title' => 'заголовок',
            'author' => 'автор',
            'status' => 'статус',
            'miniDescription' => 'мини новость',
            'description' => 'новость',
            'image' => 'фотография',
        ];
    }
}
