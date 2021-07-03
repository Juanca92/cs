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