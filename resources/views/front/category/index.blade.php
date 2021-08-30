@extends('front.master')
@section('content')
    <h2>Список категорий</h2>
    <div class="row">
        @foreach($categories as $category)
            @if($category->parent_id == 0)
                <div class="col-md-3">
                    <div class="card">
                        <img src="{{$category->image}}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{$category->name}}</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                of the card's content.</p>

                            @if(count($category->childrenCategories) > 0)
                                @foreach($category->childrenCategories as $children)
                                    <a href="/catalog/{{$category->slug}}/{{$children->slug}}" class="btn btn-primary"
                                       style="float: right; margin-left: 10px">{{$children->name}}</a>
                                @endforeach
                            @else
                                <a href="/catalog/{{$category->slug}}" class="btn btn-primary" style="float: right">Перейти</a>
                            @endif

                        </div>
                    </div>
                </div>
            @endif
        @endforeach

    </div>

@endsection