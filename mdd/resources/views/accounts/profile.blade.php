@extends('layouts.app')

@section('title', 'Профиль')

@include('layouts.components.generate_account_menu')

@section('content')
    <div class="centered fourteen wide column">
        <fieldset class="ui segment">
            <legend><h3>Информация об аккаунте</h3></legend>
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
            <legend><h3>Информация о сотруднике</h3></legend>
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
                        <td>{{ Auth::user()->getEmployee()->getPersonalPhone() }}</td>
                    </tr>
                    <tr>
                        <td>Институт</td>
                        <td>{{ Auth::user()->getEmployee()->getInstitute() }}</td>
                    </tr>
                    <tr>
                        <td>Кафедра</td>
                        <td>{{ Auth::user()->getEmployee()->getFaculty() }}</td>
                    </tr>
                </tbody>
            </table>
        </fieldset>

        @if(Auth::user()->getEmployee()->getTeacher())
            <fieldset class="ui segment">
                <legend><h3>Информация о преподавателе</h3></legend>
                <table class="ui definition table">
                    <col width="35%">
                    <tbody>
                    <tr>
                        <td>Учёное звание</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Учёная степень</td>
                        <td></td>
                    </tr>
                    </tbody>
                </table>
            </fieldset>
        @endif


    </div>
@endsection
