<html>
    <head>
        <title>@yield('title')</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/semantic/semantic.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">
        <script type="text/javascript" src="{{ asset("js/jquery.js")  }}"></script>
        <script type="text/javascript" src="{{ asset("js/semantic/semantic.js")  }}"></script>
    </head>
    <body>
        <div id="grid" class="ui stackable grid">
            <div class="two column row">
                <div id="menu" class="three wide column">
                    @include('layout.menu')
                </div>
                <div id="content" class="thirteen wide column">

                    @if(\Illuminate\Support\Facades\Session::has('message'))
                        @component('components.message')
                            @slot('type', \Illuminate\Support\Facades\Session::get('message')['type'])
                            @slot('message', \Illuminate\Support\Facades\Session::get('message')['message'])
                        @endcomponent
                    @endif

                    @yield('content')
                </div>
            </div>
        </div>

        <script type="text/javascript">
            $('.ui.dropdown').dropdown();
            $('.ui.accordion').accordion();
            $('.menu .item').tab();
        </script>
    </body>
</html>
