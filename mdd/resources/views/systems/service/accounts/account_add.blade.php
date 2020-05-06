@extends('layouts.app')
@section('title', 'Добавление пользователя')
@section('homeLink', route('admin.index'))

@include('layouts.admin_menu')

@section('content')

    <div class="centered fourteen wide column">
        <div class="ui segment">
            @if(\Illuminate\Support\Facades\Session::has('message'))
                <div class="ui icon success message">
                    <i class="check icon"></i>
                    <div class="content">
                        <div class="header">
                            {{ \Illuminate\Support\Facades\Session::get('message') }}
                        </div>
                    </div>
                </div>
            @endif
            <form class="ui form" method="POST" action="{{ route('accounts.store')  }}">
                @csrf


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

@endsection
