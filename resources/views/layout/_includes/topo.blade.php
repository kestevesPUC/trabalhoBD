<!DOCTYPE html>
<html>

<head>

    <title>@yield('titulo')</title>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="resources/css/app.css">

</head>

<body>
    <header>

        <nav>
            <div class="container">
                <div class="nav-wrapper deep-orange">
                    <a href="{{route('admin.cursos')}}" class="brand-logo">Atendimento Médicos</a>
                    <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                    <ul class="right hide-on-med-and-down">
                        <li><a href="{{ route('site.home')}}">Home</a></li>
                        @if(Auth::guest())
                        <li><a href="{{ route('site.login') }}">Login</a></li>
                        @else
                        <li><a href="{{ route('admin.cursos') }}">Vídeos</a></li>
                        <li><a href="{{ route('admin.cursos.user')}}">{{Auth::user()->name}}</a></li>
                        <li><a href="{{ route('site.login.sair')}}">Sair</a></li>
                        @endif

                    </ul>
                </div>
            </div>
        </nav>
    <div class="container">
        <ul class="sidenav" id="mobile">
            <li><a href="/">Home</a></li>
            <li><a href="{{ route('admin.cursos') }}">Cursos</a></li>
        </ul>
    </div>

    </header>
