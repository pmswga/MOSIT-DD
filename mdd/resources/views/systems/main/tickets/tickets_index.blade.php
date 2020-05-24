@extends('layout.app_default')
@section('title', 'Мои поручения')

@section('content')

    <fieldset class="ui segment">
        <legend><h3>Панель инструментов</h3></legend>
        <div class="ui fluid buttons">
            <div class="ui primary icon button" onclick="$('#createTicketModal').modal('show')">
                <i class=""></i>
                Создать поручение
                @include('systems.main.tickets.components.ticket_create')
            </div>

        </div>
    </fieldset>

    <fieldset class="ui segment">
        <legend><h3>Сводка</h3></legend>
        <div class="ui three statistics">
            <div class="statistic">
                <div class="value">

                </div>
                <div class="label">
                    Новых поручений
                </div>
            </div>
            <div class="statistic">
                <div class="value">

                </div>
                <div class="label">
                    Истекает срок
                </div>
            </div>
            <div class="statistic">
                <div class="value">

                </div>
                <div class="label">
                    Просрочено
                </div>
            </div>
        </div>
    </fieldset>

    <fieldset class="ui definition table">
        <legend><h3>Поручения</h3></legend>
        <table class="ui table">
            <col width="20%">
            <tbody>
                @foreach($tickets as $ticket)
                    <tr>
                        <td>№</td>
                        <td>{{ $ticket->idTicket }}</td>
                    </tr>
                    <tr>
                        <td>Кем выдано</td>
                        <td>{{ $ticket->getAuthor()->getFullInitials() }}</td>
                    </tr>
                    <tr>
                        <td>Тип</td>
                        <td>{{ $ticket->getTicketType()->caption }}</td>
                    </tr>
                    <tr>
                        <td>Название</td>
                        <td>{{ $ticket->caption }}</td>
                    </tr>
                    <tr>
                        <td>Описание</td>
                        <td>{{ $ticket->description }}</td>
                    </tr>
                    <tr>
                        <td>Дата начала</td>
                        <td>{{ $ticket->startDate }}</td>
                    </tr>
                    <tr>
                        <td>Дата окончания</td>
                        <td>{{ $ticket->endDate   }}</td>
                    </tr>
                    <tr>
                        <td>Дата создания</td>
                        <td>{{ $ticket->created_at }}</td>
                    </tr>
                    <tr>
                        <td>Последнее обновление</td>
                        <td>{{ $ticket->updated_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </fieldset>

@endsection
