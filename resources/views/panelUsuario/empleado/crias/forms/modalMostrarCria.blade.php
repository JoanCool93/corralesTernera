<!-- Disparo del modal por medio de un botón -->
<button type="button" class="btn btn-primary fa fa-list" data-toggle="modal" data-target="#modalMostrarCria{{ $cria->idCria }}"> Mostrar</button>
<!-- Modal -->
<div class="modal fade" id="modalMostrarCria{{ $cria->idCria }}" role="dialog">
    <div class="modal-dialog">

        <!-- Contenido del Modal-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Datos de la Cria</h4>
            </div>
            <div class="modal-body">
                <div class="container">
                    <!-- Tabla para la visualizacion de cria -->
                    <div class="row">
                        <div class="col-lg-6">
                            <table class="table table-stripped table-hover">
                                <tr>
                                    <th class="col-lg-2">idCria:</th>
                                    <th class="col-lg-4">{{$cria->idCria}}</th>
                                </tr>
                                <tr>
                                    <th class="col-lg-2">idRegistro:</th>
                                    <th class="col-lg-4">{{$cria->idRegistro}}</th>
                                </tr>
                                <tr>
                                    <th class="col-lg-2">Peso:</th>
                                    <th class="col-lg-4">{{$cria->peso}}</th>
                                </tr>
                                <tr>
                                    <th class="col-lg-2">Altura:</th>
                                    <th class="col-lg-4">{{$cria->altura}}</th>
                                </tr>
                                <tr>
                                    <th class="col-lg-2">Edad:</th>
                                    <th class="col-lg-4">{{$cria->edad}}</th>
                                </tr>
                                <tr>
                                    <th class="col-lg-2">Color Pelaje:</th>
                                    <th class="col-lg-4">{{$cria->colorPelaje}}</th>
                                </tr>
                                <tr>
                                    <th class="col-lg-2">Raza:</th>
                                    <th class="col-lg-4">{{$cria->raza}}</th>
                                </tr>
                                <tr>
                                    <th class="col-lg-2">Color Musculo:</th>
                                    <th class="col-lg-4">{{$cria->colorMusculo}}</th>
                                </tr>
                                <tr>
                                    <th class="col-lg-2">Clasificación:</th>
                                    <th class="col-lg-4">{{$cria->clasificacion}}</th>
                                </tr>
                                <tr>
                                    <th class="col-lg-2">Estado:</th>
                                    @if($cria->estado == 1)
                                        <th class="col-lg-1">Sana</th>
                                    @elseif($cria->estado == 2)
                                        <th class="col-lg-1">Preñada</th>
                                    @elseif($cria->estado == 3)
                                        <th class="col-lg-1">Enferma</th>
                                    @elseif($cria->estado == 4)
                                        <th class="col-lg-1">Cuarentena</th>
                                    @endif
                                </tr>
                                    <th class="col-lg-2">idDieta:</th>
                                    <th class="col-lg-4">{{$cria->idDieta}}</th>
                                </tr>
                                    <th class="col-lg-2">idTratamiento:</th>
                                    <th class="col-lg-4">{{$cria->idTratamiento}}</th>
                                </tr>
                                    <th class="col-lg-2">idSensor:</th>
                                    <th class="col-lg-4">{{$cria->idSensor}}</th>
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