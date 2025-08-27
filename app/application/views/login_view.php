<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=base_url()?>static/css/estilolog.css">
    <link rel="shortcut icon" href="<?=base_url()?>static/images/image.ico">
    <meta author="Carlos Guadalupe López Trejo">
    <title>SAWPLR</title>
    <script src="<?=base_url()?>static/js/jquery-3.6.1.min.js"></script>
    <script src="<?=base_url()?>static/js/jquery-3.6.1.js"></script>
    <script src="<?=base_url()?>static/js/mensajes.js" ></script>
    <link rel="stylesheet" href="<?=base_url()?>static/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">


</head>

    <script>
        var appData = {
        uri_app : "<?= base_url() ?>",
        uri_ws  : "<?= base_url() ?>../webservice/",
        }
    </script>

<script type="text/javascript">
      $(document).ready(function() {
    borra_mensajes();

    $("form").submit(function(event) {
      event.preventDefault();

var formulario = $("form");

$(".form-group").keydown(borra_mensajes);
      borra_mensajes();

      let formato = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;

    if ($("#usuario").val() == "") {
        error_formulario("usuario", "El correo es requerido");
        return false;
      }
      else if (!formato.test($("#usuario").val())) {
        error_formulario("usuario","El formato de correo es incorrecto");

        return false;
    }
       else if ($("#contrasenia").val() == "") {
        error_formulario("contrasenia", "La contraseña es requerida");
        return false;
      }
        else {

        var contasenia = $("#contrasenia").val();
        
        $.ajax({
        "url" : appData.uri_ws + "backend/login/",
        "dataType" : "json",
        "type" : "post",
        "data" : {
            "usuario" : $("#usuario").val(),
            "contrasenia" : $("#contrasenia").val()
        }

    })
    .done(function(obj){
           if (obj.resultado) {
            $(location).attr("href",appData.uri_app + "Accesoad/inicio/"+obj.id_usu+"/"+obj.token+"/"+obj.nomus+"/"+contasenia);
            //formulario.unbind("submit").submit();
           }else{
            alert("Correo o contraseña incorrecto");
            return false;
           }
    })
    .fail(error_ajax);

        
      }
    });

    });
</script>

<body>
    <div id="contenedor-login">
        <div class="presentacion">
            <div class="titulo">
                <div class="d-flex justify-content-center align-items-center vh-40">
                    <img src="<?=base_url()?>static/images/logoleroche.ico" width="200" height="200">
                </div>
                <h2 class="text-center">SAWPLR</h2>
                <p class="text-center">Sistema de Administración Web Para Le Rochelle</p>
            </div>
            <div class="contenedor-formulario">

                <form action="">
                    <p class="text-center">Iniciar sesión como <strong>administrador</strong> </p>


                    <div class="form-group mt-2 text-center" id="group-usuario" style="margin-bottom: 20px;">
                    <input type="text" placeholder="Correo" name="usuario" id="usuario" class="input-login form-control">
                </div>


                    <div class="form-group mt-2" id="group-contrasenia" style="margin-bottom: 20px;">
          <input type="password" placeholder="Contraseña" name="contrasenia" id="contrasenia" class="input-login form-control">
          <button id="mostrarContrasenia" type="button" style="background: transparent; border: transparent; color: black;"><i class="fas fa-eye" style="color: black;"></i></button>
                </div>


                    <input type="submit" value="Iniciar Sesión" name="iniciar" class="btn btn-primary">

                </form>
            </div>

            <script>
  // Obtiene el campo de contraseña y el botón
  const contraseniaInput = document.getElementById('contrasenia');
  const mostrarContraseniaBtn = document.getElementById('mostrarContrasenia');

  // Agrega un evento de clic al botón
  mostrarContraseniaBtn.addEventListener('click', function() {
    if (contraseniaInput.type === 'password') {
      // Si el campo es de tipo contraseña, cambia a tipo texto
      contraseniaInput.type = 'text';
       mostrarContraseniaBtn.innerHTML = '<i class="fas fa-eye-slash"></i>'; // Cambia el ícono a ojo cerrado
    } else {
      // Si el campo es de tipo texto, cambia a tipo contraseña
      contraseniaInput.type = 'password';
       mostrarContraseniaBtn.innerHTML = '<i class="fas fa-eye"></i>'; // Cambia el ícono a ojo abierto
    }
  });
</script>
        </div>
    </div>
</body>

</html>