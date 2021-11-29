@extends('front.master')
@section('content')

    <div id="wndw-001" class="modal">
        <div class="modal__container">
            <div class="modal__bg close-modal"></div>
            <div class="modal__body">
                <div class="modal__close close-modal">
                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none">
                        <path d="M13 1L1 13M1 1L13 13" stroke="#272727" stroke-width="2" stroke-linecap="round"
                              stroke-linejoin="round"/>
                    </svg>
                </div>
                <div class="modal__title">Добавить отзыв</div>
                <div class="modal__address-modal">
                    <!-- ! Добавить класс "--success", после успешной отправки -->
                    <form action="/send/review" method="POST" class="superform send-form">
                        <section class="-form-section">
                            <label class="-prefix" for="wndw-001-name">Имя</label>
                            <div class="valinput">
                                <!-- * Если успешно, то "--success", нет — "--error" -->
                                <input class="input-style" name="name" required id="wndw-001-name" type="text">
                                <!-- * Это сообщение об ошибке -->
                                <div class="-error-message">Напишите имя</div>
                                <!-- * Если нужно доп. сообщение под инпутом (размещать под -error-message): -->
                                <!-- <div class="-message">Сообщение к полю</div> -->
                            </div>
                        </section>
                        <section class="-form-section">
                            <label class="-prefix" for="wndw-001-text">Текст</label>
                            <div class="valinput">
                                <!-- * Если успешно, то "--success", нет — "--error" -->
                                <textarea class="input-style" name="text" required id="wndw-001-text" rows="5"></textarea>
                                <!-- * Это сообщение об ошибке -->
                                <div class="-error-message">Напишите ваш отзыв</div>
                                <!-- * Если нужно доп. сообщение под инпутом (размещать под -error-message): -->
                                <!-- <div class="-message">Сообщение к полю</div> -->
                            </div>
                        </section>
                        <section class="-form-section">
                            <input id="wndw-001-checked" type="checkbox" name="checked" required>
                            <label for="wndw-001-checked">
                                Я не робот
                            </label>
                        </section>
                        <input type="submit" value="Отправить" class="typical-button modal__button d-block">
                    </form>
                    <div class="superform-success">
                        <p>
                            Спасибо! Ваш отзыв отправлен!
                        </p>
                        <div class="typical-button -button close-modal">Ок</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <a href="tel:+74957976457" class="body-phone d-none xs-d-block">
        +7 495 797 64 57
    </a>

    <!-- Slider -->
    <div class="slider__parent">
        <div class="slider__wrapper container">
            <div id="main-slider" class="slider owl-carousel owl-theme owl-loaded mb-120 l-mb-100 s-mb-80">
                <div class="owl-stage-outer slider__slides-wrapper">
                    <div class="owl-stage">
                        <div class="owl-item">
                            <a href="/" class="slider__slide">
                                <img src="{{asset('theme')}}/img/slider-images/banner7.jpg" alt="Салатофф">
                                <div class="slider__slide-body">
                                    <div class="-title">
                                        Скидка 15% на каждый следующий заказ
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="owl-item">
                            <a href="/" class="slider__slide">
                                <img src="{{asset('theme')}}/img/slider-images/banner.jpeg" alt="Салатофф">
                                <div class="slider__slide-body">
                                    <div class="-title">
                                        Удобная упаковка для фасованной и весовой продукции
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="owl-item">
                            <a href="/" class="slider__slide">
                                <img src="{{asset('theme')}}/img/slider-images/banner3.jpeg" alt="Салатофф">
                                <div class="slider__slide-body">
                                    <div class="-title">
                                        Индивидуальный подход к каждому клиенту
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="owl-item">
                            <a href="/" class="slider__slide">
                                <img src="{{asset('theme')}}/img/slider-images/banner4.jpeg" alt="Салатофф">
                                <div class="slider__slide-body">
                                    <div class="-title">
                                        Лучшее качество <br> и вкус
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="owl-item">
                            <a href="/" class="slider__slide">
                                <img src="{{asset('theme')}}/img/slider-images/banner5.jpeg" alt="Салатофф">
                                <div class="slider__slide-body">
                                    <div class="-title">
                                        Помощь в подборе ассортимента
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="owl-item">
                            <a href="/" class="slider__slide">
                                <img src="{{asset('theme')}}/img/slider-images/banner6.jpeg" alt="Салатофф">
                                <div class="slider__slide-body">
                                    <div class="-title">
                                        Правильная еда <br> для здорового питания
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div id="main-slider-nav" class="slider__nav"></div>
                <div id="main-slider-dots" class="slider__dots"></div>
            </div>
        </div>
    </div>
    <!-- End Slider -->

    <!-- Catalog screen -->
    <div class="catalog-screen mb-240 l-mb-160 m-mb-100 s-mb-80">
        <div class="catalog-screen__container container">
            <h2 class="second-title">
                Каталог
            </h2>
            <div class="catalog-screen__cats">
                <a href="/shops-and-cafes" class="catalog-screen__cat">
                    <div class="-img" style="background-image: url('{{asset('theme')}}/img/cats/1.jpg');"></div>
                    <div class="-name">
                        Магазинам <br>
                        и кафе
                    </div>
                </a>
                <a href="/dinner" class="catalog-screen__cat">
                    <div class="-img" style="background-image: url('{{asset('theme')}}/img/cats/2.jpg');"></div>
                    <div class="-name">
                        Готовая еда домой <br>
                        и в офис
                    </div>
                </a>
                <a href="/catering" class="catalog-screen__cat">
                    <div class="-img" style="background-image: url('{{asset('theme')}}/img/cats/3.jpg');"></div>
                    <div class="-name">
                        Кейтеринг
                    </div>
                </a>
            </div>
        </div>
    </div>
    <!-- End Catalog screen -->

    <!-- Info screen -->
    <div class="info-screen mb-240 l-mb-160 s-mb-100 xs-mb-80">
        <div class="info-screen__container container">
            <div class="info-screen__title">
                Главный принцип нашей кулинарии — <br>
                <span style="color: #A2CD3A;">
                    Качество. Лояльность. <br>
                    Оперативность.
                </span>
                <!-- <div class="-highlighting">
                    эксклюзивность.
                    <svg class="-outline" width="372" height="96" viewBox="0 0 372 96" fill="none">
                        <ellipse cx="186.427" cy="47.5" rx="184.19" ry="46.5" stroke="#A2CD3A"/>
                        <path d="M370.617 47.5009C372.783 76.313 284.937 90.5472 189.294 95.435M370.617 47.5009V47.5009ZM186.427 94.0009C84.6655 92.4458 -1.31047 73.3142 1.04738 48.2339M2.23783 47.5009C-0.222605 18.9259 83.9874 4.84858 186.267 3.81902M186.427 1.0009C289.039 0.855765 370.587 18.3191 370.423 43.6075"
                              stroke="#A2CD3A" stroke-linecap="round"/>
                    </svg>
                </div> -->
            </div>
            <div class="info-screen__text">
                <p>
                    Крупнейший производитель кулинарии, выпечки, салатов, кондитерских изделий и блюд японской кухни в Москве и МО. Мы работаем на этом рынке более 15 лет. Наличие собственных производственных площадей (более 3000 кв. м) позволяет нам выпускать широкий ассортимент блюд готовой кулинарии, салатов, кондитерских изделий, выпечки, сэндвичей.
                </p>
            </div>
        </div>
    </div>
    <!-- End Info screen -->

    <!-- Map screen -->
    <div class="map-screen mb-240 l-mb-160 s-mb-100 xs-mb-80">
        <div class="map-screen__container container">
            <h2 class="second-title">
                Заказ и доставка
            </h2>
            <div class="map-screen__split">
                <div class="map-screen__info">
                    <div class="-title">
                        Информация о времени заказа
                    </div>
                    <p class="-text">
                        Минимальная сумма заказа: 300 ₽<br>
                        Доставка по Москве и Московской области — бесплатно<br>
                        <br>
                        Мы обрабатываем заказы с 9:00 до 16:30. <br>
                        <br>
                        Это значит, что если Вы заказали у нас еду до 16:30, мы привезём её уже на следующий день.
                        А если заказ поступил после 16:30, то через день. <br>
                        <br>
                        Доставка заказов осуществляется с 7:00 до 12:00 <br>
                        <br>
                        По воскресеньям заказы не доставляем
                    </p>
                </div>
                <div class="map-screen__map" style="background-image: url({{asset('theme')}}/img/exp-map.jpg);">

                </div>
            </div>
        </div>
    </div>
    <!-- End Map screen -->

    <!-- Clients screen -->
    <div class="clients-screen mb-200 l-mb-160 s-mb-100 xs-mb-80">
        <div class="clients-screen__container container">
            <h2 class="second-title">Наши клиенты</h2>
            <p class="clients-screen__subtitle mb-80 l-mb-60 s-mb-50">Мы постоянно участвуем и спонсируем выставку
                «ПРОДЭКСПО», и стали надёжными поставщиками и партнёрами для таких крупных клиентов, как:</p>
            <div class="clients-screen__logos">
                <div class="owl-carousel owl-theme clients-logos">
                    <div class="item">
                        <div class="clients-screen__logo">
                            <div class="-logo"
                                 style="background-image: url('{{asset('theme')}}/img/logos/vkusvill.png');"></div>
                        </div>
                        <div class="clients-screen__logo">
                            <div class="-logo"
                                 style="background-image: url('{{asset('theme')}}/img/logos/lavka.png');"></div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="clients-screen__logo">
                            <div class="-logo"
                                 style="background-image: url('{{asset('theme')}}/img/logos/tvoydom.png');"></div>
                        </div>
                        <div class="clients-screen__logo">
                            <div class="-logo"
                                 style="background-image: url('{{asset('theme')}}/img/logos/karusel.png');"></div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="clients-screen__logo">
                            <div class="-logo"
                                 style="background-image: url('{{asset('theme')}}/img/logos/gopoedim.png');"></div>
                        </div>
                        <div class="clients-screen__logo">
                            <div class="-logo"
                                 style="background-image: url('{{asset('theme')}}/img/logos/verniy.png');"></div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="clients-screen__logo">
                            <div class="-logo"
                                 style="background-image: url('{{asset('theme')}}/img/logos/cum.png');"></div>
                        </div>
                        <div class="clients-screen__logo">
                            <div class="-logo"
                                 style="background-image: url('{{asset('theme')}}/img/logos/oneprice.png');"></div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="clients-screen__logo">
                            <div class="-logo"
                                 style="background-image: url('{{asset('theme')}}/img/logos/pitstop.png');"></div>
                        </div>
                        <div class="clients-screen__logo">
                            <div class="-logo"
                                 style="background-image: url('{{asset('theme')}}/img/logos/yarche.png');"></div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="clients-screen__logo">
                            <div class="-logo"
                                 style="background-image: url('{{asset('theme')}}/img/logos/onebucks.png');"></div>
                        </div>
                        <div class="clients-screen__logo">
                            <div class="-logo"
                                 style="background-image: url('{{asset('theme')}}/img/logos/olivier.png');"></div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="clients-screen__logo">
                            <div class="-logo"
                                 style="background-image: url('{{asset('theme')}}/img/logos/bim.png');"></div>
                        </div>
                        <div class="clients-screen__logo">
                            <div class="-logo"
                                 style="background-image: url('{{asset('theme')}}/img/logos/trassa.png');"></div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="clients-screen__logo">
                            <div class="-logo"
                                 style="background-image: url('{{asset('theme')}}/img/logos/podvorie.png');"></div>
                        </div>
                        <div class="clients-screen__logo">
                            <div class="-logo"
                                 style="background-image: url('{{asset('theme')}}/img/logos/star.png');"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Clients screen -->

    <!-- Reviews screen -->
    <div class="reviews-screen mb-160 m-mb-130 xs-mb-100">
        <div class="reviews-screen__container container">
            <h2 class="second-title">Отзывы</h2>
            <div class="reviews-screen__reviews">
                <div class="owl-carousel owl-theme reviews-slider">
                    @foreach($reviews as $review)
                        <div class="item">
                            <div class="reviews-screen__item">
                                <div class="-name">{{$review->name}}</div>
                                <div class="-text">
                                    <p>{{$review->text}}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="reviews-screen__button">
                <div class="typical-button --stroke open-modal" data-open-modal="wndw-001">Добавить отзыв</div>
            </div>
        </div>
    </div>
    <!-- End Reviews screen -->

    <!-- Best screen -->
    <div class="best-screen mb-240 m-mb-140 xs-mb-110">
        <div class="best-screen__container container">
            <div class="best-screen__title">
                <svg class="-ellipse" width="100%" height="100%" fill="none">
                    <ellipse cx="50%" cy="50%" rx="50%" ry="50%" fill="#EBFFFC"/>
                </svg>
                <div class="-title">
                    Лучшее <br class="d-none xs-d-block">
                    качество <br class="d-none xs-d-block">
                    и вкус
                </div>
            </div>
        </div>
    </div>
    <!-- End Best screen -->
@endsection