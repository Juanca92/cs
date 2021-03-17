$(document).ready(function(){

    //Id del paciente para el tratamiento
    let id_paciente = null;
    $("#content").hide();

    // Listado de pacientes para ver en el modal
    $('#tbl_pacientes_ver').DataTable({
		responsive: true,
		processing: true,
		serverSide: true,
		ajax: '/paciente/ajaxListarPacientes',
		language: {
			url: '/plugins/datatables/lang/Spanish.json',
		},
		columnDefs: [
            {
                searchable: true,
                orderable: true,
                visible: false,
                targets: 0
            },
            {
                searchable: true,
                orderable: true,
                visible: false,
                targets: 4
            },
            {
                searchable: true,
                orderable: true,
                visible: false,
                targets: 6
            },
			{
				searchable: false,
				orderable: false,
				targets: -1,
				data: null,
				render: function (data, type, row, meta) {
					return (
						'<div class="btn-group" role="group">' +
                        '<a data="' + data[0] +
                        '" class="btn btn-success btn-xs mdi mdi-tooltip-edit text-white btn_ver_tratamientos" data-toggle="tooltip" title="Ver Tramatientos del Paciente">' +
                        '<i class="fa fa-eye"></i> ver tratamientos</a>' +
                        '</div>'
					);
				},
			},
		],
	});

    // Mostrar el modal con los pacientes
    $("#listado-paciente-title").html("Listado de Pacientes");

    parametrosModal(
        "#listado-pacientes",
        "Listado de Pacientes",
        "modal-lg",
        false,
        true
    );


    // Habilitar el fomulario de ver los detalles de tratamiento, odontograma del paciente
    $('#tbl_pacientes_ver').on("click", ".btn_ver_tratamientos", function(e) {
        //ocultar el modal
        $("#listado-pacientes").modal("hide");
        let id = $(this).attr("data");
        id_paciente = id;
        
        if(id_paciente == null){
            setInterval(function() {
                window.location = "/";
            }, 1000);    
            
            mensajeAlert("info", "Por favor seleccione un paciente !!!", "Informacion");
        }

        $("#content").show();

    })


   
});