<?php

$consulta = $this->db->select("*")->from("datos")->where("id",1)->get()->result_array();

    $nombre = $consulta["0"]["nombre"];
    $tel = $consulta["0"]["tel"];
    $correo = $consulta["0"]["correo"];
    $horario = $consulta["0"]["horario"];

    $calle = $consulta["0"]["calle"];
    $numero = $consulta["0"]["numero"];
    $colonia = $consulta["0"]["colonia"];
    $cp = $consulta["0"]["cp"];
    $ciudad = $consulta["0"]["ciudad"];
    $estado = $consulta["0"]["estado"];
    $pais = $consulta["0"]["pais"];
    $fb = $consulta["0"]["fb"];
    $ig = $consulta["0"]["ig"];
    $ws = $consulta["0"]["ws"];
    $tik = $consulta["0"]["tk"];
    $lat = $consulta["0"]["lat"];
    $lng = $consulta["0"]["lng"];

$consulta2 = $this->db->select("*")->from("administrador")->where("id",1)->get()->row();
$nomead = $consulta2->nombre;
$co = $consulta2->correo;

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <link rel="stylesheet" href="<?=base_url()?>static/css/estilolog.css">
    <link rel="shortcut icon" href="<?=base_url()?>static/images/image.ico">
    <meta author="Carlos Guadalupe López Trejo">
    <script src="<?=base_url()?>static/js/mensajes.js" ></script>
    <title>SAWPLR - Admin</title>
    <script src="<?=base_url()?>static/js/jquery-3.6.1.min.js"></script>
    <script src="<?=base_url()?>static/js/jquery-3.6.1.js"></script>
</head>

<style type="text/css">
    #contenedor-admin {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            max-width: 1500px;
            margin: 0 auto;
            padding: 20px;
        }

    .map-container {
      height: 200px;
    }

    .form-control {
  display: block;
  width: 100%;
  height: calc(1.5em + 0.75rem + 2px);
  padding: 0.375rem 0.75rem;
  font-size: 1rem;
  font-weight: 400;
  line-height: 1.5;
  color: #495057;
  background-color: #fff;
  background-clip: padding-box;
  border: 1px solid #ced4da;
  border-radius: 0.25rem;
  transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
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

.search-container {
    display: flex;
    align-items: center;
    margin-top: 17px;
}

#search-input {
    flex: 1;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 5px;
    margin-right: 10px;
    font-size: 16px;
}

#search-button {
    padding: 8px 15px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s;
    margin-bottom: 19px;
}

#search-button:hover {
    background-color: #0056b3;
}
</style>

<script type="text/javascript">
      var appData = {
    uri_app : "<?= base_url() ?>",
    uri_ws  : "<?= base_url() ?>../webservice/",
    latitude: "<?=$lat?>",
    longitude : "<?=$lng?>",
    id_usu : "<?=$this->session->id_usu?>"
    }
</script>

