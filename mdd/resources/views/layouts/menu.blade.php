<div class="sixteen wide column">
    <div class="ui tiny menu">

        @guest
            <a class="header item" href="{{ route('index') }}">MOSIT Digital Department</a>
            <a class="item" href="{{ route('about') }}">О проекте</a>
        @endguest

        @yield('menu')

        @guest
            <div class="right menu">
                <a class="item" href="{{ route('login') }}">Войти</a>
            </div>
        @endguest

        @auth
            <div class="right menu">
                <div class="ui dropdown item">
                    Аккаунт
                    <i class="dropdown icon"></i>
                    <div class="menu">
                        <a class="item" href="{{ route('profile') }}">Профиль</a>
                        <a class="item" href="#logout" onclick="$('#logoutForm').submit()">Выйти</a>
                    </div>
                </div>
            </div>


            <form id="logoutForm" method="POST" action="{{ route('logout') }}">
                @csrf
            </form>

        @endauth

    </div>
</div>
