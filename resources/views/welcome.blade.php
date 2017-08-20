<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

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
                    <div class="links">
                        <a href="{{ route('booking') }}">Foglalás</a>
                        <a href="https://laracasts.com">Előzmények</a>
                        <a href="https://laravel-news.com">Termek</a>
                        <a href="https://forge.laravel.com">Hírek</a>
                        <a href="https://github.com/laravel/laravel">Beállítások</a>
                    </div>
                @endif
            </div>
        </div>
    </body>
</html>
