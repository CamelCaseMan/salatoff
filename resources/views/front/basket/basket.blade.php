@extends('front.master')
@section('content')


    <div class="basket-page container mb-160 l-mb-130">

        <a href="tel:+74957976457" class="body-phone d-none xs-d-block" style="margin-top: -18px; margin-bottom: 8px;">
            +7 495 797 64 57
        </a>

        <div class="product-page__back mb-30 xs-mb-20">
            <a href="{{ URL::previous() }}">
                <svg width="12" height="11" viewBox="0 0 12 11" fill="none">
                    <path d="M0.240234 5.39998L5.04023 0.599976H6.88023L2.73623 4.74398H11.6002V6.05598H2.73623L6.88023 10.2H5.04023L0.240234 5.39998Z"
                          fill="#1A1A1A"/>
                </svg>
                Назад
            </a>
        </div>

        <h2 class="second-title">Корзина</h2>

        <div class="basket-wrapper">
            <div class="basket__table">
                @foreach($order->products as $key => $product)
                    <div class="basket__table-row" id="basket-row-{{$product->id}}">
                        <div class="basket__table-body">
                            <div class="-photo -row-item">
                                <img src="{{$product->image}}" alt="{{$product->name}}">
                            </div>
                            <div class="-info -row-item">
                                <div class="-name">{{$product->name}}</div>
                                <div class="-weight">
                                    {{$product->weight}} г
                                </div>
                                @include('front.include.basket_info')
                            </div>
                            <div class="-quty-cell -row-item">
                                <!-- ! Указываем кол-во товара в "data-count" -->
                                <div class="-quty basket-row-intenface" data-count="{{$product->pivot->count}}"
                                     data-id="{{$product->id}}">
                                    <div class="-btn quty-interface-btn" data-quty="-">
                                        <svg width="32" height="32" viewBox="0 0 32 32" fill="none">
                                            <path d="M30.7694 16.0001C30.7694 7.84622 24.154 1.23083 16.0002 1.23083C7.84634 1.23083 1.23096 7.84622 1.23096 16.0001C1.23096 24.1539 7.84634 30.7693 16.0002 30.7693C24.154 30.7693 30.7694 24.1539 30.7694 16.0001Z"
                                                  stroke="#828282" stroke-miterlimit="10"/>
                                            <path d="M22.1539 16H9.84619" stroke="#828282" stroke-linecap="round"
                                                  stroke-linejoin="round"/>
                                        </svg>
                                    </div>
                                    <div class="-num quty-interface-value quty-start"
                                         data-value="{{$product->pivot->count}}">
                                        {{$product->pivot->count}} шт.
                                    </div>
                                    <div class="-btn quty-interface-btn" data-quty="+">
                                        <svg width="32" height="32" viewBox="0 0 32 32" fill="none">
                                            <path d="M30.7694 16.0001C30.7694 7.84622 24.154 1.23083 16.0002 1.23083C7.84634 1.23083 1.23096 7.84622 1.23096 16.0001C1.23096 24.1539 7.84634 30.7693 16.0002 30.7693C24.154 30.7693 30.7694 24.1539 30.7694 16.0001Z"
                                                  stroke="#828282" stroke-miterlimit="10"/>
                                            <path d="M22.1539 16H9.84619M16 9.84619V22.1539V9.84619Z" stroke="#828282"
                                                  stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <div class="-price -row-item">{{$product->price}} ₽</div>
                            <div class="-delete -row-item remove-button" data-id="{{$product->id}}">Удалить</div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="basket__split">
                <div class="basket__warn basket__split-item">
                    <div class="basket__split-title mb-40">
                        Обратите внимание
                    </div>
                    <p class="-text">
                        Минимальная сумма заказа: {{config('shop.min_order')}} ₽<br>
                        Ближайшая дата доставки: {{$delivery_date}}<br>
                        Доставляем по Москве и Московской области бесплатно!<br>
                        <br>
                        Принимаем заказы с 9:00 до 17:00.<br>
                        <br>
                        Если Вы сделали заказ до 16:00, то мы привезем ваши блюда на следующий день. Если после 16:00, то Ваш заказ будет доставлен через день.<br>
                        <br>
                        Доставка осуществляется с 7:00 до 12:00 с часовым интервалом <br>
                        <br>
                        <b class="-red">По воскресеньям заказы не доставляем</b>
                    </p>
                </div>
                <div class="basket__order basket__split-item" style="display: flex;flex-direction: column;justify-content: center;">
                    <div class="basket__split-title mb-40">
                        Скидки и бонусы
                    </div>
                    <form id="basket-submit" method="GET" action="{{route('basket.registration')}}" class="superform">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                        <div class="basket__order-row">
                            <section class="-form-section">
                                <label class="-prefix" for="ordpg-001-text">Промокод</label>
                                <div class="valinput">
                                    <!-- * Если успешно, то "--success", нет — "--error" -->
                                    <input name="cupon" placeholder="Введите промокод" style="padding-right: 40px;"
                                           class="input-style" id="ordpg-001-text">
                                    <!-- * Это сообщение об ошибке -->
                                    <div class="-error-message">Сообщение с ошибкой</div>
                                    <!-- * Если нужно доп. сообщение под инпутом (размещать под -error-message): -->
                                    <div class="-message">Скидка будет рассчитана на этапе оформления заказа</div>
                                </div>
                            </section>
                            <div class="-total">
                                <b>Итого:</b> <span id="total-price">{{$order->getFullPrice()}}</span> ₽
                            </div>
                        </div>

                        <!-- ! В аттрибуте "dataset-min-price" устанавливаем минимальную цену заказа -->
                        <input class="d-none" readonly id="basket-submit-total" type="text" data-min-price="{{config('shop.min_order')}}" value="{{$order->getFullPrice()}}">
                        <input type="submit" value="Оформить заказ" class="typical-button basket__order-button modal__button d-block mb-20">
                        <p class="basket-submit-message">
                            Минимальная сумма заказа: {{config('shop.min_order')}} ₽
                        </p>
                    </form>
                </div>
            </div>
        </div>

    </div>

@endsection