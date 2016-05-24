<!-- Disparo del modal por medio de un botón -->
<button type="button" align="center" class="btn btn-primary fa fa-plus" data-toggle="modal" data-target="#modalAsignarSensor"> Asignar Sensor</button>
<!-- Modal -->
<div class="modal fade" id="modalAsignarSensor" role="dialog">
    <div class="modal-dialog">

        <!-- Contenido del Modal-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Asignar Sensor</h4>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            {!! Form::open(['route' => ['asignacionSensor', $cria->idCria], 'method' => 'POST', 'class' => 'form']) !!}
                            {!! Form::label('idSensor', 'Seleccione sensor: ', ['class'=> 'col-md-4 control-label']) !!}
                            {!! Form::select('idSensor', $sensores, 1, ['class'=> 'form-control', 'value'=>'{{ old("idSensor") }}']) !!}
                        </div>
                    </div>
                </div>
            </div>        
            <div class="modal-footer">
                <div class ="btn">
                    <div>
                        {!! Form::submit(' Asignar sensor',['class' => 'btn btn-primary']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>    
                <div class="btn btn-default" data-dismiss="modal">Cerrar</div>
            </div>
        </div>
    </div>
</div>