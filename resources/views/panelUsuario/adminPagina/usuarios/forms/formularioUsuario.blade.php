{!! csrf_field() !!}

<div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }} row">
    {!! Form::label('nombre', 'Nombre: ', ['class'=> 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::input('text', 'nombre', null, ['class'=> 'form-control', 'value'=>'{{ old("nombre") }}', 'placeholder' => 'Ingrese nombre del usuario']) !!}
        @if ($errors->has('nombre'))
        <span class="help-block">
            <strong>{{ $errors->first('nombre') }}</strong>
        </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('apellidoPaterno') ? ' has-error' : '' }} row">
    {!! Form::label('apellidoPaterno', 'Apellido Paterno: ', ['class'=> 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::input('text', 'apellidoPaterno', null, ['class'=> 'form-control', 'value'=>'{{ old("apellidoPaterno") }}', 'placeholder' => 'Ingrese apellido paterno del usuario']) !!}
        @if ($errors->has('apellidoPaterno'))
        <span class="help-block">
            <strong>{{ $errors->first('apellidoPaterno') }}</strong>
        </span>
        @endif
    </div>

</div>

<div class="form-group{{ $errors->has('apellidoMaterno') ? ' has-error' : '' }} row">
    {!! Form::label('apellidoMaterno', 'Apellido Materno: ', ['class'=> 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::input('text', 'apellidoMaterno', null, ['class'=> 'form-control', 'value'=>'{{ old("apellidoMaterno") }}', 'placeholder' => 'Ingrese apellido materno del usuario']) !!}
        @if ($errors->has('apellidoMaterno'))
        <span class="help-block">
            <strong>{{ $errors->first('apellidoMaterno') }}</strong>
        </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} row">
    {!! Form::label('email', 'Correo Electrónico: ', ['class'=> 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::input('email', 'email', null, ['class'=> 'form-control', 'value'=>'{{ old("apellidoMaterno") }}', 'placeholder' => 'Ingrese correo electrónico del usuario']) !!}
        @if ($errors->has('email'))
        <span class="help-block">
            <strong>{{ $errors->first('email') }}</strong>
        </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} row">
    {!! Form::label('password', 'Contraseña: ', ['class'=> 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::input('password', 'password', null, ['class'=> 'form-control', 'value'=>'{{ old("password") }}', 'placeholder' => 'Ingrese contraseña del usuario']) !!}
        @if ($errors->has('password'))
        <span class="help-block">
            <strong>{{ $errors->first('password') }}</strong>
        </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }} row">
    {!! Form::label('password_confirmation', 'Confirme Contraseña: ', ['class'=> 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::input('password', 'password_confirmation', null, ['class'=> 'form-control', 'value'=>'{{ old("password_confirmation") }}', 'placeholder' => 'Confirme la contraseña del usuario']) !!}
        @if ($errors->has('password_confirmation'))
        <span class="help-block">
            <strong>{{ $errors->first('password_confirmation') }}</strong>
        </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('idRole') ? ' has-error' : '' }} row">
    {!! Form::label('idRole', 'Tipo de usuario: ', ['class'=> 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('idRole', [
            2 => 'Administrador',
            3 => 'Departamento de veterinaria',
            4 => 'Empleado'],2 , ['class'=> 'form-control', 'value'=>'{{ old("idRole") }}']) !!}
            @if ($errors->has('idRole'))
            <span class="help-block">
                <strong>{{ $errors->first('idRole') }}</strong>
            </span>
            @endif
        </div>
    </div>