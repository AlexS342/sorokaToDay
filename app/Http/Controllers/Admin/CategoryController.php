<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = DB::table('categories')->get();
        if(count($categories) !== 0){
            return \view('admin.categories.index', ['categoriesList' => $categories]);
        }
        return \view('admin.categories.index', ['categoriesList' => []]);
    }

    public function create()
    {
        return \view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $request->flash();

        $path = [];
        if ($request->hasFile('image')){
            $path = Storage::putFile('public/img/icon', $request->file('image'));
        }

        $category = $request->all();
        unset($category['_token']);
        unset($category['image']);
        $category['img'] = $path;
        $category['created_at'] = now();
        $id = DB::table('categories')->insertGetId($category);

        return redirect()->route('news.category', ['id' => $id]);
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
