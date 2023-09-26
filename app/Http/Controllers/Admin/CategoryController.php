<?php

namespace App\Http\Controllers\Admin;

use App\Enums\News\Status;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Categories\CreateRequest;
use App\Http\Requests\Admin\Categories\EditRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
                //  Не могу фактически удалить старый файл.
                //  При прикреплении нового файла заход в этот if осуществляется.
                //  В переменной $oldFile коректное имя старого файла.
                //  Если сделать dd(Storage::delete($oldFile);) то выводит true
                //  Старый файл остается в хранилище storage
                //  В DB путь до файла заменяется, с этим проблем нет
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
