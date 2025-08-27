<?php

 $consulta = $this->db->select("tipo")->from("tipo")->join("propiedad","propiedad.id_tipo = tipo.id")->where("propiedad.id",$id_info)->get()->result_array();

 if (!empty($consulta)) {
$tipo = $consulta["0"]["tipo"];
}
else{
  $tipo = "tipo";  
}

$idd = $this->db->select("id_ciu")->from("propiedad")->where("id",$id_info)->get()->result_array();
 if (!empty($idd)) {
    $id_ciu=$idd["0"]["id_ciu"];

    $ci = $this->db->select("nombre")->from("propiedad")->join("ciudad","propiedad.id_ciu = ciudad.id")->where("id_ciu",$id_ciu)->get()->result_array();
    $ciudad=$ci["0"]["nombre"];

    $consulta2 = $this->db->select("*")->from("propiedad")->where("id",$id_info)->get()->result_array();

    $id=$consulta2["0"]["id"];
    $estado=$consulta2["0"]["estado"];
    $precio=$consulta2["0"]["precio"];
    $calle=$consulta2["0"]["calle"];
    $noext=$consulta2["0"]["noext"];
    $col=$consulta2["0"]["col"];
    $titulo=$consulta2["0"]["titulo"];
    $foto=$consulta2["0"]["foto"];
    $habitaciones=$consulta2["0"]["habitaciones"];
    $banios=$consulta2["0"]["banios"];
    $garage=$consulta2["0"]["garage"];
    $pisos=$consulta2["0"]["pisos"];
    $id_propie = $consulta2["0"]["id_propi"];
    $noesta=$consulta2["0"]["noesta"];
    $ancho=$consulta2["0"]["ancho"];
    $fondo=$consulta2["0"]["fondo"];
    $suptot=$consulta2["0"]["suptot"];
    $mconst=$consulta2["0"]["mconst"];
    $ctoser=$consulta2["0"]["ctoser"];
    $mbanios=$consulta2["0"]["mbanios"];
}
else{
    $id_ciu=0;
    $ciudad="ciudad";
    $id=0;
    $estado="estado";
    $precio=0;
    $calle="calle";
    $noext="no";
    $col="colonia";
    $titulo="titulo";
    $foto="foto";
    $habitaciones="habitaciones";
    $banios="baños";
    $garage="garage";
    $pisos="pisos";
    $id_propie = 0;
    $noesta="";
    $ancho="";
    $fondo="";
    $suptot="";
    $mconst="";
    $ctoser="";
    $mbanios="";
}

    

    $consulta3 = $this->db->select("descripcion")->from("descripcion")->where("id_prop",$id_info)->get()->result_array();

    if (!empty($consulta3)) {
    $descripcion = $consulta3["0"]["descripcion"];
}
else{
    $descripcion = "No hay descripción";
}


$mon = $this->db->select("simbolo,signo")->from("propiedad")->join("moneda","propiedad.id_mon = moneda.id")->where("propiedad.id",$id_info)->get()->result_array();

if (!empty($mon)) {
            $simbolo=$mon["0"]["simbolo"];
            $signo=$mon["0"]["signo"];
        }
        else{
           $simbolo="simbolo";
            $signo="signo"; 
        }
$paiss = $this->db->select("pais")->from("ciudad")->join("pais","ciudad.id_pais = pais.id")->where("ciudad.id",$id_ciu)->get()->result_array();

if (!empty($paiss)) {
            $pais=$paiss["0"]["pais"];
        }
        else{
            $pais = "pais";
        }

$consulta7 = $this->db->select("*")->from("propietario")->where("id",$id_propie)->get()->result_array();

if (!empty($consulta7)) {
$propietario_nombre = $consulta7["0"]["nombre"];
$propietario_ap = $consulta7["0"]["ap"];
$propietario_tel = $consulta7["0"]["tel"];
$propietario_correo = $consulta7["0"]["correo"];
}
else{
$propietario_nombre = "";
$propietario_ap = "";
$propietario_tel = "";
$propietario_correo = "";
}

?>
<!DOCTYPE html>
<html lang="es">
<script>

  var appData = {
    uri_app : "<?= base_url() ?>",
    uri_ws  : "<?= base_url() ?>../webservice/",
    id_propied : "<?= $id_info ?>",
}
</script>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?=base_url()?>static/images/image.ico">
    <meta author="Carlos Guadalupe López Trejo">
    <title>Información</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<link rel="stylesheet" href="<?=base_url()?>/static/css/estilomipro.css">
    <script src="<?=base_url()?>static/js/jquery-3.6.1.min.js"></script>
    <script src="<?=base_url()?>static/js/jquery-3.6.1.js"></script>
    <script src="<?=base_url()?>static/js/mensajes.js" ></script>
</head>

