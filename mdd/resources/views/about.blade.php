@extends('layouts.app')

@section('title', 'О нас')

@section('menu')
    @include('layouts.default_menu')
@endsection

@section('content')

    <div class="middle aligned centered aligned ten wide column">
        <fieldset class="ui segment">
            <legend style="text-align: center"><h3>Самый лучший проект в мире</h3></legend>
            <img class="ui centered large image" src="img/cat.png">
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </p>
            <hr>
            <p style="text-align: right">
                <b>Powered by</b>
                <i class="big icon laravel"></i>
                <i class="big icon php"></i>
                <i class="big icon html5"></i>
                <i class="big icon css3"></i>
                <i class="big icon github"></i>
            </p>
        </fieldset>
    </div>

@endsection
