<div id="filesUploadFileModal" class="ui medium modal">
    <div class="header">
        Загрузка файла
    </div>
    <div class="content">
        <form class="ui form" method="POST" enctype="multipart/form-data" action="{{ route('files.store') }}">
            @csrf
            <div class="field">
                <input type="file" name="file" required>
            </div>
            <div class="field">
                <input type="hidden" name="currentPath" value="{{ $currentPath }}">
                <input type="submit" value="Загрузить" class="ui fluid primary button">
            </div>
        </form>
    </div>
</div>
