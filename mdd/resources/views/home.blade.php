@extends('layouts.app')

@section('title', 'Главная страница')


@extends('layouts.account_menu')

@section('homeLink', route('home'))

@php $rights = \Illuminate\Support\Facades\Auth::user()->getAccountRights() @endphp
@section('generatedMenu')
    @if($rights)
        @foreach($rights as $section => $menu)
            @if ($section != 'Общие')
                <div class="ui dropdown item">
                    {{ $section }}
                    <i class="dropdown icon"></i>
                    <div class="menu">
                        @foreach($menu as $menuItem)
                            <a class="item" href="#">{{ $menuItem->caption }}</a>
                        @endforeach
                    </div>
                </div>
            @endif
        @endforeach
    @endif
@endsection

@section('generalMenu')
    @if($rights)
        @if(array_key_exists('Общие', $rights))
            @foreach($rights['Общие'] as $menuItem)
                <a class="item" href="#">{{ $menuItem->caption }}</a>
            @endforeach
        @endif
    @endif
@endsection

@section('profileMenu')
    <div class="ui dropdown item">
        <i class="wrench icon"></i>
        <div class="menu">
            <a class="item" href="{{ route('profile') }}">Профиль</a>
            <div class="divider"></div>
            <a class="item" href="#logout" onclick="$('#logoutForm').submit()">Выйти</a>
        </div>
    </div>
@endsection

<!--
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
                    <a class="item" href="#archive">Архив</a>
                </div>
            </div>
            <a class="item" href="#protocols">Протоколы</a>
            <a class="item" href="#orders">Приказы</a>
        </div>
    </div>
-->


@section('content')

    <div class="sixteen wide column">

    </div>

@endsection

