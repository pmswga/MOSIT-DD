@extends('layouts.app')

@section('title', 'Регистрация пользователя')

@section('content')

    <div class="middle aligned centered aligned column">
        <div class="ui middle aligned centered aligned stackable grid">
            <div class="column">
                <div class="ui stackable centered grid">
                    <div class="eight wide middle aligned column">
                        <div class="ui left aligned segment">
                            <form class="ui form" method="POST" action="{{ route('register')  }}">
                                @csrf

                                @foreach($errors as $error)

                                    {{ $error }}

                                @endforeach

                                <div class="field">
                                    <label>Сотрудник</label>
                                    <select name="employeeId">
                                        @foreach($employees as $employee)
                                            <option value="{{ $employee->getAccountId()  }}">{{ $employee->getSecondName()." ".$employee->getFirstName()  }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="field">
                                    <label>Тип аккаунта</label>
                                    <select name="accountType">
                                        @foreach($accountTypes as $accountType)
                                            <option value="{{ $accountType->getAccountTypeId()  }}">{{ $accountType->getCaption() }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="field">
                                    <label>E-mail</label>
                                    <input type="email" name="email">
                                </div>
                                <div class="field">
                                    <label>Пароль</label>
                                    <input type="password" name="password">
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
