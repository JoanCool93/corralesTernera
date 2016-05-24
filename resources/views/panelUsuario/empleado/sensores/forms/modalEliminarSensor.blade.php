<!-- Disparo del modal por medio de un botón -->
<button type="button" class="btn btn-danger fa fa-trash" data-toggle="modal" data-target="#modalEliminar{{ $sensor->idSensor }}"> Eliminar</button>
<!-- Modal -->
<div class="modal fade" id="modalEliminar{{ $sensor->idSensor }}" role="dialog">
    <div class="modal-dialog">

        <!-- Contenido del Modal-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Eliminación de Sensor</h4>
            </div>
            <div class="modal-body">
                <h2 align='center'>¿Esta seguro que desea eliminar el sensor {{ $sensor->descripcion }}?</h2> 
                <div class="container">
                    <!-- Tabla para la visualizacion de sensores -->
                    <div class="row">
                        <div class="col-lg-6">
                            <table class="table table-stripped table-hover">
                                <tr>
                                    <th class="col-lg-2">idSensor:</th>
                                    <th class="col-lg-4">{{$sensor->idSensor}}</th>
                                </tr>
                                <tr>
                                    <th class="col-lg-2">Descripción:</th>
                                    <th class="col-lg-4">{{$sensor->descripcion}}</th>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>   
            </div>
            <div class="modal-footer">
                <div class ="btn">
                    {!! Form::open(['route' => ['sensores.destroy', $sensor->idSensor], 'method' => 'DELETE']) !!}
                            <div>
                                {!! Form::submit('Eliminar',['class' => 'btn btn-danger fa fa-trash-o']) !!}
                            </div>
                    {!! Form::close() !!}
                </div>
                <div class="btn btn-default" data-dismiss="modal">Cerrar</div>
            </div>
        </div>
    </div>
</div>