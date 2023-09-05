<?php

namespace App\Http\Controllers;

class CategoryController
{
    use NewsTrait;

    public function index()
    {
        return \view('categoryNews', ['categories' => $this->getCategory(), 'news' => $this->getNews()]);
    }
}
