<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Категории - Soroka To Day</title>
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
    <?php
    /** @var array $news */
    ?>
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
                <div style="width: 60px; height: 40px; background: url('../../img/soroka.svg') no-repeat; background-size: contain;">
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

        <div class="album py-5 bg-body-tertiary">
            <div class="container">
                <h2 class="pb-2 border-bottom"><?=current($news)['category']?></h2>
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">


                    <?php foreach ($news as $n): ?>

                        <div class="col">
                            <div class="card shadow-sm">
                                <div style="width: 100%; height: 225px; background: url('../../img/osminog1.jpg') no-repeat; background-size: cover;"></div>
                                <div class="card-body">
                                    <a class="mt-1 mb-1" style="font-size: 0.75rem; text-decoration: none;" href="<?=route('itemCategory', ['id' => $n['id_category']])?>"><?=$n['category']?></a>
                                    <div style="display: flex; justify-content: space-between; font-size: 0.75rem; color: rgb(131, 131, 131);">
                                        <small class="mt-1 mb-1" style="font-size: 0.85rem; color: rgb(131, 131, 131);"><?=$n['author']?></small>
                                        <small class="mt-1 mb-1" style="font-size: 0.85rem; color: rgb(131, 131, 131);"><?=$n['created_at']?></small>
                                    </div>
                                    <p class="mt-1 mb-1" style="font-size: 1rem; font-weight: 700;"><?=$n['title']?></p>
                                    <p class="mt-1 mb-1" style="font-size: 0.85rem; font-style: italic;"><?=$n['mimi_description']?></p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <a href="<?=route('itemNews', ['id' => $n['id']])?>" type="button" class="btn btn-outline-primary btn-sm px-4">Читать</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php endforeach; ?>

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
                        <div style="width: 30px; height: 20px; background: no-repeat; background-image: url('../../img/soroka.svg'); background-size: contain;">
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