<style type="text/css">
     @media only screen and (min-width: 50px) and (max-width: 366px) {

        body {
            width: 366px;
        }

        .header{
            width: 366px;
        }

        .footer {
            width: 366px;
        }


    }

     @media only screen and (min-width: 768px) and (max-width: 1000px) {
  .container {
    justify-content: center;
  }
}


/*
    .container{
          margin: auto;
            justify-content: center  
        }*/
</style>

<body class="page-publicacion">
    <script type="text/javascript">
$(document).ready(function(){
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

        setInterval(solicitud,500);

});
</script>
<?php $this->load->view( "header_propi_view" );?>
    <div class="container">



    <?php 

       $consulta = $this->db->select("*")->from("datos")->where("id",1)->get()->result_array();

    $nombre = $consulta["0"]["nombre"];
    $tel = $consulta["0"]["tel"];
    $fb = $consulta["0"]["fb"];
    $ig = $consulta["0"]["ig"];
    $ws = $consulta["0"]["ws"];
    $corre = $consulta["0"]["correo"];

    ?>




        <div class="contenedor-principal">
            <div class="info-publicacion">
                <section class="info-principal-galeria">
                    <div class="dato1">
                        <span class="estado"><?= $estado ?></span>
                        <span class="precio"><?=$simbolo?> <?=$signo == "?" ? "€" : $signo ?><?= number_format($precio, 2, '.', ',') ?></span>
                    </div>
                    <h2 class="h"><?= $titulo ?></h2>
                    <p> <i class="fa-solid fa-location-pin"></i> <?= $calle ?> <?= $noext ?> <?= $col?>, <?=$ciudad?> <?=$pais?></p>
                    <div class="contenedor-imagen-principal">
                        <img src="<?=base_url()?>static/images/casas/<?=$foto?>"alt="<?=$titulo?>"  >
                    </div>
                    <div class="galeria" id="galeria">

                        <?php $fotos = $this->db->select("*")->from("foto")->where("id_prop",$id_info)->get();
                        $i = 0; ?>

                        <?php foreach ($fotos->result_array() as $foto) : ?>

                            <img class="m" src="<?=base_url()?>static/images/casas/<?=$foto['foto']?>" onclick="abrirModal(this,<?php echo $i ?>)" alt="s">
                            <?php $i++; ?>
                        <?php endforeach ?>

                     
                    </div>
                </section>
                <section class="descripcion">
                    <h3>Descripción</h3>

                   <div class="fila">
                        <div class="dato">
                            <span class="header2">Tipo</span>
                            <span class="valor"><?= $tipo ?></span>
                        </div>
                        <div class="dato">
                            <span class="header2">Estado</span>
                            <span class="valor"><?= $estado ?></span>
                        </div>
                        <div class="dato">
                            <span class="header2">Precio</span>
                            <span class="valor">$<?= number_format($precio, 0, '.', ',') ?></span>
                        </div>

                        <?php
                            if ($habitaciones != "") :
                            ?>
                        <div class="dato">
                            <span class="header2">Habitaciones</span>
                            <span class="valor"><?= $habitaciones ?></span>
                        </div>
                        <?php
                            endif;
                            ?>

                        <?php
                            if ($banios != "") :
                            ?>
                        <div class="dato">
                            <span class="header2">Baños</span>
                            <span class="valor"><?= $banios ?></span>
                        </div>
                        <?php
                            endif;
                        ?>

                    </div>

                    <div class="fila">

                        <?php
                            if ($mbanios != "") :
                            ?>
                        <div class="dato">
                            <span class="header2">Medios Baños</span>
                            <span class="valor"><?= $mbanios ?></span>
                        </div>
                        <?php
                            endif;
                        ?>
                        <div class="dato">
                            <span class="header2">Ancho</span>
                            <span class="valor"><?= $ancho ?></span>
                        </div>
                        <div class="dato">
                            <span class="header2">Fondo</span>
                            <span class="valor"><?= $fondo ?></span>
                        </div>
                        <div class="dato">
                            <span class="header2">Superficie Total</span>
                            <span class="valor"><?= $suptot ?></span>
                        </div>

                        <?php
                            if ($pisos != "") :
                            ?>
                        <div class="dato">
                            <span class="header2">Pisos</span>
                            <span class="valor"><?= $pisos ?></span>
                        </div>
                        <?php
                            endif;
                        ?>

                    </div>

                    <div class="fila">

                        <?php
                            if ($garage != "noMo") :
                            ?>
                        <div class="dato">
                            <span class="header2">Garage</span>
                            <span class="valor"><?= $garage ?></span>
                        </div>
                        <?php
                            endif;
                        ?>


                        <?php
                            if ($ctoser != "noMo") :
                            ?>
                        <div class="dato">
                            <span class="header2">Cuarto de Servicio</span>
                            <span class="valor"><?= $ctoser ?></span>
                        </div>
                        <?php
                            endif;
                        ?>


                        <?php
                            if ($noesta != "") :
                            ?>
                        <div class="dato">
                            <span class="header2">Estacionamientos</span>
                            <span class="valor"><?= $noesta ?></span>
                        </div>
                        <?php
                            endif;
                        ?>


                        <?php
                            if ($mconst != "") :
                            ?>
                        <div class="dato">
                            <span class="header2">Metros de Construcción</span>
                            <span class="valor"><?= $mconst ?></span>
                        </div>
                        <?php
                            endif;
                        ?>


                        <div class="dato">
                            <span class="header2">Ciudad</span>
                            <span class="valor"><?= $ciudad ?> </span>
                        </div>
                    </div>

                    <style type="text/css">
                         .map-container {
                          height: 200px;
                        }


                    </style>

                    <div class="detalle"><?=$descripcion ?></div>
                </section>
                <section class="compartir">
                    <h3>Ubicación</h3>

                    <!-- Coloca el elemento contenedor del mapa -->
                    <div id="map1" class="map-container"></div>

                    <script>

                      function initMap() {
                      var id = <?= $id_info ?>;

                      $.ajax({
                        "url": appData.uri_ws + "backend/getubi/",
                        "dataType": "json",
                        "type": "post",
                        "data": {
                          "id": id
                        }
                      })
                      .done(function(data) {
                        var location = data[0]; // Acceder al primer objeto del arreglo
                        var lat = parseFloat(location.lat);
                        var lng = parseFloat(location.lng);

                        if (lat == 0.000000000000 && lng == 0.000000000000) {
                            lat = null;
                            lng = null;
                        }

                        var map = new google.maps.Map(document.getElementById("map1"), {
                          zoom: 15,
                          center: { lat: lat, lng: lng }
                        });

                        var marker = new google.maps.Marker({
                          position: { lat: lat, lng: lng },
                          map: map
                        });
                        
                      });

                    }


                    </script>
                    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDZ7TvV1KlSm2HKZbZ0GvkovPDFkV1O-0Y&callback=initMap" async defer></script>

                </section>


            </div>
