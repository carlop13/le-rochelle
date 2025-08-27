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


    <style type="text/css">
        /*
        @keyframes blinking {
  0% {
    opacity: 1;
  }
  50% {
    opacity: 0;
  }
  100% {
    opacity: 1;
  }
}

.blinking-link {
  animation: blinking 1.5s infinite;
}
*/
    </style>

<script>

  var appData = {
    uri_app : "<?= base_url() ?>",
    uri_ws  : "<?= base_url() ?>../webservice/",
    titulo : "<?=$titulo?>",
    num : "<?=$id_info?>",
    nomb : "<?=$propietario_nombre?>",
    ap : "<?=$propietario_ap?>",
    tel : "<?=$propietario_tel?>",
    cor : "<?=$propietario_correo?>",
    estado : "<?=$estado?>"
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
</style>

<body class="page-publicacion">
    <div class="container">


        <div class="contenedor-header">

    <?php 

       $consulta = $this->db->select("*")->from("datos")->where("id",1)->get()->result_array();

    $nombre = $consulta["0"]["nombre"];
    $tel = $consulta["0"]["tel"];
    $fb = $consulta["0"]["fb"];
    $ig = $consulta["0"]["ig"];
    $ws = $consulta["0"]["ws"];
    $corre = $consulta["0"]["correo"];
    $tk = $consulta["0"]["tk"];

    ?>

    <header>
    <div class="logo">
        <img src="<?=base_url()?>static/images/image.ico" alt="Descripción de la imagen" style="width: 50px; height: 50px;">
    </div>

    <div class="logo">           
            <h1><i class="fa-solid fa-globe"></i></h1>
            <p><?=$nombre?></p>
      </div>

    <div class="nav-responsive" onclick="mostrarMenuResponsive()">
        <i class="fa-solid fa-bars"></i>
    </div>
    <nav class="" id="nav">
        <a href="<?=base_url()?>">Inicio</a>
        <a href="<?=base_url()?>frontend/propiedades/<?=$numero?>">Propiedades</a>
        <a href="<?=base_url()?>frontend/destacadas/6" class="blinking-link">Destacadas</a>
        <a href="<?=base_url()?>frontend/contactos">Contacto</a>
        <a href="<?=base_url()?>frontend/conocenos">Conócenos</a>
        <a href="<?=base_url()?>frontend/equipo">Equipo</a>
        <a href="<?=base_url()?>frontend/insesion/" class="blinking-link">Rent House</a>
    </nav>
&nbsp;&nbsp;
<div class="info-contacto">
        <?php if($this->session->userdata( "tokenn" )):  ?> 
             <?php if($this->session->tipo == "cliente"):  ?> 
        <span title="Perfil" class="info">
                <a href="<?=base_url()?>Frontend/perfil2/<?=$this->session->id_usu?>/<?=$this->session->tokenn?>" role="button"><i class="fas fa-user"></i></a>
        </span>
        <?php endif;  ?>

        <span title="Cerrar Sesión" class="info">
                <a href="<?=base_url()?>Acceso/cierrasesion/<?=$this->session->id_usu?>/<?=$this->session->tokenn?>" role="button"><i class="fa-solid fa-right-from-bracket"></i></a>
        </span>
        <?php endif;  ?> 
    </div>
</header>


</div>
<br>
&nbsp;&nbsp;
<style type="text/css">
    .bienvenido {
        font-size: 18px;
        font-weight: bold;
        color: #333;
        background-color: #f8f8f8;
        padding: 10px;
        border-radius: 5px;
        border: 1px solid black;
    }

    .no-link-style {
    text-decoration: none;
    color: inherit;
  }
</style>

<?php if($this->session->userdata("tokenn") && $this->session->tipo == "cliente"): ?>
    <a href="" class="no-link-style" title="Perfil"><span class="bienvenido">
       <i class="fas fa-user"></i> Hola: <?= urldecode($this->session->nombre) ?> 
    </span></a>
<?php endif; ?>

        <div class="contenedor-principal">
            <div class="info-publicacion">
                <section class="info-principal-galeria">
                    <div class="dato1">
                        <span class="estado"><?= $estado ?></span>
                        <span class="precio"><?=$simbolo?> <?=$signo == "?" ? "€" : $signo ?><?= number_format($precio, 2, '.', ',') ?></span>
                    </div>
                    <h2><?= $titulo ?></h2>
                    <p> <i class="fa-solid fa-location-pin"></i> <?= $calle ?> <?= $noext ?> <?= $col?>, <?=$ciudad?> <?=$pais?></p>
                    <div class="contenedor-imagen-principal">
                        <img src="<?=base_url()?>static/images/casas/<?=$foto?>"alt="<?=$titulo?>"  >
                    </div>
                    <div class="galeria" id="galeria">
                        <!-- Utilizo la variable i, para saber el numero de foto. Lo usare luego cuando tenga que recorrer las fotos una por una en el modal -->


                        <?php $fotos = $this->db->select("*")->from("foto")->where("id_prop",$id_info)->get();
                        $i = 0; ?>

                        <?php foreach ($fotos->result_array() as $foto) : ?>

                            <img src="<?=base_url()?>static/images/casas/<?=$foto['foto']?>" onclick="abrirModal(this,<?php echo $i ?>)" alt="s">
                            <?php $i++; ?>
                        <?php endforeach ?>

                     
                    </div>
                </section>
                <section class="descripcion">
                    <h3>Descripción</h3>

                    <div class="fila">
                        <div class="dato">
                            <span class="header">Tipo</span>
                            <span class="valor"><?= $tipo ?></span>
                        </div>
                        <div class="dato">
                            <span class="header">Estado</span>
                            <span class="valor"><?= $estado ?></span>
                        </div>
                        <div class="dato">
                            <span class="header">Precio</span>
                            <span class="valor">$<?= number_format($precio, 0, '.', ',') ?></span>
                        </div>

                        <?php
                            if ($habitaciones != "") :
                            ?>
                        <div class="dato">
                            <span class="header">Habitaciones</span>
                            <span class="valor"><?= $habitaciones ?></span>
                        </div>
                        <?php
                            endif;
                            ?>

                        <?php
                            if ($banios != "") :
                            ?>
                        <div class="dato">
                            <span class="header">Baños</span>
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
                            <span class="header">Medios Baños</span>
                            <span class="valor"><?= $mbanios ?></span>
                        </div>
                        <?php
                            endif;
                        ?>


                        <?php
                            if ($ancho != "") :
                            ?>
                        <div class="dato">
                            <span class="header">Ancho</span>
                            <span class="valor"><?= $ancho ?></span>
                        </div>
                        <?php
                            endif;
                        ?>


                        <?php
                            if ($fondo != "") :
                            ?>
                        <div class="dato">
                            <span class="header">Fondo</span>
                            <span class="valor"><?= $fondo ?></span>
                        </div>
                        <?php
                            endif;
                        ?>


                        <?php
                            if ($suptot != "") :
                            ?>
                        <div class="dato">
                            <span class="header">Superficie Total</span>
                            <span class="valor"><?= $suptot ?></span>
                        </div>
                        <?php
                            endif;
                        ?>


                        <?php
                            if ($pisos != "") :
                            ?>
                        <div class="dato">
                            <span class="header">Pisos</span>
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
                            <span class="header">Garage</span>
                            <span class="valor"><?= $garage ?></span>
                        </div>
                        <?php
                            endif;
                        ?>


                        <?php
                            if ($ctoser != "noMo") :
                            ?>
                        <div class="dato">
                            <span class="header">Cuarto de Servicio</span>
                            <span class="valor"><?= $ctoser ?></span>
                        </div>
                        <?php
                            endif;
                        ?>


                        <?php
                            if ($noesta != "") :
                            ?>
                        <div class="dato">
                            <span class="header">Estacionamientos</span>
                            <span class="valor"><?= $noesta ?></span>
                        </div>
                        <?php
                            endif;
                        ?>


                        <?php
                            if ($mconst != "") :
                            ?>
                        <div class="dato">
                            <span class="header">Metros de Construcción</span>
                            <span class="valor"><?= $mconst ?></span>
                        </div>
                        <?php
                            endif;
                        ?>


                        <div class="dato">
                            <span class="header">Ciudad</span>
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

            <div class="form-contacto-publicacion">

                <?php if($estado == "Alquiler" && !$this->session->userdata( "tokenn" )): ?>

                  <style type="text/css">
                  #saludo {
                    font-size: 28px;
                    color: #333;
                    text-align: center;
                    opacity: 0;
                    transform: translateY(20px);
                    transition: opacity 0.5s ease-in-out, transform 0.5s ease-in-out;
                  }

                  .boton-container {
                    text-align: center;
                    margin-top: 20px;
                  }

                  .boton-rentar {
                    display: inline-block;
                    background-color: #337ab7;
                    color: #fff;
                    padding: 10px 20px;
                    border-radius: 3px;
                    text-decoration: none;
                    transition: background-color 0.3s ease;
                    font-size: 16px;
                  }

                  .boton-rentar:hover {
                    background-color: #23527c;
                  }
                </style>

                <h2 id="saludo">¡Hola, amigo/a! Para rentar una propiedad, ingresa a Rent House</h2>
                <div class="boton-container">
                  <a href="<?=base_url()?>frontend/insesion/" class="boton-rentar"><i class="fas fa-home"></i> Rent House</a>
                </div>

                <script type="text/javascript">
                  document.addEventListener("DOMContentLoaded", function() {
                    var saludo = document.getElementById("saludo");
                    saludo.style.opacity = "1";
                    saludo.style.transform = "translateY(0)";
                  });
                </script>

                <?php else: ?>
                <form action="<?=base_url()?>../webservice/correo/enviarCorreo" id="mensaje" method="post">

                     <input type="hidden"
                   class="form-control" 
                   id="propietario_nombre"
                   name="propietario_nombre"
                   value="<?=$propietario_nombre?>" />

                   <input type="hidden"
                   class="form-control" 
                   id="propietario_ap"
                   name="propietario_ap"
                   value="<?=$propietario_ap?>" />

                    <input type="hidden"
                   class="form-control" 
                   id="propietario_tel"
                   name="propietario_tel"
                   value="<?=$propietario_tel?>" />

                   <input type="hidden"
                   class="form-control" 
                   id="propietario_correo"
                   name="propietario_correo"
                   value="<?=$propietario_correo?>" />

                   <input type="hidden"
                   class="form-control" 
                   id="id_info"
                   name="id_info"
                   value="<?=$id_info?>" />

                   <input type="hidden"
                   class="form-control" 
                   id="numero"
                   name="numero"
                   value="<?=$numero?>" />

                   <input type="hidden"
                   class="form-control" 
                   id="corre"
                   name="corre"
                   value="<?=$corre?>" />

                   <input type="hidden"
                   class="form-control" 
                   id="id_cliente"
                   name="id_cliente"
                   value="<?=$this->session->id_cli?>" />

                   <input type="hidden"
                   class="form-control" 
                   id="estado"
                   name="estado"
                   value="<?=$estado?>" />

                    <h3>Comuníquese con nosotros por la propiedad en <?=$ciudad?>, <?=$pais?></h3>


                    <?php
                    if ($this->session->userdata( "tokenn" ) && $this->session->tipo == "cliente") :
                    ?>
                    <div class="form-control" id="group-nombre">
                        <label for="nombre">Nombre</label>
                        <input type="text" placeholder="Ingrese su nombre" name="nombre" id="nombre" value="<?=urldecode($this->session->nombre)?>">
                    </div>
                    <div class="form-control" id="group-email">
                        <label for="email">Dirección de Correo</label>
                        <input type="text" placeholder="Dirección de Correo" name="email" id="email" value="<?=$this->session->correo?>">
                    </div>
                    <div class="form-control" id="group-telefono">
                        <label for="telefono">Teléfono</label>
                        <input type="number" placeholder="Ingrese su teléfono" name="telefono" id="telefono" value="<?=$this->session->tel?>">
                    </div>
                    <?php 
                else:
                    ?>
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
                    <?php 
                endif;
                    ?>
                    <div class="form-control" id="group-mensajee">
                        <label for="mensajee">Mensaje</label>
                        <?php
                    if ($this->session->userdata( "tokenn" ) && $this->session->tipo == "cliente") :
                    ?>
                        <textarea type="text" rows="4" placeholder="Escriba su mensaje" name="mensajee" id="mensajee">¡Hola! me llamo <?= urldecode($this->session->nombre) ?> y Quiero que se comuniquen conmigo porque me interesa <?=$titulo?>. ¡Por favor contáctame!</textarea>
                           <?php 
                else:
                    ?>
                    <textarea type="text" rows="4" placeholder="Escriba su mensaje" name="mensajee" id="mensajee">¡Hola! Quiero que se comuniquen conmigo porque me interesa <?=$titulo?>. ¡Por favor contáctame!</textarea>
                      <?php 
                endif;
                    ?>
                    </div>
                    <input type="submit" value="Enviar Mensaje" name="enviar">
                </form>
            <?php endif; ?>
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

    </div>

    <footer>
        <?php $this->load->view( "footer_view" );?>
    </footer>

    <script src="<?=base_url()?>static/js/script.js"></script>
    <script src="<?=base_url()?>static/js/mensaje2.js"></script>
</body>

</html>