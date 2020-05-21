<div id="loginModal" class="ui mini modal">
    <div class="content">
        <div class="ui centered medium image">
            <img id="cat" src="img/cat.png" alt="cat">
        </div>
        <form class="ui form" method="POST" action="{{ route('login') }}">
            @csrf
            <div class="field">
                <label>E-mail:</label>
                <input type="email" name="email" required>
            </div>
            <div class="field">
                <label>Пароль:</label>
                <input type="password" name="password" required>
            </div>
            <div class="field">
                <input type="submit" value="Войти" class="ui fluid primary button">
            </div>
        </form>
    </div>
</div>
