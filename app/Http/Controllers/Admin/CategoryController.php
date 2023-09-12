<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\NewsTrait;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    use NewsTrait;
    public function index()
    {
//        return '<h1>Проверка связи Категории админский!</h1>';
        $news = $this->getNews();
        $categories = $this->getCategory();
        return \view('admin.categories.index', ['categoriesList' => $categories]);
    }

    public function create()
    {
        return \view('admin.categories.create');
    }

    public function store(Request $request)
    {
        return redirect()->route('admin.categories.create');
//        return response()->json($request->all());
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
