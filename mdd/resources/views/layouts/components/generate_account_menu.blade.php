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
                            <a class="item" href={{ route($menuItem->route) }}>{{ $menuItem->caption }}</a>
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
