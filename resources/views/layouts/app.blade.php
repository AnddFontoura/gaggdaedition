<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/jquery.js') }}" defer></script>
    <script src="{{ asset('js/bootstrap.min.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
</head>

<body class="container">
    <nav class="navbar navbar-expand-md navbar-gray  navbar-dark bg-dark shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                Gol a Gol Experience
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}"> Entrar </a>
                    </li>
                    @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}"> Cadastrar </a>
                    </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}"> Fase de Grupos </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}"> Quartas de Finais </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}"> Semi Finais </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}"> Finais </a>
                    </li>
                    @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
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
        <div class="row">
            <div class="col-md-6 col-lg-6 col-sm-12">
                @yield('content')
            </div>

            <div class="col-md-6 col-lg-6 col-sm-12">
                <img src="{{ asset('img/banner_experience.png') }}" class="img w-100"></img>
            </div>
        </div>
    </main>

    <footer class="text-center">
        <h1> Apoio:</h1>

        <div class="row m-0 mt-3 p-0">
            <div class="col-6 col-md-4 mb-3">
                <a href="http://goleirodealuguel.com.br" target='_BLANK'>
                    <img src="{{ asset('img/gda-200w.png') }}"></img>
                </a>
            </div>

            <div class="col-6 col-md-4 mb-3">
                <a href="http://futshop.com.br?cupom=ANDDFONTOURA" target='_BLANK'>
                    <img src="{{ asset('img/futshop-200w.png') }}"></img>
                </a>
            </div>

            <div class="col-6 col-md-4 mb-3">
                <a href="http://fontouradesenvolvimento.com.br" target='_BLANK'>
                    <img src="{{ asset('img/fontoura-200w.png') }}"></img>
                </a>
            </div>
        </div>

    </footer>
    </div>
</body>

</html>