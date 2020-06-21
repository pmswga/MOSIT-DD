@extends('layout.app')
@section('title', 'Все поручения')

@section('content')

    @if(Auth::user()->getEmployee()->getSubordinateEmployees()->isNotEmpty())
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
    @endif

    @if( count($createdTickets) > 0)
        <fieldset class="ui segment">
            <legend><h3>Назначенные мною</h3></legend>
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
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($createdTickets as $ticket)
                        <tr>
                            <td>{{ $ticket->idTicket }}</td>
                            <td><a href="{{ route('tickets.show', $ticket) }}">{{ $ticket->getTicketType()->caption }}</a></td>
                            <td>{{ $ticket->getCaption() }}</td>
                            <td>{{ $ticket->getStartDate() }}</td>
                            <td>{{ $ticket->getEndDate() }}</td>
                            <td>{{ $ticket->getCreatedDate() }}</td>
                            <td>{{ $ticket->getUpdatedDate() }}</td>
                            <td>
                                <form style="margin: 0; padding: 0;" method="POST" action="{{ route('tickets.destroy', $ticket) }}">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="ui icon basic button">
                                        <i class="ui red trash icon"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </fieldset>
    @else
        <figure class="ui empty-msg center aligned image">
            <i class="massive inbox icon"></i>
            <figcaption>Нет созданных вами поручений</figcaption>
        </figure>
    @endif

@endsection
