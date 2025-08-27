<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?=base_url()?>static/images/image.ico">
    <meta author="Carlos Guadalupe López Trejo">
    <title>Perfil</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="<?=base_url()?>/static/css/estilo.css">

    <script src="<?=base_url()?>static/js/jquery-3.6.1.min.js"></script>
    <script src="<?=base_url()?>static/js/jquery-3.6.1.js"></script>
    <script src="<?=base_url()?>static/js/mensajes.js" ></script>
</head>

<style type="text/css">
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

@media only screen and (min-width: 1001px) and (max-width: 1452px) and (min-height: 810px) and (max-height: 1048px) {
    .inferior2{
       position: fixed;
    bottom: 0;
    width: 100%;
    }
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

    /* Estilos para el contenedor principal */
.container3 {
 width: 100%;
}

/* Estilos para los márgenes y el padding del contenedor principal */
.mx-auto {
  margin-left: auto;
  margin-right: auto;
}
.p-8 {
  padding: 2rem;
}
.mb-7 {
  margin-bottom: 1.75rem;
}

/* Estilos para el encabezado del perfil de usuario */
.text-2xl {
  font-size: 1.5rem;
  line-height: 2rem;
}
.font-bold {
  font-weight: 700;
}
.mb-4 {
  margin-bottom: 1rem;
}

/* Estilos para el contenedor del perfil de usuario */
.bg-white {
  background-color: #fff;
}
.rounded {
  border-radius: 0.50rem;
}
.shadow {
  box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
}
.p-6 {
  padding: 1.5rem;
}
.mb-4 {
  margin-bottom: 1rem;
}
/* Estilos para agregar un margen horizontal de 2 unidades (por ejemplo, píxeles) */
.mx-2 {
  margin-left: 2px; /* Cambia "2px" por el valor que desees */
  margin-right: 2px; /* Cambia "2px" por el valor que desees */
}

/* Otros colores que podrías utilizar para personalizar el botón de éxito */
.btn-blue {
  background-color: #007bff; /* Azul */
}

.btn-red {
  background-color: #dc3545; /* Rojo */
}

.btn-yellow {
  background-color: #ffc107; /* Amarillo */
}

.btn-orange {
  background-color: #fd7e14; /* Naranja */
}

.btn-purple {
  background-color: #6f42c1; /* Morado */
}

.btn-pink {
  background-color: #e83e8c; /* Rosa */
}

.btn-teal {
  background-color: #20c997; /* Turquesa */
}

  @media only screen and (min-width: 20px) and (max-width: 517px) {

        .custom-link{
            margin-top: 10px;
        }

    }

  @media only screen and (min-width: 690px) and (max-width: 920px) and (min-height: 1000px) and (max-height: 1370px) {

        .inferior2{
           position: relative;
            margin-top: 50%;
        }

    }

</style>

  <script>
  var appData = {
    uri_app : "<?= base_url() ?>",
    uri_ws  : "<?= base_url() ?>../webservice/",
    id_cli : "<?= $this->session->id_cli ?>",
    id_usu : "<?= $this->session->id_usu ?>",
}
</script>

<body class="page-contacto">
    <div class="container">
        <?php $this->load->view( "header_view" ); ?>


        <div class="contenedor-contacto">

            <script type="text/javascript">
$(document).ready(function(){
    //alert("hola");
    borra_mensajes();


        $("#btn-guardar").click(function(){

          $(".form-group").keydown(borra_mensajes);
          borra_mensajes();

          let formato = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;

          if ($("#nombre").val()=="") {
              error_formulario("nombre","El nombre es requerído");

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
            "url" : appData.uri_ws+"backend/updatecliente/",
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

});
</script>

  <?php 
$co = $this->db->select("*")->from("cliente")->where("id",$this->session->id_cli)->get()->row();

$nopro = $co->nombre;
$telpro = $co->tel;
$fec_registropro = $co->fec_registro;
$corpro = $co->correo;

$contrasenia = urldecode($this->session->contrasenia);

$arre = $this->db->from("inquilino")->where("id_cli",$this->session->id_cli)->get()->num_rows() > 0 ? 1 : 2;

  ?>
  <div class="container3 mx-auto p-8 mb-7">
    <h1 class="text-2xl font-bold mb-4">Perfil de Usuario</h1>
    <div class="bg-white rounded shadow p-6">

<form method="post">

  <div class="form-group" id="group-nombre">
    <label for="nombre"><strong>Nombre:</strong></label>
    <input type="text" name="nombre" id="nombre" value="<?=$nopro?>" class="form-control" />
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

  <div class="form-group justify-content-center" id="group-contrasenia" style="margin-top: 25px;">
  <a href="<?=base_url()?>Frontend/soli/<?=$this->session->id_usu?>/<?=$this->session->tokenn?>/<?=$this->session->id_cli?>" class="btn btn-blue mx-2" type="button" style="cursor: pointer; color: white; text-decoration: none;">
    <i class="fas fa-users fa-2x"></i>
    Ver solicitudes
  </a>

<?php 
if($arre == 1):
?>
  <a href="<?=base_url()?>Frontend/arrendamiento/<?=$this->session->id_usu?>/<?=$this->session->tokenn?>/<?=$this->session->id_cli?>" class="btn btn-red mx-2 custom-link" type="button" style="cursor: pointer; color: white; text-decoration: none;">
    <i class="fas fa-file-contract fa-2x"></i>
    Ver arrendamiento
  </a>
<?php 
endif;
?>

</div>


  <div class="mt-2 justify-content-center d-flex" style="margin-top: 25px;">
    <button class="btn btn-success mx-2" type="button" id="btn-guardar" name="btn-guardar" style="cursor: pointer;">
      <i class="fas fa-save fa-2x"></i>
      Guardar
    </button>
    <a href="<?=base_url()?>Frontend/insesion" class="btn btn-secondary mx-2" style="text-decoration: none;">
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

        </div>

    </div>

    <br><br>


    <footer class="inferior2">
            <?php $this->load->view( "footer_view" );?>
    </footer>

<script src="<?=base_url()?>static/js/script.js"></script>
<script src="<?=base_url()?>static/js/mensaje.js"></script>

</body>

</html>