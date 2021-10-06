@extends('front.master')
@section('content')
    <h2>Корзина</h2>

    <div class="row">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Название</th>
                <th scope="col">Цена</th>
                <th scope="col">Количество</th>
                <th scope="col">ПодИтог</th>
                <th scope="col">Фото</th>
            </tr>
            </thead>
            <tbody>
            @foreach($order->products as $key => $product)
                <tr>
                    <th scope="row">{{$key + 1}}</th>
                    <td>{{$product->name}}</td>
                    <td>{{$product->price}} руб.</td>
                    <td>{{$product->pivot->count}}</td>
                    <td>{{$product->getPriceForCount()}} руб.</td>
                    <td><img src="{{$product->image}}" class="img-fluid" style="max-width: 150px;"
                             alt="{{$product->name}}"></td>
                </tr>
            @endforeach
            <th></th>

            </tbody>
        </table>
        <b>Итого: {{$order->getFullPrice()}} руб.</b>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @include('front.basket.delivery')
    </div>




@endsection