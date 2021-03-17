$(document).ready(function(){

    //Id del paciente para el tratamiento
    let id_odontologo = null;
    $("#content").hide();

    // Listado de pacientes para ver en el modal
    $('#tbl_odontologos_ver').DataTable({
		responsive: true,
		processing: true,
		serverSide: true,
		ajax: '/odontologo/ajaxListarOdontologos',
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
                targets: 5
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
                        '" class="btn btn-success btn-xs mdi mdi-tooltip-edit text-white btn_ver_pacientes" data-toggle="tooltip" title="Ver odontologos del C.S.">' +
                        '<i class="fa fa-eye"></i> ver pacientes</a>' +
                        '</div>'
					);
				},
			},
		],
	});

    // Mostrar el modal con los pacientes
    $("#listado-odontologo-title").html("Listado de Odontologos");
    $("#listado-odontologo-title").draggable({});
    parametrosModal(
        "#listado-odontologos",
        "Listado de Odontologos",
        "modal-xl",
        false,
        true
    );


    // Habilitar el fomulario de ver los detalles de tratamiento, odontograma del paciente
    $('#tbl_odontologos_ver').on("click", ".btn_ver_pacientes", function(e) {
        //ocultar el modal
        $("#listado-odontologos").modal("hide");
        let id = $(this).attr("data");
        id_odontologo = id;
        
        if(id_odontologo == null){
            setInterval(function() {
                window.location = "/";
            }, 1000);    
            
            mensajeAlert("info", "Por favor seleccione un odontologo !!!", "Informacion");
        }

        $("#content").show();

    })

});//fin de odonto

    // Listado de citas por cada odontologo
 $("#content").hide();
  $("#tbl_citas_ver").DataTable({
    responsive: true,
    processing: true,
    serverSide: true,
    ajax: "/cita/ajaxListarCitas",
    language: {
      url: "/plugins/datatables/lang/Spanish.json",
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
            targets: 1
        },
        {
            searchable: true,
            orderable: true,
            visible: false,
            targets: 7
        },
        {
            searchable: true,
            orderable: true,
            visible: false,
            targets: 8
        },
        {
            searchable: true,
            orderable: true,
            visible: false,
            targets: 9
        },
        {
            searchable: false,
            orderable: false,
            targets: -1,
            data: null,
      },
    ],
  });
   
