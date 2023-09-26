@extends('layouts.app')
@section('content')
    @forelse($newsList as $news)
    <div class="container col-xxl-8 px-4 py-5">
        <div class="row flex-lg-row align-items-center g-5 py-5">
            <div class="col-10 col-sm-8 col-lg-6">
                <img src="{{$news->img}}" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="700" height="500" loading="lazy">
            </div>
            <div class="col-lg-6">
                <h3 class="display-6 fw-bold lh-1 text-body-emphasis mb-3">{{$news->title}}</h3>
                <a href="{{ route('news.category', [$news]) }}" class="alert-link">{{$categories[$news->id_category]}}</a>
                <p class="lead">{{$news->miniDescription}}</p>
                <p class="lead">{{$news->author}} ({{$news->created_at}})</p>
                <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                    <a href="{{route('news.show', [$news])}}" type="button" class="btn btn-outline-primary btn-lg px-4">Читать</a>
                </div>
            </div>
        </div>
    </div>

    <div class="b-example-divider"></div>
    @empty
        <p class="lead">Пока новостей нет</p>
    @endforelse
@endsection
