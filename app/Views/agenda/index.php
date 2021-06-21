<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1></h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/home">Inicio</a></li>
                    <li class="breadcrumb-item active">agenda</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-info">
                    <div class="card-body">
                        <!-- /.Contenido de la vista -->
                        <div class="container">
                            <h1 align="center">Calendario de Citas Medicas</h1>
                            <div id="calendar" class="card" style="padding: 0px;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="modal fade" id="modal-event" tabindex="-1" role="dialog" aria-labelledby="modal-eventLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header bg-green bg-draggable">
                <h4 class="modal-title" id="agenda-titulo">Informacionde de la agenda</h4>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- cuerpo-->
            <div class="modal-body">
                <label>Nombre del Paciente</label>
                <div id="event-title"></div>
                <hr>
                <label>Descripcion</label>
                <div id="event-description"></div>
                <hr>
                <label>hora de cita</label>
                <div id="event-start"></div>
                <hr>
                <label>odontologo a atender</label>
                <div id="event-doctor"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>