<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Corrales Ternera</title>

    <!-- Fuentes -->

    <!-- Estilos -->
    {!! Html::style('assets/bootstrap-3.3.6-dist/css/bootstrap.css') !!}
    {!! Html::style('assets/font-awesome/css/font-awesome.min.css') !!}

</head>
<body id="app-layout">
    <a href="{{ url('/') }}"><img src="{{ asset('imagenes/logo1.jpg') }}" alt="Corrales Ternera" align="top"></img></a>
    <nav class="navbar navbar-inverse navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image-->
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/') }}"><i class="fa fa-btn fa-home fa-lg"></i> Inicio</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-btn fa-question-circle fa-lg"></i> Quienes Somos<span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ url('/Nosotros/historia') }}"><i class="fa fa-btn fa-book fa-lg"></i> Historia</a></li>
                            <li><a href="{{ url('/Nosotros/mision') }}"><i class="fa fa-btn fa-road fa-lg"></i> Misión</a></li>
                            <li><a href="{{ url('/Nosotros/vision') }}"><i class="fa fa-btn fa-eye fa-lg"></i> Vision</a></li>
                            <li><a href="{{ url('/Nosotros/objetivos') }}"><i class="fa fa-btn fa-arrow-right fa-lg"></i> Objetivos estratégicos</a></li>
                            <li><a href="{{ url('/Nosotros/valores') }}"><i class="fa fa-btn fa-compass fa-lg"></i> Valores</a></li>

                        </ul>
                    </li>
                    <li><a href="{{ url('/Contacto') }}"><i class="fa fa-btn fa-envelope fa-lg"></i> Contacto</a></li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                    <li><a href="{{ url('/login') }}"><i class="fa fa-btn fa-sign-in fa-lg"></i> Ingresar</a></li>
                    <!-- <li><a href="{{ url('/register') }}">Register</a></li> -->
                    @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->nombre }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">     
                            <li><a href="{{ route('panelUsuario') }}"><i class="fa fa-btn fa-user"></i> Panel de usuario</a></li>
                            <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i> Desconectarse</a></li>
                        </ul>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        @if (Session::has('errors'))
        <div class="alert alert-warning" role="alert">
            <ul>
                <strong>Oops! Algo ha salido mal : </strong>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>

    @include('alertas.exito')
    @include('alertas.fallo')
    @yield('content')

    <hr>
    <!-- Footer -->
    <footer>
        <div class="row">
            <div class="col-lg-12" align="center">
                <p>Copyright &copy; Ganadera Corrales Ternera S.A. de C.V. 2016</p>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    {!! Html::script('assets/bootstrap-3.3.6-dist/js/jquery.js') !!}
    <!-- Bootstrap Core JavaScript -->
    {!! Html::script('assets/bootstrap-3.3.6-dist/js/bootstrap.min.js') !!}
    <!-- Scripts Propios
    {!! Html::script('assets/bootstrap-3.3.6-dist/js/scriptsPropios.js') !!}-->
    @yield('scripts')

</body>
</html>
