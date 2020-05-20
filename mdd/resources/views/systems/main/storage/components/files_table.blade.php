<table class="ui table">
    <thead>
        <th>Имя</th>
        <th>Расширение</th>
        <th>Размер</th>
        <th>Дата добавления</th>
        <th>Действия</th>
    </thead>
    <tbody>
        @if($parentDirectory)
            <tr>
                <td>
                    <i class="reply icon"></i>
                    <a href="{{ route('files.index', ['path' => $parentDirectory]) }}">Назад</a>
                </td>
            </tr>
        @endif
        @foreach($folders as $folder)
            <tr>
                <td colspan="4">
                    <i class="folder icon"></i>
                    <a href="{{ route('files.index', ['path' => $folder]) }}">{{ basename($folder) }}</a>
                </td>
                <td>
                    <form style="margin: 0px; padding: 0px;" method="POST" action="{{ route('files.destroyDirectory', ['directoryName' => basename($folder)]) }}" onsubmit="return confirm('Удалить?')">
                        @method('DELETE')
                        @csrf
                        <input type="hidden" name="currentDirectory" value="{{ $currentDirectory }}">
                        <button type="submit" class="ui basic icon fluid button">
                            <i class="red trash icon"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        @foreach($files as $file)
            <tr>
                <td>
                    <i class="file icon"></i>
                    {{ $file->getFilename() }}
                </td>
                <td>
                    {{ $file->getExtension() }}
                </td>
                <td>
                    {{ $file->getSize()." Мб" }}
                </td>
                <td>
                    {{ $file->getCreatedDate() }}
                </td>
                <td>
                    <div class="ui mini basic icon fluid buttons">
                        <a class="ui icon button" href="{{ route('files.downloadFile', $file) }}">
                            <i class="download icon"></i>
                        </a>
                        <form style="margin: 0px; padding: 0px;" method="POST" action="{{ route('files.destroy', $file) }}" onsubmit="return confirm('Удалить?')">
                            @method('DELETE')
                            @csrf
                            <input type="hidden" name="currentDirectory" value="{{ $currentDirectory }}">
                            <button type="submit" class="ui basic icon fluid button">
                                <i class="red trash icon"></i>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
