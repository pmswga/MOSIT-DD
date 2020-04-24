<div class="sixteen wide column">
    <div class="ui tiny pointing menu">
        <a  class="header item" href="@yield('homeLink')">
            MOSIT Digital Department
        </a>
        @yield('accountMenu')
        <div class="right menu">
            <a class="item" href="#">Мои файлы</a>
            <a class="item" href="#">Мои поручения</a>
            <div class="ui dropdown item">
                <i class="wrench icon"></i>
                <div class="menu">
                    <a class="item" href="{{ route('profile') }}">Профиль</a>
                    <div class="divider"></div>
                    <a class="item" href="#logout" onclick="$('#logoutForm').submit()">Выйти</a>
                </div>
            </div>
        </div>
    </div>
</div>
<form id="logoutForm" method="POST" action="{{ route('logout') }}">
    @csrf
</form>
