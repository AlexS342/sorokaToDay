@extends('layouts.app')
@section('content')
<div class="px-4 py-2 my-2 text-center">
    <div class="row py-lg-5">
        <div class="col-sm-10 col-md-8 pb-3 mx-auto">
            <a href="{{route('news.category', [$news])}}" class="alert-link">
                <p class="mt-1 mb-1" style="font-size: 0.85rem; color: rgb(131, 131, 131);">{{$category->category}}</p>
            </a>
            <img class="img-fluid" src="/{{$news->img}}" alt="осминог">
            <h1 class="display-4 fw-bold lh-1 text-body-emphasis mt-5 mb-5">
                {{$news->title}}
            </h1>
            <p class="lead text-body-secondary" style="text-align: justify">
                {{$news->description}}
            </p>
            <small class="mt-1 mb-1" style="font-size: 0.85rem; color: rgb(131, 131, 131);">{{$news->author}}</small>
            <small class="mt-1 mb-1" style="font-size: 0.85rem; color: rgb(131, 131, 131);">{{$news->created_at}}</small>
        </div>
    </div>
</div>
@endsection
