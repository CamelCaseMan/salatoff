@extends('front.master')
@section('content')
    <h1>Добро пожаловать в мир рецептов!</h1>
    <ul>
        @foreach($category as $item)
            <li>
                <a href="/recipes/{{$item->slug}}">{{$item->title}}</a>
            </li>
        @endforeach
    </ul>
@endsection