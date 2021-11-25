@extends('front.master')
@section('content')
    <div id="profile" class="profile profile-page container mb-100 m-mb-60">
        <h2 class="second-title" style="font-size: 2.5rem;">
            Добро пожаловать, {{Auth::user()->name}} {{Auth::user()->surname}}
        </h2>
        <div class="profile__header magic-tabs-switches" data-tabs-id="profile-tabs">
            <div class="magic-tabs-switch -link active" data-activate-tab="profile-tab-01">
                Личный кабинет
            </div>
            <div class="magic-tabs-switch -link" data-activate-tab="profile-tab-02">
                Мои заказы
            </div>
        </div>

        <div id="profile-tabs" class="profile__tabs">
            @include('client.profile.index')
            @include('client.order.index')
        </div>
    </div>
@endsection