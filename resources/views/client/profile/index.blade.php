@include('include.message')
<div class="magic-tab profile__tab active" id="profile-tab-01">
    <form action="{{route('change.profile')}}" class="profile__form superform">
        {{ csrf_field() }}
        <section class="-form-section">
            <label class="-prefix" for="pt-name">Имя <span class="-star">*</span></label>
            <div class="valinput">
                <!-- * Если успешно, то "--success", нет — "--error" -->
                <input class="input-style" required name="name" id="pt-name" type="text" value="{{$user->name}}">
                <!-- * Это сообщение об ошибке -->
                <div class="-error-message">Введите имя</div>
                <!-- * Если нужно доп. сообщение под инпутом (размещать под -error-message): -->
                <!-- <div class="-message">Сообщение к полю</div> -->
            </div>
        </section>
        <section class="-form-section">
            <label class="-prefix" for="pt-email">Почта для получение скидочных предложений</label>
            <div class="valinput">
                <!-- * Если успешно, то "--success", нет — "--error" -->
                <input class="input-style" name="email" id="pt-email" type="text" value="{{$user->email}}">
                <!-- * Это сообщение об ошибке -->
                <div class="-error-message">Введите имя</div>
                <!-- * Если нужно доп. сообщение под инпутом (размещать под -error-message): -->
                <!-- <div class="-message">Сообщение к полю</div> -->
            </div>
        </section>
        <input type="submit" value="Сохранить изменения" class="typical-button modal__button d-block">
    </form>
</div>