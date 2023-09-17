<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Support\Facades\DB;

class CategoryController
{

    public function index()
    {
        $categories = Category::all();
        return \view('news.groups')->with(['categories' => $categories]);
    }

}
