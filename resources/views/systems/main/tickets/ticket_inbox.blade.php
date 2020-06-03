@extends('layout.app')
@section('title', 'Мои поручения')

@section('content')

    <fieldset class="ui segment">
        <legend><h3>Панель инструментов</h3></legend>
        <div class="ui fluid buttons">
            <div class="ui primary icon button">
                <i class=""></i>
                Отметить все как просмотренные
            </div>
        </div>
    </fieldset>

    @if(count($inboxTicketList) > 0)
        <fieldset class="ui table">
            <legend><h3>Назначенные вам</h3></legend>
            <table class="ui table">
                <thead>
                <tr>
                    <th>№</th>
                    <th>Тип</th>
                    <th>Название</th>
                    <th>Дата начала</th>
                    <th>Дата окончания</th>
                    <th>Дата создания</th>
                    <th>Последнее обновление</th>
                </tr>
                </thead>
                <tbody>
                @foreach($inboxTicketList as $ticket)
                    <tr>
                        <td>{{ $ticket->idTicket }}</td>
                        <td><a href="{{ route('tickets.show', $ticket) }}">{{ $ticket->getTicketType()->caption }}</a></td>
                        <td>{{ $ticket->caption }}</td>
                        <td>{{ $ticket->getStartDate() }}</td>
                        <td>{{ $ticket->getEndDate() }}</td>
                        <td>{{ $ticket->getCreatedDate() }}</td>
                        <td>{{ $ticket->getUpdatedDate() }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </fieldset>
    @endif

@endsection
