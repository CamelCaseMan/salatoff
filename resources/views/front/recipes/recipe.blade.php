@extends('front.master')
@section('content')
    <a href="">&#8592;{{$category->title}}</a>
    <h1>{{$recipe->title}}</h1>
<p>{{$recipe->text}}</p>
@endsection