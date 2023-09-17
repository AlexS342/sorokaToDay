<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Support\Facades\DB;

class ItemCategoryController
{
    public function index(News $news)
    {
        $categoryNews = News::query()->select('*')->where( 'id_category','=', $news['id_category'])->get();
        $category = Category::query()->find($news['id_category']);

        return \view('news.category', ['categoryNews' => $categoryNews, 'category' => $category, 'categoryName' => $category['category']] );
    }

    public function indexById(Category $category)
    {
        $news = News::query()->select('*')->where( 'id_category','=', $category['id'])->get();

        return \view('news.category', ['categoryNews' => $news, 'categoryName' => $category['category']] );
    }

}
