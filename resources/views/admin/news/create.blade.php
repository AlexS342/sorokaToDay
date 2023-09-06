@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Добавить новость</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <a href="{{route('admin.news.create')}}" class="btn btn-sm btn-outline-secondary">Добавить новость</a>
            </div>
        </div>
    </div>

    <div class="album py-5 px-4 bg-body-tertiary">

        <form class="p-4 p-md-5 border mx-5 rounded-3 bg-body-tertiary">
            <div class="container">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Заголовок для новости</label>
                    <p class="fw-lighter">Максимальная длина заголовка 250 символов</p>
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Важный гость приехал ...">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Краткое описание</label>
                    <p class="fw-lighter">Рекомендуем не более 70 слов</p>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="2"></textarea>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea2" class="form-label">Текстовая составляющая новости</label>
                    <p class="fw-lighter">Недопустимо использовать внешние ссылки и синтаксис языков програмирования</p>
                    <textarea class="form-control" id="exampleFormControlTextarea2" rows="5"></textarea>
                </div>
                <div class="mb-3">
                    <label for="formFileMultiple" class="form-label">Прикрепите фотографии для новости</label>
                    <p class="fw-lighter">Допускаетмя прикрепление нескольких фотограций. Формат JPEG, TIFF, PND</p>
                    <input class="form-control" type="file" id="formFileMultiple" multiple>
                </div>

                <button class="w-100 btn btn-lg btn-primary" type="submit">Добавить новость</button>

            </div>
        </form>
    </div>



@endsection

{{--Всплывающее сообщение при открытии страницы--}}
{{--@push('js') <script>alert('Привет великий Администратор')</script>@endpush--}}
