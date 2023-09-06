<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>О нас -  Soroka To Day</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

    <style>
        .bd-placeholder-img {
          font-size: 1.125rem;
          text-anchor: middle;
          -webkit-user-select: none;
          -moz-user-select: none;
          user-select: none;
        }

        @media (min-width: 768px) {
          .bd-placeholder-img-lg {
            font-size: 3.5rem;
          }
        }

        .b-example-divider {
          width: 100%;
          height: 3rem;
          background-color: rgba(0, 0, 0, .1);
          border: solid rgba(0, 0, 0, .15);
          border-width: 1px 0;
          box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
        }

        .b-example-vr {
          flex-shrink: 0;
          width: 1.5rem;
          height: 100vh;
        }

        .bi {
          vertical-align: -.125em;
          fill: currentColor;
        }

        .nav-scroller {
          position: relative;
          z-index: 2;
          height: 2.75rem;
          overflow-y: hidden;
        }

        .nav-scroller .nav {
          display: flex;
          flex-wrap: nowrap;
          padding-bottom: 1rem;
          margin-top: -1px;
          overflow-x: auto;
          text-align: center;
          white-space: nowrap;
          -webkit-overflow-scrolling: touch;
        }

        .btn-bd-primary {
          --bd-violet-bg: #712cf9;
          --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

          --bs-btn-font-weight: 600;
          --bs-btn-color: var(--bs-white);
          --bs-btn-bg: var(--bd-violet-bg);
          --bs-btn-border-color: var(--bd-violet-bg);
          --bs-btn-hover-color: var(--bs-white);
          --bs-btn-hover-bg: #6528e0;
          --bs-btn-hover-border-color: #6528e0;
          --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
          --bs-btn-active-color: var(--bs-btn-hover-color);
          --bs-btn-active-bg: #5a23c8;
          --bs-btn-active-border-color: #5a23c8;
        }
        .bd-mode-toggle {
          z-index: 1500;
        }
    </style>

</head>

<body>
    <nav class="py-2  bg-body-tertiary border-bottom">
        <div class="container d-flex flex-wrap">
            <ul class="nav me-auto">
                <li><a href="/" class="nav-link px-2">Главная</a></li>
                <li><a href="/categoryNews" class="nav-link px-2">Новости</a></li>
                <li><a href="/about" class="nav-link px-2">О нас</a></li>
                <li><a href="#" class="nav-link px-2 disabled">admin</a></li>
            </ul>
            <ul class="nav">
                <li class="nav-item"><a href="/login" class="nav-link link-body-emphasis px-2">Login</a></li>
                <li class="nav-item"><a href="/checkin" class="nav-link link-body-emphasis px-2">Sign up</a></li>
            </ul>
        </div>
    </nav>
    <header class="py-3 mb-4 border-bottom">
        <div class="container d-flex flex-wrap justify-content-center">
            <a href="/" class="d-flex align-items-center mb-3 mb-lg-0 me-lg-auto link-body-emphasis text-decoration-none">
                <div style="width: 60px; height: 40px; background: no-repeat; background-image: url(img/soroka.svg); background-size: contain;">
                </div>
                <span class="fs-1">Soroka ToDay</span>
            </a>
            <form class="d-flex align-items-center col-12 col-lg-auto" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-primary" type="submit">Search</button>
            </form>
        </div>
    </header>

    <main>
        <div class="b-example-divider"></div>

        <div class="px-4 py-2 my-2 text-center" style="background: no-repeat; background-image: url(img/soroka2.svg); background-size: contain;">
            <div class="row py-lg-5">
                <div class="col-lg-6 col-md-8 mx-auto">
                    <h1 class="display-4 fw-bold lh-1 text-body-emphasis mb-3">
                        Новости от сороки<br/>на каждый день
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
                    <img src="img/bootstrap-themes.png" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="700" height="500" loading="lazy">
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

        <div class="b-example-divider"></div>
    </main>

    <div class="container">
        <footer class="py-3 my-4">
            <ul class="nav justify-content-center border-bottom pb-3 mb-3">
                <li class="nav-item">
                    <a href="/" class="d-flex align-items-center mb-3 mb-lg-0 me-lg-auto link-body-emphasis text-decoration-none">
                        <div style="width: 30px; height: 20px; background: no-repeat; background-image: url(img/soroka.svg); background-size: contain;">
                        </div>
                        <span class="fs-6">Soroka ToDay</span>
                    </a>
                </li>
            </ul>
            <ul class="nav justify-content-center border-bottom pb-3 mb-3">
                <li class="nav-item"><a href="/" class="nav-link px-2 text-body-secondary">Главная</a></li>
                <li class="nav-item"><a href="/categoryNews" class="nav-link px-2 text-body-secondary">Новости</a></li>
                <li class="nav-item"><a href="/about" class="nav-link px-2 text-body-secondary">О нас</a></li>
            </ul>
            <p class="text-center text-body-secondary">&copy; 2023 Company, Inc</p>
        </footer>
    </div>

</body>
</html>