<body>
    <?php $this->load->view( "header_admin" ); ?>  
    <div id="contenedor-admin">
       <?php $this->load->view( "contenedor_menu" ); ?>

        <div class="contenedor-principal">
            <div id="configuracion" style="width: 1000px;">
                <h2>Configuración del Sitio Web</h2>
                <hr>
                <form action="" method="post">

                    <input type="hidden"
                   class="form-control" 
                   id="lat"
                   name="lat"
                   value="<?=$lat?>" />

                   <input type="hidden"
                   class="form-control" 
                   id="lng"
                   name="lng"
                   value="<?=$lng?>" />

                    <div class="box-configuracion">
                        <h3>1 - Configure la información de contacto</h3>

                    <div class="form-group" id="group-nombre">
                        <label for="nombre">Nombre</label>
                        <input type="text" value="<?= $nombre ?>" id="nombre" placeholder="Nombre de la empresa" name="nombre" class="input-entrada-texto">
                    </div>

                    <div class="form-group" id="group-calle">
                        <label for="calle">Calle</label>
                        <input type="text" value="<?= $calle ?>" id="calle" placeholder="Calle" name="calle" class="input-entrada-texto">
                    </div>

                    <div class="form-group" id="group-colonia">
                        <label for="colonia">Colonia</label>
                        <input type="text" value="<?= $colonia ?>" placeholder="Colonia" id="colonia" name="colonia" class="input-entrada-texto">
                    </div>
                        
                    <div class="form-group" id="group-numero">
                        <label for="numero">Número</label>
                        <input type="number" value="<?= $numero ?>" placeholder="Número" id="numero" name="numero" class="input-entrada-texto">
                    </div>

                    <div class="form-group" id="group-cp">
                        <label for="cp">CP</label>
                        <input type="number" value="<?= $cp ?>" placeholder="CP" id="cp" name="cp" class="input-entrada-texto"> 
                    </div>

                    <div class="form-group" id="group-ciudad">
                        <label for="ciudad">Ciudad</label>
                        <input type="text" value="<?= $ciudad ?>" placeholder="Ciudad" id="ciudad" name="ciudad" class="input-entrada-texto"> 
                    </div>

                    <div class="form-group" id="group-estado">
                        <label for="estado">Estado</label>
                        <input type="text" value="<?= $estado ?>" placeholder="Estado" id="estado" name="estado" class="input-entrada-texto"> 
                    </div>

                    <div class="form-group" id="group-pais">
                        <label for="pais">País</label>
                        <input type="text" value="<?= $pais ?>" placeholder="País" id="pais" name="pais" class="input-entrada-texto">
                    </div>

                    <div class="form-group" id="group-tel">
                        <label for="tel">Teléfono</label>
                        <input type="text" value="<?= $tel ?>" placeholder="Número de Teléfono" id="tel" name="tel" class="input-entrada-texto">
                    </div>

                    <div class="form-group" id="group-correo">
                        <label for="correo">Correo Electrónico</label>
                        <input type="text" value="<?= $correo ?>" placeholder="Correo" id="correo" name="correo" class="input-entrada-texto">
                    </div>

                    <div class="form-group" id="group-horario">
                        <label for="horario">Horarios</label>
                        <input type="text" value="<?= $horario ?>" placeholder="Horario" id="horario" name="horario" class="input-entrada-texto">
                    </div>

                    <div class="form-group" id="group-fb">
                        <label for="fb">Facebook (dirección url)</label>
                        <textarea cols="150" placeholder="Dirección de facebook" id="fb" name="fb" class="input-entrada-texto"><?= $fb ?></textarea>
                    </div>

                    <div class="form-group" id="group-ig">
                        <label for="ig">Instagram (dirección url)</label>
                        <textarea cols="150" placeholder="Dirección de Instagram" id="ig" name="ig" class="input-entrada-texto"><?= $ig ?></textarea>
                    </div>

                    <div class="form-group" id="group-tik">
                        <label for="tik">Tiktok (dirección url)</label>
                        <textarea cols="150" placeholder="Dirección de Tiktok" id="tik" name="tik" class="input-entrada-texto"><?= $tik ?></textarea>
                    </div>

                    <div class="form-group" id="group-ws">
                        <label for="ws">Whatsapp (número)</label>
                        <input type="text" value="<?= $ws ?>" placeholder="Número de Whatsapp" id="ws" name="ws" class="input-entrada-texto">
                    </div>

                <div class="form-group" id="group-ma">
                    <label for="ma">Ubicación: (Haz clic para agregar nueva ubicación)</label>
                    <div id="mapa" class="map-container"></div>
                    <div class="search-container">
                    <input id="search-input" type="text" placeholder="Buscar dirección">
                    <button type="button" id="search-button">
                    <i class="fas fa-search"></i> Buscar
                    </button>
                    </div>
                </div>

                    </div>

                    <div class="box-configuracion">
                        <h3>2 - Configure la información del administrador</h3>

                    <div class="form-group" id="group-user">    
                        <label for="user">Nombre de usuario</label>
                        <input type="text" value="<?= $nomead ?>" placeholder="Nombre de usuario" id="user" name="user" class="input-entrada-texto" >
                    </div>

                    <div class="form-group" id="group-password">
                        <label for="password">Password</label>

                        <input type="password" value="<?= $this->session->contrasenia ?>" placeholder="Contraseña" id="password" name="password" class="input-entrada-texto">

                        <button id="mostrarContrasenia" type="button" style="background: transparent; border: transparent; color: black;"><i class="fas fa-eye" style="color: black; cursor: pointer;"></i></button>
                    </div>

                    <div class="form-group" id="group-correo2">
                        <label for="correo2">Correo electrónico del administrador</label>
                        <input type="text" value="<?= $co ?>" placeholder="Correo Electrónico" name="correo2" id="correo2" class="input-entrada-texto" >
                    </div>

                    </div>
                    <style>
                        .box-configuracion2 {
                            text-align: center;
                        }

                        .btn-respaldo {
                            display: inline-block;
                            padding: 10px 20px;
                            background-color: #4CAF50;
                            color: #fff;
                            text-decoration: none;
                            border-radius: 5px;
                            transition: background-color 0.3s, transform 0.3s;
                        }

                        .btn-respaldo:hover {
                            background-color: #45a049;
                            transform: scale(1.1);
                        }
                    </style>

                    <div class="box-configuracion">
                        <h3>3 - Respaldo de Base de Datos</h3>

                        <div class="form-group box-configuracion2" id="group-respaldo">
                            <a href="<?= base_url() ?>../webservice/BackupController/backupDatabase" class="btn-respaldo">Realizar respaldo SQL</a>
                        </div>
                    </div>
                    <br>
                    <input type="submit" value="Guardar Configuración" name="guardar" class="btn-accion">
                </form>


            </div>
        </div>
    </div>

<script>
  // Obtiene el campo de contraseña y el botón
  const contraseniaInput = document.getElementById('password');
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

    <script>
        $('#link-configuracion').addClass('pagina-activa');
    </script>

    <script src="<?=base_url()?>static/js/script2.js"></script>
    <script src="<?=base_url()?>static/js/ubi3.js"></script>
    <script src="<?=base_url()?>static/js/config.js"></script>

    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDZ7TvV1KlSm2HKZbZ0GvkovPDFkV1O-0Y&callback=iniciomapa" 
    type="text/javascript"></script>


</body>

</html>