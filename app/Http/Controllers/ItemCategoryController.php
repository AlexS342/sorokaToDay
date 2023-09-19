<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class ItemCategoryController
{
    public function index(int $id)
    {
        if (!DB::table('categories')->exists() || !DB::table('news')->exists()) {
            return \view('news.category', ['news' => []]);
        } else {
            $categoryNews = DB::table('news')
                ->join('categories', 'news.id_category', '=', 'categories.id')
                ->select('news.*', 'categories.category')
                ->where('news.id_category', '=', $id)
                ->get();

            if(count($categoryNews->all()) !== 0){
                return \view('news.category', ['categoryNews' => $categoryNews, 'category' => $categoryNews->all()[0]->category], );
            }else{
                $categories = DB::table('categories')->find($id);
                return \view('news.category', ['categoryNews' => [], 'category' => $categories->category]);
            }
        }
    }
}
