@extends('layouts.app')

@section('title', 'Профиль')

@include('layouts.components.generate_account_menu')

@section('content')
    <div class="centered fourteen wide column">
        <fieldset class="ui segment">
            <legend>Информация об аккаунте</legend>
            <table class="ui definition table">
                <col width="35%">
                <tbody>
                    <tr>
                        <td>E-mail</td>
                        <td>{{ Auth::user()->getEmail()  }}</td>
                    </tr>
                    <tr>
                        <td>Тип аккаунта</td>
                        <td>{{ Auth::user()->getAccountType() }}</td>
                    </tr>
                </tbody>
            </table>
        </fieldset>
        <fieldset class="ui segment">
            <legend>Информация о сотруднике</legend>
            <table class="ui definition table">
                <col width="35%">
                <tbody>
                    <tr>
                        <td>Фамилия</td>
                        <td>{{ Auth::user()->getEmployee()->getSecondName() }}</td>
                    </tr>
                    <tr>
                        <td>Имя</td>
                        <td>{{ Auth::user()->getEmployee()->getFirstName() }}</td>
                    </tr>
                    <tr>
                        <td>Отчество</td>
                        <td>{{ Auth::user()->getEmployee()->getPatronymic() }}</td>
                    </tr>
                    <tr>
                        <td>Телефон</td>
                        <td>+7 (123) 456-78-90</td>
                    </tr>
                    <tr>
                        <td>Институт</td>
                        <td>ИТ</td>
                    </tr>
                    <tr>
                        <td>Кафедра</td>
                        <td>МОСИТ</td>
                    </tr>
                </tbody>
            </table>
        </fieldset>
    </div>
@endsection
