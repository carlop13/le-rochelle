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
    $lat = $consulta["0"]["lat"];
    $lng = $consulta["0"]["lng"];

    ?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?=base_url()?>static/images/image.ico">
    <meta author="Carlos Guadalupe López Trejo">
    <title>Contacto</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="<?=base_url()?>/static/css/estilo.css">

    <script src="<?=base_url()?>static/js/jquery-3.6.1.min.js"></script>
    <script src="<?=base_url()?>static/js/jquery-3.6.1.js"></script>
    <script src="<?=base_url()?>static/js/mensajes.js" ></script>
</head>

<script type="text/javascript">
      var appData = {
    latitude: "<?=$lat?>",
    longitude : "<?=$lng?>",
    uri_app : "<?= base_url() ?>",
    uri_ws  : "<?= base_url() ?>../webservice/"
    }
</script>

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
</style>

<body class="page-contacto">
    <div class="container">
        <?php $this->load->view( "header_view" ); ?>

        <h2 class="titulo-seccion">Contacto</h2>
        <div class="contenedor-contacto">
            <div class="col info">
                <div>
                    <h3> <i class="fa-solid fa-location-dot"></i> Nuestra Oficina Central</h3>
                    <p><?= $calle ?>  <?=$numero?>, <?=$colonia?> , <?=$cp  ?><br><?=$ciudad?>, <?=$estado?>., <?=$pais?> </p>
                </div>

                <div>
                <h3><i class="fa-solid fa-phone"></i> Nuestro teléfono</h3>
                    <p><a style="text-decoration: none; color: inherit;" href="tel:+52 <?=$tel?>">+52 <?=  $tel ?></a></p>
                </div>
                

                <div>
                    <h3><i class="fa-solid fa-envelope"></i> Correo Electrónico</h3>
                    <p><a style="text-decoration: none; color: inherit;" href="mailto: <?=$correo?>"><?= $correo ?></a></p>
                </div>

                <div>
                    <h3><i class="fa-solid fa-clock"></i> Horarios de atención en Oficina</h3>
                    <p><?= $horario ?></p>
                </div>

            </div>

               <style type="text/css">
        
@keyframes jumping {
  0% {
    transform: translateY(0);
  }
  50% {
    transform: translateY(-10px);
  }
  100% {
    transform: translateY(0);
  }
}

.blinking-lin {
  animation: jumping 1s infinite;
}


    </style>

            <div class="col formulario">

                <form action="" method="post">
                    <h3 style="font-size: 19px;" class="blinking-lin">¿Quieres vender o alquilar tu casa? Comunicate con nosotros</h3>
                    <div class="form-control" id="group-nombre">
                        <label for="nombre">Nombre</label>
                        <input type="text" placeholder="Ingrese su nombre" name="nombre" id="nombre">
                    </div>
                    <div class="form-control" id="group-email">
                        <label for="email">Dirección de Correo</label>
                        <input type="text" placeholder="Dirección de Correo" name="email" id="email">
                    </div>
                    <div class="form-control" id="group-telefono">
                        <label for="telefono">Teléfono</label>
                        <input type="number" placeholder="Ingrese su teléfono" name="telefono" id="telefono">
                    </div>
                    <div class="form-control" id="group-mensajee">
                        <label for="mensajee">Mensaje</label>
                        <textarea type="text" placeholder="Escriba su mensaje" name="mensajee" id="mensajee"></textarea>
                    </div>
                    <input type="submit" value="Enviar Mensaje" name="enviar">
                </form>

            </div>
            <div class="col">
                <div id="map" style="width: 100%; height: 450px;"></div>

<script>

    var lati = parseFloat(appData.latitude);
    var lngi = parseFloat(appData.longitude);
    
  function initMap() {
    var location = { lat: lati, lng: lngi };

    var map = new google.maps.Map(document.getElementById("map"), {
      zoom: 15,
      center: location,
    });

    var marker = new google.maps.Marker({
      position: location,
      map: map,
    });
  }


</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDZ7TvV1KlSm2HKZbZ0GvkovPDFkV1O-0Y&callback=initMap" async defer></script>

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