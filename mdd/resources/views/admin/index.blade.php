@extends('layout.app_admin')
@section('title', 'Панель администратора')

@section('content')

    <fieldset class="ui segment">
        <legend><h3>Сводка пользователей</h3></legend>
        <div class="ui three statistics">
            <div class="statistic">
                <div class="value">
                    {{ \App\AccountModel::all()->count() }}
                </div>
                <div class="label">
                    Всего
                </div>
            </div>
            <div class="statistic">
                <div class="value">
                    {{ \App\AccountModel::all()->where('idAccountType', '=', \App\Core\Constants\ListAccountType::TEACHER)->count() }}
                </div>
                <div class="label">
                    Преподавателей
                </div>
            </div>
            <div class="statistic">
                <div class="value">
                    {{ \App\AccountModel::all()->where('idAccountType', '=', \App\Core\Constants\ListAccountType::METHODIST)->count() }}
                </div>
                <div class="label">
                    Методисты
                </div>
            </div>
        </div>
    </fieldset>

@endsection
