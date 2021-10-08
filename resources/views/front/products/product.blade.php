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
            
            <div class="product-pg__quty">
                <div class="-prefix">Количество</div>
                <div class="quty-interface">
                    <div class="-btn quty-interface-btn" data-quty="-">-</div>
                    <input class="quty-interface-value" type="text" value="1">
                    <div class="-btn quty-interface-btn" data-quty="+">+</div>
                </div>
            </div>
            <div class="btn btn-success add-button" data-id="{{$product->id}}">В корзину</div>
            <div class="btn btn-danger remove-button" data-id="{{$product->id}}">Удалить</div>
        </div>
    </div>
@endsection