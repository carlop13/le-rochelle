$(document).ready(function() {

  $("#re").submit(function(event) {
    event.preventDefault();

    $(".form-control").keydown(borra_mensajes);
      borra_mensajes();

      let formato = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;

      if ($("#nombre").val() == "") {
        error_formulario("nombre", "El nombre es requerido");
        return false;
      }
      else if ($("#cor").val() == "") {
        error_formulario("cor", "El correo es requerido");
        return false;
      }
      else if (!formato.test($("#cor").val())) {
        error_formulario("cor","El formato de correo es incorrecto");

        return false;
    }
    else if ($("#tel").val() == "") {
        error_formulario("tel", "El teléfono es requerido");
        return false;
      }

    else if ($("#tel").val().length != 10) {
        error_formulario("tel", "Por favor introduce un número correcto");
        return false;
      }
      else if ($("#contra").val()=="") {
    error_formulario("contra","La contraseña es requerída");

    return false;
  }

  else if ($("#contra").val().length < 8) {
    error_formulario("contra","La contraseña debe contener por lo menos 8 caracteres");

    return false;
  }
  else{
     $.ajax({
        "url"   :   appData.uri_ws + "backend/registracli/",
        "dataType"  :   "json",
        "type"  :   "post",
        "data"  :   {
        "nombre" : $("#nombre").val(),
        "correo" : $("#cor").val(),
        "tel" : $("#tel").val(),
        "password" : $("#contra").val()
      }

    })
    .done( function( obj ) {
        if (obj.resultado) {
          var correo = $("#cor").val();
    alert(obj.mensaje);
      $(location).attr("href",appData.uri_app+"frontend/insesion/"+correo);
  }
  else{
    alert(obj.mensaje);
  }
    })
  }

    });



  $("#lo").submit(function(event) {
    event.preventDefault();

    $(".form-control").keydown(borra_mensajes);
      borra_mensajes();

      let formato = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;

      if ($("#corr").val() == "") {
        error_formulario("corr", "El correo es requerido");
        return false;
      }
      else if (!formato.test($("#corr").val())) {
        error_formulario("corr","El formato de correo es incorrecto");

        return false;
    }
    else if ($("#con").val()=="") {
    error_formulario("con","La contraseña es requerída");

    return false;
  }

  else if ($("#con").val().length < 8) {
    error_formulario("con","La contraseña debe contener por lo menos 8 caracteres");

    return false;
  }
  else{
    $.ajax({
  "url": appData.uri_ws+"backend/verificausuario/",
  "dataType" : "json",
  "type" : "post",
  "data" : {
    "correo" : $("#corr").val(),
    "contrasenia" : $("#con").val()
  }
})
  .done(function(obj){

  if (obj.resultado) {
    var contra = $("#con").val();
    alert(obj.mensaje);
      $(location).attr("href",appData.uri_app + "Acceso/inicio/"+obj.id_usu+"/"+obj.tokenn+"/"+obj.nomcli+"/"+contra+"/"+obj.correo+"/"+obj.id_cli+"/"+obj.tipo+"/"+obj.tel+"/"+obj.ap);
  }
  else{
    alert(obj.mensaje);
  }

})

return true


  }

  });
});