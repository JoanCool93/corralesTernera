{!! csrf_field() !!}

<div class="form-group{{ $errors->has('idCria') ? ' has-error' : '' }} row">
    {!! Form::label('idCria', 'idCria: ', ['class'=> 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::input('text', 'idCria', null, ['class'=> 'form-control', 'value'=>'{{ old("idCria") }}', 'placeholder' => 'Ingrese id de la cría']) !!}
        @if ($errors->has('idCria'))
        <span class="help-block">
            <strong>{{ $errors->first('idCria') }}</strong>
        </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('idRegistro') ? ' has-error' : '' }}">
    {!! Form::input('hidden', 'idRegistro', $registro->idRegistro, ['class'=> 'form-control', 'value'=>'{{ old("idRegistro") }}', 'placeholder' => 'Ingrese id de la cría']) !!}
    @if ($errors->has('idRegistro'))
    <span class="help-block">
        <strong>{{ $errors->first('idRegistro') }}</strong>
    </span>
    @endif
</div>

<div class="form-group{{ $errors->has('peso') ? ' has-error' : '' }} row">
    {!! Form::label('peso', 'Peso: ', ['class'=> 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::input('text', 'peso', null, ['class'=> 'form-control', 'value'=>'{{ old("peso") }}', 'placeholder' => 'Ingrese peso (en kg.) de la cría']) !!}
        @if ($errors->has('peso'))
        <span class="help-block">
            <strong>{{ $errors->first('peso') }}</strong>
        </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('altura') ? ' has-error' : '' }} row">
    {!! Form::label('altura', 'Altura: ', ['class'=> 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::input('text', 'altura', null, ['class'=> 'form-control', 'value'=>'{{ old("altura") }}', 'placeholder' => 'Ingrese altura (en mts.) de la cría']) !!}
        @if ($errors->has('altura'))
        <span class="help-block">
            <strong>{{ $errors->first('altura') }}</strong>
        </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('edad') ? ' has-error' : '' }} row">
    {!! Form::label('edad', 'Edad: ', ['class'=> 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::input('text', 'edad', null, ['class'=> 'form-control', 'value'=>'{{ old("edad") }}', 'placeholder' => 'Ingrese edad (en meses) de la cría']) !!}
        @if ($errors->has('edad'))
        <span class="help-block">
            <strong>{{ $errors->first('edad') }}</strong>
        </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('colorPelaje') ? ' has-error' : '' }} row">
    {!! Form::label('colorPelaje', 'Color Pelaje: ', ['class'=> 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::input('text', 'colorPelaje', null, ['class'=> 'form-control', 'value'=>'{{ old("colorPelaje") }}', 'placeholder' => 'Ingrese color del pelaje de la cría']) !!}
        @if ($errors->has('colorPelaje'))
        <span class="help-block">
            <strong>{{ $errors->first('colorPelaje') }}</strong>
        </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('raza') ? ' has-error' : '' }} row">
    {!! Form::label('raza', 'Raza: ', ['class'=> 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::input('text', 'raza', null, ['class'=> 'form-control', 'value'=>'{{ old("raza") }}', 'placeholder' => 'Ingrese raza de la cría']) !!}
        @if ($errors->has('raza'))
        <span class="help-block">
            <strong>{{ $errors->first('raza') }}</strong>
        </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('colorMusculo') ? ' has-error' : '' }} row">
    {!! Form::label('colorMusculo', 'Color Musculo: ', ['class'=> 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::input('text', 'colorMusculo', null, ['class'=> 'form-control', 'value'=>'{{ old("colorMusculo") }}', 'placeholder' => 'Ingrese color musculo de la cría']) !!}
        @if ($errors->has('colorMusculo'))
        <span class="help-block">
            <strong>{{ $errors->first('colorMusculo') }}</strong>
        </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('estado') ? ' has-error' : '' }} row">
    {!! Form::label('estado', 'Estado de la cría: ', ['class'=> 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('estado', [
            1 => 'Sana',
            2 => 'Preñada',
            3 => 'Enferma',
            4 => 'Cuarentena'],1 , ['class'=> 'form-control', 'value'=>'{{ old("estado") }}']) !!}
        @if ($errors->has('estado'))
        <span class="help-block">
            <strong>{{ $errors->first('estado') }}</strong>
        </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('idDieta') ? ' has-error' : '' }} row">
    {!! Form::label('idDieta', 'Dieta: ', ['class'=> 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('idDieta', $dietas, 0, ['class'=> 'form-control', 'value'=>'{{ old("idDieta") }}']) !!}
        @if ($errors->has('idDieta'))
            <span class="help-block">
                <strong>{{ $errors->first('idDieta') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('idTratamiento') ? ' has-error' : '' }} row">
    {!! Form::label('idTratamiento', 'Tratamiento: ', ['class'=> 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('idTratamiento', $tratamientos, 0, ['class'=> 'form-control', 'value'=>'{{ old("idTratamiento") }}']) !!}
        @if ($errors->has('idTratamiento'))
            <span class="help-block">
                <strong>{{ $errors->first('idTratamiento') }}</strong>
            </span>
        @endif
    </div>
</div>