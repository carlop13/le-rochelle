<?php

$consulta = $this->db->select("*")->from("propiedad")->order_by("id","desc")->where("disponible",0)->where("estado","Venta")->get();
//$totalPropiedades = $consulta["0"]["ciu"];

$consulta2 = $this->db->select("count(id) as ciu")->from("propiedad")->where("disponible",0)->where("estado","Venta")->get()->result_array();
$totalPropiedad = $consulta2["0"]["ciu"];

function fecha_fancy($sFecha) {
    // Convierte un String en arreglo
    $aFecha = explode("-", $sFecha);

    $aMes = ["enero", "febrero", "marzo", "abril", "mayo", "junio",
        "julio", "agosto", "septiembre", "octubre", "noviembre", "diciembre"];

    return number_format($aFecha[2]) . " de " . $aMes[$aFecha[1] - 1] . " de " . $aFecha[0];
}

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


<script type="text/javascript">
      var appData = {
    uri_app : "<?= base_url() ?>",
    uri_ws  : "<?= base_url() ?>../webservice/"
}
</script>

<body>
    <?php $this->load->view( "header_admin" ); ?>  

    <div id="contenedor-admin">
        <?php $this->load->view( "contenedor_menu" ); ?>

        <div class="contenedor-principal" style="width: 650px;">
            <div id="listado-propiedades" style="width: 400px;">
                <h2>Listado de Propiedades Vendidas</h2>
                <hr>
                <div class="contenedor-tabla" style="width: 600px;">
                    <?php if($totalPropiedad==0): ?>
                        <h3>Aún no has vendido propiedades crack</h3>
                        <?php else: ?>

                    <table>
                        <tr>
                            <th>No.</th>
                            <th>Título</th>
                            <th>Tipo</th>
                            <th>Estado</th>
                            <th>Ubicación</th>
                            <th>Fecha de Publicación</th>
                            <th> Acciones </th>
                        </tr>

                        <?php foreach ($consulta->result_array() as $propiedad) : 

                        $idd = $this->db->select("id_ciu")->from("propiedad")->where("id",$propiedad['id'])->get()->result_array();
                        $id_ciu=$idd["0"]["id_ciu"];

                        $ci = $this->db->select("nombre")->from("propiedad")->join("ciudad","propiedad.id_ciu = ciudad.id")->where("id_ciu",$id_ciu)->get()->result_array();
                        $ciudad=$ci["0"]["nombre"];

                        $tip = $this->db->select("tipo")->from("propiedad")->join("tipo","propiedad.id_tipo = tipo.id")->where("propiedad.id",$propiedad['id'])->get()->result_array();

                        $tipo=$tip["0"]["tipo"];

                            ?>
                            <tr>
                                <td> <?= $totalPropiedad ?></td>
                                <td> <?= $propiedad['titulo'] ?></td>
                                <td> <?= $tipo ?></td>
                                <td> <?= $propiedad['estado'] ?></td>
                                <td> <?= $ciudad ?></td>
                                <td> <?= fecha_fancy($propiedad['fecha_alta']); ?></td>
                                <td>

                                    <form action="<?=base_url()?>Accesoad/verdetalle" method="post" class="form-acciones">
                                        <input type="hidden" name="id" value="<?= $propiedad['id'] ?>">
                                        <input type="hidden" name="id_usu" value="<?= $this->session->id_usu ?>">
                                        <input type="hidden" name="token" value="<?= $this->session->token ?>">
                                        <input type="submit" value="Ver Detalle" name="detalle">
                                    </form>

                                    
                                </td>
                            </tr>
                        <?php
                        $totalPropiedad--;
                        endforeach;
                        endif; ?>
                    </table>
                </div>


            </div>
        </div>
    </div>
    <script>
       $('#link-dashboard').addClass('pagina-activa');
    </script>

   <script src="<?=base_url()?>static/js/script2.js"></script>
</body>

</html>