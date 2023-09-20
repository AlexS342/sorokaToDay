@extends('layouts.main')
@section('content')
    <div class="album py-5 bg-body-tertiary">
        <div class="container">
            <h2 class="pb-2 border-bottom">Все новости</h2>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

                @forelse($newsList as $news)
                    <div class="col">
                        <div class="card shadow-sm">
                            <div style="width: 100%; height: 225px; background: url('{{$news->img}}') no-repeat; background-size: cover;"></div>
                            <div class="card-body">
                                <a class="mt-1 mb-1" style="font-size: 0.75rem; text-decoration: none;" href="{{route('news.category', [$news])}}">
                                    {{$categories[$news->id_category-1]->category}}
                                </a>
                                <div style="display: flex; justify-content: space-between; font-size: 0.75rem; color: rgb(131, 131, 131);">
                                    <small class="mt-1 mb-1" style="font-size: 0.85rem; color: rgb(131, 131, 131);">{{$news->author}}</small>
                                    <small class="mt-1 mb-1" style="font-size: 0.85rem; color: rgb(131, 131, 131);">{{$news->created_at}}</small>
                                </div>
                                <p class="mt-1 mb-1" style="font-size: 1rem; font-weight: 700;">{{$news->title}}</p>
                                <p class="mt-1 mb-1" style="font-size: 0.85rem; font-style: italic;">{{$news->miniDescription}}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <a href="{{route('news.show', [$news])}}" type="button" class="btn btn-outline-primary btn-sm px-4">Читать</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                        <h2 class="pb-2">Новостей нет</h2>
                    @endforelse

                </div>

                <div class="pt-5">
                    {{$newsList->links()}}
                </div>
            </div>
        </div>
    @endsection
