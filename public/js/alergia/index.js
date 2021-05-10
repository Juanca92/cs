// traendo tabla de alergias
$(document).ready(function () {
    // Listado de alergias
    $("#tbl_tratamiento_alergias").DataTable({
      responsive: true,
      processing: true,
      serverSide: true,
      ajax: "/alergia/ajaxListarAlergias",
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
    url: "/alergia/guardar_alergia",
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
    mensajeAlert("error", "Error al registrar/editar las alergias", "Error");
});
});
// Limpiar Campos
function limpiarCampos() {
$("#id").val("");
$("#nombre_alergia").val("");
$("#detalle").val("");
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
bootbox.confirm("¿Estas seguro de eliminar las alergias?", function (result) {
if (result) {
$.ajax({
  type: "POST",
  url: "/alergia/eliminar_alergia",
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
});
