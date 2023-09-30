<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\News\CreateRequest;
use App\Http\Requests\Admin\News\EditRequest;
use App\Models\Category;
use App\Models\News;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class NewsController extends Controller
{

    public function index():View
    {
        $news = News::query()
            ->status()
            ->sort()
            ->with('category')
            ->orderByDesc('id')
            ->paginate(10);

        $category = Category::query()->get();

        return \view('admin.news.index', [
            'newsList' => $news,
            'categories' => $category,
        ]);
    }

    public function create()
    {
        $categories = Category::all();

        return \view('admin.news.create', ['categoriesList' => $categories]);
    }

    public function store(CreateRequest $request)
    {
        $request->flash();

        $data = $request->only(['id_category', 'title', 'author', 'status', 'miniDescription', 'description', 'img']);

        if($request->file('img')){
            $path = Storage::putFile('/public/img/photo', $request->file('img'));
            $data['img'] = Storage::url($path);
        }

        $news = new News($data);

        if($news->save()){
            return redirect()->route('admin.news.index')->with('success', 'Новость успешно добавлена');
        }
        return back()->with('error', 'Неполучилось добавить новость');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(News $news)
    {
        $categories = Category::all();
        return \view('admin.news.edit', ['categoriesList' => $categories, 'news' => $news]);
    }

    public function update(EditRequest $request, News $news)
    {
        $oldFile = $news->img;
        $data = $request->only(['id_category', 'title', 'author', 'status', 'miniDescription', 'description', 'img']);

        $newFileFlag = false;
        if($request->file('img')){
            $newFileFlag = true;
            $request->validate([
                'img' => ['nullable', 'image', 'mimes:jpeg, jpg, tiff', 'min:100', 'max:1500']
            ]);
            $path = Storage::putFile('public/img/photo', $request->file('img'));
            $data['img'] = Storage::url($path);
        }

        $news = $news->fill($data);

        if($news->save()){
            if($newFileFlag && isset($oldFile)){
                if(Storage::delete($oldFile)){
                    return redirect()->route('admin.news.index')->with('success', 'Новость успешно отредактирована. Старая фотография ' . $oldFile . ' удалена из хранилища');
                }else{
                    return redirect()->route('admin.news.index')->with('warning', 'Новость успешно отредактирована. Неполучилось удалить стару фотографию с именем' . $oldFile);
                }
            }
        }
        return back()->with('error', 'Неполучилось отредактировать новость');
    }

    public function destroy(News $news)
    {
        if($news->delete()){
            return redirect()->route('admin.news.index')->with('success', 'Новость успешно удалена');
        }
        return back()->with('error', 'Неполучилось удалить новость');
    }
}
