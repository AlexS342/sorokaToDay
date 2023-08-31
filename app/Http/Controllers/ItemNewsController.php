<?php

namespace App\Http\Controllers;

class ItemNewsController
{
    use NewsTrait;

    public function index($id)
    {
//        $item = $this->getNews()["{$id}"];
//        dd($item);
        return \view('itemNews', ['news' => $this->getNews()["{$id}"] ]);
    }
}
