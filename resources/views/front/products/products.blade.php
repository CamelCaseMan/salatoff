@extends('front.master')
@section('content')
    <h2>Товары категории: {{$category_name}}</h2>
    <div class="row">
        @foreach($products as $product)

            <div class="col-md-3">
                <div class="product-wrap">
                    <div class="product-item">
                        <img src="{{$product->image}}">
                        <div class="product-buttons">
                           {{-- <a href="{{Request::url()}}/{{$product->slug}}" class="button">Подробнее</a>--}}
                            <div class="button">
                                <a href="{{Request::url()}}/{{$product->slug}}" style="display: block">В карточку</a>
                                <a href="#" style="display: block">В корзину</a>
                            </div>
                        </div>
                    </div>
                    <div class="product-title">
                        <a href="">{{$product->name}}</a>
                        <span class="product-price">₽ {{$product->price}}</span>
                        <p class="product-text">Состав: {{$product->getAttributeProduct->composition ?? null}}
                        </p>
                    </div>
                </div>
            </div>

        @endforeach

    </div>

@endsection