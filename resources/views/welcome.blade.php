<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>STM</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}">Főoldal</a>
                    @else
                        <a href="{{ url('/login') }}">Bejelentkezés</a>
                        <a href="{{ url('/register') }}">Regisztráció</a>
                    @endif
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Squash Time management
                </div>

                @if (Auth::check())
                    @include("layouts.navigation")
                @endif
            </div>
        </div>
    </body>
</html>
