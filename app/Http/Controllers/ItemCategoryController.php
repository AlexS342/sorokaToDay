<?php

namespace App\Http\Controllers;

class ItemCategoryController
{
    use NewsTrait;

    public function index($id)
    {
        $allNews = $this->getNews();
        $itemCategory = [];

        foreach ($allNews as $key => $news)
        {
            if($news['id_category'] == $id)
            {
                $itemCategory[$key] = $news;
            }
        }

        return \view('itemCategoryNews', ['categories' => $this->getCategory(), 'news' => $itemCategory]);
    }
}
