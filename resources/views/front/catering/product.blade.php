@extends('front.master')
@section('content')
    <div class="product-page container mb-250 m-mb-160 xs-mb-120">

        <a href="tel:+74957976457" class="body-phone d-none xs-d-block" style="margin-top: -18px; margin-bottom: 8px;">
            +7 495 797 64 57
        </a>

        <div class="product-page__back mb-50 xs-mb-40">
            <a href="/catering">
                <svg width="12" height="11" viewBox="0 0 12 11" fill="none">
                    <path d="M0.240234 5.39998L5.04023 0.599976H6.88023L2.73623 4.74398H11.6002V6.05598H2.73623L6.88023 10.2H5.04023L0.240234 5.39998Z"
                          fill="#1A1A1A"/>
                </svg>
                Кейтеринг
            </a>
        </div>

        <div class="product-page__product-wrapper mb-160 s-mb-80">
            <div class="product-page__product-container">

                <div class="-title-row mb-20 d-none s-d-block">
                    <div class="-title">{{$product->name}}</div>
                    @if(!is_null($product->weight))
                        <div class="-weight">{{$product->weight}}г</div>
                    @endif
                </div>

                <div class="-photo s-mb-20">
                    <img src="{{$product->image}}" alt="{{$product->name}}">
                </div>
                <div class="-info-side">

                    <div class="-title-row mb-40 s-d-none">
                        <div class="-title">{{$product->name}}</div>
                        @if(!is_null($product->weight))
                            <div class="-weight">{{$product->weight}}г</div>
                        @endif
                    </div>

                    <div class="-info-table mb-40 xs-mb-30">
                        <div class="-info">
                            <div class="-property">Состав</div>
                            <p>{{$product->getAttributeProduct->composition ?? ''}}</p>
                        </div>
                        <div class="-info">
                            <div class="-property">Пищевая ценность на 100 г.</div>
                            <p>{{$product->getAttributeProduct->nutrients ?? ''}}</p>
                        </div>
                        <div class="-info">
                            <div class="-property">Энергетическая ценность на 100 г.</div>
                            <p>{{$product->getAttributeProduct->energy ?? ''}}</p>
                        </div>
                        <div class="-info">
                            <div class="-property">Срок реализации</div>
                            <p>{{$product->getAttributeProduct->implementation_period ?? ''}}</p>
                        </div>
                    </div>

                    <div class="-quty-row mb-40 xs-mb-30">
                        <div class="-quty quty-interface">
                            <div class="-btn quty-interface-btn" data-quty="-">
                                <svg width="32" height="32" viewBox="0 0 32 32" fill="none">
                                    <path d="M30.7694 16.0001C30.7694 7.84622 24.154 1.23083 16.0002 1.23083C7.84634 1.23083 1.23096 7.84622 1.23096 16.0001C1.23096 24.1539 7.84634 30.7693 16.0002 30.7693C24.154 30.7693 30.7694 24.1539 30.7694 16.0001Z"
                                          stroke="#828282" stroke-miterlimit="10"/>
                                    <path d="M22.1539 16H9.84619" stroke="#828282" stroke-linecap="round"
                                          stroke-linejoin="round"/>
                                </svg>
                            </div>
                            <div class="-num quty-interface-value">
                                1 шт.
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
                        <div class="-price">{{$product->price}} ₽</div>
                    </div>

                    <div class="typical-button -button add-cart-button" data-id="{{$product->id}}">Добавить в корзину</div>

                </div>
            </div>
        </div>

        <div class="product-page__recommendations">
            <div class="second-title">
                С этим салатом <br> сочетается
            </div>

            <div class="catalog-page__wrapper --products">

                <a href="#" class="catalog-page__product">
                    <div class="-img">
                        <img src="{{asset('theme')}}/img/cat-images/8.png" alt="Салат">
                    </div>
                    <div class="-content">
                        <div class="-name-row">
                            <div class="-name">Бинчики, 2 шт.</div>
                            <div class="-weight">150г</div>
                        </div>
                        <div class="-price-row">
                            <div class="-price">260 ₽</div>
                        </div>
                    </div>
                </a>

                <a href="#" class="catalog-page__product">
                    <div class="-img">
                        <img src="{{asset('theme')}}/img/cat-images/11.png" alt="Салат">
                    </div>
                    <div class="-content">
                        <div class="-name-row">
                            <div class="-name">Морс клюквенный</div>
                            <div class="-weight">200 мл</div>
                        </div>
                        <div class="-price-row">
                            <div class="-price">50 ₽</div>
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
                        </div>
                    </div>
                </a>

            </div>
        </div>

    </div>
@endsection