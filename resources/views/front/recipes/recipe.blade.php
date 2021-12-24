@extends('front.master')
@section('content')
    <div class="article-page container mb-160 l-mb-130">
        <div class="product-page__back mb-30 xs-mb-20">
            <a href="/recipes">
                <svg width="12" height="11" viewBox="0 0 12 11" fill="none">
                    <path d="M0.240234 5.39998L5.04023 0.599976H6.88023L2.73623 4.74398H11.6002V6.05598H2.73623L6.88023 10.2H5.04023L0.240234 5.39998Z"
                          fill="#1A1A1A"/>
                </svg>
                {{$category->title}}
            </a>
        </div>
        <h1 class="second-title">{{$recipe->title}}</h1>
        <p>{!!$recipe->text!!}</p>
    </div>
@endsection