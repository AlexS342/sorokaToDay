<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::query()->paginate(12);
        //Добавить в шаблов
        //<div class="pt-5">
        //    {{$newsList->links()}}
        //</div>
        $categories = Category::all();
        return \view('news.index', ['newsList' => $news, 'categories' => $categories]);
    }

    public function show(News $news)
    {
        $category = Category::find($news->id_category);
        return \view('news.show') ->with(['news' => $news, 'category' => $category]);
    }
}

