<?php

namespace App\Http\Controllers;

class CategoryController
{
    use NewsTrait;

    public function index()
    {
        return \view('news.groups', ['categories' => $this->getCategory()]);
    }
}
