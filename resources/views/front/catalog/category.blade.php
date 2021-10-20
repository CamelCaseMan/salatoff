@extends('front.master')
@section('content')
    <div class="catalog-page container mb-240 l-mb-160 m-mb-120">
        <h2 class="second-title">Традиционные салаты</h2>

        <div class="catalog-page__filter megafilter">
            <input checked class="d-none" id="cpf-01" type="radio" name="cpf">
            <label for="cpf-01">Фасовые</label>
            <input class="d-none" id="cpf-02" type="radio" name="cpf">
            <label for="cpf-02">Весовые</label>
        </div>

        <div class="catalog-page__wrapper --products">

            <a href="#" class="catalog-page__product">
                <div class="-img">
                    <img src="{{asset('theme')}}/img/salats/01.png" alt="Салат">
                </div>
                <div class="-content">
                    <div class="-name-row">
                        <div class="-name">Салат «Грибной»</div>
                        <div class="-weight">150г</div>
                    </div>
                    <div class="-price-row">
                        <div class="-price">180 ₽</div>
                        <div class="-button typical-button">В корзину</div>
                    </div>
                </div>
            </a>

            <a href="#" class="catalog-page__product">
                <div class="-img">
                    <img src="{{asset('theme')}}/img/salats/02.png" alt="Салат">
                </div>
                <div class="-content">
                    <div class="-name-row">
                        <div class="-name">Салат «Загадка»</div>
                        <div class="-weight">150г</div>
                    </div>
                    <div class="-price-row">
                        <div class="-price">120 ₽</div>
                        <div class="-button typical-button">В корзину</div>
                    </div>
                </div>
            </a>

            <a href="#" class="catalog-page__product">
                <div class="-img">
                    <img src="{{asset('theme')}}/img/salats/03.png" alt="Салат">
                </div>
                <div class="-content">
                    <div class="-name-row">
                        <div class="-name">Салат «Из тунца с овощами»</div>
                        <div class="-weight">150г</div>
                    </div>
                    <div class="-price-row">
                        <div class="-price">160 ₽</div>
                        <div class="-button typical-button">В корзину</div>
                    </div>
                </div>
            </a>

            <a href="#" class="catalog-page__product">
                <div class="-img">
                    <img src="{{asset('theme')}}/img/salats/04.png" alt="Салат">
                </div>
                <div class="-content">
                    <div class="-name-row">
                        <div class="-name">Салат «Итальянская трапеза»</div>
                        <div class="-weight">150г</div>
                    </div>
                    <div class="-price-row">
                        <div class="-price">140 ₽</div>
                        <div class="-button typical-button">В корзину</div>
                    </div>
                </div>
            </a>

            <a href="#" class="catalog-page__product">
                <div class="-img">
                    <img src="{{asset('theme')}}/img/salats/05.png" alt="Салат">
                </div>
                <div class="-content">
                    <div class="-name-row">
                        <div class="-name">Салат «Нежный»</div>
                        <div class="-weight">150г</div>
                    </div>
                    <div class="-price-row">
                        <div class="-price">60 ₽</div>
                        <div class="-button typical-button">В корзину</div>
                    </div>
                </div>
            </a>

            <a href="#" class="catalog-page__product">
                <div class="-img">
                    <img src="{{asset('theme')}}/img/salats/06.png" alt="Салат">
                </div>
                <div class="-content">
                    <div class="-name-row">
                        <div class="-name">Салат «Морковный»</div>
                        <div class="-weight">150г</div>
                    </div>
                    <div class="-price-row">
                        <div class="-price">80 ₽</div>
                        <div class="-button typical-button">В корзину</div>
                    </div>
                </div>
            </a>

            <a href="#" class="catalog-page__product">
                <div class="-img">
                    <img src="{{asset('theme')}}/img/salats/07.png" alt="Салат">
                </div>
                <div class="-content">
                    <div class="-name-row">
                        <div class="-name">Салат «Свекольный с майонезом»</div>
                        <div class="-weight">150г</div>
                    </div>
                    <div class="-price-row">
                        <div class="-price">260 ₽</div>
                        <div class="-button typical-button">В корзину</div>
                    </div>
                </div>
            </a>

            <a href="#" class="catalog-page__product">
                <div class="-img">
                    <img src="{{asset('theme')}}/img/salats/08.png" alt="Салат">
                </div>
                <div class="-content">
                    <div class="-name-row">
                        <div class="-name">Салат «Столичный»</div>
                        <div class="-weight">150г</div>
                    </div>
                    <div class="-price-row">
                        <div class="-price">180 ₽</div>
                        <div class="-button typical-button">В корзину</div>
                    </div>
                </div>
            </a>

            <a href="#" class="catalog-page__product">
                <div class="-img">
                    <img src="{{asset('theme')}}/img/salats/09.png" alt="Салат">
                </div>
                <div class="-content">
                    <div class="-name-row">
                        <div class="-name">Салат «Цезарь»</div>
                        <div class="-weight">150г</div>
                    </div>
                    <div class="-price-row">
                        <div class="-price">140 ₽</div>
                        <div class="-button typical-button">В корзину</div>
                    </div>
                </div>
            </a>

        </div>
    </div>
@endsection

