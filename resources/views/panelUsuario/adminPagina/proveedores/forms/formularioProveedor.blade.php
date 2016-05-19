{!! csrf_field() !!}

<div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }} row">
    {!! Form::label('nombre', 'Nombre: ', ['class'=> 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::input('text', 'nombre', null, ['class'=> 'form-control', 'value'=>'{{ old("nombre") }}', 'placeholder' => 'Ingrese nombre del proveedor']) !!}
        @if ($errors->has('nombre'))
        <span class="help-block">
            <strong>{{ $errors->first('nombre') }}</strong>
        </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('rfc') ? ' has-error' : '' }} row">
    {!! Form::label('rfc', 'RFC: ', ['class'=> 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::input('text', 'rfc', null, ['class'=> 'form-control', 'value'=>'{{ old("rfc") }}', 'placeholder' => 'Ingrese rfc del proveedor']) !!}
        @if ($errors->has('rfc'))
        <span class="help-block">
            <strong>{{ $errors->first('rfc') }}</strong>
        </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('descripcion') ? ' has-error' : '' }} row">
    {!! Form::label('descripcion', 'Descripción: ', ['class'=> 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::input('text', 'descripcion', null, ['class'=> 'form-control', 'value'=>'{{ old("descripcion") }}', 'placeholder' => 'Ingrese descripción del proveedor']) !!}
        @if ($errors->has('descripcion'))
        <span class="help-block">
            <strong>{{ $errors->first('descripcion') }}</strong>
        </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('direccion') ? ' has-error' : '' }} row">
    {!! Form::label('direccion', 'Dirección: ', ['class'=> 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::input('text', 'direccion', null, ['class'=> 'form-control', 'value'=>'{{ old("direccion") }}', 'placeholder' => 'Ingrese dirección del proveedor']) !!}
        @if ($errors->has('direccion'))
        <span class="help-block">
            <strong>{{ $errors->first('direccion') }}</strong>
        </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('telefono') ? ' has-error' : '' }} row">
    {!! Form::label('telefono', 'Telefono: ', ['class'=> 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::input('text', 'telefono', null, ['class'=> 'form-control', 'value'=>'{{ old("telefono") }}', 'placeholder' => 'Ingrese telefono del proveedor']) !!}
        @if ($errors->has('telefono'))
        <span class="help-block">
            <strong>{{ $errors->first('telefono') }}</strong>
        </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} row">
    {!! Form::label('email', 'Correo Electrónico: ', ['class'=> 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::input('text', 'email', null, ['class'=> 'form-control', 'value'=>'{{ old("email") }}', 'placeholder' => 'Ingrese email del proveedor']) !!}
        @if ($errors->has('email'))
        <span class="help-block">
            <strong>{{ $errors->first('email') }}</strong>
        </span>
        @endif
    </div>
</div>