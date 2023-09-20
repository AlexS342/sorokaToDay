<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;

class ItemCategoryController
{
    public function index(News $news)
    {
        $categoryNews = News::query()->select('*')->where( 'id_category','=', $news['id_category'])->paginate(10);
        $category = Category::query()->find($news['id_category']);

        return \view('news.category', ['categoryNews' => $categoryNews, 'category' => $category, 'categoryName' => $category['category']] );
    }

    public function indexById(Category $category)
    {
        $news = News::query()->select('*')->where( 'id_category','=', $category['id'])->paginate(10);

        return \view('news.category', ['categoryNews' => $news, 'categoryName' => $category['category']] );
    }

}
