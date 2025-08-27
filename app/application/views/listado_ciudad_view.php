<?php
$consulta = $this->db->select("ciudad.*,pais")->from("ciudad")->join("pais","ciudad.id_pais = pais.id")->where("ciudad.activo",1)->order_by("pais","desc")->get();

$consulta2 = $this->db->select("count(id) as ciu")->from("ciudad")->where("activo",1)->get()->result_array();
$totalCiudad = $consulta2["0"]["ciu"];
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
     <link rel="stylesheet" href="<?=base_url()?>static/css/estilolog.css">
    <link rel="shortcut icon" href="<?=base_url()?>static/images/image.ico">
    <meta author="Carlos Guadalupe López Trejo">
    <title>SAWPLR - Admin</title>
    <script src="<?=base_url()?>static/js/jquery-3.6.1.min.js"></script>
    <script src="<?=base_url()?>static/js/jquery-3.6.1.js"></script>
</head>

<script type="text/javascript">
      var appData = {
    uri_app : "<?= base_url() ?>",
    uri_ws  : "<?= base_url() ?>../webservice/"
}
</script>

<style type="text/css">
    #contenedor-admin {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            max-width: 1500px;
            margin: 0 auto;
            padding: 20px;
        }
        </style>

<body>
    <?php $this->load->view( "header_admin" ); ?>  

    <div id="contenedor-admin">
        <?php $this->load->view( "contenedor_menu" ); ?>

        <div class="contenedor-principal">
            <div id="listado-paises">
                <h2>Listado de Ciudades</h2>
                <hr>
                <div class="contenedor-tabla">
                    <?php if($totalCiudad==0): ?>
                        <h3>No hay ciudades agregadas</h3>
                        <?php else: ?>
                    <table class="listados">
                        <tr>
                            <th>No.</th>
                            <th>Nombre del Pais</th>
                            <th>Nombre de la Ciudad</th>
                            <th>Cantidad de Propiedades</th>
                            <th>Acciones</th>
                        </tr>

                         <?php
                        $s=0; 
                        foreach ($consulta->result_array() as $ciudad) : 
                            $s++;
                        $ca = $this->db->select("count(id) as cantidad")->from("propiedad")->where("id_ciu",$ciudad['id'])->where("disponible",1)->get()->row();
                        $cantidad = $ca->cantidad;
                            ?>
                            <tr>
                                <td> <?= $s ?></td>
                                <td> <?= $ciudad['pais'] ?></td>
                                <td> <?= $ciudad['nombre'] ?></td>
                                <td style="text-align: center; padding-left: 10px;"><?= $cantidad ?></td>
                                <td>
                                    <form action="<?=base_url()?>Accesoad/actualizarCiu" method="post" class="form-acciones">
                                        <input type="hidden" name="id" value="<?= $ciudad['id'] ?>">
                                        <input type="hidden" name="id_usu" value="<?= $this->session->id_usu ?>">
                                        <input type="hidden" name="token" value="<?= $this->session->token ?>">
                                        <input type="submit" value="Actualizar" name="actualizar">
                                         &nbsp;
                                        <a  href="#" id="<?= $ciudad['id'] ?>" onclick="abrirModalCiu('<?= $ciudad['id'] ?>','<?= $ciudad['nombre'] ?>')" class="btn-eliminar">
                                        Eliminar
                                    </a>
                                    </form>
                                </td>
                            </tr>
                         <?php endforeach;
                        endif; ?>
                    </table>
                </div>

                 <!-- The Modal para la eliminación de una propiedad -->
                <div id="myModalCiu" class="modal">

                    <!-- Modal content -->
                    <div class="modal-content">
                        <span class="close">&times;</span>
                        <p id="men"></p>
                        <button onclick="eliminarCiudad()">Si</button>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script>
        $('#link-listado-ciudades').addClass('pagina-activa');
    </script>

    <script>
        
var idEliminarCiu;

function abrirModalCiu(idt,ciudad) {
    idEliminarCiu = idt;
    var modal = document.getElementById("myModalCiu");

    // Get the button that opens the modal
    var btn = document.getElementById(idt);

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    var mensaje = document.getElementById("men");
    mensaje.innerHTML = "¿Realmente deseas eliminar a <strong>"+ciudad+"</strong> de tu lista de ciudades?";

    // When the user clicks on the button, open the modal 
    //btn.onclick = function() {
    modal.style.display = "flex";
    //}

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
}

function eliminarCiudad() {
    $(document).ready(function(){

 $.ajax({
      "url": appData.uri_ws + "backend/deleciudad/",
      "dataType": "json",
      "type": "post",
      "data": {
        "id": idEliminarCiu
      }
    })
    .done(function(obj) {
        alert(obj);
       $(location).attr("href","");
    });

});
    //window.location.href = "eliminar-propiedad.php?idPropiedad=" + idEliminarT;
}
    </script>

</body>

</html>