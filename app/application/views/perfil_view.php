<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?=base_url()?>static/images/image.ico">
    <meta author="Carlos Guadalupe López Trejo">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <script src="<?=base_url()?>static/js/jquery-3.6.1.min.js"></script>
  <script src="<?=base_url()?>static/js/jquery-3.6.1.js"></script>
  <script src="<?=base_url()?>static/js/mensajes.js" ></script>
  <title>Perfil de Usuario</title>

  <script>

  var appData = {
    uri_app : "<?= base_url() ?>",
    uri_ws  : "<?= base_url() ?>../webservice/",
    id_propied : "<?= $id_info ?>",
    id_cli : "<?= $this->session->id_cli ?>",
    id_usu : "<?= $this->session->id_usu ?>",
}
</script>

  <style>
     body {
            background-color: #d4d7d9;
        }
  /* Estilos adicionales */
        .header {
            background-color: #0d083b;
        }
        .nav-link {
            font-size: 14px;
            padding: 10px;
            color: #fff;
            display: inline-block;
            text-decoration: none;
            font-weight: bold;
            margin: 0 10px;
            transition: .5s;
            border-radius: 50px;
        }
        .nav-link:hover {
            background-color: #de4547;
            font-size: 14px;
            color: #fff;
            display: inline-block;
            text-decoration: none;
            font-weight: bold;
            margin: 0 10px;
        }
        .welcome-panel {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: calc(100vh - 64px);
            background-color: #f8f8f8;
        }
        .welcome-panel-content {
            text-align: center;
        }
        .welcome-panel-heading {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .welcome-panel-description {
            font-size: 18px;
            margin-bottom: 40px;
        }
        .welcome-panel-button {
            padding: 10px 20px;
            font-size: 16px;
            background-color: #4f46e5;
            color: #fff;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }
        .welcome-panel-button:hover {
            background-color: #433be0;
        }

        .footer {
        width: 100%;
        background-color: #1b1b38;
        color: #d4d4d9;
        text-align: center;
        padding: 5px;
      }

     .badge {
      display: inline-block;
      background-color: red;
      color: white;
      border-radius: 50%;
      padding: 4px;
      font-size: 12px;
      top: -10px;
      margin-left: 4px;
  }

  .form-group {
  margin-bottom: 1rem;
}

.form-control {
  display: block;
  width: 100%;
  padding: 0.375rem 0.75rem;
  font-size: 1rem;
  line-height: 1.5;
  color: #495057;
  background-color: #fff;
  background-clip: padding-box;
  border: 1px solid #ced4da;
  border-radius: 0.25rem;
  transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}

.btn {
  display: inline-block;
  font-weight: 400;
  text-align: center;
  white-space: nowrap;
  vertical-align: middle;
  user-select: none;
  border: 1px solid transparent;
  padding: 0.375rem 0.75rem;
  font-size: 1rem;
  line-height: 1.5;
  border-radius: 0.25rem;
  transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}

.btn-success {
  color: #fff;
  background-color: #1a8232;
  border-color: #1a8232;
}

.btn-secondary {
  color: #fff;
  background-color: #6c757d;
  border-color: #6c757d;
}

.mt-2 {
  margin-top: 0.5rem;
}

.justify-content-center {
  justify-content: center;
}

.d-flex {
  display: flex;
}

.form-group {
  margin-bottom: 1rem;
}

.invalid-feedback {
  width: 100%;
  margin-top: 0.25rem;
  font-size: 80%;
  color: #dc3545;
}

.is-invalid {
  border-color: #dc3545;
  padding-right: calc(1.5em + 0.75rem);
  background-repeat: no-repeat;
  background-position: right calc(0.375em + 0.1875rem) center;
  background-size: calc(0.75em + 0.375rem) calc(0.75em + 0.375rem);
}

.hidden {
  display: none;
}

 @media only screen and (min-width: 50px) and (max-width: 366px) {

        body {
            width: 366px;
        }
    }

     @media only screen and (min-height: 900px) and (max-height: 1400px) {

        footer {
           position: fixed;
           bottom: 0;
        }
    }
  </style>
 
</head>
<body class="bg-gray-100">

  <script type="text/javascript">
$(document).ready(function(){
    //alert("hola");
    borra_mensajes();

        function solicitud(){
          $.ajax({
            "url" : appData.uri_ws+"backend/getsolicitud/",
            "dataType" : "json",
            "type"  :   "post",
            "data"  :   {
                "id" : appData.id_propied
            }

          })
          .done(function(obj){
            document.getElementById("solicitudes").innerText = obj;
          });
        }

        $("#btn-guardar").click(function(){

          $(".form-group").keydown(borra_mensajes);
          borra_mensajes();

          let formato = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;

          if ($("#nombre").val()=="") {
              error_formulario("nombre","El nombre es requerído");

              return false;
            }

          else if ($("#ap").val()=="") {
              error_formulario("ap","El apellido es requerído");

              return false;
            }

          if ($("#cor").val()=="") {
              error_formulario("cor","El correo es requerído");

              return false;
            }

          else if (!formato.test($("#cor").val())) {
              error_formulario("cor","El formato de correo es incorrecto");

              return false;
            }

          else if ($("#tel").val()=="") {
                error_formulario("tel","El teléfono es requerído");

                return false;
            }

        else if ($("#tel").val().length !== 10) {
                error_formulario("tel","Ingresa un teléfono válido");

                return false;
            }

        else if ($("#contrasenia").val()=="") {
                error_formulario("contrasenia","La contraseña es requerída");

                return false;
            }

        else if ($("#contrasenia").val().length < 8) {
                error_formulario("contrasenia","La contraseña debe contener por lo menos 8 caracteres");

                return false;
            }

        else{
          $.ajax({
            "url" : appData.uri_ws+"backend/updatepropietario/",
            "dataType" : "json",
            "type"  :   "post",
            "data"  :   {
                "id_cli" : appData.id_cli,
                "id_usu" : appData.id_usu,
                "nombre" : $("#nombre").val(),
                "ap" : $("#ap").val(),
                "correo" : $("#cor").val(),
                "password" : $("#contrasenia").val(),
                "tel" : $("#tel").val()
            }

          })
          .done(function(obj){
            alert(obj.mensaje);
            if(obj.resultado){
            $(location).attr("href","");
          }
          });
        }

        });

        setInterval(solicitud,300);

});
</script>

  <?php $this->load->view( "header_propi_view" );
$co = $this->db->select("*")->from("propietario")->where("id",$this->session->id_cli)->get()->row();

$nopro = $co->nombre;
$ap = $co->ap;
$telpro = $co->tel;
$fec_registropro = $co->fec_registro;
$corpro = $co->correo;

$contrasenia = urldecode($this->session->contrasenia);

  ?>
  <div class="container mx-auto p-8 mb-7">
    <h1 class="text-2xl font-bold mb-4">Perfil de Usuario</h1>
    <div class="bg-white rounded shadow p-6 mb-4">

<form method="post">

  <div class="form-group" id="group-nombre">
    <label for="nombre"><strong>Nombre:</strong></label>
    <input type="text" name="nombre" id="nombre" value="<?=$nopro?>" class="form-control" />
  </div>

  <div class="form-group" id="group-ap">
    <label for="ap"><strong>Apellido:</strong></label>
    <input type="text" name="ap" id="ap" value="<?=$ap?>" class="form-control" />
  </div>

  <div class="form-group" id="group-cor">
    <label for="cor"><strong>Correo:</strong></label>
    <input type="text" name="cor" id="cor" value="<?=$corpro?>" class="form-control" />
  </div>

  <div class="form-group" id="group-tel">
    <label for="tel"><strong>Telefono:</strong></label>
    <input type="number" name="tel" id="tel" value="<?=$telpro?>" class="form-control" />
  </div>

  <div class="form-group" id="group-contrasenia">
    <label for="contrasenia"><strong>Contraseña:</strong></label>
    <input type="password" name="contrasenia" id="contrasenia" value="<?=$contrasenia?>" class="form-control" />
    <button id="mostrarContrasenia" type="button" style="background: transparent; color: black; border: none; cursor: pointer;"><i class="fas fa-eye"></i></button>
  </div>

  <div class="mt-2 justify-content-center d-flex">
    <button class="btn btn-success mx-2" type="button" id="btn-guardar" name="btn-guardar">
      <i class="fas fa-save fa-2x"></i>
      Guardar
    </button>
    <a href="<?=base_url()?>Frontend/insesion" class="btn btn-secondary mx-2">
      <i class="fas fa-arrow-circle-left fa-2x"></i>
      Cancelar
    </a>
  </div>

</form>

<script>
  // Obtiene el campo de contraseña y el botón
  const contraseniaInput = document.getElementById('contrasenia');
  const mostrarContraseniaBtn = document.getElementById('mostrarContrasenia');

  // Agrega un evento de clic al botón
  mostrarContraseniaBtn.addEventListener('click', function() {
    if (contraseniaInput.type === 'password') {
      // Si el campo es de tipo contraseña, cambia a tipo texto
      contraseniaInput.type = 'text';
       mostrarContraseniaBtn.innerHTML = '<i class="fas fa-eye-slash" style="color: black; cursor: pointer;"></i>'; // Cambia el ícono a ojo cerrado
    } else {
      // Si el campo es de tipo texto, cambia a tipo contraseña
      contraseniaInput.type = 'password';
       mostrarContraseniaBtn.innerHTML = '<i class="fas fa-eye" style="color: black; cursor: pointer;"></i>'; // Cambia el ícono a ojo abierto
    }
  });
</script>

    </div>
  </div>
  <?php $this->load->view( "footer_propi_view" );?>
</body>

</html>
