@extends('layouts.nosotros')

@section('activeReference')
<!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Valores
                    <!--<small>Subheading</small>-->
                </h1>
                <ol class="breadcrumb">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li>Nosotros</li>
                    <li class="active">Valores</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
@endsection

@section('content2')
<div class="panel panel-default" id="valores">
    <div class="panel-heading">Valores</div>

    <div class="panel-body">
        <ul>
            <li>1.-Integridad y visión de sostenibilidad en las transacciones económicas y financieras.</li>
            <li>2.-Respeto mutuo y compromiso en las relaciones personales, tanto internas como externas.</li>
            <li>3.-Crecimiento organizacional a través de:
                <ul>
                    <li>Desarrollo personal y profesional de los empleados y socios en un entorno laboral saludable y seguro.</li>
                    <li>Suministro de productos de alimentación animal y humana seguros y de calidad contrastada.</li>
                    <li>Desarrollo económico y social de la empresa familiar y de la sociedad rural en la que actuamos, asumiendo como principio básico el respeto al Medio Ambiente.</li>
                </ul>
            </li>
        </ul>
    </div>
</div>
@endsection