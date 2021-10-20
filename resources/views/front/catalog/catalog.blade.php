@extends('front.master')
@section('content')
    <div class="catalog-page container mb-240 l-mb-160 m-mb-120">

        <h2 class="second-title">Магазинам и кафе</h2>

        <div class="catalog-page__filter megafilter magic-tabs-switches" data-tabs-id="catalog-tabs">
            @foreach($categories as $key => $category)
                @if($category->parent_id == 0)
                    <div class="magic-tabs-switch -label"
                         data-activate-tab="ct-category_parent_{{$category->id}}">{{$category->name}}</div>
                @endif
            @endforeach
        </div>

        <div id="catalog-tabs" class="magic-tabs">
            @foreach($categories as $key => $category)
                @if($category->parent_id == 0)
                    <div id="ct-category_parent_{{$category->id}}" class="magic-tab">
                        <div class="catalog-page__wrapper">
                            @foreach($categories as $key => $children)
                                @if($children->parent_id == $category->id)
                                    <a href="catalog/{{$category->slug}}/{{$children->slug}}" class="catalog-page__cat"
                                       style="background-color: #70B0FF; color: #70B0FF;">
                                        <div class="-img"
                                             style="background-image: url('{{asset('theme')}}/img/cat-images/{{$children->image}}')"></div>
                                        <div class="-name">
                                            {{$children->name}}
                                        </div>
                                    </a>
                                @endif
                            @endforeach
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
@endsection

