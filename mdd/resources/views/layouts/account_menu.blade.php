<div class="sixteen wide column">
    <div class="ui tiny pointing menu">
        <a  class="header item" href="@yield('homeLink')">
            MOSIT Digital Department
        </a>
        @yield('generatedMenu')
        <div class="right menu">
            @yield('generalMenu')
            @yield('profileMenu')
        </div>
    </div>
</div>
<form id="logoutForm" method="POST" action="{{ route('logout') }}">
    @csrf
</form>
