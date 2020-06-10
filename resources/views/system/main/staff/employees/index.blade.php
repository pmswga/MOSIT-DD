@extends('layout.app')
@section('title', 'Список сотрудников')

@section('content')

    <fieldset class="ui segment">
        <legend><h3>Список сотрудников</h3></legend>
        <table class="ui table">
            <thead>
                <th>№</th>
                <th>ФИО</th>
                <th>Должность</th>
                <th>Телефон</th>
                <th>Почта</th>
                <th>Институт / кафедра</th>
            </thead>
            <tbody>
                @foreach($employees as $employee)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $employee->getFullInitials() }}</td>
                        <td>{{ $employee->getPost()->getCaption() }}</td>
                        <td>{{ $employee->getPersonalPhone() }}</td>
                        <td>{{ $employee->getPersonalEmail() }}</td>
                        <td>{{ $employee->getFaculty()->getInstitute()->getCaption() . ' / ' . $employee->getFaculty()->getCaption() }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </fieldset>

@endsection
