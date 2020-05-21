<div class="sixteen wide column">
    <div class="ui tiny menu">
        <a  class="header item" href="@yield('homeLink')">
            MOSIT Digital Department
        </a>
        <div class="ui dropdown item">
            <i class="user icon"></i>
            Аккаунты
            <div class="menu">
                <a class="item" href="{{ route('accounts.create') }}">Добавить</a>
                <a class="item" href="{{ route('accounts.index') }}">Просмотр</a>
                <a class="item" href="{{ route('accounts.rights') }}">Права доступа</a>
            </div>
        </div>
        <div class="ui dropdown item">
            <i class="outline user icon"></i>
            Сотрудники
            <div class="menu">
                <a class="item" href="#view">Просмотр</a>
            </div>
        </div>

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
    </div>
</div>
<form id="logoutForm" method="POST" action="{{ route('logout') }}">
    @csrf
</form>
