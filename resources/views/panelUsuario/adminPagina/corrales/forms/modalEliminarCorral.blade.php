<!-- Disparo del modal por medio de un botón -->
<button type="button" class="btn btn-danger fa fa-trash" data-toggle="modal" data-target="#modalEliminar{{ $corral->idCorral }}"> Eliminar</button>
<!-- Modal -->
<div class="modal fade" id="modalEliminar{{ $corral->idCorral }}" role="dialog">
    <div class="modal-dialog">

        <!-- Contenido del Modal-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Eliminación de corral</h4>
            </div>
            <div class="modal-body">
                <h2 align='center'>¿Esta seguro que desea eliminar el corral {{ $corral->idCorral }}?</h2> 
                <div class="container">
                    <!-- Tabla para la visualizacion de corrales -->
                    <div class="row">
                        <div class="col-lg-6">
                            <table class="table table-stripped table-hover">
                                <tr>
                                    <th class="col-lg-2">idCorral:</th>
                                    <th class="col-lg-4">{{$corral->idCorral}}</th>
                                </tr>
                                <tr>
                                    <th class="col-lg-2">Descripción:</th>
                                    <th class="col-lg-4">{{$corral->descripcion}}</th>
                                </tr>
                                <tr>
                                    <th class="col-lg-2">Ancho:</th>
                                    <th class="col-lg-4">{{$corral->ancho}}</th>
                                </tr>
                                <tr>
                                    <th class="col-lg-2">Largo:</th>
                                    <th class="col-lg-4">{{$corral->largo}}</th>
                                </tr>
                                <tr>
                                    <th class="col-lg-2">Capacidad:</th>
                                    <th class="col-lg-4">{{$corral->capacidad}}</th>
                                </tr>
                                <tr>
                                    <th class="col-lg-2">Tipo Corral:</th>
                                    @if($corral->tipoCorral == 1)
                                        <th class="col-lg-1">Interior</th>
                                    @elseif($corral->tipoCorral == 2)
                                        <th class="col-lg-1">Aire Libre</th>
                                    @elseif($corral->tipoCorral == 3)
                                        <th class="col-lg-1">Cuarentena</th>
                                    @endif
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>   
            </div>
            <div class="modal-footer">
                <div class ="btn">
                    {!! Form::open(['route' => ['corrales.destroy', $corral->idCorral], 'method' => 'DELETE']) !!}
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