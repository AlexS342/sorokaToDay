<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Support\Facades\DB;

class HomeController
{

    public function index()
    {
        $news = News::query()->select('*')->where('status', '=', 'active')->limit(10)->get();
        $categories = Category::all();
        $categoriesMap = [];
        foreach ($categories as $category)
        {
            $categoriesMap[$category->id] = $category->category;
        }
        return \view('news.home') -> with(['newsList' => $news, 'categories' => $categoriesMap]);
    }
}
