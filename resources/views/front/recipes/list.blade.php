@extends('front.master')
@section('content')

<div class="recipes-page container mb-160 l-mb-130">

    <h1 class="second-title">{{$list->title}}</h1>

    <ul class="recipes__list">

        @foreach($list->getRecipes as $item)
            <li>
                <a href="/recipes/{{$list->slug}}/{{$item->slug}}">{{$item->title}}</a>
            </li>
        @endforeach

    </ul>

</div>

@endsection