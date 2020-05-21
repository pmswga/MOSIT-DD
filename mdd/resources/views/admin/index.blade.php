@extends('layout.app_admin')
@section('title', 'Панель администратора')

@section('content')

    <fieldset class="ui segment">
        <legend><h3>Сводка</h3></legend>
        <div class="ui one statistics">
            <div class="statistic">
                <div class="value">
                    {{ \App\User::all()->count() }}
                </div>
                <div class="label">
                    Пользователей
                </div>
            </div>
        </div>
    </fieldset>

@endsection
