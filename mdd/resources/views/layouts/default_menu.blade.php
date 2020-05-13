<div class="ui stackable tiny menu">
    <a class="header item" href="{{ route('index') }}">MOSIT Digital Department</a>
    <a class="item" href="{{ route('about') }}">О проекте</a>
    <div class="right menu">
        @guest
            <a class="item" href="{{ route('login') }}">Войти</a>
        @else
            <a class="item" href="{{ route('home') }}">Главная страница</a>
        @endguest
    </div>
</div>
