<!-- Disparo del modal por medio de un botón -->
<button type="button" class="btn btn-danger fa fa-trash" data-toggle="modal" data-target="#modalEliminar{{ $dieta->idDieta }}"> Eliminar</button>
<!-- Modal -->
<div class="modal fade" id="modalEliminar{{ $dieta->idDieta }}" role="dialog">
    <div class="modal-dialog">

        <!-- Contenido del Modal-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Eliminación de Dieta</h4>
            </div>
            <div class="modal-body">
                <h2 align='center'>¿Esta seguro que desea eliminar el dieta {{ $dieta->nombre }}?</h2> 
                <div class="container">
                    <!-- Tabla para la visualizacion de proveedores -->
                    <div class="row">
                        <div class="col-lg-6">
                            <table class="table table-stripped table-hover">
                                <tr>
                                    <th class="col-lg-2">idDieta:</th>
                                    <th class="col-lg-4">{{$dieta->idDieta}}</th>
                                </tr>
                                <tr>
                                    <th class="col-lg-2">Nombre:</th>
                                    <th class="col-lg-4">{{$dieta->nombre}}</th>
                                </tr>
                                <tr>
                                    <th class="col-lg-2">Descripción:</th>
                                    <th class="col-lg-4">{{$dieta->descripcion}}</th>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>   
            </div>
            <div class="modal-footer">
                <div class ="btn">
                    {!! Form::open(['route' => ['dietas.destroy', $dieta->idDieta], 'method' => 'DELETE']) !!}
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