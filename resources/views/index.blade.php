@extends('layout.app')
@section('title', "Главная")

@section('content')

    <fieldset class="ui segment">
        <div class="ui fluid image">
            <img src="{{ asset('img/back.png') }}" alt="Добро пожаловать">
        </div>
        <div class="ui horizontal divider">
            Powered by
        </div>
        <div class="ui icons" style="text-align: center;">
            <i class="big icon html5"></i>
            <i class="big icon css3 alternate"></i>
            <i class="big icon js"></i>
            <i class="big icon php"></i>
            <i class="big icon laravel"></i>
            <i class="big icon github"></i>
        </div>
    </fieldset>

@endsection
