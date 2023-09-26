@extends('layouts.app')
@section('content')
    <div class="px-4 py-2 my-2 text-center">
        <div class="row py-lg-5">
            <div class="col-sm-10 col-md-8 pb-3 mx-auto">
                <form class="px-5 mx-auto col-sm-8">
                    <img class="mb-4" src="/img/soroka.svg" alt="" width="72" height="57">
                    <h1 class="h3 mb-3 fw-normal">Авторизация</h1>

                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                        <label for="floatingInput">Email address</label>
                    </div>

                    <div class="form-floating">
                        <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                        <label for="floatingPassword">Password</label>
                    </div>

                    <div class="form-check text-start my-3">
                        <input class="form-check-input" type="checkbox" value="remember-me" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Запомнить меня
                        </label>
                    </div>
                    <button class="btn btn-primary w-100 py-2" type="submit">Войти</button>
                    <p class="mt-5 mb-3 text-body-secondary">&copy; 2017–2023</p>
                </form>
            </div>
        </div>
    </div>
@endsection
