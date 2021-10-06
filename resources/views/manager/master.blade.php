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
        <div class="manager-modals__bg"></div>
        <div class="manager-modals__modal modal">
            <div class="modal__header">
                <div class="-title">Мыльникова Вера</div>
                <div class="-close"></div>
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