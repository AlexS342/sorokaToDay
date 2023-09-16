<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class HomeController
{

    public function index()
    {

        if (!DB::table('categories')->exists() || !DB::table('news')->exists()) {
            return \view('news/home', ['news' => []]);
        } else {
            $fullNews = DB::table('news')
                ->join('categories', 'news.id_category', '=', 'categories.id')
                ->select('news.*', 'categories.category')
                ->limit(15)
                ->get();

            return \view('news.home', ['news' => $fullNews]);
        }
    }
}
