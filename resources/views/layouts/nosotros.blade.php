@extends('layouts.app')

@section('content')
<div class="container">
    @yield('activeReference')
    <div class="row">
        <div class="col-md-3">
            <div class="panel panel-default">
                <div class="panel-heading">Quienes Somos</div>
                <div class="list-group">
                    <a href="{{ url('/Nosotros/historia') }}" class="list-group-item">Historia</a>
                    <a href="{{ url('/Nosotros/mision') }}" class="list-group-item">Misión</a>
                    <a href="{{ url('/Nosotros/vision') }}" class="list-group-item">Visión</a>
                    <a href="{{ url('/Nosotros/objetivos') }}" class="list-group-item">Objetivos Estratégicos</a>
                    <a href="{{ url('/Nosotros/valores') }}" class="list-group-item">Valores</a>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            @yield('content2')
        </div>
    </div>
</div>
@endsection