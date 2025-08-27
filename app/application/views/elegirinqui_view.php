<?php 
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

    $aMes = ["enero", "febrero", "marzo", "abril", "mayo", "junio",
        "julio", "agosto", "septiembre", "octubre", "noviembre", "diciembre"];

    $fechaFormateada = $fecha->format('d') . " de " . $aMes[$fecha->format('n') - 1] . " de " . $fecha->format('Y');
    $horaFormateada = $fecha->format('H:i');

    return $fechaFormateada . " a las " . $horaFormateada;
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?=base_url()?>static/images/image.ico">
    <meta author="Carlos Guadalupe López Trejo">
  <title>Elegir Inquilino</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
      <script src="<?=base_url()?>static/js/jquery-3.6.1.min.js"></script>
    <script src="<?=base_url()?>static/js/jquery-3.6.1.js"></script>
  <style>
    .card {
      background-color: #f0f0f0;
      border-radius: 4px;
      padding: 1.5rem;
      transition: transform 0.3s;
    }

    .card:hover {
      transform: translateY(-5px);
    }

    .custom-link {
      display: inline-flex;
      align-items: center;
      color: #2563EB;
      font-weight: bold;
    }

    .custom-link i {
      margin-left: 0.5rem;
    }

    .text-gray-600 {
      color: #718096;
    }
  </style>

       <script>
            var appData = {
            uri_app : "<?= base_url() ?>",
            uri_ws  : "<?= base_url() ?>../webservice/",
            id_propied : "<?= $id_info ?>",
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
        .footer1 {
             width: 100%;
            background-color: #1b1b38;
            color: #d4d4d9;
            text-align: center;
            padding: 5px;
            position: relative;
        }
        .footer2 {
  width: 100%;
  background-color: #1b1b38;
  color: #d4d4d9;
  text-align: center;
  padding: 5px;
  position: fixed;
  bottom: 0;
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

 @media only screen and (min-width: 50px) and (max-width: 366px) {

        body {
            width: 366px;
        }
    }


@media only screen and (min-width: 50px) and (max-width: 400px) and (min-height: 200px) and (max-height: 840px) {

        .footer2 {
            position: relative;
            margin-top: 100px;
        }
    }

@media only screen and (min-width: 400px) and (max-width: 650px) and (min-height: 200px) and (max-height: 400px) {

        .footer2 {
            position: relative;
            margin-top: 100px;
        }
    }

@media only screen and (min-width: 400px) and (max-width: 420px) and (min-height: 700px) and (max-height: 750px) {

        .footer2 {
            position: relative;
            margin-top: 100px;
        }
    }

    @media only screen and (min-width: 40px) and (max-width: 290px) and (min-height: 520px) and (max-height: 699px) {

        .footer1 {
            position: fixed;
           bottom: 0;
        }
    }

    </style>

</head>
<body>

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

  <?php $this->load->view( "header_propi_view" );?>
  <div class="container mx-auto px-4 py-8">
    <h2 class="text-2xl font-bold mb-4">Bienvenido a este apartado</h2>
    <p class="text-gray-600 mb-4">Una vez que hayas contactado a la persona solicitante y hayas acordado con ella, podrás confirmarlo oficialmente en el sistema utilizando los siguientes pasos:</p>
    <ol class="list-decimal list-inside mb-4">
      <li>Accede a la sección de solicitudes y realiza el contacto con la persona solicitante.</li>
      <li>Llega a un acuerdo sobre los términos y condiciones.</li>
      <li>Confirma la información y los detalles del acuerdo aquí.</li>
      <li>Finaliza el proceso de selección y formaliza la aceptación en el sistema.</li>
    </ol>
    <p class="text-gray-600 mb-4">A continuación, se muestra la lista de personas solicitantes:</p>

     <?php if($totalSolitud==0): ?>
        <h2 class="text-2xl text-gray-800">
        <i class="fas fa-exclamation-circle mr-2 text-red-500"></i>
        Hasta el momento, no hay personas interesadas en tu propiedad.
      </h2>
        <?php else: ?>

    <div class="grid grid-cols-1 gap-4 mt-8">
      <!-- Cards de las personas solicitantes -->
      <?php 
      $consulta = $this->db->select("cliente.*")->from("solicitud")->join("cliente","solicitud.id_cli = cliente.id")->where("id_prop",$id_info)->group_by("cliente.id")->order_by("solicitud.fecha","desc")->get();

          foreach ($consulta->result_array() as $cliente) : 
      ?>
      <div class="card">
        <h3 class="font-bold text-lg mb-2"><?=$cliente["nombre"]?></h3>
        <p class="text-gray-600 mb-2">
          <i class="fas fa-phone mr-2"></i><a href="tel:<?=$cliente["tel"]?>"><?=$cliente["tel"]?></a>
        </p>
        <p class="text-gray-600 mb-2">
          <i class="fas fa-envelope mr-2"></i><a href="mailto:<?=$cliente["correo"]?>"><?=$cliente["correo"]?></a>
        </p>
        <p class="text-gray-600 mb-2">
          <i class="fas fa-calendar-alt mr-2"></i>Se unió el <?=fecha($cliente["fec_registro"]);?>
        </p>

          <?php 
        $consulta3 = $this->db->select("count(id) as ciu")->from("resenia")->where("id_cli",$cliente["id"])->get()->result_array();
        $totalResenia = $consulta3["0"]["ciu"];

        $consulta4 = $this->db->select("*")->from("resenia")->where("id_cli",$cliente["id"])->order_by("fecha","desc")->get();
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

<!-- Botón -->
<button class="confirmButton bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded transition-colors duration-300" data-id="<?=$cliente['id']?>">
  Confirmar como Inquilino <i class="fas fa-check-circle ml-2"></i>
</button>
<br><br>
<!-- Ventana modal -->
<div class="modal hidden">
  <div class="bg-white rounded-lg shadow-lg p-6">
    <h3 class="text-lg font-semibold mb-4">Confirmación</h3>
    <p class="mb-4">¿Estás seguro de confirmar a <strong><?=$cliente["nombre"]?></strong> como inquilino?</p>
    <div class="flex justify-center">
      <button class="cancelButton bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded mr-2">Cancelar</button>
      <button class="confirmModalButton bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded">Confirmar</button>
    </div>
  </div>
</div>


      </div>
    <?php endforeach; ?>

    </div>
      <?php endif; ?>
  </div>


  <script type="text/javascript">
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
    review.classList.toggle('animate-slide-up');
  });
  const icon = element.querySelector('i');
  icon.classList.toggle('fa-chevron-down');
  icon.classList.toggle('fa-chevron-up');
}

