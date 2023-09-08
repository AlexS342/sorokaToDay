<?php

namespace App\Http\Controllers;

class HomeController
{
    use NewsTrait;

    public function index()
    {
        $allNews = $this->getNews();
        $news = [];
        $id = -1;

        foreach ($allNews as $key => $el)
        {
            if($id !== $el['id_category']){
                $news[$key] = $el;
            }
            $id = $el['id_category'];
        }
        return \view('news/home', ['news' => $news]);
    }
}
