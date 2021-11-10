<div id="hdr-dplst" class="-droplist">
    <ul>
        @if(Auth::check())
            <li>
                <div class="-link open-modal" data-open-modal="wndw-login"><a href="/client/profile">Личный кабинет</a></div>
            </li>
            <li>
                <div class="--exit -link">
                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                        @csrf
                        <input type="submit" value="Выйти">
                    </form>
                </div>
            </li>
        @else
            <li>
                <div class="-link open-modal" data-open-modal="wndw-login">Войти</div>
            </li>
            <li>
                <div class="-link open-modal" data-open-modal="wndw-signin">Регистрация</div>
            </li>
        @endif
    </ul>
</div>