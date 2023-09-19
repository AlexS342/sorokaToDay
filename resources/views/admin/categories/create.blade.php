@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Добавить категорию</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <a href="{{route('admin.categories.create')}}" class="btn btn-sm btn-outline-secondary">Добавить категорию</a>
            </div>
        </div>
    </div>

    <div class="album py-5 px-4 bg-body-tertiary">

        <form class="p-4 p-md-5 border mx-5 rounded-3 bg-body-tertiary" method="POST" enctype="multipart/form-data" action="{{route('admin.categories.store')}}">
            @csrf
            <div class="container">
                <div class="mb-3">
                    <label for="category" class="form-label">Название категории</label>
                    <p class="fw-lighter">Максимальная длина категории 200 символов</p>
                    <input type="text" class="form-control" name="category" id="category" placeholder="Политика" value="{{old('category')}}">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Характеристика новостей в категории</label>
                    <p class="fw-lighter">Введите описание категории</p>
                    <textarea class="form-control" name="description" id="description" rows="5">{{old('description')}}</textarea>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Прикрепите фотографии для новости</label>
                    <p class="fw-lighter">Здесь можно прикрепить одну фоторгафию для новости. Формат JPEG, TIFF, PND</p>
                    <input class="form-control" type="file" name="image" id="image" multiple>
                </div>

                <button class="w-100 btn btn-lg btn-primary" type="submit">Добавить категорию</button>

            </div>
        </form>
    </div>



@endsection

{{--Всплывающее сообщение при открытии страницы--}}
{{--@push('js') <script>alert('Привет великий Администратор')</script>@endpush--}}
