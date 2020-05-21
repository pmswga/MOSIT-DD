@extends('layout.app')
@section('title', 'Права доступа')
@section('homeLink', route('admin.index'))

@include('layout.admin_menu')

@section('content')

    <div class="centered fourteen wide column">
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
    </div>

@endsection
