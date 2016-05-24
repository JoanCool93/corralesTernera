{!! csrf_field() !!}

<div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }} row">
    {!! Form::label('nombre', 'Nombre: ', ['class'=> 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::input('text', 'nombre', null, ['class'=> 'form-control', 'value'=>'{{ old("nombre") }}', 'placeholder' => 'Ingrese nombre del tratamiento']) !!}
        @if ($errors->has('nombre'))
        <span class="help-block">
            <strong>{{ $errors->first('nombre') }}</strong>
        </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('descripcion') ? ' has-error' : '' }} row">
    {!! Form::label('descripcion', 'Descripción: ', ['class'=> 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::input('text', 'descripcion', null, ['class'=> 'form-control', 'value'=>'{{ old("descripcion") }}', 'placeholder' => 'Ingrese descripción del tratamiento']) !!}
        @if ($errors->has('descripcion'))
        <span class="help-block">
            <strong>{{ $errors->first('descripcion') }}</strong>
        </span>
        @endif
    </div>
</div>