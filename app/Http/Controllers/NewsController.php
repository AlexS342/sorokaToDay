<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::paginate(12);
        dump($news);
        $categories = Category::all();
        $categoriesMap = [];
        foreach ($categories as $category)
        {
            $categoriesMap[$category->id] = $category->category;
        }
        return \view('news.index', ['newsList' => $news, 'categories' => $categoriesMap]);
    }

    public function show(News $news)
    {

//        $news = News::find($news);
//        dd($news);
        $category = Category::find($news->id_category);
        return \view('news.show') ->with(['news' => $news, 'category' => $category]);
    }
}

