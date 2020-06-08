<table class="ui table">
    <thead>
        <th>Имя</th>
        <th>Тег</th>
        <th>Расширение</th>
        <th>Размер</th>
        <th>Дата добавления</th>
        <th>Дата изменения</th>
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
        @if(count($folders) > 0 or count($files) > 0)
            @foreach($folders as $folder)
                <tr>
                    <td colspan="6">
                        <i class="folder icon"></i>
                        <a href="{{ route('files.index', ['path' => $folder]) }}">{{  str_replace('_', ' ', last(explode('/', $folder))) }}</a>
                    </td>
                    <td>
                        <form style="margin: 0; padding: 0;" method="POST" action="{{ route('files.destroyDirectory', ['directoryName' => basename($folder)]) }}" onsubmit="return confirm('Удалить?')">
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
                        <div class="ui tag label">
                            {{ $file->getFileTag()->getCaption() }}
                        </div>
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
                        {{ $file->getUpdatedDate() }}
                    </td>
                    <td>
                        <div class="ui mini basic icon fluid buttons">
                            <a class="ui icon button" href="{{ route('files.downloadFile', $file) }}">
                                <i class="download icon"></i>
                            </a>
                            <form style="margin: 0; padding: 0;" method="POST" action="{{ route('files.destroy', $file) }}" onsubmit="return confirm('Удалить?')">
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
        @endif
    </tbody>
</table>
