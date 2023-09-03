<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    use NewsTrait;

    public function index()
    {
        return \view('news.index', ['news' => $this->getNews()]);
    }

    public function show(int $id)
    {
        return \view('news.item', ['itemNews' => $this->getNews($id)]);
    }
}

