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
        @include('components.login')
        <div class="right menu" style="position: absolute; bottom: 0px; width: 100%; text-align: center">
            <a class="item" >Copyright © 2020. Все права защищены</a>
        </div>
    @else
        <a class="header item" href="{{ route('home') }}" style="text-align: center">
            {{ Auth::user()->getEmployee()->getFullInitials() }}
        </a>

        @if(Auth::user()->getAccountRightsOn(\App\Core\Constants\ListSubSystemConstants::Tickets)->isAccess())
            <div class="item">
                <b>Поручения</b>
                <div class="menu">
                    <a class="item" href="{{ route('tickets.inbox') }}">
                        Входящие
                        <div class="ui blue label">{{ Auth::user()->getEmployee()->getInboxTickets()->count() }}</div>
                    </a>
                    <a class="item" href="{{ route('tickets.expired') }}">
                        Просроченные
                        <div class="ui red label">{{ Auth::user()->getEmployee()->getExpiredTickets()->count()  }}</div>
                    </a>
                    <a class="item" href="{{ route('tickets.index') }}">
                        Все поручения
                        <div class="ui grey label">{{ Auth::user()->getEmployee()->getAssignedTickets()->count()  }}</div>
                    </a>
                </div>
            </div>
        @endif

        @if(Auth::user()->getAccountRightsOn(\App\Core\Constants\ListSubSystemConstants::Storage)->isAccess())
            <div class="item">
                <b>Хранилище</b>
                <div class="menu">
                    <a class="item" href="{{ route('storage.index') }}">
                        Файлы
                    </a>
                    <a class="item" href="{{ route('storage.trash') }}">
                        Корзина
                        <div class="ui grey label">{{ Auth::user()->getEmployee()->getFilesInTrash()->count() }}</div>
                    </a>
                </div>
            </div>
        @endif

        @php $rights = Auth::user()->getAccountRights() @endphp
        @if($rights)
            @foreach($rights as $section => $menu)
                <div class="item">
                    <b>{{ $section }}</b>
                    <div class="menu">
                        @foreach($menu as $menuItem)
                            @if (\Route::has($menuItem->getSubSystem()->getRoute()))
                                <a class="item" href={{ route($menuItem->getSubSystem()->getRoute()) }}>{{ $menuItem->getSubSystem()->getCaption() }}</a>
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
                <a class="item" onclick="$('#resetPasswordModal').modal('show')">
                    Сменить пароль
                </a>
                @include('components.reset_password')
            </div>
        </div>

        <div class="item">
            <b>Справка</b>
            <div class="menu">
                <a class="item" href="{{ route('help.index') }}">
                    Справочник
                </a>
                <a class="item" href="{{ route('manual') }}">
                    Руководство
                </a>
            </div>
        </div>
        <div class="item" style="padding-top: 5px"> <!-- #fixme fix css -->
            <div class="menu">
                <a class="item" href="#logout" onclick="$('#logoutForm').submit()">
                    Выйти
                    <i class="logout icon"></i>
                </a>
                <form id="logoutForm" method="POST" action="{{ route('logout') }}">
                    @csrf
                </form>
            </div>
        </div>
    @endguest
</div>
