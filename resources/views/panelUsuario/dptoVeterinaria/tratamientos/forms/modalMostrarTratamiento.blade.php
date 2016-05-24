<!-- Disparo del modal por medio de un botón -->
<button type="button" class="btn btn-primary fa fa-list" data-toggle="modal" data-target="#modalMostrarTratamiento{{ $tratamiento->idTratamiento }}"> Mostrar</button>
<!-- Modal -->
<div class="modal fade" id="modalMostrarTratamiento{{ $tratamiento->idTratamiento }}" role="dialog">
    <div class="modal-dialog">

        <!-- Contenido del Modal-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Datos del Tratamiento</h4>
            </div>
            <div class="modal-body">
                <div class="container">
                    <!-- Tabla para la visualizacion de tratamiento -->
                    <div class="row">
                        <div class="col-lg-6">
                            <table class="table table-stripped table-hover">
                                <tr>
                                    <th class="col-lg-2">idTratamiento:</th>
                                    <th class="col-lg-4">{{$tratamiento->idTratamiento}}</th>
                                </tr>
                                <tr>
                                    <th class="col-lg-2">Nombre:</th>
                                    <th class="col-lg-4">{{$tratamiento->nombre}}</th>
                                </tr>
                                <tr>
                                    <th class="col-lg-2">Descripción:</th>
                                    <th class="col-lg-4">{{$tratamiento->descripcion}}</th>
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