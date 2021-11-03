@extends('front.master')
@section('content')

<div class="recipes-page container mb-160 l-mb-130">

    <h1 class="second-title">Добро пожаловать в мир рецептов!</h1>

    <ul class="recipes__list">

        @foreach($category as $item)
            <li>
                <a href="/recipes/{{$item->slug}}">{{$item->title}}</a>
            </li>
        @endforeach

    </ul>

</div>

@endsection