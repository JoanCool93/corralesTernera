<!-- Disparo del modal por medio de un botón -->
<button type="button" class="btn btn-warning fa fa-edit" data-toggle="modal" data-target="#modalModificarUsuario{{ $usuario->idUsuario }}"> Modificar</button>
<!-- Modal -->
<div class="modal fade" id="modalModificarUsuario{{ $usuario->idUsuario }}" role="dialog">
    <div class="modal-dialog">

        <!-- Contenido del Modal-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Modificar datos del Usuario</h4>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            {!! Form::model($usuario, ['route' => ['usuarios.update', $usuario->idUsuario], 'method' => 'PUT', 'class' => 'form']) !!}
                            @include('panelUsuario.adminPagina.usuarios.forms.formularioUsuario')
                        </div>
                    </div>
                </div>
            </div>        
            <div class="modal-footer">
                <div class ="btn">
                    <div>
                        {!! Form::submit(' Modificar',['class' => 'btn btn-primary']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>    
                <div class="btn btn-default" data-dismiss="modal">Cerrar</div>
            </div>
        </div>
    </div>
</div>