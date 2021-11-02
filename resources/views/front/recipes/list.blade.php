@extends('front.master')
@section('content')

    <h1>{{$list->title}}</h1>
    <ul>
        @foreach($list->getRecipes as $item)
            <li>
                <a href="/recipes/{{$list->slug}}/{{$item->slug}}">{{$item->title}}</a>
            </li>
        @endforeach
    </ul>
@endsection