<?php 
$consulta9 = $this->db->select("count(id) as ciu")->from("solicitud")->where("id_cli",$id_clienteSoli)->get()->result_array();
$totalSol = $consulta9["0"]["ciu"];

$consulta4 = $this->db->select("*")->from("solicitud")->where("id_cli",$id_clienteSoli)->get();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?=base_url()?>static/images/image.ico">
    <meta author="Carlos Guadalupe López Trejo">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Solicitudes enviadas</title>
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

 @media only screen and (min-width: 50px) and (max-width: 366px) {

        body {
            width: 366px;
        }
    }


@media only screen and (min-height: 1040px) and (max-height: 1400px) {

        footer {
           position: fixed;
           bottom: 0;
        }
    }

    @media only screen and (min-width: 300px) and (max-width: 490px) and (min-height: 890px) and (max-height: 1000px) {

        footer {
           position: fixed;
           bottom: 0;
        }
    }


 @media only screen and (min-width: 50px) and (max-width: 390px){

        .footer1 {
           position: fixed;
           bottom: 0;
           width: 379px;
        }
    }

     @media only screen and (min-width: 600px) and (max-width: 740px){

        .footer1 {
           position: fixed;
           bottom: 0;
           width: 100%;
        }
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

    <!-- Contenedor principal -->
    <div class="container mx-auto p-4 mb-8" style="margin-top: 20px;">
    <?php 
    if ($totalSol == 0) :
    ?>

<h2 class="text-2xl text-gray-800">
  <i class="fas fa-user-circle mr-2 text-red-500"></i>
  No has enviado solicitudes aún.
</h2>


<?php 
else:
?>

    <h2 class="text-2xl text-gray-800">
  <i class="fas fa-users mr-2 text-green-500"></i>
  Solicitudes enviadas por mi (<?=$totalSol?>).
</h2>
<br>
<?php 
  foreach ($consulta4->result_array() as $mensaje) :

    $id_p = $this->db->select("id_propi")->from("propiedad")->where("id",$mensaje["id_prop"])->get()->row()->id_propi;

    $fo_p = $this->db->select("foto")->from("propiedad")->where("id",$mensaje["id_prop"])->get()->row()->foto;

    $nombre_p = $this->db->select("nombre")->from("propietario")->where("id",$id_p)->get()->row()->nombre;

    $ap_p = $this->db->select("ap")->from("propietario")->where("id",$id_p)->get()->row()->ap;

    $ap_cor = $this->db->select("correo")->from("propietario")->where("id",$id_p)->get()->row()->correo;

    $ap_tel = $this->db->select("tel")->from("propietario")->where("id",$id_p)->get()->row()->tel;
?>
        <div class="bg-white rounded-lg shadow p-6 mb-8">
    <div class="flex justify-between items-center">
        <h2 class="text-xl font-semibold text-gray-800 mb-4">Enviada a: <?=$nombre_p?> <?=$ap_p?></h2>
        <button class="text-red-600 hover:text-red-800" onclick="showDeleteModal(<?=$mensaje["id"]?>)">
            <i class="fas fa-trash fa-2x"></i>
        </button>
    </div>
    <p class="text-gray-500"><span class="font-semibold"><i class="fas fa-envelope mr-2"></i>Correo:</span> <a href="mailto:<?=$ap_cor?>"><?=$ap_cor?></a></p>
    <p class="text-gray-500"><span class="font-semibold"><i class="fas fa-phone mr-2"></i>Teléfono:</span> <a href="tel:<?=$ap_tel?>"><?=$ap_tel?></a></p>
    <p><span class="font-semibold"><i class="fas fa-envelope mr-2"></i>Mensaje:</span> <?=$mensaje["mensaje"]?></p>
    <p class="text-sm text-gray-500"><i class="fas fa-calendar mr-1"></i>Fecha: <?=fecha_fancy($mensaje["fecha"]);?></p>
    <p><strong>Foto:</strong></p>
    <img src="<?=base_url()?>/static/images/casas/<?=$fo_p?>" alt="Imagen de solicitud" class="w-full h-40 mt-auto">
</div>

   <?php 
  endforeach;
endif;
  ?>
    </div>

  <?php 
if ($totalSol == 0 || $totalSol == 1) {
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

<?=$nombre?><br>
<style>
  .no-link-style {
    text-decoration: none;
    color: inherit;
  }
</style>
    </footer>

<!-- Ventana modal -->
<div id="deleteModal" class="fixed inset-0 flex items-center justify-center z-10 hidden">
  <div class="bg-white rounded-lg shadow-lg p-6">
    <h3 class="text-lg font-semibold mb-4">Confirmación</h3>
    <p class="mb-4">¿Realmente deseas eliminar esta solicitud?</p>
    <div class="flex justify-end">
      <button id="cancelButton" class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded mr-2" onclick="hideDeleteModal()">Cancelar</button>
      <button id="confirmDeleteButton" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded" onclick="deleteResena()">Eliminar</button>
    </div>
  </div>
</div>

<script>
  var idresenia;

  // Función para mostrar la ventana modal
  function showDeleteModal(id) {
    idresenia = id
    document.getElementById('deleteModal').classList.remove('hidden');
  }


  // Función para ocultar la ventana modal
  function hideDeleteModal() {
    document.getElementById('deleteModal').classList.add('hidden');
  }


  // Función para eliminar la mensaje
  function deleteResena() {
    //console.log(idresenia);

    $.ajax({
            "url" : appData.uri_ws+"backend/delesol/",
            "dataType" : "json",
            "type"  :   "post",
            "data"  :   {
                "id" : idresenia
            }

          })
          .done(function(obj){
               if (obj.resultado) {
                alert(obj.mensaje);
                $(location).attr("href","");
               }
               else{
                alert(obj.mensaje);
                hideDeleteModal();
               }
          });
  }
</script>

</body>

</html>
