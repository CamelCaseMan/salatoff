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
                <th>Информация по доставке</th>
                <th>Скидка в %</th>
                <th class="text-right">Итого</th>
            </tr>
            @foreach($orders as $key =>$order)
                <tr>
                    <td>{{$order->id}}</td>
                    <td class="">
                        {{ date("d/m/Y", strtotime($order->delivery_date))}}

                    </td>
                    <td>
                        <div class="tag-button --green toggle-active open-modal"
                             data-toggle-active="mw-user-info_{{$key}}">
                            Подробнее
                        </div>
                    </td>
                    <td>{{$order->name}}</td>

                    <td class="">{{$order->phone}}</td>
                    <td>
                        <div class="tag-button --green toggle-active open-modal"
                             data-toggle-active="mw-delivery-info_{{$key}}">
                            Подробнее
                        </div>
                    </td>
                    <td class="text-right">
                            {{$order->cupon->discount ?? 'Нету'}}
                    </td>
                    <td class="text-right">{{$order->total}} руб.</td>

                </tr>
            @endforeach
        </table>
        {{ $orders->links() }}
    </div>
    @include('manager.orders.modals_client')
@endsection