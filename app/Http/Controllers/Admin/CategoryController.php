<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\NewsTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    use NewsTrait;
    public function index()
    {
        if(Storage::disk('local')->exists('categories.json')){
            $arrayCategories = Storage::json('categories.json');
            return \view('admin.categories.index', ['categoriesList' => $arrayCategories]);
        }
        return \view('admin.categories.index', ['categoriesList' => []]);
    }

    public function create()
    {
        return \view('admin.categories.create');
    }

    public function store(Request $request)
    {
        if(!Storage::disk('local')->exists('categories.json')){
            $arrayCategories['1'] = $request->all();
            $arrayCategories[1]['id']=1;
        }else{
            $arrayCategories = Storage::json('categories.json');
            $i = count($arrayCategories);
            $arrayCategories[$i+1] = $request->all();
            $arrayCategories[$i+1]['id']=$i+1;
        }

        Storage::disk('local')->put('categories.json', json_encode($arrayCategories, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
        $request->flash();
        return redirect()->route('admin.categories.create');
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
