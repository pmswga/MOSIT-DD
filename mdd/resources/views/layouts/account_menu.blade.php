<div class="sixteen wide column">
    <div class="ui tiny menu">

        @yield('menu')

        @guest
            <div class="right menu">
                <a class="item" href="{{ route('login') }}">Войти</a>
            </div>
        @endguest


    </div>
</div>
