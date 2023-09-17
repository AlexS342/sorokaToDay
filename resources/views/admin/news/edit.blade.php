@dump($categoriesList)
@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Редактировать новость</h1>
    </div>

    <div class="album py-5 px-4 bg-body-tertiary">
        @include('inc.message')
        <form method="POST" enctype="multipart/form-data" action="{{route('admin.news.update', $news)}}" class="p-4 p-md-5 border mx-5 rounded-3 bg-body-tertiary" >
            @csrf
            @method('PUT')
            <div class="container">

                <div class="mb-3">
                    <label for="id_category" class="form-label">Категория новости</label>
                    <p class="fw-lighter">Выберите статус новости</p>
                    <select class="form-control" name="id_category" id="id_category">
                        @foreach($categoriesList as $category)
                            <option value="{{$category->id}}" @selected(old('id_category', $news->id_category)==$category->id)>{{$category->category}}</option>
                        @endforeach
                    </select>
                    </div>
                    <div class="mb-3">
                        <label for="title" class="form-label">Заголовок для новости</label>
                        <p class="fw-lighter">Максимальная длина заголовка 250 символов</p>
                        <input type="text" class="form-control" name="title" id="title" placeholder="Важный гость приехал ..." value="{{old('title')??$news->title}}">
                    </div>
                    <div class="mb-3">
                        <label for="author" class="form-label">Автор новостти</label>
                        <p class="fw-lighter">Укажите автора новости</p>
                        <input type="text" class="form-control" name="author" id="author" placeholder="Васницов А.В." value="{{old('author')??$news->author}}">
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Статус</label>
                        <p class="fw-lighter">Выберите статус новости</p>
                        <select class="form-control" name="status" id="status">
{{--                            <option value="{{\App\Enums\News\Status::DRAFT->value}}" @if($news->status == \App\Enums\News\Status::DRAFT->value) selected @endif>--}}
                            <option value="{{\App\Enums\News\Status::DRAFT->value}}"
                                    @selected(old('status')??$news->status == \App\Enums\News\Status::DRAFT->value)>
                                {{\App\Enums\News\Status::DRAFT->value}}
                            </option>
                            <option value="{{\App\Enums\News\Status::ACTIVE->value}}"
                                    @selected(old('status')??$news->status == \App\Enums\News\Status::ACTIVE->value)>
                                {{\App\Enums\News\Status::ACTIVE->value}}
                            </option>
                            <option value="{{\App\Enums\News\Status::BLOCKED->value}}"
                                    @selected(old('status')??$news->status == \App\Enums\News\Status::BLOCKED->value)>
                                {{\App\Enums\News\Status::BLOCKED->value}}
                            </option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="miniDescription" class="form-label">Краткое описание</label>
                        <p class="fw-lighter">Рекомендуем не более 70 слов</p>
                        <textarea class="form-control" name="miniDescription" id="miniDescription" rows="2" >{{old('miniDescription')??$news->miniDescription}}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Текстовая составляющая новости</label>
                        <p class="fw-lighter">Введите полний текст новости</p>
                        <textarea class="form-control" name="description" id="description" rows="5">{{old('description')??$news->description}}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Изменить фотографию для новости</label>
                        <div>
                            <img src="/{{old('img')??$news->img}}" width="200">
                        </div>
                        <p class="fw-lighter">Cсылка на фотографию: / {{old('img')??$news->img}}</p>
                        <input class="form-control" type="file" name="image" id="image" multiple>
                    </div>

                    <button class="w-100 btn btn-lg btn-primary" type="submit">Изменить новость</button>

            </div>
        </form>
    </div>



@endsection

{{--Всплывающее сообщение при открытии страницы--}}
{{--@push('js') <script>alert('Привет великий Администратор')</script>@endpush--}}