var id;

// Abrir ventana modal al hacer clic en el botón
$('.confirmButton').on('click', function() {
  id = $(this).data('id');
  $(this).siblings('.modal').removeClass('hidden');
});

// Cerrar ventana modal al hacer clic en el botón de cancelar
$('.cancelButton').on('click', function() {
  $(this).closest('.modal').addClass('hidden');
});

// Aquí puedes agregar la lógica para realizar la confirmación
$('.confirmModalButton').on('click', function() {
  //console.log(id);

  $.ajax({
    "url" : appData.uri_ws+"backend/registrainqui/",
    "dataType" : "json",
    "type"  :   "post",
    "data"  :   {
      "id" : id,
      "id_propiedad" : appData.id_propied
            }

      })
    .done(function(obj){
     if (obj.resultado) {
      alert(obj.mensaje);
      $(location).attr("href","");
     }
     else{
      alert(obj.mensaje);
  // Cerrar ventana modal
  $(this).closest('.modal').addClass('hidden');
     }
      });
});


  </script>
  
    <?php 
    if($totalSolitud==0){
        $gh=2;
    }else{
        $gh=1;
    }
    
    ?>

    <footer class="footer<?=$gh?>">
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
<span id="numero"><a href="tel:<?=$tel?>" class="no-link-style"><?=$tel?></a> - <a href="mailto:<?=$cor?>" class="no-link-style"><?=$cor?></a></span>
    </footer>

</body>
</html>
