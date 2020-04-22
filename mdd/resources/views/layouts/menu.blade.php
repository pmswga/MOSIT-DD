
<div class="sixteen wide column">
    <div class="ui tiny menu">
        <a class="header item" href="{{ route('index') }}">MOSIT Digital Department</a>

        @guest
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
                <a class="item" href="#logout" onclick="$('#logoutForm').submit()">Выйти</a>
                <form id="logoutForm" method="POST" action="{{ route('logout') }}">
                    @csrf
                </form>
            </div>
        @endauth

    </div>
</div>
