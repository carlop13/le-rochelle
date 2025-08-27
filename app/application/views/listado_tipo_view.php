<?php
$consulta = $this->db->select("*")->from("tipo")->where("activo",1)->get();

$consulta2 = $this->db->select("count(id) as ciu")->from("tipo")->where("activo",1)->get()->result_array();
$totalTipo = $consulta2["0"]["ciu"];
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
            <div id="listado-tipos-propiedades">
                <h2>Tipos de Propiedades</h2>
                <hr>
                <div class="contenedor-tabla">
                    <?php if($totalTipo==0): ?>
                        <h3>No hay tipos de propiedades agregadas</h3>
                        <?php else: ?>
                    <table class="listados">
                        <tr>
                            <th>No.</th>
                            <th>Tipo</th>
                            <th>Cantidad de Propiedades</th>
                            <th>Acciones</th>
                        </tr>

                        <?php
                        $s=0; 
                        foreach ($consulta->result_array() as $tipo) : 
                            $s++;
                        $ca = $this->db->select("count(id) as cantidad")->from("propiedad")->where("id_tipo",$tipo['id'])->where("disponible",1)->get()->row();
                        $cantidad = $ca->cantidad;
                            ?>
                            <tr>
                                <td> <?= $s ?></td>
                                <td> <?= $tipo['tipo'] ?></td>
                                <td style="text-align: center; padding-left: 10px;"><?= $cantidad ?></td>
                                <td>
                                    <form action="<?=base_url()?>Accesoad/actualizarT" method="post" class="form-acciones">
                                        <input type="hidden" name="id" value="<?= $tipo['id'] ?>">
                                        <input type="hidden" name="id_usu" value="<?= $this->session->id_usu ?>">
                                        <input type="hidden" name="token" value="<?= $this->session->token ?>">
                                        <input type="submit" value="Actualizar" name="actualizar">
                                        &nbsp;
                                        <a  href="#" id="<?= $tipo['id'] ?>" onclick="abrirModalT('<?= $tipo['id'] ?>','<?= $tipo['tipo'] ?>')" class="btn-eliminar">
                                        Eliminar
                                    </a>
                                    </form>

                                    
                                </td>
                            </tr>
                        <?php
                         endforeach; 
                         endif;?>
                    </table>
                </div>

                <!-- The Modal para la eliminación de una propiedad -->
                <div id="myModalT" class="modal">

                    <!-- Modal content -->
                    <div class="modal-content">
                        <span class="close">&times;</span>
                        <p id="men"></p>
                        <button onclick="eliminarTipo()">Si</button>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script>
        $('#link-listado-tipo-propiedades').addClass('pagina-activa');
    </script>

    <script src="<?=base_url()?>static/js/script2.js"></script>
</body>

</html>