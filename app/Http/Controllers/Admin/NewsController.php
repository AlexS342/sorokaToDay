<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\NewsTrait;
use Illuminate\Http\Request;
use Illuminate\View\View;

class NewsController extends Controller
{
    use NewsTrait;

    public function index():View
    {
//        return '<h1>Проверка связи Ньюс админский!</h1>';
        $news = $this->getNews();
        return \view('admin.news.index', ['newsList' => $news]);

    }

    public function create()
    {
        return \view('admin.news.create');
    }

    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
