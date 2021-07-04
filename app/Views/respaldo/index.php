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
                    <li class="breadcrumb-item active">Respaldo</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card ">
                    <div class="card-body">
                        <!-- /.Contenido de la vista -->
                        <div class="container">
                        <td><center><img src="img/backup.png"></center></td> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
$.get('/respaldo/descargarRespaldo',function(r){
    if(typeof r.exito!=='undefined'){
        mensajeAlert('success', r.exito, 'INFORMACIÓN');
        window.open(`${window.location.origin}/myphp-backup-files/${r.nombre_archivo}.gz`, '_blank');
    }else{
        mensajeAlert('warning', r.error, 'INFORMACIÓN');
    }
}).fail(function (e) {
				mensajeAlert('error', 'Error al descargar el respaldo', 'INFORMACIÓN');
			});
</script>