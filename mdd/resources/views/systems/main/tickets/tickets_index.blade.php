@extends('layout.app_default')
@section('title', 'Мои поручения')

@section('content')

    <fieldset class="ui segment">
        <legend><h3>Панель инструментов</h3></legend>
        <div class="ui fluid buttons">
            @if(\Illuminate\Support\Facades\Auth::user()->getEmployee()->getSubordinateEmployees())
                <div class="ui primary icon button" onclick="$('#createTicketModal').modal('show')">
                    <i class=""></i>
                    Создать поручение
                    @include('systems.main.tickets.components.ticket_create')
                </div>
            @endif

        </div>
    </fieldset>

    @empty($createdTickets)

    @else
        <fieldset class="ui segment">
            <legend><h3>Назначенные мною поручения</h3></legend>
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
                    @foreach($createdTickets as $ticket)
                        <tr>
                            <td>{{ $ticket->idTicket }}</td>
                            <td><a href="{{ route('tickets.show', $ticket) }}">{{ $ticket->getTicketType()->caption }}</a></td>
                            <td>{{ $ticket->caption }}</td>
                            <td>{{ $ticket->startDate }}</td>
                            <td>{{ $ticket->endDate }}</td>
                            <td>{{ $ticket->created_at }}</td>
                            <td>{{ $ticket->updated_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </fieldset>
    @endempty

    @isset($assignedTickets)
    <fieldset class="ui definition table">
        <legend><h3>Назначенные вам поручения</h3></legend>

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
            @foreach($assignedTickets as $ticket)
                <tr>
                    <td>{{ $ticket->idTicket }}</td>
                    <td><a href="{{ route('tickets.show', $ticket) }}">{{ $ticket->getTicketType()->caption }}</a></td>
                    <td>{{ $ticket->caption }}</td>
                    <td>{{ $ticket->startDate }}</td>
                    <td>{{ $ticket->endDate }}</td>
                    <td>{{ $ticket->created_at }}</td>
                    <td>{{ $ticket->updated_at }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </fieldset>
    @endisset

@endsection
