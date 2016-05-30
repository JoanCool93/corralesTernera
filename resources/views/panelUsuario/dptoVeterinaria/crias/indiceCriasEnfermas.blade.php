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
                <li class="active">Proceso Crias Enfermas</li>
            </ol>
        </div>
    </div>
    <!-- /.row -->
@endsection

@section('content2')
<div class="container">
    <div class="row">
        <div class="col-md-9">
            <div class="col-lg-7">
                <div class="form-group">
                    {!! Form::label ('Buscar por ID:') !!}
                    {!! Form::input('text', 'idCria', null, ['class'=> 'form-control', 'placeholder' => 'Ingrese Id a buscar']) !!}
                </div>
            </div>
        </div>
    </div>

    <!-- Tabla para la visualizacion de crias -->
    <div class="row">
        <div class="col-lg-9  table-responsive">
            <table class="table table-hover">
                <thread>
                    <th class="col-lg-1">idCria:</th>
                    <th class="col-lg-1">Peso:</th>
                    <th class="col-lg-1">Edad:</th>
                    <th class="col-lg-1">Color Pelaje:</th>
                    <th class="col-lg-1">Raza:</th>
                    <th class="col-lg-1">Clasificacion:</th>
                    <th class="col-lg-1">Estado:</th>
                    <th class="col-lg-1"><span align="center">Acciones</span></th>
                </thread>
                @foreach($crias as $cria)
                <tbody>
                    <th class="col-lg-1">{{$cria->idCria}}</th>
                    <th class="col-lg-1">{{$cria->peso}}</th>
                    <th class="col-lg-1">{{$cria->edad}}</th>
                    <th class="col-lg-1">{{$cria->colorPelaje}}</th>
                    <th class="col-lg-1">{{$cria->raza}}</th>
                    @if($cria->clasificacion == 0)
                        <th class="col-lg-1">Grasa de cobertura 0</th>
                    @elseif($cria->clasificacion == 1)
                        <th class="col-lg-1">Grasa de cobertura 1</th>
                    @elseif($cria->clasificacion == 2)
                        <th class="col-lg-1">Grasa de cobertura 2</th>
                    @elseif($cria->clasificacion == 3)
                        <th class="col-lg-1">Grasa de cobertura 3</th>
                    @endif
                    @if($cria->estado == 1)
                        <th class="col-lg-1">Sana</th>
                    @elseif($cria->estado == 2)
                        <th class="col-lg-1">Preñada</th>
                    @elseif($cria->estado == 3)
                        <th class="col-lg-1">Enferma</th>
                    @elseif($cria->estado == 4)
                        <th class="col-lg-1">Cuarentena</th>
                    @endif
                    <th class="col-lg-1">
                        @include('panelUsuario.dptoVeterinaria.crias.forms.modalProcesarCriaEnferma')
                    </th>
                </tbody>
                @endforeach
            </table>
            {!!$crias->render()!!}
        </div>
    </div>
</div>
@endsection

@section('scripts')
    @if(Session::has('errors'))
        <script>
            $(function() {
                $('#modalAgregarCria').modal('show');
            });
        </script>
    @endif
@endsection