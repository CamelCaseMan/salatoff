@extends('front.master')
@section('content')
    <div class="catalog-page container mb-240 l-mb-160 m-mb-120">
        @include('front.include.top_phone')
        <div class="product-page__back mb-30 xs-mb-20">
            <a href="/">
                <svg width="12" height="11" viewBox="0 0 12 11" fill="none">
                    <path d="M0.240234 5.39998L5.04023 0.599976H6.88023L2.73623 4.74398H11.6002V6.05598H2.73623L6.88023 10.2H5.04023L0.240234 5.39998Z"
                          fill="#1A1A1A"/>
                </svg>
                На главную
            </a>
        </div>
        <h2 class="second-title">Кейтеринг</h2>
        @include('front.include.category')
    </div>
@endsection

