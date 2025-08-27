$(document).ready(function(){
	borra_mensajes();

    $("form").submit(function(event) {
      event.preventDefault();

		var formulario = $("form");

$(".form-group").keydown(borra_mensajes);
      borra_mensajes();

    let formato = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;

const wsa = document.getElementById('ws').value;


if ($("#nombre").val() == "") {
        error_formulario("nombre", "El nombre de la empresa es requerido");
        return false;
      }
    else if ($("#calle").val() == "") {
        error_formulario("calle", "La calle es requerida");
        return false;
      }
    else if ($("#colonia").val() == "") {
        error_formulario("colonia", "La colonia es requerida");
        return false;
    }
    else if ($("#numero").val() == "") {
        error_formulario("numero", "El número es requerido");
        return false;
    } 
    else if ($("#cp").val() == "") {
        error_formulario("cp", "El CP es requerido");
        return false;
    } 
    else if ($("#cp").val().length != 5) {
        error_formulario("cp", "Ingresa un CP correcto");
        return false;
    } 
    else if ($("#ciudad").val() == "") {
        error_formulario("ciudad", "La ciudad es requerida");
        return false;
    }
    else if ($("#estado").val() == "") {
        error_formulario("estado", "El estado es requerido");
        return false;
    }
    else if ($("#pais").val() == "") {
        error_formulario("pais", "El pais es requerido");
        return false;
    }
    else if ($("#tel").val() == "") {
        error_formulario("tel", "El número de teléfono es requerido");
        return false;
    }
    else if ($("#correo").val() == "") {
        error_formulario("correo", "El correo es requerido");
        return false;
    }
    else if (!formato.test($("#correo").val())) {
        error_formulario("correo","El formato de correo es incorrecto");
        return false;
    }
    else if ($("#horario").val() == "") {
        error_formulario("horario", "El horario es requerido");
        return false;
    }
    else if(wsa.trim() !== "" && wsa.length != 10){
            error_formulario("ws", "Por favor ingresa un número correcto");
            return false;
    }
    else if ($("#user").val() == "") {
        error_formulario("user", "El nombre es requerido");
        return false;
    }
    else if ($("#password").val() == "") {
        error_formulario("password", "La contraseña es requerida");
        return false;
    }
    else if ($("#correo2").val() == "") {
        error_formulario("correo2", "El correo es requerido");
        return false;
    }
    else if (!formato.test($("#correo2").val())) {
        error_formulario("correo2","El formato de correo es incorrecto");
        return false;
    }

        else {
    
   $.ajax({
    "url": appData.uri_ws + "backend/updatedatos",
    "dataType": "json",
    "type": "post",
    "data": {
        "id_usuario": appData.id_usu,
        "nombre": $("#nombre").val(),
        "calle": $("#calle").val(),
        "colonia": $("#colonia").val(),
        "numero": $("#numero").val(),
        "cp": $("#cp").val(),
        "ciudad": $("#ciudad").val(),
        "estado": $("#estado").val(),
        "pais": $("#pais").val(),
        "tel": $("#tel").val(),
        "correo": $("#correo").val(),
        "horario": $("#horario").val(),
        "fb": $("#fb").val(),
        "ig": $("#ig").val(),
        "tik": $("#tik").val(), // Corregido el nombre del campo aquí
        "ws": $("#ws").val(),
        "lat": $("#lat").val(),
        "lng": $("#lng").val(),
        "administrador": $("#user").val(),
        "password": $("#password").val(),
        "correoad": $("#correo2").val()
    }
})
.done(function(obj) {
    if(obj.resultado){
        alert(obj.mensaje);
        formulario.unbind("submit").submit();
    } else {
        alert(obj.mensaje); 
    }
});
       
      }
    });
});