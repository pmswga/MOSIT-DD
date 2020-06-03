<div id="createTicketModal" class="ui modal">
    <div class="header">
        Создание нового поручения
    </div>
    <div class="content">
        <form class="ui form" method="POST" action="{{ route('tickets.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="field">
                <label>Тип поручения</label>
                <select class="ui dropdown" name="ticketType">
                    @foreach($ticketTypes as $ticketType)
                        <option value="{{ $ticketType->idTicketType }}">{{ $ticketType->caption }}</option>
                    @endforeach
                </select>
            </div>
            <div class="field">
                <label>Название</label>
                <input type="text" name="ticketCaption" required>
            </div>
            <div class="field">
                <label>Описание</label>
                <textarea name="ticketDescription" required></textarea>
            </div>
            <div class="two fields">
                <div class="two fields">
                    <div class="field">
                        <label>Начало</label>
                        <input type="date" name="ticketStartDate" required>
                    </div>
                    <div class="field">
                        <label>Время</label>
                        <input type="time" name="ticketStartTime" required>
                    </div>
                </div>
                <div class="two fields">
                    <div class="field">
                        <label>Окончание</label>
                        <input type="date" name="ticketEndDate" required>
                    </div>
                    <div class="field">
                        <label>Время</label>
                        <input type="time" name="ticketEndTime" required>
                    </div>
                </div>
            </div>
            <div class="field">
                <label>Ответственные</label>
                @isset($employees)
                    <select class="ui dropdown" name="ticketEmployees[]" multiple>
                        @foreach($employees as $employee)
                            <option value="{{ $employee->idEmployee }}"> {{ $employee->getFullInitials() }}</option>
                        @endforeach
                    </select>
                @endisset
            </div>
            <div class="field">
                <label>Файлы</label>
                <input type="file" name="files[]" multiple>
            </div>
            <div class="field">
                <input type="submit" value="Создать" class="ui primary fluid button">
            </div>
        </form>
    </div>
</div>
