@include('include.message')
<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
    <div class="profile__block mb-5">
        <form action="{{route('change.profile')}}" class="profile__form">
            {{ csrf_field() }}
            <h5 class="profile__title mb-3">Профиль</h5>
            <div class="form-group mb-3">
                <label for="name">Ваше имя</label>
                <input type="text" name="name" class="form-control" value="{{$user->name}}">
            </div>
            <div class="form-group mb-3">
                <label for="last-name">Почта для получение скидочных предложений</label>
                <input type="text" name="email" class="form-control" value="{{$user->email}}">
            </div>
            <button class="btn btn-success profile__btn">Сохранить изменения</button>
        </form>
    </div>
</div>