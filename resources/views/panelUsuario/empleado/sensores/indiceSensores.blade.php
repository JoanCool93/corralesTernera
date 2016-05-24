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
                <li class="active">Administración de Sensores</li>
            </ol>
        </div>
    </div>
    <!-- /.row -->
@endsection

@section('content2')
<div class="container">
    <div class="row">
        <div class="col-md-9">
            <div class="col-lg-5">
                <div class="form-group">
                    {!! Form::label ('Buscar por ID:') !!}
                    {!! Form::input('text', 'idSensor', null, ['class'=> 'form-control', 'placeholder' => 'Ingrese Id a buscar']) !!}
                </div>
            </div>
            <div class="col-lg-2"  align="center">
                @include('panelUsuario.empleado.sensores.forms.modalAgregarSensor')
            </div>
        </div>
    </div>

    <!-- Tabla para la visualizacion de proveedores -->
    <div class="row">
        <div class="col-lg-9  table-responsive">
            <table class="table table-hover">
                <thread>
                    <th class="col-lg-1">idSensor:</th>
                    <th class="col-lg-1">Descripción:</th>
                    <th class="col-lg-1"></th>
                    <th class="col-lg-1"><span align="center">Acciones</span></th>
                    <th class="col-lg-1"></th>
                </thread>
                @foreach($sensores as $sensor)
                <tbody>
                    <th class="col-lg-1">{{$sensor->idSensor}}</th>
                    <th class="col-lg-1">{{$sensor->descripcion}}</th>
                    <th class="col-lg-1">
                        @include('panelUsuario.empleado.sensores.forms.modalMostrarSensor')
                    </th>
                    <th class="col-lg-1">
                        @include('panelUsuario.empleado.sensores.forms.modalModificarSensor')
                    </th>
                    <th class="col-lg-1">
                        @include('panelUsuario.empleado.sensores.forms.modalEliminarSensor')
                    </th>
                </tbody>
                @endforeach
            </table>
            {!!$sensores->render()!!}
        </div>
    </div>
</div>
@endsection

@section('scripts')
    @if(Session::has('errors'))
        <script>
            $(function() {
                $('#modalAgregarSensores').modal('show');
            });
        </script>
    @endif
@endsection