<?php

namespace App\Http\Controllers;

use App\Models\Category;

class CategoryController
{

    public function index()
    {
        $categories = Category::all();
        return \view('news.groups')->with(['categories' => $categories]);
    }

}
