$(document).ready(function () {
    // Listado de citas
    $("#tbl_citas_pendientes").DataTable({
      responsive: true,
      processing: true,
      serverSide: true,
      ajax: "/gestionarCita/ajaxListarCitasPendientes",
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
            searchable: true,
            orderable: true,
            visible: false,
            targets: 7
          },
          {
            searchable: false,
            orderable: false,
            visible: true,
            targets: 10,
            data: null,
            render: function (data, type, row, meta) {
              if(data[10]=="PENDIENTE"){
                return('<a type="button" data="' +data[0] +'" class="btn btn-info btn-xs text-white">' +data[10] +' </span>');
              }else if(data[10]=="CANCELADA"){
                return('<a type="button" data="' +data[0] +'" class="btn btn-danger btn-xs text-white">' +data[10] +' </span>');
              }else{
                return('<a type="button" data="' +data[0] +'" class="btn btn-success btn-xs text-white">' +data[10] +' </span>');
              }  
            },
          },
          {
            searchable: true,
            orderable: true,
            visible: false,
            targets: 11
          },
      ],
    });
    $('#tbl_citas_pendientes').on("click", ".nav_citas_pendientes", function(e) {
      $("#content").show();

  })
  

  $("#tbl_citas_atendidas").DataTable({
    responsive: true,
    processing: true,
    serverSide: true,
    ajax: "/gestionarCita/ajaxListarCitasAtendidas",
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
          searchable: true,
          orderable: true,
          visible: false,
          targets: 7
        },
        {
          searchable: false,
          orderable: false,
          visible: true,
          targets: 10,
          data: null,
          render: function (data, type, row, meta) {
            if(data[10]=="PENDIENTE"){
              return('<a type="button" data="' +data[0] +'" class="btn btn-info btn-xs text-white">' +data[10] +' </span>');
            }else if(data[10]=="CANCELADA"){
              return('<a type="button" data="' +data[0] +'" class="btn btn-danger btn-xs text-white">' +data[10] +' </span>');
            }else{
              return('<a type="button" data="' +data[0] +'" class="btn btn-success btn-xs text-white">' +data[10] +' </span>');
            }  
          },
        },
        {
          searchable: true,
          orderable: true,
          visible: false,
          targets: 11
        },
    ],
  });
  $('#tbl_citas_atendidas').on("click", ".nav_citas_atendidas", function(e) {
    $("#content").show();

})

$("#tbl_citas_canceladas").DataTable({
  responsive: true,
  processing: true,
  serverSide: true,
  ajax: "/gestionarCita/ajaxListarCitasCanceladas",
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
        searchable: true,
        orderable: true,
        visible: false,
        targets: 7
      },
      {
        searchable: false,
        orderable: false,
        visible: true,
        targets: 10,
        data: null,
        render: function (data, type, row, meta) {
          if(data[10]=="PENDIENTE"){
            return('<a type="button" data="' +data[0] +'" class="btn btn-info btn-xs text-white">' +data[10] +' </span>');
          }else if(data[10]=="CANCELADA"){
            return('<a type="button" data="' +data[0] +'" class="btn btn-danger btn-xs text-white">' +data[10] +' </span>');
          }else{
            return('<a type="button" data="' +data[0] +'" class="btn btn-success btn-xs text-white">' +data[10] +' </span>');
          }  
        },
      },
      {
        searchable: true,
        orderable: true,
        visible: false,
        targets: 11
      },
  ],
});
$('#tbl_citas_canceladas').on("click", ".nav_citas_canceladas", function(e) {
  $("#content").show();

})


});