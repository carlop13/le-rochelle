$(document).ready(function() {
  borra_mensajes();

  $("#mensaje").submit(function(event) {
    event.preventDefault();

    $(".form-control").keydown(borra_mensajes);
      borra_mensajes();

      let formato = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;

      if ($("#nombre").val() == "") {
        error_formulario("nombre", "El nombre es requerido");
        return false;
      }
      else if ($("#email").val() == "") {
        error_formulario("email", "El correo es requerido");
        return false;
      }
      else if (!formato.test($("#email").val())) {
        error_formulario("email","El formato de correo es incorrecto");

        return false;
    }
       else if ($("#telefono").val() == "") {
        error_formulario("telefono", "El teléfono es requerido");
        return false;
      }

    else if ($("#telefono").val().length != 10) {
        error_formulario("telefono", "Por favor introduce un número correcto");
        return false;
      }

     else if ($("#mensajee").val() == "") {
        error_formulario("mensajee", "El mensaje es requerido");
        return false;
      }

      else if ($("#mensajee").val().length > 150) {
        error_formulario("mensajee", "El mensaje no debe ser mayor a 150 caracteres");
        return false;
      }

      else {

    var nombre = $("#nombre").val();
    var correo = $("#email").val();
    var tel = $("#telefono").val();
    var men = $("#mensajee").val();
    var asunto = 'Me interesa una propiedad';
    var titulo = appData.titulo;
    var link = appData.uri_app+"frontend/informacion/"+appData.num;

    var url = "https://api.callmebot.com/whatsapp.php?phone=5214423535507&text=Asunto: " + asunto + "%0D%0A%0D%0AEstado de la Propiedad: " + appData.estado + "%0D%0A%0D%0ALink de la Propiedad: " + link + "%0D%0A%0D%0ATítulo de la Propiedad: " + titulo + "%0D%0A%0D%0ANombre del Propietario: " + appData.nomb + " " + appData.ap + "%0D%0A%0D%0ATeléfono del Propietario: " + appData.tel + "%0D%0A%0D%0ACorreo del Propietario: " + appData.cor + "%0D%0A%0D%0A%0D%0ANombre: " + nombre + "%0D%0A%0D%0ACorreo: " + correo + "%0D%0A%0D%0ATeléfono: " + tel + "%0D%0A%0D%0AMensaje: " + men +  "&apikey=9914603";
   //fetch(url);
    alert("Mensaje enviado, nos estaremos comunicando con usted");

    $(this).unbind("submit").submit();
  }

  });
});
