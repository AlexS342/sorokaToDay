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
        @if($errors->any())
            @foreach($errors->all() as $error)
                <x-alert :message="$error" type="danger"></x-alert>
            @endforeach
        @endif
        @include('inc.message')
        <form method="POST" enctype="multipart/form-data" action="{{route('admin.news.store')}}" class="p-4 p-md-5 border mx-5 rounded-3 bg-body-tertiary" >
            @csrf
            <div class="container">
                @if (count($categoriesList) === 0)
                    <div class="mb-3">
                        <p class="fw-lighter">Сначала добавте категорию в разделе "Добавить категорию"</p>
                    </div>
                @else

                    <div class="mb-3">
                        <label for="id_category" class="form-label">Категория новости</label>
                        <p class="fw-lighter">Выберите статус новости</p>
                        <select class="form-control @error('id_category')is-invalid @enderror" name="id_category" id="id_category">
                            @foreach($categoriesList as $category)
                                <option value="{{$category->id}}" @selected(old('id_category')==$category->id)>{{$category->category}}</option>
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
                        <input type="text" class="form-control @error('title')is-invalid @enderror" name="title" id="title" placeholder="Важный гость приехал ..." value="{{old('title')}}">
                        @error('title')
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="author" class="form-label">Автор новостти</label>
                        <p class="fw-lighter">Укажите автора новости</p>
                        <input type="text" class="form-control @error('author')is-invalid @enderror" name="author" id="author" placeholder="Васницов А.В." value="{{old('author')}}">
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
                            <option value="draft" @if(old('status') == 'draft') selected @endif>draft</option>
                            <option value="active" @if(old('status') == 'active') selected @endif>active</option>
                            <option value="blocked" @if(old('status') == 'blocked') selected @endif>blocked</option>
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
                        <textarea class="form-control @error('miniDescription')is-invalid @enderror" name="miniDescription" id="miniDescription" rows="2" >{{old('miniDescription')}}</textarea>
                        @error('miniDescription')
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Текстовая составляющая новости</label>
                        <p class="fw-lighter">Введите полний текст новости</p>
                        <textarea class="form-control @error('description')is-invalid @enderror" name="description" id="description" rows="5">{{old('description')}}</textarea>
                        @error('description')
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="img" class="form-label @error('img')is-invalid @enderror">Прикрепите фотографии для новости</label>
                        <p class="fw-lighter">Здесь можно прикрепить одну фоторгафию для новости. Формат JPEG, TIFF, PND</p>
                        <input class="form-control" type="file" name="img" id="img" multiple>
                        @error('img')
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>

                    <button class="w-100 btn btn-lg btn-primary" type="submit">Добавить</button>
                @endif
            </div>
        </form>
    </div>



@endsection

