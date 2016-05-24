<!-- Disparo del modal por medio de un botón -->
<button type="button" class="btn btn-success fa fa-plus" data-toggle="modal" data-target="#modalProcesarCriaEnferma"> Procesar Cria Enferma</button>
<!-- Modal -->
<div class="modal fade" id="modalProcesarCriaEnferma" role="dialog">
    <div class="modal-dialog">

        <!-- Contenido del Modal-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Procesar Cria Enferma</h4>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            {!! Form::open(['route' => ['procesarCuarentena', $cria->idCria], 'method' => 'POST', 'class' => 'form']) !!}
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
                        </div>
                    </div>
                </div>
            </div>        
            <div class="modal-footer">
                <div class ="btn">
                    <div>
                        {!! Form::submit(' Poner en cuarentena',['class' => 'btn btn-primary']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>    
                <div class="btn btn-default" data-dismiss="modal">Cerrar</div>
            </div>
        </div>
    </div>
</div>