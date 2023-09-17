<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Support\Facades\DB;

class HomeController
{

    public function index()
    {
//        if (!DB::table('categories')->exists() || !DB::table('news')->exists()) {
//            return \view('news/home', ['news' => []]);
//        } else {
//            $fullNews = DB::table('news')
//                ->join('categories', 'news.id_category', '=', 'categories.id')
//                ->select('news.*', 'categories.category')
//                ->limit(15)
//                ->get();
//
//            return \view('news.home', ['news' => $fullNews]);
//        }

//        $news = News::all();
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
