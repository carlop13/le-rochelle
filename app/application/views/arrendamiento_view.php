<?php 
$id_propiedad = $this->db->select("id_prop")->from("inquilino")->where("id_cli",$id_clienteArre)->get()->row()->id_prop;

$id_propietario = $this->db->select("id_propi")->from("propiedad")->where("id",$id_propiedad)->get()->row()->id_propi;
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?=base_url()?>static/images/image.ico">
    <meta author="Carlos Guadalupe López Trejo">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Arrendamiento</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="<?=base_url()?>static/js/jquery-3.6.1.min.js"></script>
  <script src="<?=base_url()?>static/js/jquery-3.6.1.js"></script>
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
        /* Colores personalizados */
        body {
            background-color: #f2f2f2;
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
  position: fixed;
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


    </style>
</head>

  <script>

  var appData = {
    uri_app : "<?= base_url() ?>",
    uri_ws  : "<?= base_url() ?>../webservice/"
}
</script>

<body>

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
            <a href="<?=base_url()?>Frontend/perfil2/<?=$this->session->id_usu?>/<?=$this->session->tokenn?>" class="nav-link"><i class="fas fa-reply"></i>  Regresar</a>
        </div>
    </nav>
</header>

<?php 
$consulta = $this->db->select("nombre,ap,correo,tel")->from("propietario")->where("id",$id_propietario)->get()->row();

$nombre = $consulta->nombre;
$ap = $consulta->ap;
$correo = $consulta->correo;
$tel = $consulta->tel;

$fecha_arrendamiento = $this->db->select("fecha")->from("inquilino")->where("id_cli",$id_clienteArre)->get()->row()->fecha;

$fo_p = $this->db->select("foto")->from("propiedad")->where("id",$id_propiedad)->get()->row()->foto;
?>
    <!-- Contenedor principal -->
  <div class="container py-8">
    <div class="bg-white rounded-lg shadow p-6 mb-8">
      <h2 class="text-xl font-semibold text-gray-800 mb-4">Información del Arrendatario</h2>
      <!-- Aquí puedes mostrar la información del inquilino -->
      <p class="text-gray-600"><span class="font-semibold"><i class="fas fa-user mr-2"></i>Nombre:</span> <?=$nombre?> <?=$ap?></p>
      <p class="text-gray-600"><span class="font-semibold"><i class="fas fa-envelope mr-2"></i>Email:</span> <a href="mailto: <?=$correo?>"><?=$correo?></a></p>
      <p class="text-gray-600"><span class="font-semibold"><i class="fas fa-phone mr-2"></i>Teléfono:</span> <a href="tel: <?=$tel?>"><?=$tel?></a></p>
      <p class="text-gray-600"><span class="font-semibold"><i class="fas fa-calendar mr-2"></i>Inicio arrendamiento:</span> <?=fecha_fancy($fecha_arrendamiento);?></p>
    </div>

        <div class="bg-white rounded-lg shadow p-6 mb-8">
      <h2 class="text-xl font-semibold text-gray-800 mb-4">Foto de la Propiedad:</h2>
      <!-- Aquí puedes mostrar la foto -->
      <img src="<?=base_url()?>/static/images/casas/<?=$fo_p?>" alt="Imagen de solicitud" class="w-40 h-full mt-auto">
    </div>
</div>
  <footer class="footer1">
        <?php 

    $consulta = $this->db->select("*")->from("datos")->where("id",1)->get()->result_array();

    $nombre = $consulta["0"]["nombre"];
    $tel = $consulta["0"]["tel"];
    $cor = $consulta["0"]["correo"];
  

    ?>

<?=$nombre?><br>
<style>
  .no-link-style {
    text-decoration: none;
    color: inherit;
  }
</style>
    </footer>

</body>

</html>
