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
                <li class="active">Administración de proveedores</li>
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
                    {!! Form::input('text', 'idUsuario', null, ['class'=> 'form-control', 'placeholder' => 'Ingrese Id a buscar']) !!}
                </div>
            </div>
            <div class="col-lg-5">
                <div class="form-group">
                    {!! Form::label ('Buscar por Apellido:') !!}
                    {!! Form::input('text', 'apellido', null, ['class'=> 'form-control', 'placeholder' => 'Ingrese apellido a buscar']) !!}
                </div>
            </div>
            <div class="col-lg-2"  align="center">
                @include('panelUsuario.adminPagina.proveedores.forms.modalAgregarProveedor')
            </div>
        </div>
    </div>

    <!-- Tabla para la visualizacion de proveedores -->
    <div class="row">
        <div class="col-lg-9  table-responsive">
            <table class="table table-hover">
                <thread>
                    <th class="col-lg-1">idProveedor:</th>
                    <th class="col-lg-1">Nombre:</th>
                    <th class="col-lg-1">RFC:</th>
                    <th class="col-lg-1">Descripción:</th>
                    <th class="col-lg-1">Dirección:</th>
                    <th class="col-lg-1">Telefono:</th>
                    <th class="col-lg-1">Correo Electrónico:</th>
                    <th class="col-lg-1"></th>
                    <th class="col-lg-1"><span align="center">Acciones</span></th>
                    <th class="col-lg-1"></th>
                </thread>
                @foreach($proveedores as $proveedor)
                <tbody>
                    <th class="col-lg-1">{{$proveedor->idProveedor}}</th>
                    <th class="col-lg-1">{{$proveedor->nombre}}</th>
                    <th class="col-lg-1">{{$proveedor->rfc}}</th>
                    <th class="col-lg-1">{{$proveedor->descripcion}}</th>
                    <th class="col-lg-1">{{$proveedor->direccion}}</th>
                    <th class="col-lg-1">{{$proveedor->telefono}}</th>
                    <th class="col-lg-1">{{$proveedor->email}}</th>
                    <th class="col-lg-1">
                        @include('panelUsuario.adminPagina.proveedores.forms.modalMostrarProveedor')
                    </th>
                    <th class="col-lg-1">
                        @include('panelUsuario.adminPagina.proveedores.forms.modalModificarProveedor')
                    </th>
                    <th class="col-lg-1">
                        @include('panelUsuario.adminPagina.proveedores.forms.modalEliminarProveedor')
                    </th>
                </tbody>
                @endforeach
            </table>
            {!!$proveedores->render()!!}
        </div>
    </div>
</div>
@endsection

@section('scripts')
                @if(Session::has('errors'))
                    <script>
                        $(function() {
                            $('#modalAgregarProveedor').modal('show');
                        });
                    </script>
                @endif
@endsection