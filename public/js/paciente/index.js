$(document).ready(function()
{

    // Listado de pacientes
    $('#tbl_pacientes').DataTable({
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
                visible: true,
                targets: 0
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
                        '" class="btn btn-warning btn-sm mdi mdi-tooltip-edit text-white btn_editar_paciente" data-toggle="tooltip" title="Editar">' +
                        '<i class="fa fa-pen"></i></a>' +
                        '<a data="' +
                        data[0] +
                        '" class="btn btn-danger btn-sm mdi mdi-delete-forever text-white btn_eliminar_paciente" data-toggle="tooltip" title="Eliminar">' +
                        '<i class="fa fa-trash"></i></a>' +
                        '</div>'
					);
				},
			},
		],
	});

    // Ocupacion con select 2
    $('.select2bs4').select2({
        theme: 'bootstrap4',
        placeholder: "-- Seleccione Ocupacion --",
        allowClear: true,
    })       

    // Modal para agregar paciente
    $("button#agregar_paciente").on("click", function(e) {
        
        $("#btn-guardar-paciente").html("Guardar");
        $("#accion").val("in");

        // $("#ci").prop( "disabled", false );
        // $("#expedido").prop( "disabled", false );

        parametrosModal(
            "#agregar-paciente",
            "Agregar Paciente",
            "modal-lg",
            false,
            true
        );

    });

    // Guardar Paciente
    $("#frm_guardar_paciente").on("submit", function(e) {        
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "/paciente/guardar_paciente",
            data: $("#frm_guardar_paciente").serialize(),
            dataType: "JSON"
        }).done(function(response) {

            if (typeof response.warning !== "undefined") {
                mensajeAlert("warning", response.warning, "Advertencia");
                $("#ci").focus();
            }

            if (typeof response.form !== "undefined") {
                mensajeAlert("warning", response.form, "Advertencia");
            }

            if (typeof response.exito !== "undefined") {
                $("#tbl_pacientes").DataTable().draw();
                $("#agregar-paciente").modal("hide");
                mensajeAlert("success", response.exito, "Exito");
                limpiarCampos();
            }

        }).fail(function(e) {
            mensajeAlert("error", "Error al registrar/editar el Paciente", "Error");
        });
    });

    // Limpiar Campos
    function limpiarCampos() {
        $("#id").val("");
        $("#ci").val("");
        $("#expedido").val("");
        $("#nombres").val("");
        $("#paterno").val("");
        $("#materno").val("");
        $("#celular").val("");
        $("#fecha_nacimiento").val("");
        $("#id_ocupacion").val("");
        $("#domicilio").val("");
        $("#accion").val("");
    }

    // Editar Paciente
    $('#tbl_pacientes').on("click", ".btn_editar_paciente", function(e) {
        let id = $(this).attr("data");
        $.ajax({
            type: "POST",
            url: "/paciente/editar_paciente",
            data: {
                "id": id
            },
            dataType: "JSON"
        }).done(function(response) {

            $("#id").val(response[0]["id_persona"]);
            $("#ci").val(response[0]["ci"]);
            $("#expedido").val(response[0]["expedido"]);
            $("#nombres").val(response[0]["nombres"]);
            $("#paterno").val(response[0]["paterno"]);
            $("#materno").val(response[0]["materno"]);
            $("#celular").val(response[0]["telefono_celular"]);
            $("#fecha_nacimiento").val(response[0]["fecha_nacimiento"]);
            $("#id_ocupacion").val(response[0]["id_ocupacion"]).trigger('change');
            $("#domicilio").val(response[0]["domicilio"]);
            $("#accion").val("up");

            $("#btn-guardar-paciente").html("Editar");
            parametrosModal(
                "#agregar-paciente",
                "Editar Paciente",
                "modal-lg",
                false,
                true
            );

        }).fail(function(e) {
            $("#agregar-paciente").modal("hide");
        });

    });

    // Eliminar Paciente
    $("#tbl_pacientes").on("click", ".btn_eliminar_paciente", function(e) {
        let id = $(this).attr("data");
        bootbox.confirm("¿Estas seguro de eliminar al paciente?", function(result) {
            if (result) {
                $.ajax({
                    type: "POST",
                    url: "/paciente/eliminar_paciente",
                    data: {
                        "id": id
                    },
                    dataType: "JSON"
                }).done(function(response) {

                    if (typeof response.exito !== "undefined") {
                        $("#tbl_pacientes").DataTable().draw();
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

    $( function() {
        $( "#fecha_nacimiento" ).datepicker();
        
      } );


})