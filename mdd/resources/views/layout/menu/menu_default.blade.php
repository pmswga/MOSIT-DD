<div class="ui fluid vertical stackable menu" style="position: relative">
    @guest
        <div class="ui horizontal divider">
            MOSIT Digital Department
        </div>
        <a class="item" href="{{ route('index') }}">
            Главная
            <i class="compass icon"></i>
        </a>
        <a class="item" href="{{ route('manual') }}">
            Руководство
            <i class="book icon"></i>
        </a>
        <a class="item" onclick="$('#loginModal').modal('show')">
            Войти
            <i class="sign-in icon"></i>
        </a>
        <div class="right menu" style="position: absolute; bottom: 0px; width: 100%; text-align: center">
            <a class="item" >Copyright © 2020. Все права защищены</a>
        </div>
    @else
        <div class="header item" style="text-align: center">
            {{ Auth::user()->getEmployee()->getFullInitials() }}
        </div>

        @php $rights = \Illuminate\Support\Facades\Auth::user()->getAccountRights() @endphp
        @if($rights)
            @foreach($rights as $section => $menu)
                <div class="item">
                    <b>{{ $section }}</b>
                    <div class="menu">
                        @foreach($menu as $menuItem)
                            @if (\Route::has($menuItem->route))
                                <a class="item" href={{ route($menuItem->route) }}>{{ $menuItem->caption }}</a>
                            @endif
                        @endforeach
                    </div>
                </div>
            @endforeach
        @endif

        <div class="item">
            <b>Настройки</b>
            <div class="menu">
                <a class="item" href="{{ route('profile') }}">Профиль</a>
                <a class="item" href="#logout" onclick="$('#logoutForm').submit()">Выйти</a>
            </div>
        </div>
    @endguest
</div>

@auth
    <form id="logoutForm" method="POST" action="{{ route('logout') }}">
        @csrf
    </form>
@else
    @include('login')
@endauth
