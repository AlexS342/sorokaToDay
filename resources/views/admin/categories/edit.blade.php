@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Добавить категорию</h1>

    </div>

    <div class="album py-5 px-4 bg-body-tertiary">
        @if($errors->any())
            @foreach($errors->all() as $error)
                <x-alert :message="$error" type="danger"></x-alert>
            @endforeach
        @endif
        @include('inc.message')
        <form class="p-4 p-md-5 border mx-5 rounded-3 bg-body-tertiary" method="POST" enctype="multipart/form-data" action="{{route('admin.categories.update', $category)}}">
            @csrf
            @method('PUT')
            <div class="container">
                <div class="mb-3">
                    <label for="category" class="form-label">Название категории</label>
                    <p class="fw-lighter">Максимальная длина категории 200 символов</p>
                    <input type="text" class="form-control @error('category')is-invalid @enderror" name="category" id="category" placeholder="Политика" value="{{old('category')??$category->category}}">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Характеристика новостей в категории</label>
                    <p class="fw-lighter">Введите описание категории</p>
                    <textarea class="form-control @error('description')is-invalid @enderror" name="description" id="description" rows="5">{{old('description')??$category->description}}</textarea>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Прикрепите иконку для категории</label>
                    <div>
                        <img src="/{{old('img')??$category->img}}">
                    </div>
                    <p class="fw-lighter">Ссылка на иконку: / {{old('img')??$category->img}}">}}</p>
                    <input class="form-control @error('description')is-invalid @enderror" type="file" name="image" id="image" multiple>
                </div>

                <button class="w-100 btn btn-lg btn-primary" type="submit">Изменить категорию</button>

            </div>
        </form>
    </div>



@endsection

