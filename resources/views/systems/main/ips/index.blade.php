@extends('layout.app')
@section('title', 'Индивидуальные планы')

@section('content')

    @if($ips->isNotEmpty())
        <table class="ui celled table">
            <col width="1%">
            <col width="25%">
            <thead>
            <tr style="text-align: center">
                <th>№</th>
                <th>Преподаватель</th>
                <th>Учебный год</th>
                <th>Последнее изменение</th>
                <th colspan="2">Действия</th>
            </tr>
            </thead>
            <tbody>
            @foreach($ips as $ip)
                <tr>
                    <td style="text-align: center">
                        {{ $loop->iteration }}
                    </td>
                    <td>
                        @can('view', $ip)
                            <a href="{{ route('ips.show', $ip) }}">
                                {{ $ip->getTeacher()->getFullInitials() }}
                            </a>
                        @else
                            {{ $ip->getTeacher()->getFullInitials() }}
                        @endcan
                    </td>
                    <td>
                        {{ $ip->educationYear }}
                    </td>
                    <td>
                        {{ $ip->getLastUpdate() . ', ' . $ip->getLastEmployee()->getFullInitials() }}
                    </td>
                    <td colspan="2">
                        <div class="ui basic fluid icon buttons">
                            <a class="ui button" href="{{ route('ips.download', $ip) }}">
                                <i class="ui download icon"></i>
                            </a>
                            @if(Auth::user()->getAccountRightsOn(\App\Core\Constants\ListSubSystemConstants::IPS)->isFullAccess())
                                <a class="ui button">
                                    <i class="unlock icon"></i>
                                </a>
                            @endif
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
        <figure class="ui empty-msg center aligned image">
            <i class="massive file excel icon"></i>
            <figcaption>
                Добавьте файлы с меткой
                <div class="ui tag label">Индивидуальный план</div>
            </figcaption>
        </figure>
    @endif

@endsection
