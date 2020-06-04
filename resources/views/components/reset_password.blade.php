<div id="resetPasswordModal" class="ui mini modal">
    <div class="header">
        Смена пароля
    </div>
    <div class="content">
        <form class="ui form" method="POST" action="{{ route('reset_password') }}">
            @csrf
            <div class="field">
                <label>Новый пароль</label>
                <input type="password" name="newPassword" required>
            </div>
            <div class="field">
                <label>Повторите пароль</label>
                <input type="password" name="newPasswordRepeat" required>
            </div>
            <div class="field">
                <input type="submit" value="Сменить" class="ui fluid primary button">
            </div>
        </form>
    </div>
</div>
