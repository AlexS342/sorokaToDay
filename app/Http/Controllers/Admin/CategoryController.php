<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Categories\CreateRequest;
use App\Http\Requests\Admin\Categories\EditRequest;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::query()->orderBy('category')->paginate(10);

        return \view('admin.categories.index', ['categoriesList' => $categories]);
    }

    public function create()
    {
        return \view('admin.categories.create');
    }

    public function store(CreateRequest $request)
    {
        $request->flash();

        $data = $request->only(['category', 'description', 'img',]);

        if($request->file('img')){
            $path = Storage::putFile('/public/img/icon', $request->file('img'));
            $data['img'] = Storage::url($path);
        }

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

    public function update(EditRequest $request, Category $category)
    {
        $oldFile = $category->img;
        $data = $request->only(['category', 'description', 'img']);

        $newFileFlag = false;
        if($request->file('img')){
            $newFileFlag = true;
            $path = Storage::putFile('public/img/icon', $request->file('img'));
            $data['img'] = Storage::url($path);
        }

        $category = $category->fill($data);

        if($category->save()){
            if($newFileFlag && isset($oldFile)){
                if(Storage::delete($oldFile)){
                    return redirect()->route('admin.categories.index')->with('success', 'Категория успешно отредактирована. Старая иконка ' . $oldFile . ' удалена из хранилища');
                }else{
                    return redirect()->route('admin.categories.index')->with('warning', 'Категория успешно отредактирована. Неполучилось удалить стару иконку с именем' . $oldFile);
                }
            }
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
