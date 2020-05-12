@extends('layouts.app')

@section('title', 'Профиль')


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


@section('content')

    <div class="centered fourteen wide column">
        <fieldset class="ui segment">
            <legend>Информация об аккаунте</legend>
            <table class="ui definition table">
                <col width="35%">
                <tbody>
                    <tr>
                        <td>E-mail</td>
                        <td>{{ Auth::user()->getEmail()  }}</td>
                    </tr>
                    <tr>
                        <td>Тип аккаунта</td>
                        <td>{{ Auth::user()->getAccountType() }}</td>
                    </tr>
                </tbody>
            </table>
        </fieldset>
        <fieldset class="ui segment">
            <legend>Информация о сотруднике</legend>
            <table class="ui definition table">
                <col width="35%">
                <tbody>
                    <tr>
                        <td>Фамилия</td>
                        <td>{{ Auth::user()->getEmployee()->getSecondName() }}</td>
                    </tr>
                    <tr>
                        <td>Имя</td>
                        <td>{{ Auth::user()->getEmployee()->getFirstName() }}</td>
                    </tr>
                    <tr>
                        <td>Отчество</td>
                        <td>{{ Auth::user()->getEmployee()->getPatronymic() }}</td>
                    </tr>
                    <tr>
                        <td>Телефон</td>
                        <td>+7 (123) 456-78-90</td>
                    </tr>
                    <tr>
                        <td>Институт</td>
                        <td>ИТ</td>
                    </tr>
                    <tr>
                        <td>Кафедра</td>
                        <td>МОСИТ</td>
                    </tr>
                </tbody>
            </table>
        </fieldset>
    </div>

@endsection
