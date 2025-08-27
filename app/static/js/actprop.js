$(document).ready(function(){
	borra_mensajes();

    $("form").submit(function(event) {
      event.preventDefault();

      const desc = document.getElementById('desc').value;

		var formulario = $("form");

$(".form-group").keydown(borra_mensajes);
      borra_mensajes();

    const fotoInput = document.getElementById('foto1');
	const foto = fotoInput.files[0];
	var formData = new FormData();
	formData.append('foto1', foto);

	const allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
    let formato = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;

    if ($("#correo_propietario").val()) {
        if (!formato.test($("#correo_propietario").val())) {
        error_formulario("correo_propietario","El formato de correo es incorrecto");

        return false;
    }

    }

    if ($("#telefono_propietario").val()) {
        if ($("#telefono_propietario").val().length != 10) {
        error_formulario("telefono_propietario","por favor ingrese un número valido");

        return false;
    }

    }

    if ($("#titulo").val() == "") {
        error_formulario("titulo", "El título es requerido");
        return false;
      }
     else if (desc.trim() !== "" && desc.length > 900) {
        error_formulario("desc", "La descripción no debe superar los 900 caracteres");
        return false;
      }
      else if ($("#tipo").val() == "0") {
        error_formulario("tipo", "El tipo de propiedad es requerido");
        return false;
    }
    else if ($("#estado").val() == "0") {
        error_formulario("estado", "El estado de propiedad es requerido");
        return false;
    }
    else if ($("#col").val() == "") {
        error_formulario("col", "La colonia es requerida");
        return false;
    } 
    else if ($("#precio").val() == "") {
        error_formulario("precio", "El precio es requerido");
        return false;
    }
    else if ($("#moneda").val() == "0") {
        error_formulario("moneda", "El tipo de moneda es requerido");
        return false;
    }
  else if ($("#pais").val() == "0") {
        error_formulario("pais", "El país es requerido");
        return false;
    }
    else if ($("#ciudad").val() == "0") {
        error_formulario("ciudad", "La ciudad es requerida");
        return false;
    }
        else {
        
       formulario.unbind("submit").submit();

        
      }
    });
});