@extends('layout.app_default')
@section('title', 'Поручение №' . $ticket->idTicket)

@section('content')

    <fieldset class="ui segment">
        <legend><h3>Информация о поручении</h3></legend>
        <table class="ui definition table">
            <col width="20%">
            <tbody>
                <tr>
                    <td>№</td>
                    <td>{{ $ticket->idTicket }}</td>
                </tr>
                <tr>
                    <td>Кем назначено</td>
                    <td>{{ $ticket->getAuthor()->getFullInitials() }}</td>
                </tr>
                <tr>
                    <td>Тип</td>
                    <td>{{ $ticket->getTicketType()->caption }}</td>
                </tr>
                <tr>
                    <td>Статус</td>
                    <td>{{ $ticket->getTicketStatus() }}</td>
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
                    <td>{{ $ticket->getStartDate() }}</td>
                </tr>

                @if($ticket->isExpired())
                    <tr class="error">
                        <td>Дата окончания</td>
                        <td>{{ $ticket->getEndDate() }}</td>
                    </tr>
                @else
                    <tr>
                        <td>Дата окончания</td>
                        <td>{{ $ticket->getEndDate() }}</td>
                    </tr>
                @endif
                <tr>
                    <td>Дата создания</td>
                    <td>{{ $ticket->getCreatedDate() }}</td>
                </tr>
                <tr>
                    <td>Последнее обновление</td>
                    <td>{{ $ticket->getUpdatedDate() }}</td>
                </tr>
            </tbody>
        </table>
    </fieldset>

    <fieldset class="ui segment">
        <legend><h3>Прикреплённые файлы</h3></legend>

    </fieldset>

    <fieldset class="ui segment">
        <legend><h3>Ответственные лица</h3></legend>
        <table class="ui compact celled table">
            <thead class="full-width">
                <tr>
                    <th>ФИО</th>
                    <th>Должность</th>
                </tr>
            </thead>
            <tbody>
                @foreach($ticket->getResponsibleEmployees() as $employee)
                    <tr>
                        <td>{{ $employee->getFullInitials() }}</td>
                        <td>{{ $employee->getPost() }}</td>
                    </tr>
                @endforeach
            </tbody>
            {{--
            <tfoot class="full-width">
                <tr>
                    <th colspan="3">
                        <div class="ui right floated small primary labeled icon button">
                            <i class="user icon"></i>
                            Добавить
                        </div>
                    </th>
                </tr>
            </tfoot>
            --}}
        </table>
    </fieldset>

    <fieldset class="ui segment">
        <legend><h3>История поручения</h3></legend>
    </fieldset>

@endsection
