<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    public function index()
    {
        if (!DB::table('categories')->exists() || !DB::table('news')->exists()) {
            return \view('news/home', ['news' => []]);
        } else {
            $fullNews = DB::table('news')
                ->join('categories', 'news.id_category', '=', 'categories.id')
                ->select('news.*', 'categories.category')
                ->orderBy('news.created_at')
                ->get();

            return \view('news.index', ['newsList' => $fullNews]);
        }
    }

    public function show(int $id)
    {
        if (!DB::table('categories')->exists() || !DB::table('news')->exists()) {
            return \view('news/home', ['news' => []]);
        } else {
            $itemNews = DB::table('news')
                ->join('categories', 'news.id_category', '=', 'categories.id')
                ->select('news.*', 'categories.category')
                ->where('news.id', '=', $id)
                ->get();
            return \view('news.show', ['oneNews' => $itemNews->all()[0]]);
        }
    }
}

