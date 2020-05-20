<div id="filesCreateDirectoryModal" class="ui mini modal">
    <div class="header">
        Создание папки
    </div>
    <div class="content">
        <form class="ui form" method="POST" action="{{ route('files.createDirectory') }}">
            @csrf
            <div class="field">
                <label>Название</label>
                <input type="text" name="directoryName" required>
            </div>
            <div class="field">
                <input type="hidden" name="currentPath" value="{{ $currentPath }}">
                <input type="submit" value="Создать" class="ui fluid primary button">
            </div>
        </form>
    </div>
</div>
