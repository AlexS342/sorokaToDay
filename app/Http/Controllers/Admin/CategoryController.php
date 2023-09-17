<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::query()->orderBy('id')->paginate(6);

            return \view('admin.categories.index', ['categoriesList' => $categories]);
    }

    public function create()
    {
        return \view('admin.categories.create');
    }

    public function store(Request $request)
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

    public function update(Request $request, Category $category)
    {
        $data = $request->only(['category', 'description', 'img']);
        $category = $category->fill($data);
        if($category->save()){
            return redirect()->route('admin.categories.index')->with('success', 'Категория успешно отредактирована');
        }
        return back()->with('error', 'Неполучилось отредактировать категорию');
    }

    public function destroy(Category $category)
    {
        //delete()
        if($category->delete()){
            return redirect()->route('admin.categories.index')->with('success', 'Категория успешно удалена');
        }
        return back()->with('error', 'Неполучилось удалить категорию');
    }
}
