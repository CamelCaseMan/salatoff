<!doctype html>
<html lang="ru">
<head>
    <!-- Обязательные метатеги -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Менеджер — Salatoff.ru</title>
    <link rel="stylesheet" type="text/css" href="{{asset('theme')}}/css/header.css"/>
    <link rel="stylesheet" type="text/css" href="{{asset('theme')}}/css/beauty.css"/>
    <link rel="stylesheet" type="text/css" href="{{asset('theme')}}/css/manager.css"/>
    <script src="{{asset('theme')}}/js/script.js"></script>
</head>
<body>

    <div class="manager-modals">
        <div class="manager-modals__bg close-modal"></div>
        <div id="mw-user-info" class="manager-modals__modal manager-modal">
            <div class="manager-modal__header">
                <div class="-title">Мыльникова Вера</div>
                <div class="-close close-modal">
                    <svg width="15" height="15" viewBox="0 0 15 15" fill="none">
                        <path d="M1 1L14 14M14 1L1 14" stroke="black" stroke-width="1.5"/>
                    </svg>
                </div>
            </div>
            <div class="manager-modal__content">
                <ul class="-chars">
                    <li>
                        <div class="-prefix">Телефон</div>
                        + 7 903 711 00 81
                    </li>
                    <li>
                        <div class="-prefix">Почта</div>
                        mvs35@mail.ru
                    </li>
                    <li>
                        <div class="-prefix">Баллы</div>
                        0
                    </li>
                    <li>
                        <div class="-prefix">Дата регистрации</div>
                        2021-09-08 17:10:35
                    </li>
                </ul>
            </div>
        </div>
    </div>

    @include('manager.header')

    <div class="manager-page" id="manager-page">
        <div id="manager-separation" class="manager-page__separation">
            <div class="manager-page__left-plug"></div>
            <div class="manager-page__menu">
                <ul>
                    <li>
                        <a href="#">На главную</a>
                    </li>
                    <li>
                        <a href="#">Категории</a>
                    </li>
                    <li>
                        <a href="#">Товары</a>
                    </li>
                    <li>
                        <a href="#" class="active">Заказы</a>
                    </li>
                    <li>
                        <a href="#">Блог</a>
                    </li>
                </ul>
            </div>
            <div class="manager-page__container">
                @yield('content')
            </div>
        </div>
    </div>


<!-- Вариант 1: Bootstrap в связке с Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>
</html>