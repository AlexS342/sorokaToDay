<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use function Laravel\Prompts\alert;

class NewsController extends Controller
{

    public function index():View
    {
        $news = DB::table('news')->get();
        if(count($news) !== 0) {
            return \view('admin.news.index', ['newsList' => $news]);
        }else{
            return \view('admin.news.index', ['newsList' => []]);
        }
    }

    public function create()
    {
        $categories = DB::table('categories')->get();
        if(count($categories) !== 0){
            return \view('admin.news.create', ['categoriesList' => $categories]);
        }else{
            return \view('admin.news.create', ['categoriesList' => []]);
        }

    }

    public function store(Request $request)
    {
        $request->flash();

        $path = [];
        if ($request->hasFile('image')){
            $path = Storage::putFile('public/img/photo', $request->file('image'));
        }

        $news = $request->all();
        unset($news['_token']);
        unset($news['image']);
        $news['img'] = $path;
        $news['created_at'] = now();
//        dd($news);
        $id = DB::table('news')->insertGetId($news);

        return redirect()->route('news.show', ['id' => $id]);
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
