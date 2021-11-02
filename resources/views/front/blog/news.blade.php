@extends('front.master')
@section('content')
    <a href="/blog">Список статей</a>
    <h1>{{$news->title}}</h1>
    <p>{{$news->text}}</p>
@endsection