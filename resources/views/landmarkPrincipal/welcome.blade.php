@extends('layouts.app')

@section('content')

<!-- Header Carousel -->
<header id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
        <li data-target="#myCarousel" data-slide-to="3"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
        <div class="item active">
            <img src="{{ asset('imagenes/carousel1.1.jpg') }}" alt="Chania">
            <div class="carousel-caption">
                <h3>Chania</h3>
                <p>The atmosphere in Chania has a touch of Florence and Venice.</p>
            </div>
        </div>

        <div class="item">
            <img src="{{ asset('imagenes/carousel2.1.jpg') }}" alt="Chania">
            <div class="carousel-caption">
                <h3>Chania</h3>
                <p>The atmosphere in Chania has a touch of Florence and Venice.</p>
            </div>
        </div>

        <div class="item">
            <img src="{{ asset('imagenes/carousel3.1.jpg') }}" alt="Flower">
            <div class="carousel-caption">
                <h3>Flowers</h3>
                <p>Beatiful flowers in Kolymbari, Crete.</p>
            </div>
        </div>

        <div class="item">
            <img src="{{ asset('imagenes/carousel4.1.jpg') }}" alt="Flower">
            <div class="carousel-caption">
                <h3>Flowers</h3>
                <p>Beatiful flowers in Kolymbari, Crete.</p>
            </div>
        </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Anterior</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Siguiente</span>
    </a>
</header>
<!-- Page Content -->

<div class="container" id= "empresa">
    <!-- Marketing Icons Section -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header center">
                Bienvenidos a la WebApp de Corrales Ternera
            </h1>
        </div>
        <div class="col-lg-12">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis, omnis doloremque non cum id reprehenderit, quisquam totam aspernatur tempora minima unde aliquid ea culpa sunt. Reiciendis quia dolorum ducimus unde.</p>
        </div>   
    </div>
    <!-- /.row -->
</div>
<!-- /.container -->
@endsection

@section('scripts')
<!-- Script to Activate the Carousel -->
<script>
$('.carousel').carousel({
    interval: 5000 //changes the speed
})
</script>
@endsection