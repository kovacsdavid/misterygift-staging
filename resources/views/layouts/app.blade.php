<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Mikulás buli</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        html, body {
            background-color: #dfe1e0;
            background-image: url("/images/background1.jpg");
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            height: 100%;
        }

        @media(min-width: 768px){
            .top-right {
                position: absolute;
            }
        }

        @media(max-width: 767px){
            .top-right {
                margin-top: 15px;
                text-align: right;
            }
        }

        .top-right {
            right: 10px;
            top: 18px;
        }

        .title {
            font-size: 48px;
            padding-top: 35px;
            margin-bottom: 30px;
        }

        .logout-btn{
            color: #636b6f;
            padding: 0 25px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
            cursor: pointer;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .card {
            border: none;
            width: 90%;
            margin-left: auto;
            margin-right: auto;
            box-shadow: 0px 2px 3px #000;
        }

        .card-header {
            border: none;
            background-color: #d61241;
            color: white;
        }

        .invalid-feedback {
            color: #d61241;
        }
    </style>
    <meta property="og:title"              content="Lepd meg hallgatótársadat egy karácsonyi ajándékkal!" />
    <meta property="og:description"        content="A regisztrációt követően bekerülsz a kalapba, ahonnan véletlenszerűen kiválaszthat téged valaki,
                                hogy aztán egy apró ajándékkal lepjen meg az egyetemi Mikulás-bulin. Neked is választunk valakit,
                                akit pedig te lepsz meg ajándékkal." />
    <meta property="og:image"              content="https://lepjmeg.puresience.com/images/background1.jpg" />
</head>
<body>
<div id="app">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-7 order-md-2">
                @if (Route::has('login'))
                    {{--<div class="top-left links" style="padding: 15px;">--}}
                        {{--<a href="/">Egyetemi Mikulás</a>--}}
                    {{--</div>--}}
                    <div class="top-right links" style="background-color: white; padding: 15px; border-radius: 10px; box-shadow: 0px 2px 3px #000; margin-right: 15px;">
                        @auth
                            <form action="{{ route("logout") }}" method="post" id="logoutform">
                                @csrf
                                <div class="logout-btn" onclick="document.getElementById('logoutform').submit();">
                                    Kijelentkezés
                                </div>
                            </form>
                        @else
                            <a href="{{ route('register') }}" style="color: #d61241;">Regisztráció</a>
                            <a href="{{ route('login') }}">Bejelentkezés</a>
                        @endauth
                    </div>
                @endif
            </div>
            <div class="col-md-5 order-md-1">

                <main class="py-4">
                    @yield('content')
                </main>
            </div>
        </div>
    </div>
</div>
</body>
</html>
