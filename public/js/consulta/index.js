$(document).ready(function () {
    // Listado de consulta
    $("#tbl_tratamiento_consultas").DataTable({
      responsive: true,
      processing: true,
      serverSide: true,
      ajax: "/consulta/ajaxListarConsulta",
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
          searchable: false,
          orderable: false,
          targets: -1,
          data: null,
          render: function (data, type, row, meta) {
            return (
              '<div class="btn-group" role="group">' +
              '<a data="' +
              data[0] +
              '" class="btn btn-warning btn-sm mdi mdi-tooltip-edit text-black btn_editar_consulta" data-toggle="tooltip" title="Editar">' +
              '<i class="fa fa-pen">Editar</i></a>'+
              "</div>"
            );
          },
        },
      ],
    });
  
    // Borrar campos con el boton cerrar
    $("#btn-cerrar").on("click", function () {
      limpiarCampos();
    });
  
    // Modal para agregar cita
    $("button#agregar_consulta").on("click", function (e) {
      $("#btn-guardar-consulta").html("Guardar");
      $("#accion").val("in");
      $("#id").val("");
  
      parametrosModal("#agregar-consulta", "Agregar consulta", "modal-lg", false, true);
    });
  
    // Guardar enfermedad
    $("#frm_guardar_consulta").on("submit", function (e) {
      e.preventDefault();
      $.ajax({
        type: "POST",
        url: "/consulta/guardar_consulta",
        data: $("#frm_guardar_consulta").serialize(),
        dataType: "JSON",
      })
        .done(function (response) {
          if (typeof response.form !== "undefined") {
            mensajeAlert("warning", response.form, "Advertencia");
          }
  
          if (typeof response.exito !== "undefined") {
            $("#tbl_tratamiento_consultas").DataTable().draw();
            $("#agregar-consulta").modal("hide");
            mensajeAlert("success", response.exito, "Exito");
            limpiarCampos();
          }
        })
        .fail(function (e) {
          mensajeAlert("error", "Error al registrar/editar la consulta", "Error");
        });
    });
  
    // Limpiar Campos
    function limpiarCampos() {
      $("#id").val("");
      $("#tratamiento").val("");
      $("#motivo_tratamiento").val("");
      $("#tomando_medicamentos").val("");
      $("#porque_tiempo").val("");
      $("#alergico_medicamento").val("");
      $("#cual_medicamento").val("");
      $("#alguna_cirugia").val("");
      $("#porque").val("");
      $("#saranpion").val("");
      $("#varicela").val("");
      $("#tuberculosis").val("");
      $("#diabetes").val("");
      $("#asma").val("");
      $("#epatitis").val("");
      $("#otras").val("");
      $("#cepilla_diente").val("");
      $("#cuanto_dia").val("");
      $("#accion").val("");
    }
  
    // Editar consulta
    $("#tbl_tratamiento_consultas").on("click", ".btn_editar_consulta", function (e) {
      let id = $(this).attr("data");
      $.ajax({
        type: "POST",
        url: "/consulta/editar_consulta",
        data: {
          id: id,
        },
        dataType: "JSON",
      })
        .done(function (response) {
          $("#id").val(response[0]["id_consulta"]);
          $("#tratamiento").val(response[0]["tratamiento"]);
          $("#motivo_tratamiento").val(response[0]["motivo_tratamiento"]);
          $("#tomando_medicamentos").val(response[0]["tomando_medicamentos"]);
          $("#porque_tiempo").val(response[0]["porque_tiempo"]);
          $("#alergico_medicamento").val(response[0]["alergico_medicamento"]);
          $("#cual_medicamento").val(response[0]["cual_medicamento"]);
          $("#alguna_cirugia").val(response[0]["alguna_cirugia"]);
          $("#porque").val(response[0]["porque"]);
          $("#saranpion").val(response[0]["saranpion"]);
          $("#varicela").val(response[0]["varicela"]);
          $("#tuberculosis").val(response[0]["tuberculosis"]);
          $("#diabetes").val(response[0]["diabetes"]);
          $("#asma").val(response[0]["asma"]);
          $("#epatitis").val(response[0]["epatitis"]);
          $("#otras").val(response[0]["otras"]);
          $("#cepilla_diente").val(response[0]["cepilla_diente"]);
          $("#cuanto_dia").val(response[0]["cuanto_dia"]);
          $("#accion").val("up");
  
          $("#btn-guardar-consulta").html("Editar");
          parametrosModal(
            "#agregar-consulta",
            "Editar consulta",
            "modal-lg",
            false,
            true
          );
        })
        .fail(function (e) {
          $("#agregar-consulta").modal("hide");
        });
    });
  
    
});