<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    use NewsTrait;

    public function index()
    {
        if (!Storage::disk('local')->exists('categories.json') || !Storage::disk('local')->exists('news.json')){
            return \view('news.index', ['newsList' => []]);
        }else{
            $arrayNews = Storage::json('news.json');
            $arrayCategories = Storage::json('categories.json');

            $arrTotal = [];
            foreach ($arrayNews as $itemNews){
                foreach ($arrayCategories as $itemCategory){
                    if($itemCategory['id'] == $itemNews['id_category']){
                        $itemNews['category'] = $itemCategory['category'];
                        $arrTotal[] = $itemNews;
                    }
                }
            }
        }
        return \view('news.index', ['newsList' => $arrTotal]);
    }

    public function show(int $id)
    {
        if (!Storage::disk('local')->exists('categories.json') || !Storage::disk('local')->exists('news.json')){
            return \view('news.index', ['oneNews' => []]);
        }else{
            $arrayNews = Storage::json('news.json');
            $arrayCategories = Storage::json('categories.json');
            $newsTotal = [];
            foreach ($arrayNews as $itemNews){
                if($itemNews['id'] === $id){
                    $newsTotal = $itemNews;
                    foreach ($arrayCategories as $category) {
                        if((int)($newsTotal['id_category']) === $category['id']){
                            $newsTotal['category'] = $category['category'];

                        }
                    }
                }
            }
        }
        return \view('news.show', ['oneNews' => $newsTotal]);
    }
}

