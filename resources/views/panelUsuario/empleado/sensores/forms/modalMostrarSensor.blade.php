<!-- Disparo del modal por medio de un botón -->
<button type="button" class="btn btn-primary fa fa-list" data-toggle="modal" data-target="#modalMostrarSensor{{ $sensor->idSensor }}"> Mostrar</button>
<!-- Modal -->
<div class="modal fade" id="modalMostrarSensor{{ $sensor->idSensor }}" role="dialog">
    <div class="modal-dialog">

        <!-- Contenido del Modal-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Datos del Sensor</h4>
            </div>
            <div class="modal-body">
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
                <div class="btn btn-default" data-dismiss="modal">Cerrar</div>
            </div>
        </div>
    </div>
</div>