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
      font-size: 30px;
    }
    
    .rating input:checked ~ label {
      color: orange;
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

 @media only screen and (min-width: 50px) and (max-width: 366px) {

        body {
            width: 366px;
        }
    }
    </style>
</head>
<body class="bg-gray-100">

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

<?php 
$this->load->view( "header_propi_view" );

$consulta = $this->db->select("cliente.*,inquilino.fecha")->from("inquilino")->join("cliente","inquilino.id_cli = cliente.id")->where("inquilino.id_prop",$id_info)->get()->row();

$nombre = $consulta->nombre;
$correo = $consulta->correo;
$tel = $consulta->tel;
$fecha = $consulta->fecha;
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
      <p class="text-gray-600"><span class="font-semibold"><i class="fas fa-calendar mr-2"></i>Inicio arrendamiento:</span> <?=fecha_fancy($fecha);?></p>
    </div>

    <div class="bg-white rounded-lg shadow p-6 mb-8">
      <h2 class="text-xl font-semibold text-gray-800 mb-4">Escribir Reseña</h2>
      <form action="" method="post" id="resenaForm" class="mb-4">
    <div class="form-control" id="group-resena">
        <label for="resena" class="block text-gray-700 mb-2">Escribe tu reseña:</label>
        <textarea id="resena" name="resena" rows="4" class="w-full px-4 py-2 border border-gray-300 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent" placeholder="Escribe aquí tu reseña"></textarea>
      </div>
        <button type="submit" class="mt-4 py-2 px-4 bg-purple-500 text-white font-medium rounded-md hover:bg-purple-600 transition-colors duration-300">
          Enviar Reseña <i class="fas fa-paper-plane ml-2"></i>
        </button>

      </form>
    </div>

<?php 
$consulta2 = $this->db->select("resenia,fecha,id")->from("resenia")->where("id_propietario",$this->session->id_cli)->where("id_cli",$id_cliente)->get();

$consulta3 = $this->db->select("count(id) as id")->from("resenia")->where("id_propietario",$this->session->id_cli)->where("id_cli",$id_cliente)->get()->row();
$totalResenia = $consulta3->id;
?>
    <div class="bg-white rounded-lg shadow p-6 mb-8">
  <h2 class="text-xl font-semibold text-gray-800 mb-4">Reseñas que he Escrito</h2>

<?php 
if($totalResenia == 0):
?>
<h2 class="text-2xl text-gray-800">
  <i class="fas fa-pencil-alt mr-2 text-red-500"></i>
  Aún no has escrito sobre tu inquilino
</h2>
<?php 
else:
foreach ($consulta2->result_array() as $resenia) :
?>
  <div id="resenaList">
    <!-- Aquí se mostrarán las reseñas -->
    <div class="bg-gray-100 rounded-lg p-4 mb-4">
      <p class="text-gray-600">"<?=$resenia["resenia"]?>"</p>
      <div class="flex justify-between">
        <p class="text-sm text-gray-500">Fecha: <?=fecha2($resenia["fecha"]);?></p>
        <button class="text-red-500 hover:text-red-600 font-semibold" onclick="showDeleteModal(<?=$resenia["id"]?>)">
          Eliminar <i class="fas fa-trash-alt ml-1"></i>
        </button>
      </div>
    </div>
  </div>
  
  <?php 
endforeach;
endif;
?>

<!-- Ventana modal -->
<div id="deleteModal" class="fixed inset-0 flex items-center justify-center z-10 hidden">
  <div class="bg-white rounded-lg shadow-lg p-6">
    <h3 class="text-lg font-semibold mb-4">Confirmación</h3>
    <p class="mb-4">¿Realmente deseas eliminar esta reseña?</p>
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


  // Función para eliminar la reseña
  function deleteResena() {
    //console.log(idresenia);

    $.ajax({
            "url" : appData.uri_ws+"backend/deleteresenia/",
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

<!-- Terminar arrendamiento -->
    <div class="bg-white rounded-lg shadow p-6 mb-8">
      <button id="deleteButton" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded transition-colors duration-300">
      Finalizar Contrato <i class="fas fa-file-contract ml-2"></i>
    </button>
    </div>

  </div>

<!-- Ventana modal -->
<div id="deleteModal2" class="fixed inset-0 flex items-center justify-center z-10 hidden">
  <div class="bg-white rounded-lg shadow-lg p-6 w-96">
    <h3 class="text-lg font-semibold mb-4">Confirmación</h3>
    <p class="mb-4">¿Realmente quieres finalizar el contrato de arrendamiento con <strong><?=$nombre?></strong>?</p>
    <div class="rating mb-4">
      <p><strong>Califica tu experiencia con tu inquilino</strong> (Se registrará al dar clic en aceptar)</p>
      <input type="radio" name="star" id="star5" value="5">
      <label for="star5"></label>
      <input type="radio" name="star" id="star4" value="4">
      <label for="star4"></label>
      <input type="radio" name="star" id="star3" value="3">
      <label for="star3"></label>
      <input type="radio" name="star" id="star2" value="2">
      <label for="star2"></label>
      <input type="radio" name="star" id="star1" value="1">
      <label for="star1"></label>
    </div>
    <div class="flex justify-end">
      <button id="cancelButton2" class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded mr-2" onclick="hideDeleteModal2()">Cancelar</button>
      <button id="confirmDeleteButton2" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded" onclick="deleteArrenda()">Aceptar</button>
    </div>
  </div>
</div>


  <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.0/dist/alpine.js" defer></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js" defer></script>
  <script>
  $(document).ready(function() {
  borra_mensajes();

  $("#resenaForm").submit(function(event) {
    event.preventDefault();

    $(".form-control").keydown(borra_mensajes);
      borra_mensajes();

      if ($("#resena").val() == "") {
        error_formulario("resena", "El campo es requerido");
        return false;
      }
      else if ($("#resena").val().length > 180) {
        error_formulario("resena", "La reseña no puede ser mayor a 180 caracteres");
        return false;
      }
      else {
        $.ajax({
            "url" : appData.uri_ws+"backend/insertaresenia/",
            "dataType" : "json",
            "type"  :   "post",
            "data"  :   {
                "id_cli" : <?=$id_cliente?>,
                "id_propietario" : appData.id_propietario,
                "resenia" : $("#resena").val()
            }

          })
          .done(function(obj){
               if (obj.resultado) {
                alert(obj.mensaje);
                $(location).attr("href","");
               }
               else{
                alert(obj.mensaje);
               }
          });
  }

  });


});

   // Función para ocultar la ventana modal
  function hideDeleteModal2() {
    document.getElementById('deleteModal2').classList.add('hidden');
  }


  $("#deleteButton").click(function(){
    //alert("hola");
document.getElementById('deleteModal2').classList.remove('hidden');

  });

    function deleteArrenda() {
    //console.log(idresenia);
const stars = document.querySelectorAll('.rating input');
      let calificacion = 0;
      for (let i = 0; i < stars.length; i++) {
        if (stars[i].checked) {
          calificacion = 5 - i;
          break;
        }
      }
      console.log(`Calificación seleccionada: ${calificacion} estrellas`);

    $.ajax({
            "url" : appData.uri_ws+"backend/deletearrenda/",
            "dataType" : "json",
            "type"  :   "post",
            "data"  :   {
                "id_cli" : <?=$id_cliente?>,
                "id_propiedad" : <?=$id_info?>,
                "estrellas" : calificacion,
                "id_propietario" : appData.id_propietario
            }

          })
          .done(function(obj){
               if (obj.resultado) {
                alert(obj.mensaje);
                $(location).attr("href","");
               }
               else{
                alert(obj.mensaje);
                hideDeleteModal2();
               }
          });
  }

  </script>
  <?php $this->load->view( "footer_propi_view" );?>
</body>
</html>
