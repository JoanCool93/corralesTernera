@extends('layouts.layoutPanelEmpleado')

@section('activeReference')
    <!-- Page Heading/Breadcrumbs -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Panel de usuario
                <small>Empleado</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="{{ route('panelUsuario') }}">Panel de usuario</a></li>
                <li class="active">Registro de crías</li>
            </ol>
        </div>
    </div>
    <!-- /.row -->
@endsection

@section('content2')
<div class="panel panel-default">
    <div class="panel-heading">Inicio de registro de crías</div>
    <div class="panel-body">
        <div class="row">
            <div class="col-lg-8 col-md-9">
                {!! Form::open(['route' => 'registro.store', 'method' => 'POST', 'class' => 'form-inline row', 'align' => 'center', 'role' => 'form']) !!}
                    {!! Form::label('idProveedor', 'Ingrese proveedor: ', ['class'=> 'col-md-4 control-label']) !!}
                    {!! Form::select('idProveedor', $proveedores, 1, ['class'=> 'form-control', 'value'=>'{{ old("idProveedor") }}']) !!}
                    {!! Form::submit(' Iniciar registro',['class' => 'btn btn-primary']) !!}
                {!! Form::close() !!}
            </div>
            <div class="col-lg-1 col-md-9" align='center'>
                {!! Form::open(['route' => 'proveedores.store2', 'method' => 'POST', 'class' => 'form']) !!}
                @include('panelUsuario.adminPagina.proveedores.forms.modalAgregarProveedor')
            </div>
        </div>
        
    </div>
</div>
@endsection