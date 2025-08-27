<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="shortcut icon" href="<?=base_url()?>static/images/image.ico">
    <meta author="Carlos Guadalupe López Trejo">
  <title>Información del Inquilino</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <script src="<?=base_url()?>static/js/jquery-3.6.1.min.js"></script>
    <script src="<?=base_url()?>static/js/jquery-3.6.1.js"></script>
    <script src="<?=base_url()?>static/js/mensajes.js" ></script>
  <style>
    .container {
      max-width: 800px;
      margin: 0 auto;
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
  </style>

       <script>
            var appData = {
            uri_app : "<?= base_url() ?>",
            uri_ws  : "<?= base_url() ?>../webservice/",
            id_propied : "<?= $id_info ?>",
            id_propietario : "<?= $this->session->id_cli ?>",
            }
        </script>
    <style>
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
            background-color: #292487;
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

.footer1 {
  width: 100%;
  background-color: #1b1b38;
  color: #d4d4d9;
  text-align: center;
  padding: 10px;
  position: absolute;
  bottom: 0;
  left: 0;
}

.footer2 {
  width: 100%;
  background-color: #1b1b38;
  color: #d4d4d9;
  text-align: center;
  padding: 10px;
  bottom: 0;
  left: 0;
}

@media only screen and (min-height: 1040px) and (max-height: 1400px) {

        footer {
           position: fixed;
           bottom: 0;
        }
    }

    </style>
</head>
<body class="bg-gray-100">

    <?php
$fec = $this->db->select("left(now(),10)as fecha")->get()->result_array();
$fecha = $fec["0"]["fecha"];

function fecha_fancy($sFecha) {
    // Convierte un String en arreglo
    $aFecha = explode("-", $sFecha);

    $aMes = ["enero", "febrero", "marzo", "abril", "mayo", "junio",
        "julio", "agosto", "septiembre", "octubre", "noviembre", "diciembre"];

    return number_format($aFecha[2]) . " de " . $aMes[$aFecha[1] - 1] . " de " . $aFecha[0];
}
?>

  <header class="header bg-gray-900 text-white">
    <nav class="flex flex-wrap items-center justify-between py-4 px-8">
        <div class="flex items-center space-x-4">
            <img src="<?=base_url()?>static/images/image.ico" alt="Descripción de la imagen" class="w-10 h-10">
            <h1 class="text-xl font-semibold">Rent House <i class="fas fa-key"></i></h1>
        </div>
        <div class="flex items-center space-x-4">
            <h2><i class="far fa-calendar-alt"></i> Hoy es: <?=fecha_fancy($fecha)?></h2>
        </div>
        <div class="flex items-center space-x-4">
            <a href="<?=base_url()?>Accesoad/clientes/<?=$this->session->id_usu?>/<?=$this->session->token?>" class="nav-link"><i class="fas fa-reply"></i>  Regresar</a>
        </div>
    </nav>
</header>

<?php 

$consulta = $this->db->select("*")->from("cliente")->where("id",$id_cliente)->get()->row();

$nombre = $consulta->nombre;
$correo = $consulta->correo;
$tel = $consulta->tel;
$fecha = $consulta->fec_registro;
$id_cliente = $consulta->id;

function fecha2($sFecha) {
    // Convierte el String en una fecha en formato 'Y-m-d H:i:s'
    $fecha = new DateTime($sFecha);

    $aMes = ["enero", "febrero", "marzo", "abril", "mayo", "junio",
        "julio", "agosto", "septiembre", "octubre", "noviembre", "diciembre"];

    $fechaFormateada = $fecha->format('d') . " de " . $aMes[$fecha->format('n') - 1] . " de " . $fecha->format('Y');
    $horaFormateada = $fecha->format('H:i');

    return $fechaFormateada . " a las " . $horaFormateada;
}

?>

  <div class="container py-8">
    <div class="bg-white rounded-lg shadow p-6 mb-8">
      <h2 class="text-xl font-semibold text-gray-800 mb-4">Información del Inquilino</h2>
      <!-- Aquí puedes mostrar la información del inquilino -->
      <p class="text-gray-600"><span class="font-semibold"><i class="fas fa-user mr-2"></i>Nombre:</span> <?=$nombre?></p>
      <p class="text-gray-600"><span class="font-semibold"><i class="fas fa-envelope mr-2"></i>Email:</span> <a href="mailto: <?=$correo?>"><?=$correo?></a></p>
      <p class="text-gray-600"><span class="font-semibold"><i class="fas fa-phone mr-2"></i>Teléfono:</span> <a href="tel: <?=$tel?>"><?=$tel?></a></p>
      <p class="text-gray-600"><span class="font-semibold"><i class="fas fa-calendar mr-2"></i>Fecha de Unión:</span> <?=fecha_fancy($fecha);?></p>
    </div>



<?php 
$consulta4 = $this->db->select("*")->from("resenia")->where("id_cli",$id_cliente)->order_by("fecha","desc")->get();

$consulta5 = $this->db->select("count(id) as id")->from("resenia")->where("id_cli",$id_cliente)->get()->row();
$totalResenia2 = $consulta5->id;
?>

    <div class="bg-white rounded-lg shadow p-6 mb-8">
  <h2 class="text-xl font-semibold text-gray-800 mb-4">Reseñas Totales</h2>

<?php 
if($totalResenia2 == 0):
?>
<h2 class="text-2xl text-gray-800">
  <i class="fas fa-comment-slash mr-2 text-red-500"></i>
  No hay reseñas disponibles.
</h2>
  <?php 
else:
  foreach ($consulta4->result_array() as $resenia2) :
    $critico = $this->db->select("nombre,ap")->from("propietario")->where("id",$resenia2["id_propietario"])->get()->row();
    $nombre_critico = $critico->nombre;
    $ap_critico = $critico->ap;
  ?>
  <div id="resenaList2">
    <!-- Aquí se mostrarán las reseñas -->
    <div class="bg-gray-100 rounded-lg p-4 mb-4">
      <p class="text-gray-700 mb-2"><span class="font-semibold">Nombre:</span> <?=$nombre_critico?> <?=$ap_critico?></p>
      <p class="text-gray-600">"<?=$resenia2["resenia"]?>"</p>
      <div class="flex justify-between">
        <p class="text-sm text-gray-500">Fecha: <?=fecha2($resenia2["fecha"]);?></p>
      </div>
    </div>
  </div>
   <?php 
  endforeach;
endif;
  ?>
</div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.0/dist/alpine.js" defer></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js" defer></script>

  <?php 
if ($totalResenia2 == 0) {
  $s=1;
}
else{
  $s=2;
}
  ?>

  <footer class="footer<?=$s?>">
        <?php 

    $consulta = $this->db->select("*")->from("datos")->where("id",1)->get()->result_array();

    $nombre = $consulta["0"]["nombre"];
    $tel = $consulta["0"]["tel"];
    $cor = $consulta["0"]["correo"];
  

    ?>

<?=$nombre?> - Rent House <br>
<style>
  .no-link-style {
    text-decoration: none;
    color: inherit;
  }
</style>
    </footer>

</body>
</html>
