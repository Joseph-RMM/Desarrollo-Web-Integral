@extends('layouts.app')
@section('title', __('Welcome1'))
@section('content')

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@hasSection('title') @yield('title') | @endif {{ config('app.name', 'Laravel') }}</title>
    </head>
    <body>
    <div class="app">

        <div class="container">



            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                @auth()
                    <ul class="navbar-nav mr-auto">


                        <li class="nav-item">
                            <a href="{{ url('/productos') }}" class="nav-link"><i class="fab fa-laravel text-info"></i> Productos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/usuarios') }}">Usuarios</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/Categorias') }}">Categorias</a>
                        </li>

                    </ul>
            @endauth()

            <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <!--
                            Boton de entrar
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        -->
                    @endif

                    @if (Route::has('register'))
                        <!--
                            BOTON DE REGISTRAR
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        -->
                        @endif
                    @else




                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                @can("admin.home")
                                    <a class="dropdown-item" href="{{ url('/Dashboard') }}" >
                                        {{ __('Dashboard') }}
                                    </a>
                                @endcan
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>

        </div>

    </div>
    </body>
@endsection
