@extends('layout.app_admin')
@section('title', 'Права доступа')

@section('content')

    <fieldset class="ui segment">
        <legend><h3>Панель управления</h3></legend>
        <form class="ui form">
            <div class="three fields">
                <div class="field">
                    <label>Пользователь</label>
                    <select multiple>
                        @foreach(\App\AccountModel::all() as $user)
                            <option>{{$user->email}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="field">
                    <label>Подсистема</label>
                    <select multiple>
                        @foreach(\App\Models\Service\Lists\ListSubSystemModel::all() as $system)
                            <option>{{$system->caption}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="field">
                    <label>Права</label>
                    <table class="ui table">
                        <thead>
                            <tr>
                                <th><i class="lock open icon"></i></th>
                                <th><i class="list icon"></i></th>
                                <th><i class="add icon"></i></th>
                                <th><i class="edit icon"></i></th>
                                <th><i class="delete icon"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="ui checkbox">
                                        <input type="checkbox" name="example">
                                        <label></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="ui checkbox">
                                        <input type="checkbox" name="example">
                                        <label></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="ui checkbox">
                                        <input type="checkbox" name="example">
                                        <label></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="ui checkbox">
                                        <input type="checkbox" name="example">
                                        <label></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="ui checkbox">
                                        <input type="checkbox" name="example">
                                        <label></label>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="field">
                <input type="submit" value="Выдать" class="ui fluid primary button">
            </div>
        </form>
    </fieldset>

    <fieldset class="ui segment">
        <legend><h3>Выданные права</h3></legend>
        <table class="ui table">
            <thead>
                <tr>
                    <th rowspan="2">№</th>
                    <th rowspan="2">E-mail</th>
                    <th rowspan="2">Подсистема</th>
                    <th colspan="5">Права доступа</th>
                </tr>
                <tr>
                    <th>Доступ</th>
                    <th>Просмотр</th>
                    <th>Создание</th>
                    <th>Изменение</th>
                    <th>Удаление</th>
                </tr>
            </thead>
            <tbody>
                @foreach($rights as $account => $rightList)
                    <tr>
                        <td rowspan="{{ count($rightList)+1 }}">{{ $loop->iteration }}</td>
                        <td rowspan="{{ count($rightList)+1 }}">{{ $account }}</td>
                        @foreach($rightList as $right)
                            <tr>
                                <td>{{ $right->caption }}</td>
                                <td>
                                    @if($right->isAccess)
                                        <i class="check green icon"></i>
                                    @else
                                        <i class="close red icon"></i>
                                    @endif
                                </td>
                                <td>
                                    @if($right->isViewAny)
                                        <i class="check green icon"></i>
                                    @else
                                        <i class="close red icon"></i>
                                    @endif
                                </td>
                                <td>
                                    @if($right->isCreate)
                                        <i class="check green icon"></i>
                                    @else
                                        <i class="close red icon"></i>
                                    @endif
                                </td>
                                <td>
                                    @if($right->isUpdate)
                                        <i class="check green icon"></i>
                                    @else
                                        <i class="close red icon"></i>
                                    @endif
                                </td>
                                <td>
                                    @if($right->isDelete)
                                        <i class="check green icon"></i>
                                    @else
                                        <i class="close red icon"></i>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
    </fieldset>

@endsection
