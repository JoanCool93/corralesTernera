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
                <li class="active">Administración de usuarios</li>
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
                @include('panelUsuario.adminPagina.usuarios.forms.modalAgregarUsuario')
            </div>
        </div>
    </div>

    <!-- Tabla para la visualizacion de usuarios -->
    <div class="row">
        <div class="col-lg-9  table-responsive">
            <table class="table table-hover">
                <thread>
                    <th class="col-lg-1">IdUsuario:</th>
                    <th class="col-lg-1">Nombre:</th>
                    <th class="col-lg-1">Apellido Paterno:</th>
                    <th class="col-lg-1">Apellido Materno:</th>
                    <th class="col-lg-1">Correo Electrónico:</th>
                    <th class="col-lg-1">Tipo Usuario:</th>
                    <th class="col-lg-1"></th>
                    <th class="col-lg-1"><span align="center">Acciones</span></th>
                    <th class="col-lg-1"></th>
                </thread>
                @foreach($usuarios as $usuario)
                <tbody>
                    <th class="col-lg-1">{{$usuario->idUsuario}}</th>
                    <th class="col-lg-1">{{$usuario->nombre}}</th>
                    <th class="col-lg-1">{{$usuario->apellidoPaterno}}</th>
                    <th class="col-lg-1">{{$usuario->apellidoMaterno}}</th>
                    <th class="col-lg-1">{{$usuario->email}}</th>
                    @if($usuario->idRole == 2)
                        <th class="col-lg-1">Administrador</th>
                    @elseif($usuario->idRole == 3)
                        <th class="col-lg-1">Departamento de Veterinaria</th>
                    @elseif($usuario->idRole == 4)
                        <th class="col-lg-1">Empleado</th>
                    @endif
                    <th class="col-lg-1">
                        @include('panelUsuario.adminPagina.usuarios.forms.modalMostrarUsuario')
                    </th>
                    <th class="col-lg-1">
                        @include('panelUsuario.adminPagina.usuarios.forms.modalModificarUsuario')
                    </th>
                    <th class="col-lg-1">
                        @include('panelUsuario.adminPagina.usuarios.forms.modalEliminarUsuario')
                    </th>
                </tbody>
                @endforeach
            </table>
            {!!$usuarios->render()!!}
        </div>
    </div>
</div>
@endsection

@section('scripts')
                @if(Session::has('errors'))
                    <script>
                        $(function() {
                            $('#modalAgregarUsuario').modal('show');
                        });
                    </script>
                @endif
@endsection