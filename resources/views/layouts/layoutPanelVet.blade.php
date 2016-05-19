@extends('layouts.app')

@section('content')
<div class="container">
    @yield('activeReference')
    <div class="row">
        <div class="col-md-3">
            <div class="panel panel-default">
                <div class="panel-heading">Administración de crias</div>
                <div class="list-group">
                    <a href="{{ url('/Nosotros/historia') }}" class="list-group-item">Listado</a>
                    <a href="{{ url('/Nosotros/mision') }}" class="list-group-item">Procesamiento crías enfermas</a>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            @yield('content2')
        </div>
    </div>
</div>
@endsection