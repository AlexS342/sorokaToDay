{{--@dd($categories)--}}
@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Список новостей</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <a href="{{route('admin.news.create')}}" class="btn btn-sm btn-outline-secondary">Добавить новость</a>
            </div>
        </div>
    </div>
    @include('inc.message')
    <select id="filter">
        <option>Status</option>
        <option>{{\App\Enums\News\Status::DRAFT->value}}</option>
        <option>{{\App\Enums\News\Status::ACTIVE->value}}</option>
        <option>{{\App\Enums\News\Status::BLOCKED->value}}</option>
    </select>
    <select id="sort">
        <option>Sort</option>
        @foreach($categories as $category)
            <option value="{{$category->id}}">{{$category->category}}</option>
        @endforeach
    </select>
    <div class="table-responsive small">
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Категория</th>
                <th scope="col">Заголовок</th>
                <th scope="col">Автор</th>
                <th scope="col">Дата</th>
                <th scope="col">Действия</th>
            </tr>
            </thead>
            <tbody>

            @forelse($newsList as $news)
            <tr>
                <td>{{$news->id}}</td>
                <td>{{$news->category->category}}</td>
                <td>{{$news->title}}</td>
                <td>{{$news->author}}</td>
                <td>{{$news->created_at}}</td>
                <td style="vertical-align: middle;">
                    <div style="display: flex;">
                        <a class=" btn btn-sm btn-outline-primary" style="margin: 5px" href="{{route('admin.news.edit', $news)}}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                            </svg>
                        </a>
                        <form style="margin: 5px" method="POST" enctype="multipart/form-data" action="{{route('admin.news.destroy', $news)}}">
                            @csrf
                            @method('DELETE')
                            <button class=" btn btn-sm btn-outline-danger" type="submit">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                    <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                </svg>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
                <tr>
                    <td colspan="5">Записей нет</td>
                </tr>
            @endforelse


            </tbody>
        </table>
        <div class="pt-5 pb-5">
            {{$newsList->links()}}
        </div>
    </div>
@endsection
@push('js')
    <script>
        document.addEventListener("DOMContentLoaded", function (){
            let filfer = document.getElementById('filter');
            filfer.addEventListener('change', function (event){
                location.href = '?f=' + this.value;
            });
        });
        document.addEventListener("DOMContentLoaded", function (){
            let filfer = document.getElementById('sort');
            filfer.addEventListener('change', function (event){
                location.href = '?s=' + this.value;
            });
        });
    </script>
@endpush
