@extends('layouts.app')

@section('content')
<div class="container">
    @yield('activeReference')
    <div class="row">
        <div class="col-md-3">
            <div class="panel panel-default">
                <div class="panel-heading">Administración General</div>
                <div class="list-group">
                    <a href="{{ route('usuarios.index') }}" class="list-group-item">Administración de usuarios</a>
                    <a href="{{ route('corrales.index') }}" class="list-group-item">Administracion de corrales</a>
                    <a href="{{ route('proveedores.index') }}" class="list-group-item">Administracion de proveedores</a>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            @yield('content2')
        </div>
    </div>
</div>
@endsection