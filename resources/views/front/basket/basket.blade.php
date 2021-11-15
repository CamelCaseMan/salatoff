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
                        Минимальная сумма заказа: 2000 ₽
                        Ближайшая дата доставки: 21.10.2021
                        Доставка по Москве и Московской области — <a href="#">бесплатно</a><br>
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
                <div class="basket__order basket__split-item">
                    <div class="basket__split-title mb-40">
                        Скидки и бонусы
                    </div>
                    <form method="GET" action="{{route('basket.registration')}}" class="superform">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <div class="basket__order-row">
                            <section class="-form-section">
                                <label class="-prefix" for="ordpg-001-name">Карта «Город Тройка»</label>
                                <div class="valinput">
                                    <!-- * Если успешно, то "--success", нет — "--error" -->
                                    <input class="input-style" id="ordpg-001-name" placeholder="Введите номер карты"
                                           type="text">
                                    <!-- * Это сообщение об ошибке -->
                                    <div class="-error-message">Сообщение с ошибкой</div>
                                    <!-- * Если нужно доп. сообщение под инпутом (размещать под -error-message): -->
                                    <!-- <div class="-message">Сообщение к полю</div> -->
                                </div>
                            </section>
                            <div class="-check-btn">Проверить баланс</div>
                        </div>

                        <!-- 
                            * Следущий блок должен вызываться после
                              проверки баланса карты тройка
                        -->
                        <div class="basket__order-flex-row">
                            <p>
                                <b>Карта «Город Тройка»</b><br>
                                Баланс по карте: 150 баллов <br>
                                Оплата бонусами — не более 40% заказа = не более 60 баллов
                            </p>
                            <div class="input-droplist">
                                <div data-value="0" class="input-style -no-input -input" tabindex="-1">
                                    Начислить
                                </div>
                                <div class="-focus-elements">
                                    <svg class="-arrow" width="14" height="9" viewBox="0 0 14 9" fill="none">
                                        <path d="M7 9L13.9282 0H0.0717969L7 9Z" fill="#C4C4C4"/>
                                    </svg>
                                    <div class="-list">
                                        <ul class="-new">
                                            <li data-value="0">Начислить</li>
                                            <li data-value="1">Списать</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="basket__order-row">
                            <section class="-form-section">
                                <label class="-prefix" for="ordpg-001-text">Промокод</label>
                                <div class="valinput">
                                    <!-- * Если успешно, то "--success", нет — "--error" -->
                                    <input placeholder="Введите промокод" style="padding-right: 40px;"
                                           class="input-style" id="ordpg-001-text">
                                    <!-- * Это сообщение об ошибке -->
                                    <div class="-error-message">Сообщение с ошибкой</div>
                                    <!-- * Если нужно доп. сообщение под инпутом (размещать под -error-message): -->
                                    <div class="-message">Когда вы используете промокод, бонусы не начисляются</div>

                                    <div class="-arrow">
                                        <svg width="12" height="10" viewBox="0 0 12 10" fill="none">
                                            <path d="M9.50402 5.65595H0.640015V4.34395H9.50402L5.36001 0.199951H7.20002L12 4.99995L7.20002 9.79995H5.36001L9.50402 5.65595Z"
                                                  fill="#A2CD3A"/>
                                        </svg>
                                    </div>
                                </div>
                            </section>
                            <div class="-total">
                                <b>Итого:</b> <span id="total-price">{{$order->getFullPrice()}}</span> ₽
                            </div>
                        </div>
                        <input type="submit" value="Оформить заказ" class="typical-button modal__button d-block">
                    </form>
                </div>
            </div>
        </div>

    </div>

@endsection