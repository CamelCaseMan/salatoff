@extends('manager.master')
@section('content')
    <h2 class="page-title">Работа с заказами</h2>

    <div class="big-table__wrapper">
        <table class="big-table">
            <tr>
                <th>№ заказа</th>
                <th>Дата доставки</th>
                <th>Клиент</th>
                <th>На кого заказано</th>
                <th>Телефон</th>
                <th>Список продуктов</th>
                <th>Доставка</th>
                <th>Купон</th>
                <th class="text-right">Итого</th>
            </tr>
            @if(count($orders) > 0)
                @foreach($orders as $key =>$order)
                    <tr>
                        <td>{{$order->id}}</td>
                        <td class="">
                            {{ date("d/m/Y", strtotime($order->delivery_date))}}

                        </td>
                        <td>
                            @if(is_null($order->user_id))
                                Без регистрации
                            @else
                                <div class="tag-button --green open-modal"
                                     data-open-modal="wndw-user-info-{{$key}}">
                                    Подробнее
                                </div>
                            @endif
                        </td>
                        <td>{{$order->name}}</td>

                        <td class="">{{$order->phone}}</td>
                        <td>
                            <div class="tag-button --green open-modal"
                                 data-open-modal="wndw-products-info-{{$key}}">
                                Подробнее
                            </div>
                        </td>
                        <td>
                            <div class="tag-button --green open-modal"
                                 data-open-modal="wndw-delivery-info-{{$key}}">
                                Подробнее
                            </div>
                        </td>
                        <td class="text-right">
                            @if(isset($order->cupon))
                                {{$order->cupon->discount}} %
                            @else
                                Нету
                            @endif
                        </td>
                        <td class="text-right">{{$order->total}} руб.</td>

                    </tr>
                @endforeach
            @endif
        </table>
        {{ $orders->links() }}
    </div>
    @if(count($orders) > 0)
        @include('manager.orders.modals_client')
        @include('manager.orders.modals_products')
    @endif
@endsection