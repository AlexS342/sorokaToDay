<?php

namespace App\Http\Controllers\Admin;

use App\Enums\News\Status;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Categories\Create;
use App\Http\Requests\Admin\Categories\Edit;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Enum;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::query()->orderBy('id')->paginate(10);

        return \view('admin.categories.index', ['categoriesList' => $categories]);
    }

    public function create()
    {
        return \view('admin.categories.create');
    }

    public function store(Create $request)
    {
        $request->flash();

        $data = $request->only(['category', 'description', 'img',]);

        $category = new Category($data);

        if($category->save()){
            return redirect()->route('admin.categories.index')->with('success', 'Категория успешно добавлена');
        }
        return back()->with('error', 'Неполучилось добавить категорию');

    }

    public function show(string $id)
    {
        //
    }

    public function edit(Category $category)
    {
        return \view('admin.categories.edit', ['category' => $category]);
    }

    public function update(Edit $request, Category $category)
    {
        $request->validate([
            'category' => ['required', 'string', 'min:3', 'max:100'],
            'description' => ['required', 'string', 'min:20', 'max:250'],
            'image' => ['image'],
        ]);

        $data = $request->only(['category', 'description', 'img']);
        $category = $category->fill($data);

        if($category->save()){
            return redirect()->route('admin.categories.index')->with('success', 'Категория успешно отредактирована');
        }
        return back()->with('error', 'Неполучилось отредактировать категорию');
    }

    public function destroy(Category $category)
    {
        if($category->delete()){
            return redirect()->route('admin.categories.index')->with('success', 'Категория успешно удалена');
        }
        return back()->with('error', 'Неполучилось удалить категорию');
    }
}
