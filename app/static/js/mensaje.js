$(document).ready(function() {
  borra_mensajes();

$("form").submit(function(event) {
      event.preventDefault();
var formulario = $("form");
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
      var asunto = "Quiero vender o alquilar mi propiedad";


       $.ajax({
    "url": appData.uri_ws + "backend/mensaje",
    "dataType": "json",
    "type": "post",
    "data": {
        "nombre": $("#nombre").val(),
        "email": $("#email").val(),
        "telefono": $("#telefono").val(),
        "mensajee": $("#mensajee").val()
    }
})
.done(function(obj) {

    if(obj.resultado){

    var url = "https://api.callmebot.com/whatsapp.php?phone=5214423535507&text=Asunto: "+asunto+"%0D%0A%0D%0ANombre: "+nombre+"%0D%0A%0D%0ACorreo: "+correo+"%0D%0A%0D%0ATeléfono: "+tel+"%0D%0A%0D%0AMensaje: "+men+"&apikey=9914603";
    //fetch(url);

      alert(obj.mensaje); 

    formulario.unbind("submit").submit();

    } else {
        alert(obj.mensaje); 
    }

});


  
}

  });

});