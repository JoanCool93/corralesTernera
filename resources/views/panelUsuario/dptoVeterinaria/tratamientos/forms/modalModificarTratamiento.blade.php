<!-- Disparo del modal por medio de un botón -->
<button type="button" class="btn btn-warning fa fa-edit" data-toggle="modal" data-target="#modalModificarTratamiento{{ $tratamiento->idTratamiento }}"> Modificar</button>
<!-- Modal -->
<div class="modal fade" id="modalModificarTratamiento{{ $tratamiento->idTratamiento }}" role="dialog">
    <div class="modal-dialog">

        <!-- Contenido del Modal-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Modificar datos del Tratamiento</h4>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            {!! Form::model($tratamiento, ['route' => ['tratamientos.update', $tratamiento->idTratamiento], 'method' => 'PUT', 'class' => 'form']) !!}
                            @include('panelUsuario.dptoVeterinaria.tratamientos.forms.formularioTratamiento')
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