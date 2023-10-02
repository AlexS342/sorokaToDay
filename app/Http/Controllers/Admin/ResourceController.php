<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Resource\CreateRequest;
use App\Http\Requests\Admin\Resource\EditRequest;
use App\Models\Resource;
use Illuminate\View\View;

class ResourceController extends Controller
{
    public function index():View
    {
        $resources = Resource::query()->get();

        return \view('admin.resources.index', ['resources' => $resources,]);
    }

    public function create()
    {
        return \view('admin.resources.create');
    }

    public function store(CreateRequest $request)
    {
//        $request->flash();
        $data = $request->only(['linkResource', 'name_site', 'link_site']);

        $resource = new Resource($data);
        if($resource->save()){
            return redirect()->route('admin.resources.index')->with('success', 'Ресурс успешно добавлен');
        }
        return back()->with('error', 'Неполучилось добавить ресурс');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(Resource $resource)
    {
        return \view('admin.resources.edit', ['resource' => $resource]);
    }

    public function update(EditRequest $request, Resource $resource)
    {
        $data = $request->only(['linkResource', 'name_site', 'link_site']);

        $resource = $resource->fill($data);

        if($resource->save()){
            return redirect()->route('admin.resources.index')->with('success', 'Ресурс успешно отредактирован.');
        }
        return back()->with('error', 'Неполучилось отредактировать ресурс');
    }

    public function destroy(Resource $resource)
    {
        if($resource->delete()){
            return redirect()->route('admin.resources.index')->with('success', 'Ресурс успешно удален');
        }
        return back()->with('error', 'Неполучилось удалить ресурс');
    }
}
