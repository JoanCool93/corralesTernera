{!! csrf_field() !!}

<div class="form-group{{ $errors->has('descripcion') ? ' has-error' : '' }} row">
    {!! Form::label('descripcion', 'Descripción: ', ['class'=> 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::input('text', 'descripcion', null, ['class'=> 'form-control', 'value'=>'{{ old("descripcion") }}', 'placeholder' => 'Ingrese descripción del sensor']) !!}
        @if ($errors->has('descripcion'))
        <span class="help-block">
            <strong>{{ $errors->first('descripcion') }}</strong>
        </span>
        @endif
    </div>
</div>