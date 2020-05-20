@extends('layouts.app')
@section('title', 'Мои файлы')

@section('content')

    <fieldset class="ui segment">
        <legend><h3>Панель инструментов</h3></legend>
        <div class="ui fluid buttons">
            <div class="ui icon button">
                <i class="file archive icon"></i>
                Скачать всё
            </div>
            <div class="ui icon button" onclick="$('#filesCreateDirectoryModal').modal('show')">
                <i class="folder icon"></i>
                Создать папку
            </div>
            <div class="ui icon button" onclick="$('#filesUploadFileModal').modal('show')">
                <i class="upload icon"></i>
                Загрузить файл
            </div>
        </div>
    </fieldset>

    <fieldset class="ui segment">
        <legend><h3>Файлы</h3></legend>
        @component('systems/main/storage/components/files_table', ['folders' => $folders, 'files' => $files, 'parentDirectory' => $parentDirectory, 'currentDirectory' => $currentPath])
        @endcomponent
    </fieldset>

    @include('systems.main.storage.components.files_create_directory')
    @component('systems.main.storage.components.files_upload_file', ['currentPath' => $currentPath])
    @endcomponent

@endsection
