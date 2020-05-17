@extends('layouts.app')

@section('title', "Главная")

@section('content')

    <fieldset class="ui segment">
        <div class="ui fluid image">
            <img src="img/back.png" alt="cat">
        </div>
        <div class="ui horizontal divider">
            Powered by
        </div>
        <div class="ui five icons">
            <i class="big icon laravel"></i>
            <i class="big icon php"></i>
            <i class="big icon html5"></i>
            <i class="big icon css3"></i>
            <i class="big icon github"></i>
        </div>
    </fieldset>

@endsection
