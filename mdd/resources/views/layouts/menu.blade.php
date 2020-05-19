<div class="ui fluid vertical stackable menu">
    @guest
        <div class="ui horizontal divider">
            MOSIT Digital Department
        </div>
        <a class="item" href="{{ route('index') }}">Главная</a>
        <a class="item" onclick="$('#loginModal').modal('show')">Войти</a>
    @else
        <div class="header item" style="text-align: center">
            {{ Auth::user()->getEmployee()->getFullInitials() }}
        </div>

        <div class="item">
            <b>Поручения</b>
            <div class="menu">
                <a class="item" data-tab="tickets">
                    Входящие
                    <div class="ui teal left pointing label">1</div>
                </a>
            </div>
        </div>

        @if (\Illuminate\Support\Facades\Auth::user()->isAccessOn(\App\Core\Constants\ListSubSystem::Storage))
            <a class="item">Мои файлы</a>
        @endif

        @php $rights = \Illuminate\Support\Facades\Auth::user()->getAccountRights() @endphp
        @if($rights)
            @foreach($rights as $section => $menu)
                <div class="item">
                    <b>{{ $section }}</b>
                    <div class="menu">
                        @foreach($menu as $menuItem)
                            <a class="item" href={{ route($menuItem->route) }}>{{ $menuItem->caption }}</a>
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
