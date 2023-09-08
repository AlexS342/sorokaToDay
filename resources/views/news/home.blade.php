@extends('layouts.main')
@section('content')

    @forelse($news as $el)
    <div class="container col-xxl-8 px-4 py-5">
        <div class="row flex-lg-row align-items-center g-5 py-5">
            <div class="col-10 col-sm-8 col-lg-6">
                <img src="../../img/osminog1.jpg" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="700" height="500" loading="lazy">
            </div>
            <div class="col-lg-6">
                <h3 class="display-6 fw-bold lh-1 text-body-emphasis mb-3">{{$el['title']}}</h3>
                <a href="{{ route('news.category', ['id' => $el['id_category']]) }}" class="alert-link">{{$el['category']}}</a>
                <p class="lead">{{$el['mimi_description']}}</p>
                <p class="lead">{{$el['author']}} ({{$el['created_at']}})</p>
                <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                    <a href="{{route('news.show', ['id' => $el['id']])}}" type="button" class="btn btn-outline-primary btn-lg px-4">Читать</a>
                </div>
            </div>
        </div>
    </div>

    <div class="b-example-divider"></div>
    @empty
        <p class="lead">Пока новостей нет</p>
    @endforelse

@endsection
