@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Добавить ресурс</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <a href="{{route('admin.resources.create')}}" class="btn btn-sm btn-outline-secondary">Добавить ресурс</a>
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
        <form method="POST" enctype="multipart/form-data" action="{{route('admin.resources.store')}}" class="p-4 p-md-5 border mx-5 rounded-3 bg-body-tertiary" >
            @csrf
            <div class="container">

                <div class="mb-3">
                    <label for="linkResource" class="form-label">Ссылка на канал RSS</label>
                    <p class="fw-lighter">Ссылка должна начинатся с "http://"</p>
                    <input type="text" class="form-control @error('linkResource')is-invalid @enderror" name="linkResource" id="linkResource" placeholder="https://lenta.ru/rss" value="{{old('linkResource')}}">
                    @error('linkResource')
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="name_site" class="form-label">Название сайта</label>
                    <p class="fw-lighter">Укажите название сайта с которого идет получение новостей</p>
                    <input type="text" class="form-control @error('name_site')is-invalid @enderror" name="name_site" id="name_site" placeholder="lenta.ru" value="{{old('name_site')}}">
                    @error('name_site')
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="link_site" class="form-label">Ссылка на сайт с новостями</label>
                    <p class="fw-lighter">Введите адрес сайта начиная с "http://"</p>
                    <input type="text" class="form-control @error('link_site')is-invalid @enderror" name="link_site" id="link_site" placeholder="http://lenta.ru" value="{{old('link_site')}}">
                    @error('link_site')
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                    <button class="w-100 btn btn-lg btn-primary" type="submit">Добавить</button>
            </div>
        </form>
    </div>
@endsection

