@extends('layouts.app')

@section('content')
<div class="container">
    @yield('activeReference')
    <div class="row">
        <div class="col-md-3">
            <div class="panel panel-default">
                <div class="panel-heading">Administración de crías</div>
                <div class="list-group">
                    <a href="{{ route('dietas.index') }}" class="list-group-item">Administración de Dietas</a>
                    <a href="{{ route('tratamientos.index') }}" class="list-group-item">Administración de Tratamientos</a>
                    <a href="{{ route('indiceCriasEnfermas') }}" class="list-group-item">Procesamiento crías enfermas</a>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            @yield('content2')
        </div>
    </div>
</div>
@endsection