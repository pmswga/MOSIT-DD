@extends('layouts.app')

@section('title', 'Вход')

@section('menu')
    @include('layouts.default_menu')
@endsection

@section('content')

    <div class="middle aligned centered aligned column">
        <div class="ui middle aligned centered aligned stackable grid">
            <div class="column">
                <div class="ui stackable centered grid">
                    <div class="nine wide column">
                        @error('userNotFoundError')
                            <div class="ui negative icon message">
                                <i class="exclamation icon"></i>
                                <div class="content">
                                    <div class="header">
                                        Ошибка
                                    </div>
                                    <p>{{ $message }}</p>
                                </div>
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="ui stackable centered grid">
                    <div class="four wide column">
                        <div class="ui centered fluid image">
                            <img src="img/cat.png" alt="cat">
                        </div>
                    </div>
                    <div class="one wide column">
                        <div class="ui vertical divider">Вход</div>
                    </div>
                    <div class="four wide middle aligned column">
                        <div class="ui left aligned segment">
                            <form class="ui form" method="POST" action="{{ route('login')  }}">
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
                                    <input type="submit" value="Войти" class="ui primary button">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
