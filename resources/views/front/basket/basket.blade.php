@extends('front.master')
@section('content')

    <div class="basket-page container mb-160">

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
                        <a href="#" class="-photo -row-item">
                            <img src="{{$product->image}}" alt="{{$product->name}}">
                        </a>
                        <div class="-info -row-item">
                            <a href="#" class="-name">{{$product->name}}</a>
                            <div class="-weight">
                                {{$product->weight}} г
                            </div>
                            <div class="-composition">
                                Состав
                                <svg class="-icon" width="19" height="20" viewBox="0 0 19 20" fill="none">
                                    <g clip-path="url(#clip0_95:9)">
                                        <path d="M9.625 1.5C4.86203 1.5 1 5.36203 1 10.125C1 14.888 4.86203 18.75 9.625 18.75C14.388 18.75 18.25 14.888 18.25 10.125C18.25 5.36203 14.388 1.5 9.625 1.5Z" stroke="#828282" stroke-miterlimit="10"/>
                                        <path d="M8.3125 8.8125H9.8125V14.25" stroke="#828282" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M7.75 14.4375H11.875" stroke="#828282" stroke-miterlimit="10" stroke-linecap="round"/>
                                        <path d="M9.625 4.59375C9.38396 4.59375 9.14832 4.66523 8.9479 4.79915C8.74748 4.93307 8.59127 5.12341 8.49902 5.34611C8.40678 5.56881 8.38264 5.81386 8.42967 6.05027C8.47669 6.28669 8.59277 6.50385 8.76321 6.67429C8.93366 6.84474 9.15082 6.96081 9.38724 7.00784C9.62365 7.05486 9.8687 7.03073 10.0914 6.93849C10.3141 6.84624 10.5044 6.69003 10.6384 6.48961C10.7723 6.28918 10.8438 6.05355 10.8438 5.8125C10.8438 5.48927 10.7154 5.17928 10.4868 4.95071C10.2582 4.72215 9.94824 4.59375 9.625 4.59375Z" fill="#828282"/>
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_95:9">
                                            <rect width="19" height="19" fill="white" transform="translate(0 0.5)"/>
                                        </clipPath>
                                    </defs>
                                </svg>
    
                            </div>
                        </div>
                        <div class="-quty-cell -row-item">
                            <!-- ! Указываем кол-во товара в "data-count" -->
                            <div class="-quty basket-row-intenface" data-count="{{$product->pivot->count}}" data-id="{{$product->id}}">
                                <div class="-btn quty-interface-btn" data-quty="-">
                                    <svg width="32" height="32" viewBox="0 0 32 32" fill="none">
                                        <path d="M30.7694 16.0001C30.7694 7.84622 24.154 1.23083 16.0002 1.23083C7.84634 1.23083 1.23096 7.84622 1.23096 16.0001C1.23096 24.1539 7.84634 30.7693 16.0002 30.7693C24.154 30.7693 30.7694 24.1539 30.7694 16.0001Z"
                                              stroke="#828282" stroke-miterlimit="10"/>
                                        <path d="M22.1539 16H9.84619" stroke="#828282" stroke-linecap="round"
                                              stroke-linejoin="round"/>
                                    </svg>
                                </div>
                                <div class="-num quty-interface-value quty-start" data-value="{{$product->pivot->count}}">
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
                    Это значит, что если Вы заказали у нас еду до 16:30, мы привезём её уже на следующий день. А если заказ поступил после 16:30, то через день. <br>
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
                    <form action="" class="superform">
                        <div class="basket__order-row">
                            <section class="-form-section">
                                <label class="-prefix" for="ordpg-001-name">Карта «Город Тройка»</label>
                                <div class="valinput">
                                    <!-- * Если успешно, то "--success", нет — "--error" -->
                                    <input class="input-style" id="ordpg-001-name" placeholder="Введите номер карты" type="text">
                                    <!-- * Это сообщение об ошибке -->
                                    <div class="-error-message">Сообщение с ошибкой</div>
                                    <!-- * Если нужно доп. сообщение под инпутом (размещать под -error-message): -->
                                    <!-- <div class="-message">Сообщение к полю</div> -->
                                </div>
                            </section>
                            <div class="-check-btn">Проверить баланс</div>
                        </div>
                        <div class="basket__order-row">
                            <section class="-form-section">
                                <label class="-prefix" for="ordpg-001-text">Промокод</label>
                                <div class="valinput">
                                    <!-- * Если успешно, то "--success", нет — "--error" -->
                                    <input placeholder="Введите промокод" style="padding-right: 40px;" class="input-style" id="ordpg-001-text">
                                    <!-- * Это сообщение об ошибке -->
                                    <div class="-error-message">Сообщение с ошибкой</div>
                                    <!-- * Если нужно доп. сообщение под инпутом (размещать под -error-message): -->
                                    <div class="-message">Когда вы используете промокод, бонусы не начисляются</div>
                                    
                                    <div class="-arrow">
                                        <svg width="12" height="10" viewBox="0 0 12 10" fill="none">
                                            <path d="M9.50402 5.65595H0.640015V4.34395H9.50402L5.36001 0.199951H7.20002L12 4.99995L7.20002 9.79995H5.36001L9.50402 5.65595Z" fill="#A2CD3A"/>
                                        </svg>
                                    </div>
                                </div>
                            </section>
                            <div class="-total">
                                <b>Итого:</b> <span id="total-price">{{$order->getFullPrice()}}</span> ₽
                            </div>
                        </div>
                        <input type="submit" value="Оформить заказ" class="typical-button modals__button d-block">
                    </form>
                </div>
            </div>
        </div>

    </div>

@endsection