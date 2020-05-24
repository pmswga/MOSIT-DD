@extends('layout.app_default')
@section('title', 'Мои поручения')

@section('content')

    <fieldset class="ui segment">
        <legend><h3>Сводка</h3></legend>
        <div class="ui three statistics">
            <div class="statistic">
                <div class="value">

                </div>
                <div class="label">
                    Новых поручений
                </div>
            </div>
            <div class="statistic">
                <div class="value">

                </div>
                <div class="label">
                    Истекает срок
                </div>
            </div>
            <div class="statistic">
                <div class="value">

                </div>
                <div class="label">
                    Просрочено
                </div>
            </div>
        </div>
    </fieldset>

    <fieldset class="ui definition table">
        <legend><h3>Поручения</h3></legend>
        <table class="ui table">
            <tbody>
                @foreach($tickets as $ticket)
                    <tr>
                        <td>№</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Кем выдано</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Тип</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Название</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Описание</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Дата начала</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Дата окончания</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Дата создания</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Последнее обновление</td>
                        <td></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </fieldset>

@endsection
