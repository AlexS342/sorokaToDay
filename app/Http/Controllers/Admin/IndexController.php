<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke(Request $request)
    {
//        return '<h1>Проверка связи Индекс админский!</h1>';
        return \view('admin.index');
    }
}
