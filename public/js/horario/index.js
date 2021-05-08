$(document).ready(function(){

    // Listado de odontologos
    $('#tbl_horarios').DataTable({
		responsive: true,
		processing: true,
		serverSide: true,
		ajax: '/horario/ajaxListarHorarios',
		language: {
			url: '/plugins/datatables/lang/Spanish.json',
		},
		columnDefs: [
            {
                searchable: true,
                orderable: true,
                visible: true,
                targets: 0
            },
		],
	});

    //Modal para Horario
  $("button#horario_cita").on("click", function(e) {
    parametrosModal(
        "#horario",
        "Horario de Citas",
        "modal-lg",
        false,
        true
    );
  });
});