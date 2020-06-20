@extends('layout.app')
@section('title', 'Просроченные поручения')

@section('content')

    @if($inboxTickets->isNotEmpty())
        <fieldset class="ui segment">
            <legend><h3>Панель инструментов</h3></legend>
            <div class="ui fluid buttons">
                <div class="ui primary icon button">
                    <i class=""></i>
                    Отметить все как просмотренные
                </div>
            </div>
        </fieldset>
    @endif

    @if($inboxTickets->isNotEmpty())
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
            @foreach($inboxTickets as $ticket)
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
    @else
        <figure class="ui empty-msg center aligned image">
            <i class="massive inbox icon"></i>
            <figcaption>Нет просроченных поручений</figcaption>
        </figure>
    @endif


@endsection
