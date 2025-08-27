<?php 
$id = $this->db->select("id")->from("propiedad")->where("id_propi",$this->session->id_cli)->get()->row();
$id_propiedad = $id->id;
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?=base_url()?>static/images/image.ico">
    <meta author="Carlos Guadalupe López Trejo">
    <title>Pantalla Principal</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script src="<?=base_url()?>static/js/jquery-3.6.1.min.js"></script>
    <script src="<?=base_url()?>static/js/jquery-3.6.1.js"></script>
     <script>
            var appData = {
            uri_app : "<?= base_url() ?>",
            uri_ws  : "<?= base_url() ?>../webservice/",
            id_propied : "<?= $id_propiedad ?>",
            }
        </script>
    <style>
        /* Estilos adicionales */

        body {
             width: 100%;
        }

        .header {
            background-color: #0d083b;
            width: 100%;
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

<style type="text/css">
    .custom-link {
  background-color: #2fc28c; /* Verde similar a text-green-500 */
  color: white;
  padding: 10px 20px;
  border-radius: 4px;
  text-decoration: none;
  display: inline-flex;
  align-items: center;
}

    .custom-link:hover {
  background-color: #22996d; /* Verde similar a text-green-500 */
}


.custom-link span {
  margin-right: 5px;
}

.custom-link i {
  margin-left: 5px;
}


  @media only screen and (min-width: 50px) and (max-width: 378px) {

        .custom-link{
            margin-top: 20px;
        }

    }

      @media only screen and (min-width: 50px) and (max-width: 366px) {

        body {
            width: 366px;
        }
    }

</style>

<?php $this->load->view( "header_propi_view" );?>

    <div class="welcome-panel">
        <div class="welcome-panel-content">
            <h1 class="welcome-panel-heading">¡Bienvenido al Panel Principal! <?=urldecode($this->session->nombre)?></h1>
            <p class="welcome-panel-description">Aquí podrás ver las solicitudes de los usuarios interesados en alquilar tu propiedad.</p>

            <a href="<?=base_url()?>Frontend/mipropiedad/<?=$this->session->id_usu?>/<?=$this->session->tokenn?>/<?=$id_propiedad?>" class="welcome-panel-button">Ver mi Propiedad &nbsp; <i class="fas fa-city"></i></a>
&nbsp;

<?php 
$exis = $this->db->from("inquilino")->where("id_prop",$id_propiedad)->get();

$existe = $exis->num_rows() > 0 ? 1 : 2;

if($existe == 1):
?>
<a href="<?=base_url()?>Frontend/elegirinqui/<?=$this->session->id_usu?>/<?=$this->session->tokenn?>/<?=$id_propiedad?>" class="custom-link">
              <span>Ver inquilino</span>
              <i class="fas fa-user"></i> 
            </a>
<?php 
else:
?>
          <a href="<?=base_url()?>Frontend/elegirinqui/<?=$this->session->id_usu?>/<?=$this->session->tokenn?>/<?=$id_propiedad?>" class="custom-link">
              <span>Eligir inquilino</span>
              <i class="fas fa-users"></i> 
            </a>
<?php 
endif;
?>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 mt-8">
                <div class="flex flex-col items-center">
                    <i class="fas fa-users fa-3x text-purple-500"></i>
                    <h2 class="mt-4 text-lg font-semibold">Usuarios</h2>
                    <p class="text-gray-500">Visualiza potenciales inquilinos</p>
                </div>
                <div class="flex flex-col items-center">
                    <i class="fas fa-house fa-3x text-green-500"></i>
                    <h2 class="mt-4 text-lg font-semibold">Propiedad</h2>
                    <p class="text-gray-500">Visualiza tu propiedad</p>
                </div>
                <div class="flex flex-col items-center">
                    <i class="far fa-comments fa-3x text-blue-500"></i>
                    <h2 class="mt-4 text-lg font-semibold">Comentarios</h2>
                    <p class="text-gray-500">Comenta sobre tu inquilino</p>
                </div>
            </div>
        </div>
    </div>


<?php $this->load->view( "footer_propi_view" );?>

</body>
</html>