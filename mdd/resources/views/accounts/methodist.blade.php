@extends('layouts.app')

@section('title', 'Главная страница методиста')


@extends('layouts.account_menu')

@section('homeLink', route('methodist.index'))

@section('accountMenu')
    <div class="ui dropdown item">
        Учебная работа
        <i class="dropdown icon"></i>
        <div class="menu">
            <div class="dropdown item">
                <i class="dropdown icon"></i>
                <span class="text">Индивидуальные планы</span>
                <div class="menu">
                    <a class="item" href="#add">Добавить</a>
                    <a class="item" href="#view">Просмотр</a>
                    <a class="item" href="#protocols">Протоколы</a>
                    <a class="item" href="#archive">Архив</a>
                </div>
            </div>
            <a class="item" href="#orders">Приказы</a>
        </div>
    </div>
@endsection


@section('content')

    <div class="sixteen wide column">

    </div>

@endsection

