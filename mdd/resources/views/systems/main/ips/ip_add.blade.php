<a onclick="$('#addIPModal').modal('show')" class="ui primary fluid button">Добавить</a>
<div id="addIPModal" class="ui modal">
    <div class="header">Добавление ИП</div>
    <div class="content">
        <div class="description">
            <form class="ui form" method="POST" action="{{ route('ips.store') }}" enctype="multipart/form-data">
                @csrf

                <div class="field">
                    <input type="file" name="file" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,application/vnd.ms-excel" required>
                </div>
                <div class="field">
                    <input type="submit" class="ui primary fluid button" value="Загрузить">
                </div>
            </form>
        </div>
    </div>
</div>
