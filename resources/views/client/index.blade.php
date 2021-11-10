@extends('front.master')
@section('content')
    <div id="profile" class="profile profile-page">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="page-title">
                        Добро пожаловать, {{Auth::user()->name}} {{Auth::user()->surname}}
                    </h2>
                    <ul class="nav nav-tabs client-tabs-header" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                               aria-controls="home" aria-selected="true">Личные данные</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab"
                               aria-controls="contact" aria-selected="false">Мои заказы</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="profile__gray">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="tab-content" id="myTabContent">
                            @include('client.profile.index')
                            @include('client.order.index')
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection