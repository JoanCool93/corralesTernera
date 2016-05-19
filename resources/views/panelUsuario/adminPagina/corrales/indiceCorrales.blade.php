@extends('layouts.layoutPanelAdmin')

@section('activeReference')
    <!-- Page Heading/Breadcrumbs -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Panel de usuario
                <small>Administrador</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="{{ route('panelUsuario') }}">Panel de usuario</a></li>
                <li class="active">Administración de corrales</li>
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
                    {!! Form::input('text', 'idCorral', null, ['class'=> 'form-control', 'placeholder' => 'Ingrese Id a buscar']) !!}
                </div>
            </div>
            <div class="col-lg-5">
                <div class="form-group">
                    {!! Form::label ('Buscar por Apellido:') !!}
                    {!! Form::input('text', 'apellido', null, ['class'=> 'form-control', 'placeholder' => 'Ingrese apellido a buscar']) !!}
                </div>
            </div>
            <div class="col-lg-2"  align="center">
                @include('panelUsuario.adminPagina.corrales.forms.modalAgregarCorral')
            </div>
        </div>
    </div>

    <!-- Tabla para la visualizacion de Corrales -->
    <div class="row">
        <div class="col-lg-9  table-responsive">
            <table class="table table-hover">
                <thread>
                    <th class="col-lg-1">idCorral:</th>
                    <th class="col-lg-1">Descripción:</th>
                    <th class="col-lg-1">Ancho:</th>
                    <th class="col-lg-1">Largo:</th>
                    <th class="col-lg-1">Capacidad:</th>
                    <th class="col-lg-1">Tipo Corral:</th>
                    <th class="col-lg-1"></th>
                    <th class="col-lg-1"><span align="center">Acciones</span></th>
                    <th class="col-lg-1"></th>
                </thread>
                @foreach($corrales as $corral)
                <tbody>
                    <th class="col-lg-1">{{$corral->idCorral}}</th>
                    <th class="col-lg-1">{{$corral->descripcion}}</th>
                    <th class="col-lg-1">{{$corral->ancho}}</th>
                    <th class="col-lg-1">{{$corral->largo}}</th>
                    <th class="col-lg-1">{{$corral->capacidad}}</th>
                    @if($corral->tipoCorral == 1)
                        <th class="col-lg-1">Interior</th>
                    @elseif($corral->tipoCorral == 2)
                        <th class="col-lg-1">Aire Libre</th>
                    @elseif($corral->tipoCorral == 3)
                        <th class="col-lg-1">Cuarentena</th>
                    @endif
                    <th class="col-lg-1">
                        @include('panelUsuario.adminPagina.corrales.forms.modalMostrarCorral')
                    </th>
                    <th class="col-lg-1">
                        @include('panelUsuario.adminPagina.corrales.forms.modalModificarCorral')
                    </th>
                    <th class="col-lg-1">
                        @include('panelUsuario.adminPagina.corrales.forms.modalEliminarCorral')
                    </th>
                </tbody>
                @endforeach
            </table>
            {!!$corrales->render()!!}
        </div>
    </div>
</div>
@endsection

@section('scripts')
                @if(Session::has('errors'))
                    <script>
                        $(function() {
                            $('#modalAgregarCorral').modal('show');
                        });
                    </script>
                @endif
@endsection