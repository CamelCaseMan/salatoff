@extends('front.master')
@section('content')
    <div class="catalog-page container mb-240 l-mb-160 m-mb-120">
        <h2 class="second-title">{{$category->name}}</h2>

        <div class="catalog-page__filter megafilter">
            <input checked class="d-none" id="cpf-01" type="radio" name="cpf">
            <label for="cpf-01">Фасовые</label>
            <input class="d-none" id="cpf-02" type="radio" name="cpf">
            <label for="cpf-02">Весовые</label>
        </div>

        <div class="catalog-page__wrapper --products">
            @foreach($products as $product)
                <a href="{{$category->slug}}/{{$product->slug}}" class="catalog-page__product">
                    <div class="-img">
                        <img src="{{asset('theme')}}/img/salats/01.png" alt="{{$product->name}}">
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
                            <div class="-button typical-button">В корзину</div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
@endsection

