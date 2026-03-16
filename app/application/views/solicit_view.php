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
    <title>Solicitudes Enviadas</title>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    
    <script src="<?=base_url()?>static/js/jquery-3.6.1.min.js"></script>

    <script>
      var appData = {
        uri_app : "<?= base_url() ?>",
        uri_ws  : "<?= base_url() ?>../webservice/"
      }
    </script>

    <style type="text/css">
        /* =======================================================
           1. FIX GLOBAL Y FLEXBOX (Con padding superior de 40px)
           ======================================================= */
        html { min-height: 100%; }
        
        body {
            margin: 0;
            overflow-x: hidden; 
            font-family: 'Open Sans', sans-serif;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .main-content {
            flex: 1 0 auto; 
            width: 100%;
            max-width: 1000px;
            margin: 0 auto;
            padding: 40px 20px 60px 20px; 
            box-sizing: border-box;
        }

        footer.footer-global {
            flex-shrink: 0;
            width: 100%;
            background-color: #1b1b38;
            color: #d4d4d9;
            text-align: center;
            padding: 15px;
            margin-top: auto;
            box-sizing: border-box;
        }

        /* =======================================================
           2. ESTILOS DE TARJETAS (TICKETS DE SOLICITUD)
           ======================================================= */
        .modern-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
            padding: 30px;
            margin-bottom: 30px;
            border-top: 5px solid #de4547; /* Acento rojo */
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .modern-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0,0,0,0.1);
        }

        .card-img-custom {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 10px;
            border: 1px solid #eee;
        }

        .message-box {
            background-color: #f9f9f9;
            padding: 15px;
            border-radius: 10px;
            border: 1px solid #eee;
            margin-top: 15px;
        }
    </style>
</head>

