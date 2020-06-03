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
        @if($ticket->getAttachedFiles()->count() > 0)
            <div class="ui divided selection list" style="margin: 0;"> <!-- #fixme fix css -->
                @foreach($ticket->getAttachedFiles() as $file)
                    <div class="item">
                        <div class="right floated content">
                            {{ $file->extension }} , {{ $file->size }} Мб
                        </div>
                        <i class="file big icon"></i>
                        <div class="content">
                            <a href="{{ route('tickets.downloadFile', $file) }}">{{ basename($file->path) }}</a>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </fieldset>

    <fieldset class="ui segment">
        <legend><h3>Ответственные лица</h3></legend>

        <div class="ui cards">
            @foreach($ticket->getResponsibleEmployees() as $employee)
                <div class="card">
                    <div class="content">
                        <div class="right floated ui image">
                            <i class="user icon"></i>
                        </div>
                        <div class="header">
                            {{ $employee->getFullInitials() }}
                        </div>
                        <div class="description">
                            {{ $employee->getPost() }}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </fieldset>

    <fieldset class="ui segment">
        <legend><h3>История поручения</h3></legend>

        <div class="ui large feed">
            @foreach($ticket->getHistory() as $history)
                <div class="event">
                    <div class="label">
                    @switch($history->idTicketHistoryType)
                        @case(\App\Core\Constants\ListTicketHistoryTypeConstants::CREATE)
                            <i class="blue plus icon"></i>
                        @break
                        @case(\App\Core\Constants\ListTicketHistoryTypeConstants::COMMENT)
                            <i class="comment icon"></i>
                        @break
                        @case(\App\Core\Constants\ListTicketHistoryTypeConstants::ATTACH_FILE)
                            <i class="paperclip icon"></i>
                        @break
                        @case(\App\Core\Constants\ListTicketHistoryTypeConstants::DELETE)
                            <i class="delete icon"></i>
                        @break
                        @case(\App\Core\Constants\ListTicketHistoryTypeConstants::COMMENT)
                            <i class="close icon"></i>
                        @break
                    @endswitch
                    </div>
                    <div class="content">
                        <div class="summary">

                            <a class="user">
                                {{ $history->getEmployeeInitials() }}
                            </a>
                            {{ $history->getTicketHistoryType()->message }}
                            @switch($history->idTicketHistoryType)
                                @case(\App\Core\Constants\ListTicketHistoryTypeConstants::COMMENT)
                                @break
                                @case(\App\Core\Constants\ListTicketHistoryTypeConstants::ATTACH_FILE)
                                    {{--
                                    <div class="ui selection list">
                                        @foreach($history->getAttachedFiles() as $file)
                                        <div class="item">
                                            <i class="file word icon"></i>
                                            <div class="content">
                                                <div class="header">Отчёт</div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                    --}}
                                @break
                            @endswitch


                            <div class="date">
                                {{ $history->getCreatedDate() }}
                            </div>
                        </div>
                    </div>
                </div>


            @endforeach
        </div>

        <br>
        <br>
{{--

<div class="ui large feed">
  <div class="event">
    <div class="label">
        <i class="blue plus icon"></i>
    </div>
    <div class="content">
      <div class="summary">
        <a class="user">
            Сергей Головин
        </a>
        создал поручение
        <div class="date">
          01.01.2020 / 10:47
        </div>
      </div>
    </div>
  </div>
  <div class="event">
    <div class="label">
        <i class="comment icon"></i>
    </div>
    <div class="content">
      <div class="summary">
        <a class="user">
          Кирилл Гусев
        </a>
        прокомментировал
        <div class="date">
          01.01.2020 / 12:03
        </div>
      </div>
      <div class="extra text">
        Ох, было бы неплохо
      </div>
    </div>
  </div>

  <div class="event">
    <div class="label">
        <i class="red exclamation icon"></i>
    </div>
    <div class="content">
      <div class="summary">
        Истёк срок выполнения поручения
        <div class="date">
          01.01.2020 / 12:03
        </div>
      </div>
    </div>
  </div>


  <div class="event">
    <div class="label">
        <i class="paperclip icon"></i>
    </div>
    <div class="content">
      <div class="summary">
        <a class="user">
          Евгения Михайлова
        </a>
        прикрепила файлы
        <div class="date">
          01.01.2020 / 13:05
        </div>
      </div>
      <div class="extra text">
        Прикладываю файлы
        <div class="ui selection list">
          <div class="item">
            <i class="file word icon"></i>
            <div class="content">
              <div class="header">Отчёт</div>
            </div>
          </div>
          <div class="item">
            <i class="file excel icon"></i>
            <div class="content">
              <div class="header">Таблицы</div>
            </div>
          </div>
          <div class="item">
            <i class="file powerpoint icon"></i>
            <div class="content">
              <div class="header">Презентация</div>
            </div>
          </div>
          <div class="item">
            <i class="file pdf icon"></i>
            <div class="content">
              <div class="header">Приказ</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <div class="event">
    <div class="label">
        <i class="green check icon"></i>
    </div>
    <div class="content">
      <div class="summary">
        <a class="user">
          Сергей Головин
        </a>
        закрыл поручение
        <div class="date">
          01.01.2020 / 12:03
        </div>
      </div>
    </div>
  </div>
</div>
--}}

    </fieldset>


@endsection
