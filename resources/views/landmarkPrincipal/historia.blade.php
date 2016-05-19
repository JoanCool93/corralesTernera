@extends('layouts.nosotros')

@section('activeReference')
<!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Historia
                    <!--<small>Subheading</small>-->
                </h1>
                <ol class="breadcrumb">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li>Nosotros</li>
                    <li class="active">Historia</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
@endsection

@section('content2')
<div class="panel panel-default" id="historia">
    <div class="panel-heading">Historia</div>

    <div class="panel-body">
        <p>En el año 2002, los socios fundadores tuvieron la bendición de que les adjudicaran la de 450 hectáreas de tierra en el Valle de la Trinidad, Municipio de Ensenada, Baja California, a 122 kilómetros al este de la ciudad. Dichos predios llevaban casi 15 años sin utilizarse. Con una mentalidad de no desperdicio, obtener el mayor rendimiento de los recursos disponibles y de apoyo al sector primario de la economía mexicana a lo que es la base y soporte del país: La Agricultura, se creó la empresa “Corrales Ternera, S.A. de C.V.”, con la finalidad de explotar las tierras, generar empleos y apoyar al país en una de sus necesidades básicas y de crecimiento.</p>

        <p>Para lograr esta visión y debido a la necesidad de contar con agua para el desarrollo de las tierras, con una visión de invertir para desarrollar modernamente, se han adquirido con posterioridad 504 hectáreas más, siendo hasta hoy un total de 954 héctáreas, lo que asegura el aprovisionamiento de agua y una masa crítica suficiente para cumplir con nuestra responsabilidad de crear riqueza.</p>

        <p>Actualmente se producen productos agrícolas, tales como: papa, melón español, cebolla, tomate, chile jalapeño, tomatillo, cebada, trigo, alfalfa, pepino, etc… mismos que son comercializados en mercado nacional y mercado de exportación.</p>
    </div>              
</div>
@endsection