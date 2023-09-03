<?php

namespace App\Http\Controllers;

class HomeController
{
    use NewsTrait;

    public function index()
    {
        return \view('home', ['news' => $this->getNews()]);
    }
}
