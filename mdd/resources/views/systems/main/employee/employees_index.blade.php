@extends('layout.app_admin')
@section('title', 'Сотрудники')

@section('content')

    <fieldset class="ui segment">
        <legend><h3>Все сотрудники</h3></legend>
        <table class="ui table">
            <thead>
                <tr>
                    <th>№</th>
                    <th>Фамилия</th>
                    <th>Имя</th>
                    <th>Отчество</th>
                    <th>Телефон</th>
                    <th>Почта</th>
                    <th>Институт</th>
                    <th>Кафедра</th>
                </tr>
            </thead>
            <tbody>
                @foreach($employees as $employee)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $employee->secondName }}</td>
                        <td>{{ $employee->firstName }}</td>
                        <td>{{ $employee->patronymic }}</td>
                        <td>{{ $employee->personalPhone }}</td>
                        <td>{{ $employee->personalEmail }}</td>
                        <td>{{ $employee->getInstitute() }}</td>
                        <td>{{ $employee->getFaculty() }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </fieldset>

@endsection
