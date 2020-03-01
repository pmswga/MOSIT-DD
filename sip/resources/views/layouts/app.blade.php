<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Система ИП</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
	<link href="{{ asset('css/main.css') }}" rel="stylesheet">
	
	<!-- jQuery -->
	<script src="{{ asset('js/jquery.js') }}" ></script>

	<!-- Semantic UI -->
	<link href="{{ asset('css/semantic.css') }}" rel="stylesheet">
	<script src="{{ asset('js/semantic/semantic.js') }}" ></script>
	
</head>
<body>
	<!--
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
				
                    <ul class="navbar-nav mr-auto">

                    </ul>


                    <ul class="navbar-nav ml-auto">
					
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        
		</main>

		-->
		
		<div class="ui internally stackable grid">
			<div class="row">
				@php $t = 1 @endphp
				@if ($t == 1)
					@include('layouts.menu')
				@else
					<div class="three wide column"></div>
					<div class="four wide column"style="border-right: 1px solid lightgray">
						<div class="ui fluid image">
							<img src="{{ asset('media/cat.png') }}">
							<!--
							<img src="{{ asset('media/MIREA-logo.png') }}">
							<img src="{{ asset('media/IIT-logo.png') }}">
							-->
						</div>
					</div>
					<div class="six wide column">
						<fieldset class="ui segment">
							<legend><h3>Вход в систему</h3></legend>							
							<form class="ui form" method="POST" action="{{ route('login') }}">
								@csrf
								<div class="field">
									<label>Логин:</label>
									<input type="text">
								</div>
								<div class="field">
									<label>Пароль:</label>
									<input type="password">
								</div>
								<div class="field">
									<div class="ui checkbox">
										<input type="checkbox">
										<label>Запомнить меня</label>
									</div>
								</div>
								<div class="field">
									<input type="submit" class="ui primary button" value="Войти">
								</div>
							</form>
						</fieldset>
						<a href="#">Руководство методиста</a>,
						<a href="#">Забыл пароль?</a>
					</div>
				@endif
			</div>
			<div class="row">
				@if ($t == 1)
					@yield('content')
				@endif
			</div>
		</div>

        <!-- Scripts -->
        <script type="text/javascript">
            $('.ui.dropdown').dropdown();
			$('.menu .item').tab();
        </script>
		
		
    </div>
</body>
</html>
