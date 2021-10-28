@extends('front.master')
@section('content')
    <div class="product-page container mb-250 m-mb-160 xs-mb-120">
        @include('front.include.top_phone')
        <div class="product-page__back mb-50 xs-mb-40">
            <a href="/dinner">
                <svg width="12" height="11" viewBox="0 0 12 11" fill="none">
                    <path d="M0.240234 5.39998L5.04023 0.599976H6.88023L2.73623 4.74398H11.6002V6.05598H2.73623L6.88023 10.2H5.04023L0.240234 5.39998Z"
                          fill="#1A1A1A"/>
                </svg>
                Готовая еда домой и в офис
            </a>
        </div>
        @include('front.include.card_product')
        @include('front.include.recommendations')
    </div>
@endsection