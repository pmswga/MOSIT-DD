<div id="createTicketModal" class="ui modal">
    <div class="header">
        Создание нового поручения
    </div>
    <div class="content">
        <form class="ui form" method="POST" action="{{ route('tickets.store') }}">
            @csrf
            <div class="field">
                <label>Тип поручения</label>
                <select name="ticketType">
                    @foreach($ticketTypes as $ticketType)
                        <option value="{{ $ticketType->idTicketType }}">{{ $ticketType->caption }}</option>
                    @endforeach
                </select>
            </div>
            <div class="field">
                <label>Название</label>
                <input type="text" name="ticketCaption">
            </div>
            <div class="field">
                <label>Описание</label>
                <textarea name="ticketDescription"></textarea>
            </div>
            <div class="two fields">
                <div class="field">
                    <label>Начало</label>
                    <input type="date" name="ticketStartDate">
                </div>
                <div class="field">
                    <label>Окончание</label>
                    <input type="date" name="ticketEndDate">
                </div>
            </div>
            <div class="field">
                <label>Ответственные</label>
                @isset($employees)
                <select name="ticketEmployees[]">
                    @foreach($employees as $employee)
                        <option value="{{ $employee->idEmployee }}"> {{ $employee->getFullInitials() }}</option>
                    @endforeach
                </select>
                @endisset
            </div>
            <div class="field">
                <input type="submit" class="ui primary fluid button">
            </div>
        </form>
    </div>
</div>
