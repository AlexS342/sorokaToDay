@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Редактировать новость</h1>
    </div>

    <div class="album py-5 px-4 bg-body-tertiary">
        @if($errors->any())
            @foreach($errors->all() as $error)
                <x-alert :message="$error" type="danger"></x-alert>
            @endforeach
        @endif
        @include('inc.message')
        <form method="POST" enctype="multipart/form-data" action="{{route('admin.news.update', $news)}}" class="p-4 p-md-5 border mx-5 rounded-3 bg-body-tertiary" >
            @csrf
            @method('PUT')
            <div class="container">
                <div class="mb-3">
                    <label for="id_category" class="form-label">Категория новости</label>
                    <p class="fw-lighter">Выберите статус новости</p>
                    <select class="form-control @error('id_category')is-invalid @enderror" name="id_category" id="id_category">
                        @foreach($categoriesList as $category)
                            <option value="{{$category->id}}" @selected(old('id_category', $news->id_category)==$category->id)>{{$category->category}}</option>
                        @endforeach
                    </select>
                    @error('id_category')
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="title" class="form-label">Заголовок для новости</label>
                    <p class="fw-lighter">Максимальная длина заголовка 250 символов</p>
                    <input type="text" class="form-control @error('title')is-invalid @enderror" name="title" id="title" placeholder="Важный гость приехал ..." value="{{old('title')??$news->title}}">
                    @error('title')
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="author" class="form-label">Автор новостти</label>
                    <p class="fw-lighter">Укажите автора новости</p>
                    <input type="text" class="form-control @error('author')is-invalid @enderror" name="author" id="author" placeholder="Васницов А.В." value="{{old('author')??$news->author}}">
                    @error('author')
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="status" class="form-label">Статус</label>
                    <p class="fw-lighter">Выберите статус новости</p>
                    <select class="form-control @error('status')is-invalid @enderror" name="status" id="status">
                        <option value="{{\App\Enums\News\Status::DRAFT->value}}" @selected(old('status')??$news->status == \App\Enums\News\Status::DRAFT->value)>
                            {{\App\Enums\News\Status::DRAFT->value}}
                        </option>
                        <option value="{{\App\Enums\News\Status::ACTIVE->value}}" @selected(old('status')??$news->status == \App\Enums\News\Status::ACTIVE->value)>
                            {{\App\Enums\News\Status::ACTIVE->value}}
                        </option>
                        <option value="{{\App\Enums\News\Status::BLOCKED->value}}" @selected(old('status')??$news->status == \App\Enums\News\Status::BLOCKED->value)>
                            {{\App\Enums\News\Status::BLOCKED->value}}
                        </option>
                    </select>
                    @error('status')
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="miniDescription" class="form-label">Краткое описание</label>
                    <p class="fw-lighter">Рекомендуем не более 70 слов</p>
                    <textarea class="form-control @error('miniDescription')is-invalid @enderror" name="miniDescription" id="miniDescription" rows="2" >{{old('miniDescription')??$news->miniDescription}}</textarea>
                    @error('miniDescription')
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Текстовая составляющая новости</label>
                    <p class="fw-lighter">Введите полний текст новости</p>
                    <textarea class="form-control @error('description')is-invalid @enderror" name="description" id="description" rows="5">{{old('description')??$news->description}}</textarea>
                    @error('description')
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="img" class="form-label">Изменить фотографию для новости</label>
                    <div>
                        <img src="{{old('img')??$news->img}}" width="200">
                    </div>
                    <p class="fw-lighter">Cсылка на фотографию: {{old('img')??$news->img}}</p>
                    <input class="form-control @error('img')is-invalid @enderror" type="file" name="img" id="image" multiple>
                    @error('img')
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <button class="w-100 btn btn-lg btn-primary" type="submit">Изменить новость</button>
            </div>
        </form>
    </div>
@endsection

