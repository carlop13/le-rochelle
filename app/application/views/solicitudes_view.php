<?php
$consulta = $this->db->select("*")->from("solicitud")->where("id_prop",$id_info)->order_by("fecha","desc")->get();

$consulta2 = $this->db->select("count(id) as ciu")->from("solicitud")->where("id_prop",$id_info)->get()->result_array();
$totalSolitud = $consulta2["0"]["ciu"];

function fecha($sFecha) {
    // Convierte un String en arreglo
    $aFecha = explode("-", $sFecha);

    $aMes = ["enero", "febrero", "marzo", "abril", "mayo", "junio",
        "julio", "agosto", "septiembre", "octubre", "noviembre", "diciembre"];

    return number_format($aFecha[2]) . " de " . $aMes[$aFecha[1] - 1] . " de " . $aFecha[0];


}

function fecha2($sFecha) {
    // Convierte el String en una fecha en formato 'Y-m-d H:i:s'
    $fecha = new DateTime($sFecha);

    $aMes = ["ene", "feb", "mar", "abr", "may", "jun",
        "jul", "ago", "sep", "oct", "nov", "dic"];

    $fechaFormateada = $fecha->format('d') . " " . $aMes[$fecha->format('n') - 1] . " " . $fecha->format('Y');
    $horaFormateada = $fecha->format('H:i');

    return $fechaFormateada . " a las " . $horaFormateada;
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
   <script src="<?=base_url()?>static/js/jquery-3.6.1.min.js"></script>
  <script src="<?=base_url()?>static/js/jquery-3.6.1.js"></script>
      <link rel="shortcut icon" href="<?=base_url()?>static/images/image.ico">
    <meta author="Carlos Guadalupe López Trejo">

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
    /* Estilos personalizados */
    .animate-fade-in {
      animation: slide-up 0.5s ease-out;
    }

    @keyframes fade-in {
      0% {
        opacity: 0;
      }
      100% {
        opacity: 1;
      }
    }

    .animate-slide-up {
      animation: slide-up 0.5s ease-out;
    }

    @keyframes slide-up {
      0% {
        transform: translateY(50%);
        opacity: 0;
      }
      100% {
        transform: translateY(0);
        opacity: 1;
      }
    }

.animate-slide-down {
  animation: slide-down 0.5s ease-in;
}

@keyframes slide-down {
  0% {
    transform: translateY(0);
    opacity: 1;
  }
  100% {
    transform: translateY(100%);
    opacity: 0;
  }
}




    .rounded-lg {
      border-radius: 0.5rem;
    }

    .bg-gray-100 {
      background-color: #f7fafc;
    }

    .p-6 {
      padding: 1.5rem;
    }

    .text-3xl {
      font-size: 1.875rem;
    }

    .text-gray-800 {
      color: #2d3748;
    }

    .text-blue-500 {
      color: #3b82f6;
    }

    .cursor-pointer {
      cursor: pointer;
    }

    .hidden {
      display: none;
    }

    .block {
      display: block;
    }

    /* Agregar estilos y animaciones adicionales */
    .contact-info {
      transition: max-height 0.5s ease-out;
      max-height: 0;
      overflow: hidden;
    }

    .contact-info.open {
      max-height: 500px; /* Ajusta la altura máxima deseada */
      transition: max-height 0.5s ease-in;

    }

    .btn-contact {
      background-color: #10b981;
      color: #fff;
      padding: 0.75rem 1.5rem;
      border-radius: 0.25rem;
      transition: background-color 0.3s ease;
    }

    .btn-contact:hover {
      background-color: #047857;
    }

    .btn-elim:hover {
      background-color: #ad0916;
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

body {
  position: relative;
  min-height: 100vh; /* Asegura que el cuerpo de la página ocupe al menos el alto de la ventana del navegador */
}

.content {
  padding-bottom: 100px; /* Altura del footer */
}

.footer {
  width: 100%;
  background-color: #1b1b38;
  color: #d4d4d9;
  text-align: center;
  padding: 5px;
  position: absolute;
  bottom: 0;
  left: 0;
}

.foote {
  width: 100%;
  background-color: #1b1b38;
  color: #d4d4d9;
  text-align: center;
  padding: 5px;
  position: fixed;
  bottom: 0;
  left: 0;
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

  @media only screen and (min-width: 40px) and (max-width: 290px) and (min-height: 520px) and (max-height: 699px) {

        .footer {
            position: fixed;
           bottom: 0;
        }
    }

  </style>
  <title>Solicitudes</title>
</head>

  <script type="text/javascript">
$(document).ready(function(){
    //alert("hola");

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

    setInterval(solicitud,300);

});
</script>

<style type="text/css">
  /* Estilos personalizados */
.fa-exclamation-circle {
  font-size: 1.5rem;
  vertical-align: middle;
}

.rating {
      display: inline-block;
    }
    
    .rating input {
      display: none;
    }
    
    .rating label {
      float: right;
      cursor: pointer;
      color: grey;
    }
    
    .rating label:before {
      content: '\2605';
      font-size: 25px;
    }
    
 @media only screen and (min-width: 50px) and (max-width: 366px) {

        body {
            width: 366px;
        }
    }
</style>

<body class="bg-gray-100">
  <?php $this->load->view( "header_propi_view" ); ?>
  <div class="container mx-auto px-4 content">

      <h1 class="text-3xl font-semibold text-gray-800 mt-6 mb-6">Solicitudes <?= urldecode($this->session->nombre); ?></h1>

      <?php if($totalSolitud==0): ?>
        <h2 class="text-2xl text-gray-800">
        <i class="fas fa-exclamation-circle mr-2 text-red-500"></i>
        Por el momento, no cuentas con ninguna solicitud por tu propiedad.
      </h2>
        <?php else: ?>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">

      

        <?php
          $s=0; 
          foreach ($consulta->result_array() as $solicitud) : 
          $s++;

          $consul = $this->db->select("*")->from("cliente")->where("id",$solicitud["id_cli"])->get()->row();
          $nombre_cliente = $consul->nombre;
          $tel_cliente = $consul->tel;
          $correo_cli = $consul->correo;
          $fech_cli = $consul->fec_registro;

          $promedio_estrellass = $this->db->select('ROUND(AVG(estrellas), 1) AS promedio_estrellas')->from("estrella")->where("id_cliente",$solicitud["id_cli"])->get()->result_array();

if(!empty($promedio_estrellass)){
$promedio_estrellas = $promedio_estrellass["0"]["promedio_estrellas"];
}
else{
  $promedio_estrellas = 0;
}
   

          ?>


      <!-- Card de solicitud 1 -->
      <div class="bg-white rounded-lg shadow p-6 animate-fade-in">
        <h3 class="text-lg font-semibold">Solicitud <?=$s?></h3>
        <h4 class="text-lg font-semibold"><i class="fas fa-user"></i> Nombre: <?= $nombre_cliente ?></h4>
        <p class="text-lg font-semibold mb-2"><i class="fas fa-calendar"></i> Fecha: <?= fecha($solicitud["fecha"]); ?></p>
        <p class="text-gray-700"><?= $solicitud["mensaje"] ?></p>
       <div class="rating mb-4">
  <div style="display: flex; align-items: center;">
    <p style="margin-right: 6px;"><strong>Calificación:</strong></p>
    <?php 
$calificacion = $promedio_estrellas; 

// Redonder la calificación
$estrellasMarcadas = round($calificacion);


for ($i = 1; $i <= 5; $i++) : ?>
  <label for="star<?= $s ?>" style="color: <?= $i <= $estrellasMarcadas ? 'orange' : 'grey' ?>;"></label>
<?php endfor; ?>

  </div>
</div>
 <div class="flex justify-end">
  <button class="btn-contact" onclick="toggleContactInfo(this)">
    <i class="fas fa-phone"></i> Contactar
  </button>
  <button class="btn-elim bg-red-500 text-white px-4 py-2 rounded ml-2" onclick="openModal('<?= $solicitud['id'] ?>','<?= $nombre_cliente ?>')">
    <i class="fas fa-trash-alt"></i> Eliminar
  </button>
</div>


  <?php 
$consulta3 = $this->db->select("count(id) as ciu")->from("resenia")->where("id_cli",$solicitud["id_cli"])->get()->result_array();
$totalResenia = $consulta3["0"]["ciu"];

$consulta4 = $this->db->select("*")->from("resenia")->where("id_cli",$solicitud["id_cli"])->order_by("fecha","desc")->get();
?>


        <div class="mt-4">
  <h4 class="text-lg font-semibold mb-2 cursor-pointer text-blue-500" onclick="toggleReviews(this)">Reseñas (<?=$totalResenia?>) <i class="fas fa-chevron-down"></i></h4>

<?php 
if($totalResenia == 0):
?>
  <div class="flex items-center mb-2 hidden">
<p class="text-gray-600">No hay reseñas para mostrar.</p>
</div>
<?php 
else :
  foreach ($consulta4->result_array() as $resenia) :
    $critico = $this->db->select("nombre,ap")->from("propietario")->where("id",$resenia["id_propietario"])->get()->row();
    $nombre_critico = $critico->nombre;
    $ap_critico = $critico->ap;
?>
  <!-- Comentarios -->
  <div class="flex items-center mb-2 hidden">
    <div class="rounded-full bg-gray-300 w-10 h-10 flex items-center justify-center">
      <i class="fas fa-user text-gray-500"></i>
    </div>
    <div class="ml-2">
      <p class="font-semibold"><?= $nombre_critico ?> <?= $ap_critico ?></p>
      <p class="text-gray-600">"<?= $resenia["resenia"] ?>"</p>
      <p class="text-gray-600">Fecha: <?= fecha2($resenia["fecha"]); ?></p>
    </div>
  </div>

<?php 
endforeach;
endif;
?>

</div>


        <div class="contact-info">
          
          <h4 class="text-lg font-semibold mt-4 mb-2">Información de contacto</h4>
          <p class="text-gray-600"><i class="fas fa-phone"></i> Teléfono: <a href="tel:<?=$tel_cliente?>"><?= $tel_cliente ?></a></p>
          <p class="text-gray-600"><i class="fas fa-envelope"></i> Correo Electrónico: <a href="mailto:<?=$correo_cli?>"><?= $correo_cli ?></a></p>
          <p class="text-gray-600"><i class="fas fa-calendar-alt"></i> Fecha de Unión: <?= fecha($fech_cli); ?></p>
        </div>
      </div>

     <?php endforeach; ?>
    </div>
  <?php endif; ?>
  </div>

 <script>
    // Agrega el evento de clic a los títulos de reseñas
    const reviewTitles = document.querySelectorAll('.cursor-pointer');
    reviewTitles.forEach(title => {
      title.addEventListener('click', toggleReviews);
    });

    // Función para mostrar u ocultar las reseñas
function toggleReviews(element) {
  const reviews = Array.from(element.parentNode.children).slice(1); // Ignorar el primer hijo (título)
  reviews.forEach(review => {
    review.classList.toggle('hidden');
    if (review.classList.contains('hidden')) {
      review.classList.add('animate-slide-down');
      review.classList.remove('animate-slide-up');
    } else {
      review.classList.add('animate-slide-up');
      review.classList.remove('animate-slide-down');
    }
  });
  const icon = element.querySelector('i');
  icon.classList.toggle('fa-chevron-down');
  icon.classList.toggle('fa-chevron-up');
}


var idEliminarsoli;



    // Función para mostrar u ocultar la información de contacto
 function toggleContactInfo(button) {
  const contactInfo = button.parentNode.nextElementSibling.nextElementSibling;
  contactInfo.classList.toggle('open');
  
  const icon = button.querySelector('i');
  icon.classList.toggle('fa-phone');
  icon.classList.toggle('fa-phone-volume');
}

// Funciones para abrir y cerrar la modal
function openModal(id,nombre) {
  idEliminarsoli = id;
  const modal = document.querySelector('.modal');
  modal.style.display = 'block';
  var mensaje = document.getElementById("men");
  mensaje.innerHTML = "¿Realmente deseas eliminar la solicitud de "+nombre+"?";

}

function closeModal() {
  const modal = document.querySelector('.modal');
  modal.style.display = 'none';
}

// Función para eliminar la solicitud (a implementar)
function deleteRequest() {
  // Aquí puedes añadir la lógica para eliminar la solicitud
  //console.log('Solicitud eliminada');
  //console.log(idEliminarsoli);

$.ajax({
  "url" : appData.uri_ws+"backend/deletesolicitud/",
  "dataType" : "json",
  "type"  :   "post",
  "data"  : {
    "id" : idEliminarsoli
    }

  })
  .done(function(obj){
  
  if (obj.resultado) {
alert(obj.mensaje);
$(location).attr("href","");
  }
  else{
alert(obj.mensaje);
closeModal();
  }

  });

}


  </script>

<!-- Modal -->
<div class="fixed inset-0 flex items-center justify-center z-50 modal" style="display: none;">
  <div class="bg-white rounded-lg p-4 shadow-lg">
    <p id="men" class="text-lg font-semibold mb-4"></p>
    <div class="flex justify-center">
      <button class="bg-gray-200 text-gray-700 px-4 py-2 rounded mr-2" onclick="closeModal()">Cancelar</button>
      &nbsp;&nbsp;
      <button class="bg-red-500 text-white px-4 py-2 rounded" onclick="deleteRequest()">Eliminar</button>
    </div>
  </div>
</div>

<?php 
if($totalSolitud == 0) :
?>
<footer class="foote">
<?php 
else:
?>
<footer class="footer">
        <?php 
endif;
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
<span id="numero"><a href="tel:<?=$tel?>" class="no-link-style"><?=$tel?></a> - <a href="mailto:<?=$cor?>" class="no-link-style"><?=$cor?></a></span>
    </footer>


</body>
</html>
