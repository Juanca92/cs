$(document).ready(function()
{
    // Listado de citas
    $('#tbl_citas').DataTable({
		responsive: true,
		processing: true,
		serverSide: true,
		ajax: '/cita/ajaxListarCitas',
		language: {
			url: '/plugins/datatables/lang/Spanish.json',
		},
		columnDefs: [
            {
                searchable: true,
                orderable: true,
                visible: false,
                targets: 3
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
                        '" class="btn btn-warning btn-sm mdi mdi-tooltip-edit text-white btn_editar_cita" data-toggle="tooltip" title="Editar">' +
                        '<i class="fa fa-pen"></i></a>' +
                        '<a data="' +
                        data[0] +
                        '" class="btn btn-danger btn-sm mdi mdi-delete-forever text-white btn_eliminar_cita" data-toggle="tooltip" title="Eliminar">' +
                        '<i class="fa fa-trash"></i></a>' +
                        '</div>'
					);
				},
			},
		],
	});

    // paciente con select 2
    $('.select2bs4').select2({
        theme: 'bootstrap4',
        placeholder: "-- Seleccione Paciente --",
        allowClear: true,
    })    
     // Odontologo con select 2
     $('.select2bs4').select2({
        theme: 'bootstrap4',
        placeholder: "-- Seleccione Odontologo --",
        allowClear: true,
    })

    // Modal para agregar cita
    $("button#agregar_cita").on("click", function(e) {
        
        $("#btn-guardar-cita").html("Guardar");
        $("#accion").val("in");

        // $("#ci").prop( "disabled", false );
        // $("#expedido").prop( "disabled", false );

        parametrosModal(
            "#agregar-cita",
            "Agregar Cita",
            "modal-lg",
            false,
            true
        );

    });

    // Guardar cita
    $("#frm_guardar_cita").on("submit", function(e) {        
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "/cita/guardar_cita",
            data: $("#frm_guardar_cita").serialize(),
            dataType: "JSON"
        }).done(function(response) {

            if (typeof response.form !== "undefined") {
                mensajeAlert("warning", response.form, "Advertencia");
            }

            if (typeof response.exito !== "undefined") {
                $("#tbl_citas").DataTable().draw();
                $("#agregar-cita").modal("hide");
                mensajeAlert("success", response.exito, "Exito");
                limpiarCampos();
            }

        }).fail(function(e) {
            mensajeAlert("error", "Error al registrar/editar el Cita", "Error");
        });
    });

    // Limpiar Campos
    function limpiarCampos() {
        $("#id").val("");
        $("#numero_cita").val("");
        $("#tipo_tratamiento").val("");
        $("#fecha").val("");
        $("#hora").val("");
        $("#costo").val("");
        $("#id_paciente").val("");
        $("#id_odontologo").val("");
        $("#observacion").val("");
        $("#accion").val("");
    }

    // Editar Cita
    $('#tbl_citas').on("click", ".btn_editar_cita", function(e) {
        let id = $(this).attr("data");
        $.ajax({
            type: "POST",
            url: "/cita/editar_cita",
            data: {
                "id": id
            },
            dataType: "JSON"
        }).done(function(response) {

            $("#id").val(response[0]["id_cita"]);
            $("#numero_cita").val(response[0]["numero_cita"]);
            $("#tipo_tratamiento").val(response[0]["tipo_tratamiento"]);
            $("#fecha").val(response[0]["fecha"]);
            $("#hora").val(response[0]["hora"]);
            $("#costo").val(response[0]["costo"]);
            $("#id_paciente").val(response[0]["id_paciente"]).trigger('change');
            $("#id_odontologo").val(response[0]["id_odontologo"]).trigger('change');
            $("#observacion").val(response[0]["observacion"]);
            $("#accion").val("up");

            $("#btn-guardar-cita").html("Editar");
            parametrosModal(
                "#agregar-cita",
                "Editar Cita",
                "modal-lg",
                false,
                true
            );

        }).fail(function(e) {
            $("#agregar-cita").modal("hide");
        });

    });

    // Eliminar cita
    $("#tbl_citas").on("click", ".btn_eliminar_cita", function(e) {
        let id = $(this).attr("data");
        bootbox.confirm("¿Estas seguro de eliminar al cita?", function(result) {
            if (result) {
                $.ajax({
                    type: "POST",
                    url: "/cita/eliminar_cita",
                    data: {
                        "id": id
                    },
                    dataType: "JSON"
                }).done(function(response) {

                    if (typeof response.exito !== "undefined") {
                        $("#tbl_citas").DataTable().draw();
                        mensajeAlert("success", response.exito, "Exito");
                    }

                }).fail(function(e) {
                    mensajeAlert("error", "Error al procesar la peticion", "Error");
                });
            }
        });

    });

    // Borrar campos con el boton cerrar
    $("#btn-cerrar").on("click", function(){
        limpiarCampos();
    });

    //clockpiker
    $('.clockpicker').clockpicker();
    //datepicker
    $( function() {
        $( "#fecha" ).datepicker();
        
      } );


});