@extends('layouts.nosotros')

@section('activeReference')
<!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Misión
                    <!--<small>Subheading</small>-->
                </h1>
                <ol class="breadcrumb">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li>Nosotros</li>
                    <li class="active">Misión</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
@endsection

@section('content2')
<div class="panel panel-default" id="mision">
    <div class="panel-heading">Misión</div>

    <div class="panel-body">
        La misión de la Unión Ganadera Regional del Norte de Veracruz es el fortalecimiento integral de la actividad ganadera en la región a través de la oferta de servicios y productos de calidad.
    </div>
</div>
@endsection