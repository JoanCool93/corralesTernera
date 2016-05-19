@extends('layouts.nosotros')

@section('activeReference')
<!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Objetivos
                    <!--<small>Subheading</small>-->
                </h1>
                <ol class="breadcrumb">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li>Nosotros</li>
                    <li class="active">Objetivos</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
@endsection

@section('content2')
<div class="panel panel-default" id="objetivos">
    <div class="panel-heading">Objetivos estratégicos</div>

    <div class="panel-body">
        <p>Nuestra organización para el cumplimiento de su misión tiene establecidos 11 Objetivos Estratégicos los cuales son:</p>
        <ul>
            <li>1.- Relaciones efectivas con sus agremiados.</li>
            <li>2.- Relaciones efectivas con autoridades.</li>
            <li>3.- Consolidar y fortalecer su situación financiera.</li>
            <li>4.- Orientar a sus colaboradores en mejoras afectivas de administración.</li>
            <li>5.- Recopilar y generar estadísticas e información pecuaria.</li>
            <li>6.- Asegurar la sanidad animal.</li>
            <li>7.- Promover la adopción de tecnologías.</li>
            <li>8.- Promover la diversificación de la actividad ganadera.</li>
            <li>9.- Integración de cadenas productivas.</li>
            <li>10.- Estrategias de comercialización.</li>
            <li>11.- Esquemas de financiamiento.</li>
        </ul>
        
    </div>
</div>
@endsection