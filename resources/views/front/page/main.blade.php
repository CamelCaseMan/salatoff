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
    <div id="slider" class="slider mb-120 l-mb-100 s-mb-80">
        <div class="slider__container container">

            <!-- Pretty slider -->
            <div id="pts-01" class="pretty-slider">

                <div class="pretty-slider__wrapper">

                    <!-- Slider engine -->
                    <div class="pretty-slider__engine">

                        <div class="pretty-slider__visible-slides slider__border-radius">

                            <div class="pretty-slider__visible-slides-wrapper"></div>

                        </div>

                        <div class="pretty-slider__hidden-slides">
                            <!-- ! Сюда нужно загрузить все слайды -->

                            <a href="/shops-and-cafes" class="pretty-slider__slide slider__slide"
                               style="background-color: #11305e;">
                                <div class="slider__slide-content">
                                    <div class="-title">
                                        Скидка 15% на каждый следующий заказ
                                    </div>
                                    <div class="-button typical-button">Выбрать блюдо</div>
                                </div>
                                <div class="slider__slide-image"
                                     style="background-image: url({{asset('theme')}}/img/slider/01.png);"></div>
                            </a>
                        </div>

                    </div>
                    <!-- End Slider engine -->

                    <div class="pretty-slider__navigation">
                        <div class="-arrow">
                            <svg width="10" height="16" viewBox="0 0 10 16" fill="none">
                                <path d="M8.32448 0.5C8.03208 0.5 7.79816 0.581081 7.62273 0.743243L0.473603 7.31081C0.268925 7.52703 0.166585 7.75676 0.166585 8C0.166585 8.24324 0.268925 8.45946 0.473603 8.64865L7.62273 15.2162C7.8274 15.4054 8.06132 15.5 8.32448 15.5C8.58764 15.5 8.82156 15.4054 9.02623 15.2162C9.23091 15.027 9.33325 14.8108 9.33325 14.5676C9.33325 14.3243 9.23091 14.1081 9.02623 13.9189L2.62273 8L9.02623 2.08108C9.23091 1.89189 9.33325 1.66216 9.33325 1.39189C9.33325 1.12162 9.23822 0.905405 9.04816 0.743243C8.85811 0.581081 8.61688 0.5 8.32448 0.5Z"
                                      fill="#828282"/>
                            </svg>
                        </div>
                        <div class="-arrow">
                            <svg width="10" height="16" viewBox="0 0 10 16" fill="none">
                                <path d="M1.67552 0.5C1.96792 0.5 2.20184 0.581081 2.37727 0.743243L9.5264 7.31081C9.73108 7.52703 9.83342 7.75676 9.83342 8C9.83342 8.24324 9.73108 8.45946 9.5264 8.64865L2.37727 15.2162C2.1726 15.4054 1.93868 15.5 1.67552 15.5C1.41236 15.5 1.17844 15.4054 0.973766 15.2162C0.769087 15.027 0.666748 14.8108 0.666748 14.5676C0.666748 14.3243 0.769087 14.1081 0.973766 13.9189L7.37727 8L0.973766 2.08108C0.769087 1.89189 0.666748 1.66216 0.666748 1.39189C0.666748 1.12162 0.761777 0.905405 0.951836 0.743243C1.14189 0.581081 1.38312 0.5 1.67552 0.5Z"
                                      fill="#828282"/>
                            </svg>
                        </div>
                    </div>

                </div>

                <div class="pretty-slider__dots slider__dots"></div>

            </div>
            <!-- End Pretty slider -->

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
    <div class="info-screen mb-280 l-mb-160 s-mb-100 xs-mb-80">
        <div class="info-screen__container container">
            <div class="info-screen__title">
                Главный принцип нашей кулинарии — <br>
                <div class="-highlighting">
                    эксклюзивность.
                    <svg class="-outline" width="372" height="96" viewBox="0 0 372 96" fill="none">
                        <ellipse cx="186.427" cy="47.5" rx="184.19" ry="46.5" stroke="#A2CD3A"/>
                        <path d="M370.617 47.5009C372.783 76.313 284.937 90.5472 189.294 95.435M370.617 47.5009V47.5009ZM186.427 94.0009C84.6655 92.4458 -1.31047 73.3142 1.04738 48.2339M2.23783 47.5009C-0.222605 18.9259 83.9874 4.84858 186.267 3.81902M186.427 1.0009C289.039 0.855765 370.587 18.3191 370.423 43.6075"
                              stroke="#A2CD3A" stroke-linecap="round"/>
                    </svg>
                </div>
            </div>
            <div class="info-screen__text">
                <p>Наши технологи разрабатывают блюда, которых нет больше нигде, регулярно улучшают их вкусовые
                    качества, и делают так, чтобы кулинария соответствовала нормам высшего качества по приготовлению,
                    хранению и фасовке.</p>
                <p>Поэтому производство регулярно расширяется, чтобы обслуживать больше клиентов и радовать их более
                    широким ассортиментом.</p>
            </div>
        </div>
    </div>
    <!-- End Info screen -->

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
                                 style="background-image: url('{{asset('theme')}}/img/logos/gorod.png');"></div>
                        </div>
                        <div class="clients-screen__logo">
                            <div class="-logo"
                                 style="background-image: url('{{asset('theme')}}/img/logos/karusel.png');"></div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="clients-screen__logo">
                            <div class="-logo"
                                 style="background-image: url('{{asset('theme')}}/img/logos/miratorg.png');"></div>
                        </div>
                        <div class="clients-screen__logo">
                            <div class="-logo"
                                 style="background-image: url('{{asset('theme')}}/img/logos/perekrestok.png');"></div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="clients-screen__logo">
                            <div class="-logo"
                                 style="background-image: url('{{asset('theme')}}/img/logos/cofix.png');"></div>
                        </div>
                        <div class="clients-screen__logo">
                            <div class="-logo"
                                 style="background-image: url('{{asset('theme')}}/img/logos/verniy.png');"></div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="clients-screen__logo">
                            <div class="-logo"
                                 style="background-image: url('{{asset('theme')}}/img/logos/pech.png');"></div>
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
                    <div class="item">
                        <div class="clients-screen__logo">
                            <div class="-logo"
                                 style="background-image: url('{{asset('theme')}}/img/logos/cum.png');"></div>
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