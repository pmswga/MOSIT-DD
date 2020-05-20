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
                    @include('layouts.menu')
                </div>
                <div id="content" class="thirteen wide column">

                    @if(\Illuminate\Support\Facades\Session::has('successMessage'))
                        <div class="ui icon success message">
                            <i class="info circle icon"></i>
                            <div class="content">
                                <div class="header">
                                    {{ \Illuminate\Support\Facades\Session::get('successMessage') }}
                                </div>
                            </div>
                        </div>
                    @endif

                    @if(\Illuminate\Support\Facades\Session::has('errorMessage'))
                        <div class="ui icon red message">
                            <i class="exclamation circle icon"></i>
                            <div class="content">
                                <div class="header">
                                    {{ \Illuminate\Support\Facades\Session::get('errorMessage') }}
                                </div>
                            </div>
                        </div>
                    @endif

                    @if(\Illuminate\Support\Facades\Session::has('message'))
                        <div class="ui icon success message">
                            <i class="check icon"></i>
                            <div class="content">
                                <div class="header">
                                    {{ \Illuminate\Support\Facades\Session::get('message') }}
                                </div>
                            </div>
                        </div>
                    @endif
                    @if(\Illuminate\Support\Facades\Session::has('error'))
                        <div class="ui icon red message">
                            <i class="close icon"></i>
                            <div class="content">
                                <div class="header">
                                    {{ \Illuminate\Support\Facades\Session::get('error') }}
                                </div>
                            </div>
                        </div>
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
