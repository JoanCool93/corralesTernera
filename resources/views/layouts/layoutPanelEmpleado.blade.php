@extends('layouts.app')

@section('content')
<div class="container">
    @yield('activeReference')
    <div class="row">
        <div class="col-md-3">
            <div class="panel panel-default">
                <div class="panel-heading">Administración de crías</div>
                <div class="list-group">
                    <a href="{{ url('/') }}" class="list-group-item">Listado de crías</a>
                    <a href="{{ url('/') }}" class="list-group-item">Registro de crías</a>
                    <a href="{{ url('/') }}" class="list-group-item">Registro de sensores de signos vitales</a>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            @yield('content2')
        </div>
    </div>
</div>
@endsection