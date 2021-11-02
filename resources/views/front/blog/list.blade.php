@extends('front.master')
@section('content')
    <div class="blog-page container mb-160 l-mb-130">

        <h2 class="second-title">Наш блог</h2>

        <div class="blog__news mb-80">

            @foreach($list as $item)
            <a href="/blog/{{$item->slug}}" class="blog__new">
                <div class="-title">{{$item->title}}</div>
                <p class="-text">{{$item->anons}}</p>
            </a>
            @endforeach

        </div>        

        {{ $list->links('paginate') }}

    </div>
@endsection