
<div class="sixteen wide column">
    <div id="main-menu" class="ui stackable menu">
        <a class="header item" href="{{ url('/') }}">
			SIP
		</a>
		<a class="item" href="{{ url('teachers') }}">
			Преподаватели
		</a>
		<a class="item" href="{{ url('subjects') }}">
			Дисциплины
		</a>
		<a class="item" href="#">
			Протоколы
		</a>
		<a class="item" href="#">
			Архив
		</a>
        <div class="right menu">
            <div class="ui dropdown item">
                <i class="user icon"></i>
				Username
                <div class="menu">
                    <a class="item" href="{{ url('profile') }}">
						Профиль
                    </a>
                    <a class="item" href="#logout">
						Выйти
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
