<a onclick="$('#addIPModal').modal('show')" class="ui primary fluid button">Добавить</a>
<div id="addIPModal" class="ui modal">
    <div class="header">Выберете файлы для дальнейшей работы</div>
    <div class="content">
        <div class="description">
            <form class="ui form" method="POST" action="{{ route('ips.store') }}" enctype="multipart/form-data">
                @csrf
                @isset($files)
                    <table class="ui table">
                        <thead>
                        <tr>
                            <th>Файл</th>
                            <th>Выбрать</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($files as $file)
                            <tr>
                                <td>{{ $file->filename }}</td>
                                <td>
                                    <div class="ui checkbox">
                                        <input type="checkbox" name="files[]" value="{{ $file->idEmployeeFile }}">
                                        <label></label>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @else
                    @component('components.message')
                        @slot('type', 'message')
                        @slot('message', 'В вашем хранилище нет подходящих файлов')
                    @endcomponent
                @endisset
                <div class="field">
                    <input type="submit" class="ui primary fluid button" value="Выбрать">
                </div>
            </form>
        </div>
    </div>
</div>
