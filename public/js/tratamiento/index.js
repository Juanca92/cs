$(document).ready(function () {

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
                visible: true,
                targets: 7,
                data: null,
                render: function (data, type, row, meta) {
                    if (data[7] == "ACTIVO") {
                        return ('<a type="button" data="' + data[0] + '" class="btn btn-success btn-xs text-white">' + data[7] + ' </span>');
                    } else {
                        return ('<a type="button" data="' + data[0] + '" class="btn btn-danger btn-xs text-white">' + data[7] + ' </span>');
                    }
                },
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
    $('#tbl_pacientes_ver').on("click", ".btn_ver_tratamientos", function (e) {
        //ocultar el modal
        $("#listado-pacientes").modal("hide");
        let id = $(this).attr("data");
        id_paciente = id;

        if (id_paciente == null) {
            setInterval(function () {
                window.location = "/";
            }, 1000);

            mensajeAlert("info", "Por favor seleccione un paciente !!!", "Informacion");
        }


        $("#content").show();

    })

    // datos del Paciente
    $('#tbl_pacientes_ver').on("click", ".btn_ver_tratamientos", function (e) {
        let id = $(this).attr("data");
        $.ajax({
            type: "POST",
            url: "/paciente/editar_paciente",
            data: {
                "id": id
            },
            dataType: "JSON"
        }).done(function (response) {

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
            $("#estatus").val(response[0]["estatus"]);
            $("#accion").val("up");

            $("#btn-guardar-paciente").html("Editar");
            parametrosModal(
                "#agregar-paciente",
                "Editar Paciente",
                "modal-lg",
                false,
                true
            );

        }).fail(function (e) {
            $("#agregar-paciente").modal("hide");
        });

    });
    $("#frm_guardar_paciente").on("submit", function (e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "/paciente/guardar_paciente",
            data: $("#frm_guardar_paciente").serialize(),
            dataType: "JSON"
        }).done(function (response) {

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

        }).fail(function (e) {
            mensajeAlert("error", "Error al registrar/editar el Paciente", "Error");
        });
    });
    $( "#fecha_nacimiento" ).datepicker({
        changeMonth: true,
        changeYear: true,
        yearRange: '-100:+0',
        dateFormat: "yy-mm-dd"
    });

    //datos del usuario o paciente
    $('#tbl_pacientes_ver').on("click", ".btn_ver_tratamientos", function (e) {
      let id = $(this).attr("data");
      $.ajax({
          type: "POST",
          url: "/paciente/editar_paciente",
          data: {
              "id": id
          },
          dataType: "JSON"
      }).done(function (response) {
        if (response[0]["foto"] != null) {
          $("#foto").attr("src", response[0]["foto"]);
        }
        $("#nombre_completo").html(response[0]["nombre_completo"]);
        $("#telefono_celular").html(response[0]["telefono_celular"]);
        $("#domicilio").html(response[0]["domicilio"]);
        $("#fecha_nacimiento").html(response[0]["fecha_nacimiento"]);

      })
  });

        // traendo tabla de alergias
        $(document).ready(function () {
            // Listado de alergias
            $("#tbl_tratamiento_alergias").DataTable({
              responsive: true,
              processing: true,
              serverSide: true,
              ajax: "/tratamiento/ajaxListarAlergias",
              language: {
                url: "/plugins/datatables/lang/Spanish.json",
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
                      '<a data="' +
                      data[0] +
                      '" class="btn btn-warning btn-sm mdi mdi-tooltip-edit text-white btn_editar_alergia" data-toggle="tooltip" title="Editar">' +
                      '<i class="fa fa-pen"></i></a>' +
                      '<a data="' +
                      data[0] +
                      '" class="btn btn-danger btn-sm mdi mdi-delete-forever text-white btn_eliminar_alergia" data-toggle="tooltip" title="Eliminar">' +
                      '<i class="fa fa-trash"></i></a>' +
                      "</div>"
                    );
                  },
                },
              ],
            });
      
        
      
      // Modal para agregar alergias
    $("button#agregar_alergia").on("click", function(e) {
        
        $("#btn-guardar-alergia").html("Guardar");
        $("#accion").val("in");

        parametrosModal(
            "#agregar-alergia",
            "Agregar Alergias",
            "modal-lg",
            false,
            true
        );

    });
    // Guardar alergias
    $("#frm_guardar_alergia").on("submit", function(e) {        
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "/tratamiento/guardar_alergia",
            data: $("#frm_guardar_alergia").serialize(),
            dataType: "JSON"
        }).done(function(response) {

            if (typeof response.warning !== "undefined") {
                mensajeAlert("warning", response.warning, "Advertencia");
            }

            if (typeof response.form !== "undefined") {
                mensajeAlert("warning", response.form, "Advertencia");
            }

            if (typeof response.exito !== "undefined") {
                $("#tbl_tratameiento_alergias").DataTable().draw();
                $("#agregar-alergia").modal("hide");
                mensajeAlert("success", response.exito, "Exito");
                limpiarCampos();
            }

        }).fail(function(e) {
            mensajeAlert("error", "Error al registrar/editar el alergias", "Error");
        });
    });
    // Limpiar Campos
  function limpiarCampos() {
    $("#id").val("");
    $("#nombre_alergia").val("");
    $("#detalle").val("");
    $("#id_paciente").val("").trigger("change");
    $("#accion").val("");
  }

  // Editar alergias
  $("#tbl_tratamiento_alergias").on("click", ".btn_editar_alergias", function (e) {
    let id = $(this).attr("data");
    $.ajax({
      type: "POST",
      url: "/tratamiento/editar_alergia",
      data: {
        id: id,
      },
      dataType: "JSON",
    })
      .done(function (response) {
        $("#id").val(response[0]["id_alergia"]);
        $("#nombre_alergia").val(response[0]["nombre_alergia"]);
        $("#detalle").val(response[0]["detalle"]);
        $("#id_paciente").val(response[0]["id_paciente"]).trigger("change");
        $("#accion").val("up");

        $("#btn-guardar-alergia").html("Editar");
        parametrosModal(
          "#agregar-alergia",
          "Editar alergia",
          "modal-lg",
          false,
          true
        );
      })
      .fail(function (e) {
        $("#agregar-alergia").modal("hide");
      });
  });

  // Eliminar alergias
  $("#tbl_tratamiento_alergias").on("click", ".btn_eliminar_alergia", function (e) {
    let id = $(this).attr("data");
    bootbox.confirm("¿Estas seguro de eliminar al alergia?", function (result) {
      if (result) {
        $.ajax({
          type: "POST",
          url: "/tratamiento/eliminar_alergia",
          data: {
            id: id,
          },
          dataType: "JSON",
        })
          .done(function (response) {
            if (typeof response.exito !== "undefined") {
              $("#tbl_tratamiento_alergias").DataTable().draw();
              mensajeAlert("success", response.exito, "Exito");
            }
          })
          .fail(function (e) {
            mensajeAlert("error", "Error al procesar la peticion", "Error");
          });
      }
    });
  });

} );//fin de tablas alergias

}); //fin principio