<!-- Disparo del modal por medio de un botón -->
<button type="button" class="btn btn-success fa fa-plus" data-toggle="modal" data-target="#modalAgregarCorral"> Registrar Corral</button>
<!-- Modal -->
<div class="modal fade" id="modalAgregarCorral" role="dialog">
    <div class="modal-dialog">

        <!-- Contenido del Modal-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Registrar corral</h4>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            {!! Form::open(['route' => 'corrales.store', 'method' => 'POST', 'class' => 'form']) !!}
                            @include('panelUsuario.adminPagina.corrales.forms.formularioCorral')
                        </div>
                    </div>
                </div>
            </div>        
            <div class="modal-footer">
                <div class ="btn">
                    <div>
                        {!! Form::submit(' Registrar',['class' => 'btn btn-primary']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>    
                <div class="btn btn-default" data-dismiss="modal">Cerrar</div>
            </div>
        </div>
    </div>
</div>