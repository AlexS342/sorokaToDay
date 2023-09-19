@extends('layouts.main')
@section('content')
    <div class="container px-4 pb-2" id="icon-grid">
        <h2 class="pb-2 pt-2 border-bottom">Категории</h2>
        @if(count($categories) === 0)
            <div class="container col-xxl-8 px-4 py-5">
                <p class="lead">Пока нет ни одной категории</p>
            </div>
        @else
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4 py-5">
            @foreach($categories as $category)
                <div class="col d-flex align-items-start">
                    <img style="width: 28px; height: 28px; margin-right: 10px;" src="../{{$category->img}}" alt="<?=$category->category?>">
                    <div>
                        <a href="{{route('news.category', ['id' => $category->id])}}" class="text-decoration-none">
                            <h3 class="fw-bold mb-0 fs-4 text-body-emphasis"><?=$category->category?></h3>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
        @endif
    </div>
@endsection
