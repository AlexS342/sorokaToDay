@extends('layouts.main')
@section('content')
<div class="px-4 py-2 my-2 text-center">
    <div class="row py-lg-5">
        <div class="col-sm-10 col-md-8 pb-3 mx-auto">
            <a href="{{route('news.category', ['id' => $oneNews->id_category])}}" class="alert-link">
                <p class="mt-1 mb-1" style="font-size: 0.85rem; color: rgb(131, 131, 131);">{{$oneNews->category}}</p>
            </a>
            <img class="img-fluid" src="../../{{$oneNews->img}}" alt="осминог">
            <h1 class="display-4 fw-bold lh-1 text-body-emphasis mt-5 mb-5">
                {{$oneNews->title}}
            </h1>
            <p class="lead text-body-secondary" style="text-align: justify">
                {{$oneNews->description}}
            </p>
            <small class="mt-1 mb-1" style="font-size: 0.85rem; color: rgb(131, 131, 131);">{{$oneNews->author}}</small>
            <small class="mt-1 mb-1" style="font-size: 0.85rem; color: rgb(131, 131, 131);">{{$oneNews->created_at}}</small>

        </div>
    </div>
</div>
@endsection
