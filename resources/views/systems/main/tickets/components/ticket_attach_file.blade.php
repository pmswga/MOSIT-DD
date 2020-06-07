<div id="attachFileModal" class="ui tiny modal">
    <div class="header">
        Прикрепить файл
    </div>
    <div class="content">
        <form class="ui form" method="POST" enctype="multipart/form-data" action="{{ route('tickets.attachFile', $ticket) }}">
            @method('PUT')
            @csrf
            <div class="field">
                <label>Файл</label>
                <input type="file" name="attachedFile">
            </div>
            <div class="fluid">
                <input type="submit" value="Прикрепить" class="ui fluid primary button">
            </div>
        </form>
    </div>
</div>
