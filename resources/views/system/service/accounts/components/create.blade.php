@extends('layout.app')
@section('title', 'Добавление пользователя')

@section('content')

    <fieldset class="ui segment">
        <legend><h3>Добавление пользователя</h3></legend>
        <form class="ui form" method="POST" action="{{ route('accounts.store')  }}">
            @csrf

            <div class="field">
                <label>Сотрудник</label>
                <select name="employeeId">
                    @foreach($employees as $employee)
                        <option value="{{ $employee->idEmployee }}">{{ $employee->secondName." ".$employee->firstName  }}</option>
                    @endforeach
                </select>
            </div>
            <div class="field">
                <label>Тип аккаунта</label>
                <select name="accountType">
                    @foreach($accountTypes as $accountType)
                        <option value="{{ $accountType->idAccountType  }}">{{ $accountType->getCaption() }}</option>
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
    </fieldset>

@endsection
