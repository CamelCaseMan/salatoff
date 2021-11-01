@extends('front.master')
@section('content')
    <h2>{{$user->name}} Ваш заказ успешно оформлен!</h2>
    <h3>Номер заказа {{$order->id}}</h3>
@endsection