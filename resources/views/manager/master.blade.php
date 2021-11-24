<!doctype html>
<html lang="ru">
<head>
    <!-- Обязательные метатеги -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Менеджер — Salatoff.ru</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{asset('theme')}}/css/header.css"/>
    <link rel="stylesheet" type="text/css" href="{{asset('theme')}}/css/manager.css"/>

    <!-- JQ -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <!-- End JQ -->

    <!-- JQ Masked input -->
    <script src="{{asset('theme')}}/inc/masked-input/jquery.maskedinput.min.js"></script>
    <!-- End JQ Masked input -->

    <!-- Owl-carousel -->
    <link rel="stylesheet" href="{{asset('theme')}}/inc/owlcarousel/owl.carousel.min.css">
    <link rel="stylesheet" href="{{asset('theme')}}/inc/owlcarousel/owl.theme.default.min.css">
    <script src="{{asset('theme')}}/inc/owlcarousel/owl.carousel.min.js"></script>
    <!-- End Owl-carousel -->

    <script src="{{asset('theme')}}/js/script.js"></script>
</head>
<body>
    @include('manager.header')

    <div class="manager-page" id="manager-page">
        <div id="manager-separation" class="manager-page__separation">
            <div class="manager-page__left-plug"></div>
            <div class="manager-page__menu">
                <ul>
                   {{-- <li>
                        <a href="#">На главную</a>
                    </li>
                    <li>
                        <a href="#">Категории</a>
                    </li>
                    <li>
                        <a href="#">Товары</a>
                    </li>--}}
                    <li>
                        <a href="#" class="active">Заказы</a>
                    </li>
                  {{--  <li>
                        <a href="#">Блог</a>
                    </li>--}}
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