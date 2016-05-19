<!-- Disparo del modal por medio de un botón -->
<button type="button" class="btn btn-primary fa fa-list" data-toggle="modal" data-target="#modalMostrarUsuario{{ $usuario->idUsuario }}"> Mostrar</button>
<!-- Modal -->
<div class="modal fade" id="modalMostrarUsuario{{ $usuario->idUsuario }}" role="dialog">
    <div class="modal-dialog">

        <!-- Contenido del Modal-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Datos del Usuario</h4>
            </div>
            <div class="modal-body">
                <div class="container">
                    <!-- Tabla para la visualizacion de usuarios -->
                    <div class="row">
                        <div class="col-lg-6">
                            <table class="table table-stripped table-hover">
                                <tr>
                                    <th class="col-lg-2">Id:</th>
                                    <th class="col-lg-4">{{$usuario->idUsuario}}</th>
                                </tr>
                                <tr>
                                    <th class="col-lg-2">Nombre:</th>
                                    <th class="col-lg-4">{{$usuario->nombre}}</th>
                                </tr>
                                <tr>
                                    <th class="col-lg-2">Apellido Paterno:</th>
                                    <th class="col-lg-4">{{$usuario->apellidoPaterno}}</th>
                                </tr>
                                <tr>
                                    <th class="col-lg-2">Apellido Materno:</th>
                                    <th class="col-lg-4">{{$usuario->apellidoMaterno}}</th>
                                </tr>
                                <tr>
                                    <th class="col-lg-2">Correo electrónico:</th>
                                    <th class="col-lg-4">{{$usuario->email}}</th>
                                </tr>
                                <tr>
                                    <th class="col-lg-2">Rol de Usuario:</th>
                                    @if($usuario->idRole == 2)
                                        <th class="col-lg-4">Administrador</th>
                                    @elseif($usuario->idRole == 3)
                                        <th class="col-lg-4">Departamento de veterinaria</th>
                                    @elseif($usuario->idRole == 4)
                                        <th class="col-lg-4">Empleado</th>
                                    @endif
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