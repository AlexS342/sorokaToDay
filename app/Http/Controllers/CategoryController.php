<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Support\Facades\DB;

class CategoryController
{

    public function index()
    {

//        if (!DB::table('categories')->exists()){
//            return \view('news.groups', ['categories' => []]);
//        }else{
//            $categories = DB::table('categories')->get();
//            return \view('news.groups', ['categories' => $categories]);
//        }
        $categories = Category::all();
//        $newsList = News::all();
        return \view('news.groups')->with(['categories' => $categories]);
    }

}
