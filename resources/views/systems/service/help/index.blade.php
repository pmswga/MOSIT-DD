@extends('layout.app')
@section('title', 'Справочник')

@section('content')

    <div class="ui fluid styled accordion">
        <div class="title">
            Списки сотрудников
        </div>
        <div class="content">

            <table class="ui table">
                <colgroup>
                    <col width="5%">
                    <col width="25%">
                </colgroup>
                <thead>
                    <tr>
                        <th colspan="6"><h3>Руководство кафедры</h3></th>
                    </tr>
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
                    @foreach($leadership as $leading)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $leading->getFullInitials() }}</td>
                            <td>{{ $leading->getPersonalPhone() }}</td>
                            <td>{{ $leading->getPersonalEmail() }}</td>
                            <td>{{ $leading->getFaculty()->getInstitute()->getCaption() . ' / ' . $leading->getFaculty()->getCaption() }}</td>
                            <td>
                                {{ $leading->getPost()->getCaption() }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <table class="ui table">
                <colgroup>
                    <col width="5%">
                    <col width="25%">
                </colgroup>
                <thead>
                    <tr>
                        <th colspan="6"><h3>Сотрудники кафедры</h3></th>
                    </tr>
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
        </div>
    </div>

@endsection
