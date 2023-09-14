<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\NewsTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use function Laravel\Prompts\alert;

class NewsController extends Controller
{
    use NewsTrait;

    public function index():View
    {

        $news = $this->getNews();
        return \view('admin.news.index', ['newsList' => $news]);

    }

    public function create()
    {
        if(Storage::disk('local')->exists('categories.json')){
            $arrayCategories = Storage::json('categories.json');
            return \view('admin.news.create', ['categoriesList' => $arrayCategories]);
        }
        return \view('admin.news.create', ['categoriesList' => []]);
    }

    public function store(Request $request)
    {
        if(!Storage::disk('local')->exists('news.json')){
            $arrayNews['1'] = $request->all();
            $arrayNews[1]['id']=1;
            $arrayNews[1]['created_at'] = now()->format('d-m-Y H:i');
            $i = 1;
        }else{
            $arrayNews = Storage::json('news.json');
            $i = count($arrayNews);
            $arrayNews[$i+1] = $request->all();
            $arrayNews[$i+1]['id']=$i+1;
            $arrayNews[$i+1]['created_at'] = now()->format('d-m-Y H:i');
        }
        $i = count($arrayNews);

        Storage::disk('local')->put('news.json', json_encode($arrayNews, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
        $request->flash();
        return redirect()->route('news.show', ['id' => $i]);
//        news.show
//        return redirect()->route('admin.news.create');
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
