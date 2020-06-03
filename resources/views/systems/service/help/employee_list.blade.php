@extends('layout.app')
@section('title', 'Список сотрудников')

@section('content')

    <fieldset class="ui segment">
        <legend><h3>Руководство кафедры</h3></legend>
        <div class="ui cards">
            @foreach($leadership as $leading)
                <div class="card">
                    <div class="content">
                        <div class="header">{{ $leading->getFullInitials() }}</div>
                        <div class="description">{{ $leading->getPost()->getCaption() }}</div>

                    </div>
                    <div class="extra content">
                        <div class="ui list">
                            <div class="item">
                                <i class="mail icon"></i>
                                <div class="content">
                                    <a href="mailto:{{ $leading->getPersonalEmail() }}">{{ $leading->getPersonalEmail() }}</a>
                                </div>
                            </div>
                            <div class="item">
                                <i class="phone icon"></i>
                                <div class="content">
                                    <a href="#call">{{ $leading->getPersonalPhone() }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </fieldset>

    <fieldset class="ui segment">
        <legend><h3>Сотрудники кафдеры</h3></legend>
        <table class="ui table">
            <thead>
                <tr>
                    <th>№</th>
                    <th>ФИО</th>
                    <th>Телефон</th>
                    <th>Почта</th>
                    <th>Институт / Кафедра</th>
                    <th>Должность</th>
                </tr>
            </thead>
            <tbody>
                @foreach($employees as $employee)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $employee->getFullInitials() }}</td>
                        <td>{{ $employee->getPersonalPhone() }}</td>
                        <td>{{ $employee->getPersonalEmail() }}</td>
                        <td>{{ $employee->getFaculty()->getInstitute()->getCaption() . ' / ' . $employee->getFaculty()->getCaption() }}</td>
                        <td>
                            {{ $employee->getPost()->getCaption() }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </fieldset>

@endsection
