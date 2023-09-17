<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use function Laravel\Prompts\alert;

class NewsController extends Controller
{

    public function index():View
    {
        $news = News::query()
            ->status()
            ->sort()
            ->with('category')
            ->orderByDesc('id')
            ->paginate(12);

        $category = Category::query()->get();

        return \view('admin.news.index', [
            'newsList' => $news,
            'categories' => $category
        ]);
    }

    public function create()
    {
        $categories = Category::all();

        return \view('admin.news.create', ['categoriesList' => $categories]);
    }

    public function store(Request $request)
    {
        $request->flash();

        $data = $request->only(['id_category', 'title', 'author', 'status', 'miniDescription', 'description', 'img']);

        $news = new News($data);

        if($news->save()){
            return redirect()->route('admin.news.index')->with('success', 'Новость успешно добавлена');
        }
        return back()->with('error', 'Неполучилось добавить новость');
    }

    public function show(News $news)
    {
        return 'Ты ушёл не натот маршрут';
    }

    public function edit(News $news)
    {
        $categories = Category::all();
        return \view('admin.news.edit', ['categoriesList' => $categories, 'news' => $news]);
    }

    public function update(Request $request, News $news)
    {
        $data = $request->only(['id_category', 'title', 'author', 'status', 'miniDescription', 'description', 'img']);
        $news = $news->fill($data);
        if($news->save()){
            return redirect()->route('admin.news.index')->with('success', 'Новость успешно отредактирована');
        }
        return back()->with('error', 'Неполучилось отредактировать новость');
    }

    public function destroy(News $news)
    {
//        return 'Ты на правильный маршрут';
        if($news->delete()){
            return redirect()->route('admin.news.index')->with('success', 'Новость успешно удалена');
        }
        return back()->with('error', 'Неполучилось удалить новость');
    }
}
