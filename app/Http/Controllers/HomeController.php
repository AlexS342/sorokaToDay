<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;

class HomeController
{

    public function index()
    {
        if (!Storage::disk('local')->exists('categories.json') || !Storage::disk('local')->exists('news.json')) {
            return \view('news/home', ['news' => []]);
        } else {

            $arrayNews = Storage::json('news.json');
            $arrayCategories = Storage::json('categories.json');
            $x = -1;
            $sortNews = [];
            foreach ($arrayNews as $key => $itemNews) {
                if ($itemNews['id_category'] !== $x) {
                    $sortNews[$key] = $itemNews;
                    $x = $itemNews['id_category'];
                }
            }

            $arrTotal = [];
            foreach ($sortNews as $itemNews){
                foreach ($arrayCategories as $itemCategory){
                    if($itemCategory['id'] == $itemNews['id_category']){
                        $itemNews['category'] = $itemCategory['category'];
                        $arrTotal[] = $itemNews;
                    }
                }
            }
        }

        return \view('news/home', ['news' => $arrTotal]);
    }
}
