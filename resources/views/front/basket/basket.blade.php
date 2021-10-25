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
                <div class="basket__table-row">
                    <div class="-photo">
                        <img src="{{$product->image}}" alt="{{$product->name}}">
                    </div>
                    <div class="-info">
                        <div class="-name">{{$product->name}}</div>
                        <div class="-weight">
                            150 г
                        </div>
                        <div class="-composition">
                            Состав
                            
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
        </div>

        <!-- <div class="row">
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
        </div> -->
    </div>






@endsection