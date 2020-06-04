@extends('layout.app')
@section('title', 'Индивидуальные планы')

@section('content')

    <fieldset class="ui segment">
        <legend><h3>Индивидуальные планы</h3></legend>
        @if($ips->isNotEmpty())
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
                        <td>{{ $ip->getTeacher()->getFullInitials() }}</td>
                        <td>
                            {{ $ip->educationYear }}
                        </td>
                        <td>
                            {{ $ip->getLastUpdate() }}
                        </td>
                        <td>
                            {{ $ip->getLastEmployee()->getFullInitials() }}
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
        @endif
    </fieldset>

@endsection
