<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $news = News::query()->latest()->paginate(12);
        $categories = Category::all();
        return view('home', ['newsList' => $news, 'categories' => $categories]);
    }
}
