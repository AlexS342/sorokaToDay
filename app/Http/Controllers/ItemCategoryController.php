<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;

class ItemCategoryController
{
    use NewsTrait;

    public function index(int $id)
    {
        if (!Storage::disk('local')->exists('categories.json') || !Storage::disk('local')->exists('news.json')) {
            return \view('news.category', ['news' => []]);
        } else {

            $arrayNews = Storage::json('news.json');
            $arrayCategories = Storage::json('categories.json');

            $sortNews = [];
            foreach ($arrayNews as $key => $itemNews) {
                if ($itemNews['id_category'] === $id) {
                    $sortNews[$key] = $itemNews;
                }
            }
            $arrTotal = [];
            foreach ($sortNews as $key => $itemNews){
                foreach ($arrayCategories as $itemCategory){
                    if($itemCategory['id'] == $itemNews['id_category']){
                        $itemNews['category'] = $itemCategory['category'];
                        $arrTotal[$key] = $itemNews;
                    }
                }
            }
        }

        if(empty($arrTotal)){
            return \view('news.category', ['news' => [], 'category' => $arrayCategories[$id]['category']]);
        }else{
            return \view('news.category', ['news' => $arrTotal, 'category' => $arrayCategories[$id]['category']], );
        }
    }
}