<?php 
$co = $this->db->select("*")->from("propietario")->where("id",$this->session->id_cli)->get()->row();

$nopro = $co->nombre;
$telpro = $co->tel;
$app = $co->ap;
$fec_registropro = $co->fec_registro;
$corpro = $co->correo;

function fecha($sFecha) {
    // Convierte un String en arreglo
    $aFecha = explode("-", $sFecha);

    $aMes = ["enero", "febrero", "marzo", "abril", "mayo", "junio",
        "julio", "agosto", "septiembre", "octubre", "noviembre", "diciembre"];

    return number_format($aFecha[2]) . " de " . $aMes[$aFecha[1] - 1] . " de " . $aFecha[0];


}
?>

<div class="form-contacto-publicacion bg-gray-100 p-4 mx-auto">
  <h3 class="text-2xl font-bold mb-4 text-center">Información del Propietario</h3>
  <div class="flex items-center mb-4 mt-3">
    <i class="fas fa-user text-gray-600 mr-2"></i>
    <p class="text-gray-800"><strong>Nombre del propietario:</strong> <?= $nopro ?> <?= $app ?></p>
  </div>
  <div class="flex items-center mb-4">
    <i class="fas fa-phone text-gray-600 mr-2"></i>
    <p class="text-gray-800"><strong>Teléfono:</strong> <?= $telpro ?></p>
  </div>
  
  <div class="flex items-center">
    <i class="fas fa-envelope text-gray-600 mr-2"></i>
    <p class="text-gray-800"><strong>Correo electrónico:</strong> <?= $corpro ?></p>
  </div>
  <div class="flex items-center mb-4">
    <i class="fas fa-calendar-alt text-gray-600 mr-2"></i>
    <p class="text-gray-800"><strong>Fecha de Unión:</strong> <?= fecha($fec_registropro) ?></p>
  </div>
</div>





<style type="text/css">
    .imagen-casa {
    width: 200px; /* Ajusta el ancho deseado */
    height: 450px; /* Ajusta el alto deseado */
    /* Otros estilos adicionales si es necesario */
}

</style>

            <!-- The Modal para visualizar la galería de fotos -->
            <div id="myModal" class="modal">
                <!-- Modal content -->
                <div class="modal-content">
                    <img src="" alt="" id="fotoModal" class="imagen-casa">
                    <span class="close">&times;</span>
                    <span onclick="anterior()"><i class="fa-solid fa-angles-left"></i></span>
                    <span onclick="proxima()"><i class="fa-solid fa-angles-right"></i></span>
                </div>
            </div>
        </div>

<?php $this->load->view( "footer_propi_view" );?>

    <script src="<?=base_url()?>static/js/script.js"></script>

</body>

</html>