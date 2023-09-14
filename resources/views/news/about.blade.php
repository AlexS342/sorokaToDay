@extends('layouts.main')
@section('content')
    <div class="px-4 py-2 my-2 text-center" style="background: no-repeat; background-image: url(../../img/soroka2.svg); background-size: contain;">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="display-4 fw-bold lh-1 text-body-emphasis mb-3">
                    Новости от сороки <br/> на каждый день
                </h1>
                <p class="lead text-body-secondary">
                    Наша команда рада приветствовать вас на нашем портале. Наши сотрудники ежедневно трудятся по всему миру собирая самую актуальную информацию о событиях, прошествия и открытияк. Мы всегда точно знам какие звезды приехали в ваш город и какая у них программа. Мы принимаем участие в иследованиях и разработках, чтобы первыми рассказать о новых открытиях и достижения. Нам точно известно, кто из спортсменов занял первое место в прошетших соревнования. Мы работаем что бы были вкурсе последних событий.
                </p>
            </div>
        </div>
    </div>

    <div class="b-example-divider"></div>

    <div class="container col-xxl-8 px-4 py-5">
        <div class="row flex-lg-row align-items-center g-5 py-5">
            <div class="col-10 col-sm-8 col-lg-6">
                <img src="../../img/bootstrap-themes.png" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="700" height="500" loading="lazy">
            </div>
            <div class="col-lg-6">
                <h1 class="display-4 fw-bold lh-1 text-body-emphasis mb-3">Предложить свою новость</h1>
                <p class="lead">Вы оказались свидетелем интересных событий, с вами случилась необычная история, вы узнали о незаконных дейстиях других лиц, вы принимаете участие в общесвенных мероприятиях, а может быть что-то еще, что может быть интересно не только вам. Узнайте, как рассказать об этом всему миру!</p>
                <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                    <button type="button" class="btn btn-outline-primary btn-lg px-4">Узнать больше</button>
                </div>
            </div>
        </div>
    </div>

    <div class="b-example-divider"></div>

    <div class="container col-xxl-8 px-4 py-5">
        <div class="row flex-lg-row align-items-center g-5 py-5">
            <div class="col-lg-7 text-center text-lg-start">
                <h1 class="display-4 fw-bold lh-1 text-body-emphasis mb-3">Обратная связь</h1>
                <p class="col-lg-10 fs-4">Не зависимо от обстоятельст, не важно по какой причине, мы всегда готовы святся с вами. Оставте свой номер телефона и мы перезвоним вам что бы унать о важных событиях, обсудить публикацию или договорится о рекламе.</p>
            </div>
            <div class="col-md-10 mx-auto col-lg-5">
                <form class="p-4 p-md-5 border rounded-3 bg-body-tertiary">

                    <div class="mb-3">
                        <label for="name" class="form-label">Имя</label>
                        <input type="text" class="form-control" id="name" placeholder="Иван" required>
                    </div>

                    <div class="mb-3">
                        <label for="phone" class="form-label">Мобильный телефон</label>
                        <input type="tel" pattern="8-[0-9]{3}-[0-9]{3}-[0-9]{2}-[0-9]{2}" class="form-control" id="phone" placeholder="8-(912)-123-45-67">
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control" id="email" placeholder="you@example.com" required>
                        <div class="invalid-feedback">
                            Пожалуйста, введите правильно адрес электронной почты для получения обратной связи.
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="message" class="form-label">Сообщение</label>
                        <textarea class="form-control" id="message" rows="2" required></textarea>
                    </div>

                    <button class="w-100 btn btn-lg btn-primary" type="submit">Отправить</button>
                </form>
            </div>
        </div>
    </div>
@endsection
