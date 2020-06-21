@extends('layout.app')
@section('title', 'Закрыте поручения ')

@section('content')

    @if($closedTickets->isNotEmpty())
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
            @foreach($closedTickets as $ticket)
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
