@extends('layout.app')
@section('title', 'Права доступа')

@section('content')

    <fieldset class="ui segment">
        <legend><h3>Панель управления</h3></legend>
        <form class="ui form">
            <div class="three fields">
                <div class="field">
                    <label>Пользователь</label>
                    <select multiple class="ui dropdown">
                        @foreach(\App\AccountModel::all() as $user)
                            <option>{{$user->email}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="field">
                    <label>Подсистема</label>
                    <select multiple class="ui dropdown">
                        @foreach(\App\Models\Service\Lists\ListSubSystemModel::all() as $system)
                            <option>{{$system->caption}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="field">
                    <label>Права</label>
                    <table>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="ui checkbox">
                                        <input type="checkbox" name="example">
                                        <label><i class="lock open icon"></i></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="ui checkbox">
                                        <input type="checkbox" name="example">
                                        <label><i class="list icon"></i></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="ui checkbox">
                                        <input type="checkbox" name="example">
                                        <label><i class="add icon"></i></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="ui checkbox">
                                        <input type="checkbox" name="example">
                                        <label><i class="edit icon"></i></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="ui checkbox">
                                        <input type="checkbox" name="example">
                                        <label><i class="delete icon"></i></label>
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
