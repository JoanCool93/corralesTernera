@extends('layouts.app')

@section('content')
<div class="container">
    @yield('activeReference')
    <div class="row">
        <div class="col-md-3">
            <div class="panel panel-default">
                <div class="panel-heading">Administración de crías</div>
                <div class="list-group">
                    <a href="{{ route('inicioRegistro') }}" class="list-group-item">Registro de crías</a>
                    <a href="{{ route('crias.index') }}" class="list-group-item">Listado de crías</a>
                    <a href="{{ route('sensores.index') }}" class="list-group-item">Administración de Sensores</a>
                    <a href="{{ route('indiceCriasGrasa2') }}" class="list-group-item">Asignación de Sensores</a>
                    <a href="{{ route('indiceCriasSensores') }}" class="list-group-item">Registro de sensores de signos vitales</a>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            @yield('content2')
        </div>
    </div>
</div>
@endsection