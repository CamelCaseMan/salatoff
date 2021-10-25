@extends('front.master')
@section('content')

    <style>
        .table {
            width: 100%;
        }
        .table__wrapper {
            position: relative;
        }
        .table tr th {
            font-weight: 500;
        }
        .table tr td, .table tr th {
            padding: 15px 10px;
        }
        .table tr:nth-child(2n) {
            background-color: rgba(56, 124, 75, 0.05);
        }
        .table .-button {
            display: inline-block;
            cursor: pointer;
        }
        .table .-button.--remove {
            color: #D13301;
        }
    </style>

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
                <th scope="col">Удалить</th>
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
                    <td>
                        <div class="btn btn-danger remove-button" data-id="{{$product->id}}">Удалить</div>
                    </td>
                </tr>
            @endforeach
            <th></th>

            </tbody>
        </table>
        <b>Итого: {{$order->getFullPrice()}} руб.</b>

        @include('front.basket.delivery')
    </div>




@endsection