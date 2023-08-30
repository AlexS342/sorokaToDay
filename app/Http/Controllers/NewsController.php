<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    use NewsTrait;

    public function index()
    {
//        dd($this->getNews());
//        return $this->getNews();
        return \view('news.index', ['news' => $this->getNews()]);
    }

    public function show(int $id): array
    {
        return $this->getNews($id);
    }
}
///news/{id}/show
