@extends('front.master')
@section('content')
    <div class="catalog-page container mb-240 l-mb-160 m-mb-120">
        <a href="tel:+74957976457" class="body-phone d-none xs-d-block" style="margin-top: -18px; margin-bottom: 8px;">
            +7 495 797 64 57
        </a>
        <div class="product-page__back mb-30 xs-mb-20">
            <a href="/">
                <svg width="12" height="11" viewBox="0 0 12 11" fill="none">
                    <path d="M0.240234 5.39998L5.04023 0.599976H6.88023L2.73623 4.74398H11.6002V6.05598H2.73623L6.88023 10.2H5.04023L0.240234 5.39998Z"
                          fill="#1A1A1A"/>
                </svg>
                На главную
            </a>
        </div>

        <h2 class="second-title">Кейтеринг</h2>

        <div class="catalog-page__wrapper --products">
            @foreach($products as $product)
                <a href="catering/{{$product->slug}}" class="catalog-page__product">
                    <div class="-img">
                        <img src="{{$product->image}}" alt="{{$product->name}}">
                    </div>
                    <div class="-content">
                        <div class="-name-row">
                            <div class="-name">{{$product->name}}</div>
                            @if(isset($product->weight))
                                <div class="-weight">{{$product->weight}}г</div>
                            @endif
                        </div>
                        <div class="-price-row">
                            <div class="-price">{{$product->price}} ₽</div>
                            <!-- ! Если товар уже есть в корзине, то убираем класс "add-one-button", ставим класс "--done" -->
                            <div class="-button typical-button @if(session('cart_products')!=null)
                            @if(in_array($product->id,session('cart_products')))--done @else add-one-button @endif @else add-one-button
                            @endif " data-id="{{$product->id}}" data-url="/catering/{{$product->slug}}">
                                <span class="-text">В корзину</span>
                                <svg class="-icon" width="27" height="18" viewBox="0 0 27 18" fill="none">
                                    <path d="M0.5 7.5L10 17L26 1" stroke="#A2CD3A" stroke-width="1.5"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
@endsection

