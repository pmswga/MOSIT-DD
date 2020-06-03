<div id="filesUploadFileModal" class="ui mini modal">
    <div class="header">
        Загрузка файла
    </div>
    <div class="content">
        <form id="uploadFileForm" class="ui form" method="POST" enctype="multipart/form-data" onsubmit="$('#uploadFileForm').attr('class', 'ui loading form')" action="{{ route('files.store') }}">
            @csrf
            <div class="field">
                <label>Файл</label>
                <input type="file" name="file" required>
            </div>
            <div class="field">
                <label>Тег</label>
                <select class="ui dropdown" name="fileTag">
                    @foreach($fileTags as $fileTag)
                        <option value="{{ $fileTag->idFileTag }}">{{ $fileTag->getCaption() }}</option>
                    @endforeach
                </select>
            </div>
            <div class="field">
                <input type="hidden" name="currentDirectory" value="{{ $currentDirectory }}">
                <input type="submit" value="Загрузить" class="ui fluid primary button">
            </div>
        </form>
    </div>
</div>
