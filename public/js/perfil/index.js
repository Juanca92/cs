$(document).ready(function () {
  
  // Cargando la foto subida
    $("#foto").change(function () {
        
        var imagen = this.files[0];
        /*=============================================
        VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
        =============================================*/

        if (imagen["type"] != "image/jpeg" && imagen["type"] != "image/png") {
            
            $(".nuevaFoto").val("");
            mensajeAlert("error", "¡La imagen debe estar en formato JPG o PNG!", "Error al subir la imagen");

        } else if (imagen["size"] > 2000000) {
            
            $("#foto").val("");
            mensajeAlert("error", "¡La imagen no debe pesar más de 2MB!", "Error al subir la imagen");
            
        } else {
            var datosImagen = new FileReader();
            datosImagen.readAsDataURL(imagen);

            $(datosImagen).on("load", function (event) {
                var rutaImagen = event.target.result;
                $(".previsualizar").attr("src", rutaImagen);
            });
        }
    });
});
