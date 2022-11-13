<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
</head>

<body class="container">
    <nav class="navbar navbar-expand-lg navbar-gray  navbar-dark bg-dark shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                Gol a Gol Experience
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <!-- Authentication Links -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('group.index') }}"> Pontuação dos Grupos </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('match.index') }}"> Jogos dos Grupos </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('match.octaves') }}"> Oitavas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('match.quarters') }}"> Quartas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('match.semis') }}"> Semi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('match.finals') }}"> Finais </a>
                    </li>
                    @if((\Auth::user()) && \Auth::user()->is_admin)
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Admin
                        </a>

                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item" href="{{ route('admin.matches.new') }}"> Criar Partidas </a>
                            </li>
                            
                            <li>
                                <a class="dropdown-item" href="{{ route('admin.matches') }}"> Partidas </a>
                            </li>
                        </ul>
                    </li>
                    @endif
    
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}"> Entrar </a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}"> Cadastrar </a>
                        </li>
                        @endif
                    @else
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>

                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item" href="{{ route('user_information.form') }}"> Meus Dados </a>
                            </li>

                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>

                        </ul>
                    </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4">
        <div class="row">
            @if(\Request::route()->getName() == 'login')
            <div class="col-md-6 col-lg-6 col-sm-12 mt-3">
                @else
                <div class="col-12 mt-3">
                    @endif
                    @yield('content')
                </div>

                @if(\Request::route()->getName() == 'login')
                <div class="col-md-6 col-lg-6 col-sm-12 mt-3">
                    <img src="{{ asset('img/banner_experience.png') }}" class="img w-100"></img>
                </div>
                @endif
            </div>
    </main>

    <footer class="text-center">
        <h1> Apoio:</h1>

        <div class="row m-0 mt-3 p-0">
            <div class="col-6 col-md-4 mb-3">
                <a href="http://goleirodealuguel.com.br" target='_BLANK'>
                    <img src="{{ asset('img/gda-200w.png') }}" class='w-25'></img>
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

    <!-- Scripts -->
    <script src="{{ asset('js/jquery.js') }}" defer></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}" defer></script>
</body>

</html>