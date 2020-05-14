<a class="ui primary fluid button" href="{{ route('ips.create') }}">Добавить</a>
<table class="ui celled table">
    <col width="5%">
    <col width="60%">
    <col width="15%">
    <col width="10%">
    <thead>
    <tr style="text-align: center">
        <th>№</th>
        <th>Преподаватель</th>
        <th>Учебный год</th>
        <th colspan="2">Действия</th>
    </tr>
    </thead>
    <tbody>
    @foreach($ips as $ip)
        <tr>
            <td style="text-align: center">{{ $loop->iteration }}</td>
            <td>{{ $ip->getTeacherInitials() }}</td>
            <td>
                {{ $ip->educationYear }}
            </td>
            <td colspan="2" style="text-align: center">
                <div class="ui  basic icon buttons">
                    <a class="ui button">
                        <i style="color: rgb(31, 114, 70);" class="ui icon file excel"></i>
                        Скачать
                    </a>
                    <a class="ui button" href="{{ route('ips.edit', $ip) }}">
                        <i class="orange edit icon"></i>
                    </a>
                    <form method="POST" style="margin: 0px; padding: 0px;" action="{{ route('ips.destroy', $ip) }}" onsubmit="return confirm('Удалить?')">
                        @method('DELETE')
                        @csrf
                        <input type="hidden" name="idIP" value="{{ $ip->idIP }}">
                        <button type="submit"  class="ui button">
                            <i class="red trash icon"></i>
                        </button>
                    </form>
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
