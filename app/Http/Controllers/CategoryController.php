<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;

class CategoryController
{
    use NewsTrait;

    public function index()
    {
        if (!Storage::disk('local')->exists('categories.json')){
            return \view('news.index', ['categories' => []]);
        }else{
            $arrayCategories = Storage::json('categories.json');
        }
        return \view('news.groups', ['categories' => $arrayCategories]);
    }
}
