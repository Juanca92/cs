$(document).ready(function () {
    // Listado de citas
    $("#tbl_citas").DataTable({
      responsive: true,
      processing: true,
      serverSide: true,
      ajax: "/gestionarCita/ajaxListarCitas",
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
            targets: 4
          },
          {
            searchable: false,
            orderable: false,
            visible: true,
            targets: 9,
            data: null,
            render: function (data, type, row, meta) {
              if(data[9]=="PENDIENTE"){
                return('<a type="button" data="' +data[0] +'" class="btn btn-info btn-xs text-white">' +data[9] +' </span>');
              }else if(data[9]=="CANCELADA"){
                return('<a type="button" data="' +data[0] +'" class="btn btn-danger btn-xs text-white">' +data[9] +' </span>');
              }else{
                return('<a type="button" data="' +data[0] +'" class="btn btn-success btn-xs text-white">' +data[9] +' </span>');
              }  
            },
          },
          {
            searchable: true,
            orderable: true,
            visible: false,
            targets: 11
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
              '" class="btn btn-warning btn-sm mdi mdi-tooltip-edit text-white btn_editar_cita" data-toggle="tooltip" title="Editar">' +
              '<i class="fa fa-pen"></i></a>' +
              '<a data="' +
              data[0] +
              '" class="btn btn-danger btn-sm mdi mdi-delete-forever text-white btn_eliminar_cita" data-toggle="tooltip" title="Eliminar">' +
              '<i class="fa fa-trash"></i></a>' +
              "</div>"
            ); 
          },
        },
      ],
    });
    
    //incremento de numero en cita 
  $("#tbl_citas").on("change", function(){
    $.ajax({
        type: "POST",
        url: "/gestionarCita/pacientes_pendientes",
        data: {pendiente: pendiente},
        dataType: "JSON"
    }).done(function (respuesta) {
        //console.log(respuesta);
        $("#estatus").val(respuesta.numero_cita);
        // alert("falkdfjaslkfdjsalk")
    }).fail(function(e){
       
    })
})



});