@extends('layouts.layoutPanelVet')

@section('activeReference')
    <!-- Page Heading/Breadcrumbs -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Panel de usuario
                <small>Departamento de Veterinaria</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="{{ route('panelUsuario') }}">Panel de usuario</a></li>
                <li class="active">Administración de Tratamientos</li>
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
                    {!! Form::input('text', 'idTratamiento', null, ['class'=> 'form-control', 'placeholder' => 'Ingrese Id a buscar']) !!}
                </div>
            </div>
            <div class="col-lg-2"  align="center">
                @include('panelUsuario.dptoVeterinaria.tratamientos.forms.modalAgregarTratamiento')
            </div>
        </div>
    </div>

    <!-- Tabla para la visualizacion de tratamientos -->
    <div class="row">
        <div class="col-lg-9  table-responsive">
            <table class="table table-hover">
                <thread>
                    <th class="col-lg-1">idTratamiento:</th>
                    <th class="col-lg-1">Nombre:</th>
                    <th class="col-lg-1">Descripción:</th>
                    <th class="col-lg-1"></th>
                    <th class="col-lg-1"><span align="center">Acciones</span></th>
                    <th class="col-lg-1"></th>
                </thread>
                @foreach($tratamientos as $tratamiento)
                <tbody>
                    <th class="col-lg-1">{{$tratamiento->idTratamiento}}</th>
                    <th class="col-lg-1">{{$tratamiento->nombre}}</th>
                    <th class="col-lg-1">{{$tratamiento->descripcion}}</th>
                    <th class="col-lg-1">
                        @include('panelUsuario.dptoVeterinaria.tratamientos.forms.modalMostrarTratamiento')
                    </th>
                    <th class="col-lg-1">
                        @include('panelUsuario.dptoVeterinaria.tratamientos.forms.modalModificarTratamiento')
                    </th>
                    <th class="col-lg-1">
                        @include('panelUsuario.dptoVeterinaria.tratamientos.forms.modalEliminarTratamiento')
                    </th>
                </tbody>
                @endforeach
            </table>
            {!!$tratamientos->render()!!}
        </div>
    </div>
</div>
@endsection

@section('scripts')
                @if(Session::has('errors'))
                    <script>
                        $(function() {
                            $('#modalAgregarTratamientos').modal('show');
                        });
                    </script>
                @endif
@endsection