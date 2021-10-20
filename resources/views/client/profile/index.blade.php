@include('include.message')
<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
    <div class="profile__block mb-5">
        <form action="{{route('change.profile')}}" class="profile__form">
            {{ csrf_field() }}
            <h5 class="profile__title mb-3">Профиль</h5>
            <div class="form-group mb-3">
                <label for="name">Имя</label>
                <input type="text" name="name" class="form-control" id="name" value="{{$user->name}}">
            </div>
            <div class="form-group mb-3">
                <label for="last-name">Фамилия</label>
                <input type="text" name="surname" class="form-control" id="last-name" value="{{$user->surname}}">
            </div>
            <button class="btn btn-success profile__btn">Сохранить изменения</button>
        </form>
    </div>
    <div class="profile__block">
        <h5 class="profile__title mb-3">Пароль</h5>
        <form action="{{route('change.password')}}" class="profile__form">
            {{ csrf_field() }}
            <div class="form-group mb-3">
                <label for="curretPassword">Текущий пароль</label>
                <input type="password" name="password_old" class="form-control" id="curretPassword">
            </div>
            <div class="form-group mb-3">
                <label for="newPassword">Новый пароль</label>
                <input name="password" type="password" class="form-control" id="newPassword ">
            </div>
            <div class="form-group mb-3">
                <label for="repeatPassword ">Подтверждение пароля</label>
                <input type="password" name="password_confirmation" class="form-control " id="repeatPassword">
            </div>
            <button class="btn btn-success profile__btn">Сохранить изменения</button>
        </form>
    </div>
</div>