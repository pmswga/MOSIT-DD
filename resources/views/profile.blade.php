@extends('layout.app')

@section('title', 'Профиль')

@section('content')

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
                    <td>{{ Auth::user()->getAccountType()->getCaption() }}</td>
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
                    <td>Должность</td>
                    <td>{{ Auth::user()->getEmployee()->getPost()->getCaption() }}</td>
                </tr>
                <tr>
                    <td>Телефон</td>
                    <td>{{ Auth::user()->getEmployee()->getPersonalPhone() }}</td>
                </tr>
                <tr>
                    <td>Институт</td>
                    <td>{{ Auth::user()->getEmployee()->getFaculty()->getInstitute()->getCaption() }}</td>
                </tr>
                <tr>
                    <td>Кафедра</td>
                    <td>{{ Auth::user()->getEmployee()->getFaculty()->getCaption() }}</td>
                </tr>
            </tbody>
        </table>
    </fieldset>

    @if(Auth::user()->getEmployee()->getRates())
        <fieldset class="ui segment">
            <legend><h3>Информация о ставках</h3></legend>
            <table class="ui definition table">
                <col width="35%">
                <tbody>
                    @foreach(Auth::user()->getEmployee()->getRates() as $rate)
                        <tr>
                            <td>{{ $rate->getRateType()->getCaption() }}</td>
                            <td>{{ $rate->getRateValue() }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </fieldset>
    @endif

    @if(Auth::user()->getEmployee()->getTeacher())
        <fieldset class="ui segment">
            <legend><h3>Информация о преподавателе</h3></legend>
            <table class="ui definition table">
                <col width="35%">
                <tbody>
                    <tr>
                        <td>Должность</td>
                        <td>{{ Auth::user()->getEmployee()->getTeacher()->getPost()->getCaption() }}</td>
                    </tr>
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

    @if(Auth::user()->getEmployee()->getChief())
        <fieldset class="ui segment">
            <legend><h3>Информация о начальнике</h3></legend>
            <table class="ui definition table">
                <col width="35%">
                <tbody>
                    <tr>
                        <td>Фамилия</td>
                        <td>{{ Auth::user()->getEmployee()->getChief()->getSecondName() }}</td>
                    </tr>
                    <tr>
                        <td>Имя</td>
                        <td>{{ Auth::user()->getEmployee()->getChief()->getFirstName() }}</td>
                    </tr>
                    <tr>
                        <td>Отчество</td>
                        <td>{{ Auth::user()->getEmployee()->getChief()->getPatronymic() }}</td>
                    </tr>
                    <tr>
                        <td>Должность</td>
                        <td>{{ Auth::user()->getEmployee()->getChief()->getPost()->getCaption() }}</td>
                    </tr>
                    <tr>
                        <td>Телефон</td>
                        <td>{{ Auth::user()->getEmployee()->getChief()->getPersonalPhone() }}</td>
                    </tr>
                    <tr>
                        <td>Почта</td>
                        <td><a href="mailto:{{ Auth::user()->getEmployee()->getChief()->getPersonalEmail() }}">{{ Auth::user()->getEmployee()->getChief()->getPersonalEmail() }}</a></td>
                    </tr>
                    <tr>
                        <td>Институт</td>
                        <td>{{ Auth::user()->getEmployee()->getChief()->getFaculty()->getInstitute()->getCaption() }}</td>
                    </tr>
                    <tr>
                        <td>Кафедра</td>
                        <td>{{ Auth::user()->getEmployee()->getChief()->getFaculty()->getCaption() }}</td>
                    </tr>
                </tbody>
            </table>
        </fieldset>
    @endif

@endsection
