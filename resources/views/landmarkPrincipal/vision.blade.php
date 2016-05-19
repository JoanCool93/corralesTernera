@extends('layouts.nosotros')

@section('activeReference')
<!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Visión
                    <!--<small>Subheading</small>-->
                </h1>
                <ol class="breadcrumb">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li>Nosotros</li>
                    <li class="active">Visión</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
@endsection

@section('content2')
<div class="panel panel-default" id="vision">
    <div class="panel-heading">Visión</div>

    <div class="panel-body">
        Nuestra visión es ser una organización lider a nivel nacional e internacional con procesos administrativos y productivos de excelencia, con una membresía activa y solidaria fomentando los valores y el desarrollo integral de la ganadería regional
    </div>
</div>
@endsection