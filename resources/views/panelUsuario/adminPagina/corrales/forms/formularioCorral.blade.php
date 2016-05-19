{!! csrf_field() !!}

<div class="form-group{{ $errors->has('descripcion') ? ' has-error' : '' }} row">
    {!! Form::label('descripcion', 'Descripción: ', ['class'=> 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::input('text', 'descripcion', null, ['class'=> 'form-control', 'value'=>'{{ old("descripcion") }}', 'placeholder' => 'Ingrese descripción del corral']) !!}
        @if ($errors->has('descripcion'))
        <span class="help-block">
            <strong>{{ $errors->first('descripcion') }}</strong>
        </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('ancho') ? ' has-error' : '' }} row">
    {!! Form::label('ancho', 'Ancho: ', ['class'=> 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::input('text', 'ancho', null, ['class'=> 'form-control', 'value'=>'{{ old("ancho") }}', 'placeholder' => 'Ingrese ancho del corral']) !!}
        @if ($errors->has('ancho'))
        <span class="help-block">
            <strong>{{ $errors->first('ancho') }}</strong>
        </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('largo') ? ' has-error' : '' }} row">
    {!! Form::label('largo', 'Largo: ', ['class'=> 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::input('text', 'largo', null, ['class'=> 'form-control', 'value'=>'{{ old("largo") }}', 'placeholder' => 'Ingrese largo del corral']) !!}
        @if ($errors->has('largo'))
        <span class="help-block">
            <strong>{{ $errors->first('largo') }}</strong>
        </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('capacidad') ? ' has-error' : '' }} row">
    {!! Form::label('capacidad', 'Capacidad: ', ['class'=> 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::input('text', 'capacidad', null, ['class'=> 'form-control', 'value'=>'{{ old("capacidad") }}', 'placeholder' => 'Ingrese capacidad del corral']) !!}
        @if ($errors->has('capacidad'))
        <span class="help-block">
            <strong>{{ $errors->first('capacidad') }}</strong>
        </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('tipoCorral') ? ' has-error' : '' }} row">
    {!! Form::label('tipoCorral', 'Tipo de corral: ', ['class'=> 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('tipoCorral', [
            1 => 'Interior',
            2 => 'Aire Libre',
            3 => 'Cuarentena'],2 , ['class'=> 'form-control', 'value'=>'{{ old("tipoCorral") }}']) !!}
            @if ($errors->has('tipoCorral'))
            <span class="help-block">
                <strong>{{ $errors->first('tipoCorral') }}</strong>
            </span>
            @endif
        </div>
    </div>