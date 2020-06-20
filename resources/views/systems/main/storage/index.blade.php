@extends('layout.app')
@section('title', 'Мои файлы')

@section('content')

    <fieldset class="ui segment">
        <legend><h3>Панель инструментов</h3></legend>
        <div class="ui fluid primary buttons">
            <div class="ui icon button" onclick="$('#filesCreateDirectoryModal').modal('show')">
                <i class="folder icon"></i>
                Создать папку
                @include('systems.main.storage.components.files_create_directory')
            </div>
            <div class="ui icon button" onclick="$('#filesUploadFileModal').modal('show')">
                <i class="upload icon"></i>
                Загрузить файл
                @include('systems.main.storage.components.files_upload_file')
            </div>
        </div>
    </fieldset>

    <table class="ui celled striped table">
        <thead>
            <tr>
                <th colspan="7">
                    <div class="ui breadcrumb">
                        @foreach(array_slice(explode('/', $currentDirectory), 1) as $dir)
                            <a class="section">{{ $dir }}</a>
                            <div class="divider"> / </div>
                        @endforeach
                    </div>
                </th>
            </tr>
            <tr>
                <th>Имя</th>
                <th>Тег</th>
                <th>Расширение</th>
                <th>Размер</th>
                <th>Дата добавления</th>
                <th>Дата изменения</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
        @if($parentDirectory)
            <tr>
                <td>
                    <i class="reply icon"></i>
                    <a href="{{ route('storage.index', ['path' => $parentDirectory]) }}">Назад</a>
                </td>
            </tr>
        @endif
        @if(count($folders) > 0 or count($files) > 0)
            @foreach($folders as $folder)
                <tr>
                    <td colspan="6">
                        <i class="folder icon"></i>
                        <a href="{{ route('storage.index', ['path' => $folder]) }}">{{  str_replace('_', ' ', last(explode('/', $folder))) }}</a>
                    </td>
                    <td>
                        <form style="margin: 0; padding: 0;" method="POST" action="{{ route('storage.destroyDirectory', ['directoryName' => str_replace('_', ' ', last(explode('/', $folder)))]) }}" onsubmit="return confirm('Удалить?')">
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
                            <a class="ui icon button" href="{{ route('storage.downloadFile', $file) }}">
                                <i class="download icon"></i>
                            </a>
                            <form style="margin: 0; padding: 0;" method="POST" action="{{ route('storage.moveToTrash', $file) }}" onsubmit="return confirm('Переместить в корзину?')">
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

@endsection
