@extends('layout.app')

@section('title', 'Индивидуальные планы')


@section('content')

    <fieldset class="ui segment">
        <legend><h3>Панель инструментов</h3></legend>

    </fieldset>

    <fieldset class="ui segment">
        <legend><h3>Индивидуальные планы</h3></legend>

        @isset($ips)
            <table class="ui celled table">
                <col width="5%">
                <col width="25%">
                <col width="20%">
                <col width="15%">
                <col width="15%">
                <col width="10%">
                <thead>
                <tr style="text-align: center">
                    <th>№</th>
                    <th>Преподаватель</th>
                    <th>Учебный год</th>
                    <th>Последнее изменение</th>
                    <th>Кто изменил</th>
                    <th colspan="2">Действия</th>
                </tr>
                </thead>
                <tbody>
                @foreach($ips as $ip)
                    <tr>
                        <td style="text-align: center">{{ $loop->iteration }}</td>
                        <td>{{ $ip->getTeacherInitials() }}</td>
                        <td>
                            {{ $ip->educationYear }}
                        </td>
                        <td>
                            {{ date_format(date_create($ip->lastUpdate), 'd.m.Y / H:i') }}
                        </td>
                        <td>
                            {{ \App\Models\Main\Staff\EmployeeModel::find($ip->lastEmployee)->getFullInitials()  }}
                        </td>
                        <td colspan="2" style="text-align: center">
                            <div class="ui  basic icon buttons">
                                <a class="ui button" href="{{ route('ips.download', $ip) }}">
                                    <i style="color: rgb(31, 114, 70);" class="ui icon file excel"></i>
                                    Скачать
                                </a>
                                @can('update', $ip)
                                    <a class="ui button" href="{{ route('ips.edit', $ip) }}">
                                        <i class="orange edit icon"></i>
                                    </a>
                                @endcan
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            @component('components.message')
                @slot('type', 'message')
                @slot('message', 'Вы не добавили файлы, с которыми будете работать')
            @endcomponent
        @endisset
    </fieldset>

@endsection
