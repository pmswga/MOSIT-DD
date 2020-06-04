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

    <fieldset class="ui segment">
        <legend><h3>Файлы</h3></legend>
        @include('systems.main.storage.components.files_table')
    </fieldset>

@endsection
