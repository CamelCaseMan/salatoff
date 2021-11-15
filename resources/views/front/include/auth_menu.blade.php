<div id="hdr-dplst" class="-droplist">
    <ul>
        @if(Auth::check())
            <li>
                <a href="/client/profile" class="-link">Личный кабинет</a>
            </li>
            <li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                    <input type="submit" class="-link --exit" value="Выйти">
                </form>
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