<body>

    <?php
    $fec = $this->db->select("left(now(),10)as fecha")->get()->result_array();
    $fecha = $fec["0"]["fecha"];

    function fecha_fancy($sFecha) {
        $aFecha = explode("-", $sFecha);
        $aMes = ["enero", "febrero", "marzo", "abril", "mayo", "junio", "julio", "agosto", "septiembre", "octubre", "noviembre", "diciembre"];
        return number_format($aFecha[2]) . " de " . $aMes[$aFecha[1] - 1] . " de " . $aFecha[0];
    }
    ?>

    <div style="position: relative; z-index: 9999;">
        <header class="header bg-gray-900 text-white">
            <nav class="flex flex-wrap items-center justify-between py-4 px-8">
                <div class="flex items-center space-x-4">
                    <img src="<?=base_url()?>static/images/image.ico" alt="Descripción de la imagen" class="w-10 h-10">
                    <h1 class="text-xl font-semibold">Rent House <i class="fas fa-key text-red-500"></i></h1>
                </div>
                <div class="flex items-center space-x-4">
                    <h2><i class="far fa-calendar-alt text-red-500"></i> Hoy es: <?=fecha_fancy($fecha)?></h2>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="<?=base_url()?>Frontend/perfil2/<?=$this->session->id_usu?>/<?=$this->session->tokenn?>" class="hover:text-red-400 transition-colors"><i class="fas fa-reply"></i>  Regresar</a>
                </div>
            </nav>
        </header>
    </div>

    <main class="main-content">
        
        <?php if ($totalSol == 0) : ?>
            <div class="text-center mt-10">
                <i class="fas fa-folder-open text-gray-300 text-6xl mb-4"></i>
                <h2 class="text-3xl font-bold text-gray-800">No has enviado solicitudes aún.</h2>
                <p class="text-gray-500 mt-2">Explora nuestras propiedades y contacta a los dueños para verlas aquí.</p>
            </div>
        <?php else: ?>
            
            <h2 class="text-3xl font-bold text-gray-800 mb-8 text-center border-b pb-4">
                <i class="fas fa-paper-plane mr-2 text-red-500"></i>
                Mis Solicitudes Enviadas (<?=$totalSol?>)
            </h2>

            <?php  
            foreach ($consulta4->result_array() as $mensaje) :

                $id_p = $this->db->select("id_propi")->from("propiedad")->where("id",$mensaje["id_prop"])->get()->row()->id_propi;
                $fo_p = $this->db->select("foto")->from("propiedad")->where("id",$mensaje["id_prop"])->get()->row()->foto;
                $nombre_p = $this->db->select("nombre")->from("propietario")->where("id",$id_p)->get()->row()->nombre;
                $ap_p = $this->db->select("ap")->from("propietario")->where("id",$id_p)->get()->row()->ap;
                $ap_cor = $this->db->select("correo")->from("propietario")->where("id",$id_p)->get()->row()->correo;
                $ap_tel = $this->db->select("tel")->from("propietario")->where("id",$id_p)->get()->row()->tel;
            ?>
            
            <div class="modern-card relative">
                <div class="flex justify-between items-start mb-4 border-b pb-4">
                    <div>
                        <h2 class="text-xl font-bold text-gray-800">Enviada a: <?=$nombre_p?> <?=$ap_p?></h2>
                        <p class="text-sm text-gray-500 mt-1"><i class="fas fa-calendar-check mr-1 text-red-400"></i> Enviado el <?=fecha_fancy($mensaje["fecha"]);?></p>
                    </div>
                    <button class="text-gray-400 hover:text-red-600 transition-colors" onclick="showDeleteModal(<?=$mensaje["id"]?>)" title="Eliminar solicitud">
                        <i class="fas fa-trash-alt fa-lg"></i>
                    </button>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 items-center">
                    
                    <div>
                        <p class="mb-3 text-gray-700">
                            <i class="fas fa-envelope text-red-500 mr-2 w-5 text-center"></i>
                            <span class="font-semibold">Correo:</span> 
                            <a href="mailto:<?=$ap_cor?>" class="text-blue-600 hover:underline ml-1"><?=$ap_cor?></a>
                        </p>
                        <p class="mb-4 text-gray-700">
                            <i class="fas fa-phone text-red-500 mr-2 w-5 text-center"></i>
                            <span class="font-semibold">Teléfono:</span> 
                            <a href="tel:<?=$ap_tel?>" class="text-blue-600 hover:underline ml-1"><?=$ap_tel?></a>
                        </p>
                        
                        <div class="message-box">
                            <p class="font-semibold text-gray-800 mb-1"><i class="fas fa-comment-dots text-red-500 mr-2"></i>Tu Mensaje:</p>
                            <p class="text-gray-600 text-sm italic">"<?=$mensaje["mensaje"]?>"</p>
                        </div>
                    </div>

                    <div>
                        <img src="<?=base_url()?>/static/images/casas/<?=$fo_p?>" alt="Propiedad solicitada" class="card-img-custom">
                    </div>
                    
                </div>
            </div>

            <?php endforeach; ?>
        <?php endif; ?>

    </main>

    <footer class="footer-global">
        <?php 
        $consulta = $this->db->select("*")->from("datos")->where("id",1)->get()->result_array();
        $nombre = $consulta["0"]["nombre"];
        ?>
        <?=$nombre?> - Rent House
    </footer>


    <div id="deleteModal" class="fixed inset-0 flex items-center justify-center z-50 hidden bg-black bg-opacity-50">
        <div class="bg-white rounded-lg shadow-xl p-6 w-full max-w-md transform transition-all">
            <div class="flex items-center mb-4">
                <div class="bg-red-100 rounded-full p-3 mr-3">
                    <i class="fas fa-exclamation-triangle text-red-600 text-xl"></i>
                </div>
                <h3 class="text-lg font-bold text-gray-900">Confirmar Eliminación</h3>
            </div>
            <p class="mb-6 text-gray-600">¿Estás seguro de que deseas eliminar esta solicitud permanentemente? Esta acción no se puede deshacer.</p>
            <div class="flex justify-end gap-3">
                <button id="cancelButton" class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold py-2 px-5 rounded-lg transition-colors" onclick="hideDeleteModal()">Cancelar</button>
                <button id="confirmDeleteButton" class="bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-5 rounded-lg shadow-md transition-colors" onclick="deleteResena()">Sí, eliminar</button>
            </div>
        </div>
    </div>

    <script>
      var idresenia;

      function showDeleteModal(id) {
        idresenia = id;
        document.getElementById('deleteModal').classList.remove('hidden');
      }

      function hideDeleteModal() {
        document.getElementById('deleteModal').classList.add('hidden');
      }

      function deleteResena() {
        $.ajax({
            "url" : appData.uri_ws+"backend/delesol/",
            "dataType" : "json",
            "type"  :   "post",
            "data"  :   { "id" : idresenia }
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