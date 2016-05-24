{!! csrf_field() !!}

<div class="form-group{{ $errors->has('idSensor') ? ' has-error' : '' }}">
    {!! Form::input('hidden', 'idSensor', $cria->idSensor, ['class'=> 'form-control', 'value'=>'{{ old("idSensor") }}', 'placeholder' => 'Ingrese id del sensor']) !!}
    @if ($errors->has('idSensor'))
    <span class="help-block">
        <strong>{{ $errors->first('idSensor') }}</strong>
    </span>
    @endif
</div>

<div class="form-group{{ $errors->has('presionSanguinea') ? ' has-error' : '' }} row">
    {!! Form::label('presionSanguinea', 'Presión Sanguínea: ', ['class'=> 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::input('text', 'presionSanguinea', null, ['class'=> 'form-control', 'value'=>'{{ old("presionSanguinea") }}', 'placeholder' => 'Ingrese la presión sanguínea de la cría']) !!}
        @if ($errors->has('presionSanguinea'))
        <span class="help-block">
            <strong>{{ $errors->first('presionSanguinea') }}</strong>
        </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('frecuenciaCardiaca') ? ' has-error' : '' }} row">
    {!! Form::label('frecuenciaCardiaca', 'Frecuencia Cardiaca: ', ['class'=> 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::input('text', 'frecuenciaCardiaca', null, ['class'=> 'form-control', 'value'=>'{{ old("frecuenciaCardiaca") }}', 'placeholder' => 'Ingrese la frecuencia cardiaca de la cría']) !!}
        @if ($errors->has('frecuenciaCardiaca'))
        <span class="help-block">
            <strong>{{ $errors->first('frecuenciaCardiaca') }}</strong>
        </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('frecuenciaRespiratoria') ? ' has-error' : '' }} row">
    {!! Form::label('frecuenciaRespiratoria', 'Frecuencia Respiratoria: ', ['class'=> 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::input('text', 'frecuenciaRespiratoria', null, ['class'=> 'form-control', 'value'=>'{{ old("frecuenciaRespiratoria") }}', 'placeholder' => 'Ingrese la frecuencia respiratoria de la cría']) !!}
        @if ($errors->has('frecuenciaRespiratoria'))
        <span class="help-block">
            <strong>{{ $errors->first('frecuenciaRespiratoria') }}</strong>
        </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('temperatura') ? ' has-error' : '' }} row">
    {!! Form::label('temperatura', 'Temperatura: ', ['class'=> 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::input('text', 'temperatura', null, ['class'=> 'form-control', 'value'=>'{{ old("temperatura") }}', 'placeholder' => 'Ingrese la temperatura de la cría']) !!}
        @if ($errors->has('temperatura'))
        <span class="help-block">
            <strong>{{ $errors->first('temperatura') }}</strong>
        </span>
        @endif
    </div>
</div>