@extends('front.master')
@section('content')
    @foreach($list as $item)
        <p><a href="/blog/{{$item->slug}}">{{$item->title}}</a></p>
        <p><a href="">{{$item->anons}}</a></p>
        <hr>
        <hr>
        <hr>
        <br>
    @endforeach
    {{ $list->links() }}
@endsection