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
        <div class="ui grid">
            <div class="row">
                @yield('menu')
            </div>
            <div class="row">
                @yield('content')
            </div>
        </div>

        <script type="text/javascript">
            $('.ui.dropdown').dropdown();
        </script>

    </body>
</html>
