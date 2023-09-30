@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Добавить новость</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <a href="{{route('admin.users.create')}}" class="btn btn-sm btn-outline-secondary">Добавить пользователя</a>
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
        <form method="POST" enctype="multipart/form-data" action="{{route('admin.users.store')}}" class="p-4 p-md-5 border mx-5 rounded-3 bg-body-tertiary" >
            @csrf
            <div class="container">

                    <div class="mb-3">
                        <label for="name" class="form-label">Имя</label>
                        <p class="fw-lighter">Укажите полное имя пользователя</p>
                        <input type="text" name="name" id="name" value="{{old('name')}}" placeholder="Бриханкин Олег" class="form-control @error('name')is-invalid @enderror">
                        @error('name')
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <p class="form-label">Права Администратора</p>
                        <p class="fw-lighter">Выберите необходимые права для создаваемого пользователя</p>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="is_admin" id="is_admin1" value="0" checked>
                            <label class="form-check-label" for="is_admin1">
                                Пользователь
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="is_admin" id="is_admin2" value="1">
                            <label class="form-check-label" for="is_admin2">
                                Администратор
                            </label>
                        </div>
                        @error('is_admin')
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">E-mail</label>
                        <p class="fw-lighter">Введите адрес электронной почты</p>
                        <input type="email" name="email" id="email" value="{{old('email')}}" placeholder="name@example.com" class="form-control @error('email')is-invalid @enderror">
                        @error('email')
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password1" class="form-label">Введите пароль</label>
                        <p class="fw-lighter">Введите сложный пароль</p>
                        <input type="password" name="password1" id="password1" class="form-control @error('password1')is-invalid @enderror" aria-describedby="passwordHelpBlock">
                        @error('password1')
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>

                <div class="mb-3">
                    <label for="password2" class="form-label">Повторите пароль</label>
                    <p class="fw-lighter">Введите повторо сложный пароль</p>
                    <input type="password" name="password2" id="password2" class="form-control" aria-describedby="passwordHelpBlock">
                </div>

                    <button class="w-100 btn btn-lg btn-primary" type="submit">Добавить</button>
            </div>
        </form>
    </div>
@endsection

