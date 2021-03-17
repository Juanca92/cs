$(document).ready(function () {
  //Cargar datos a la vista con los datos de los usuarios
  const cargar_datos = () => {
    $.ajax({
      type: "POST",
      url: "/perfil/datos_usuario",
      dataType: "JSON",
    }).done(function (response) {
      if (response[0]["foto"] != null) {
        $("#perfil_foto").attr("src", response[0]["foto"]);
      }
      $("#perfil_nombre_completo").html(response[0]["nombre_completo"]);
      $("#perfil_celular").html(response[0]["telefono_celular"]);
      $("#perfil_domicilio").html(response[0]["domicilio"]);
      $("#perfil_nacimiento").html(response[0]["fecha_nacimiento"]);
    });
  };

  // Limpiar datos Actualizar datos
  const limpiar_actualizar_datos = () => {
    $("#telefono").val("");
    $("#domicilio").val("");
    $("#confirmar_datos").prop('checked', false);
  };

  cargar_datos();

  // Actualizar telefono y Direccion
  const aceptado = document.getElementById("confirmar_datos");

  $("#frm_actualizar_datos").on("submit", function (e) {
    e.preventDefault();
    if (aceptado.checked) {
      $.ajax({
        type: "POST",
        url: "/perfil/actualizar_datos",
        data: $("#frm_actualizar_datos").serialize(),
        dataType: "JSON",
      })
        .done(function (response) {
          if (typeof response.form !== "undefined") {
            mensajeAlert("warning", response.form, "Advertencia");
          }

          if (typeof response.exito !== "undefined") {
            cargar_datos();
            mensajeAlert("success", response.exito, "Exito");
            limpiar_actualizar_datos();
          }
        })
        .fail(function (e) {
          mensajeAlert("error", "Error al registrar/editar el Datos", "Error");
        });
    } else {
      mensajeAlert("info", "Por favor confirme sus datos", "Informacion");
    }
  });

  // Cambiar password
  $("#frm_cambiar_password").on("submit", function (e) {
    e.preventDefault();
    e.stopPropagation();
    $.ajax({
      type: "POST",
      url: "/perfil/cambiar_password",
      data: $("#frm_cambiar_password").serialize(),
      dataType: "JSON",
    }).done(function (response) {
      if (typeof response.pass !== "undefined") {
        mensajeAlert("warning", response.pass, "Advertencia");
        $("#password_actual").val("");
        $("#password_actual").focus();
      }

      if (typeof response.rep !== "undefined") {
        mensajeAlert("warning", response.rep, "Advertencia");
        $("#confirmar_password").val("");
        $("#confirmar_password").focus();
      }

      if (typeof response.success !== "undefined") {
        mensajeAlert("success", response.success, "Exito");
      }

      if (typeof response.error !== "undefined") {
        mensajeAlert("error", response.error, "Error");
      }
    });
  });

  // Subir foto

  // Cargando la foto subida
  $("#foto").change(function () {
    var imagen = this.files[0];
    // se valida el formato de la imagen png y jpeg
    if (imagen["type"] != "image/jpeg" && imagen["type"] != "image/png") {
      $("#foto").val("");
      mensajeAlert(
        "error",
        "¡La imagen debe estar en formato JPG o PNG!",
        "Error al subir la imagen"
      );
    } else if (imagen["size"] > 2000000) {
      $("#foto").val("");
      mensajeAlert(
        "error",
        "¡La imagen no debe pesar más de 2MB!",
        "Error al subir la imagen"
      );
    } else {
      var datosImagen = new FileReader();
      datosImagen.readAsDataURL(imagen);

      $(datosImagen).on("load", function (event) {
        var rutaImagen = event.target.result;
        $(".previsualizar").attr("src", rutaImagen);
      });
    }
  });

  // Guardar foto
  $("#frm_actualizar_foto").on("submit", function (e) {
    e.preventDefault();

    $.ajax({
      type: "POST",
      url: "/perfil/subir_foto",
      data: $("#frm_actualizar_foto").serialize(),
      dataType: "JSON",
    }).done(function (response) {
      if (typeof response.warn !== "undefined") {
        mensajeAlert("warning", response.warn, "Advertencia");
        $("#foto").val("");
      }

      if (typeof response.success !== "undefined") {
        mensajeAlert("success", response.success, "Exito");
        cargar_datos();
      }

      if (typeof response.error !== "undefined") {
        mensajeAlert("error", response.error, "Error");
      }
    });
  });
});
