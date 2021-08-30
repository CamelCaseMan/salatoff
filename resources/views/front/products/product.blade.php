@extends('front.master')
@section('content')
    <h2>{{$product->name}}</h2>
    <div class="row">
        <div class="col-md-4">
            <img src="{{$product->image}}" class="img-fluid">
        </div>
        <div class="col-md-8">
            <p><b>Состав:</b> {{$product->getAttributeProduct->composition ?? null}}</p>
            <p><b>Энергетическая ценность на 100 г:</b> 100 ккал/419 кДж</p>
            <p><b>Срок реализации:</b> 72 часа</p>
            <div class="product-price">₽ {{$product->price}}</div>
            <p>Введите количество <input type="number" value="1" min="1"></p>
            <a href="">Купить</a>
        </div>
    </div>
@endsection