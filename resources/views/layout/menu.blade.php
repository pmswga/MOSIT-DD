<div class="ui fluid vertical stackable menu" style="position: relative">
    <a class="ui horizontal divider" href="{{ route('admin.index') }}">
        Панель администрирования
    </a>
    <div class="item">
        <i class="user icon"></i>
        <b>Аккаунты</b>
        <div class="menu">
            <a class="item" href="{{ route('accounts.create') }}">Добавить</a>
            <a class="item" href="{{ route('accounts.index') }}">Просмотр</a>
            <a class="item" href="{{ route('accounts.rights') }}">Права доступа</a>
        </div>
    </div>

    <div class="item">
        <i class="outline user icon"></i>
        <b>Сотрудники</b>
        <div class="menu">
            <a class="item" href="{{ route('employees.create') }}">Добавить</a>
            <a class="item" href="{{ route('employees.index') }}">Просмотр</a>
        </div>
    </div>

    <div class="item">
        <i class="wrench icon"></i>
        <b>Настройки</b>
        <div class="menu">
            {{--
            <a class="item" href="#logout" onclick="$('#logoutForm').submit()">Выйти</a>
            --}}
        </div>
    </div>
</div>
