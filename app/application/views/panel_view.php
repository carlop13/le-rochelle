<?php
$consulta = $this->db->select("count(id) as ciu")->from("ciudad")->where("activo",1)->get()->result_array();
$totaCiudades = $consulta["0"]["ciu"];

$consulta2 = $this->db->select("count(id) as ciu")->from("propiedad")->where("disponible",1)->get()->result_array();
$totalPropiedades = $consulta2["0"]["ciu"];

$consulta3 = $this->db->select("count(id) as ciu")->from("tipo")->where("activo",1)->get()->result_array();
$totalTipos = $consulta3["0"]["ciu"];

$consulta4 = $this->db->select("count(id) as ciu")->from("pais")->where("activo",1)->get()->result_array();
$totalPaises = $consulta4["0"]["ciu"];

$consulta5 = $this->db->select("count(destacado.id) as ciu")->from("destacado")->join("propiedad","destacado.id_prop = propiedad.id")->where("disponible",1)->get()->result_array();
$totalDestacado = $consulta5["0"]["ciu"];

$consulta6 = $this->db->select("count(id) as ciu")->from("propiedad")->where("disponible",0)->where("estado","Venta")->get()->result_array();
$totalVendidas = $consulta6["0"]["ciu"];

$consulta7 = $this->db->select("count(solicitud.id) as ciu")->from("solicitud")->join("propiedad","solicitud.id_prop = propiedad.id")->where("disponible",1)->get()->result_array();
$totalSoli = $consulta7["0"]["ciu"];

$consulta8 = $this->db->select("count(cliente.id) as ciu")->from("cliente")->join("usuario","cliente.id_usu = usuario.id")->where("usuario.activo",1)->get()->result_array();
$totalcli = $consulta8["0"]["ciu"];

$consulta9 = $this->db->select("count(id) as ciu")->from("mensaje")->get()->result_array();
$totalmens = $consulta9["0"]["ciu"];
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="<?=base_url()?>static/js/jquery-3.6.1.min.js"></script>
  <script src="<?=base_url()?>static/js/jquery-3.6.1.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="<?=base_url()?>static/css/estilolog.css">
    <link rel="shortcut icon" href="<?=base_url()?>static/images/image.ico">
    <meta author="Carlos Guadalupe López Trejo">
    <title>SAWPLR - Admin</title>
    <style>



        #contenedor-admin {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            max-width: 1500px;
            margin: 0 auto;
            padding: 20px;
        }

    

    </style>
</head>

<script type="text/javascript">
      var appData = {
    uri_app : "<?= base_url() ?>",
    uri_ws  : "<?= base_url() ?>../webservice/",
}

$(document).ready(function(){ 

        function getdatos(){
          $.ajax({
            "url" : appData.uri_ws+"backend/totalDatos/",
            "dataType" : "json"

          })
          .done(function(obj){
            document.getElementById("solicitudes").innerText = obj.solicitudes;
            document.getElementById("clientes").innerText = obj.clientes;
            document.getElementById("mensajes").innerText = obj.mensajes;
          });
        }

        setInterval(getdatos,800);

});
</script>

<body>
<?php $this->load->view( "header_admin" ); ?>    
    <div id="contenedor-admin">

        <?php $this->load->view( "contenedor_menu" ); ?>

        <div class="contenedor-principal">
            <div id="dashboard">
                <h2>Panel Principal</h2>
                <hr>

                <div class="contenedor-cajas-info">
                    <div class="caja-info propiedades">
                        <p>Total Popiedades</p>
                        <hr>
                        <span class="dato"><?= $totalPropiedades ?></span>
                        <hr>
                        <a href="<?=base_url()?>Accesoad/lisprop/<?=$this->session->id_usu?>/<?=$this->session->token?>">Ver Detalles</a>
                    </div>
                    <div class="caja-info tipo">
                        <p>Total Tipo de Propiedades</p>
                        <hr>
                        <span class="dato"><?= $totalTipos ?></span>
                        <hr>
                        <a href="<?=base_url()?>Accesoad/listip/<?=$this->session->id_usu?>/<?=$this->session->token?>">Ver Detalles</a>
                    </div>
                    <div class="caja-info paises">
                            <p>Total Paises</p>
                            <hr>
                            <span class="dato"><?= $totalPaises ?></span>
                            <hr>
                            <a href="<?=base_url()?>Accesoad/lispais/<?=$this->session->id_usu?>/<?=$this->session->token?>">Ver Detalles</a>
                        </div>
                    <div class="caja-info ciudades">
                        <p>Total Ciudades</p>
                        <hr>
                        <span class="dato"><?= $totaCiudades ?></span>
                        <hr>
                        <a href="<?=base_url()?>Accesoad/lisciudad/<?=$this->session->id_usu?>/<?=$this->session->token?>">Ver Detalles</a>
                    </div>
                </div>
<br>
                <div class="contenedor-cajas-info">
                    <div class="caja-info paises">
                        <p>Total Popiedades Descatadas</p>
                        <hr>
                        <span class="dato"><?= $totalDestacado ?></span>
                        <hr>
                        <a href="<?=base_url()?>Accesoad/destacadas/<?=$this->session->id_usu?>/<?=$this->session->token?>">Ver Detalles</a>
                    </div>
<!--
                    <div class="caja-info tipo">
                        <p>Total de Popiedades Vendidas</p>
                        <hr>
                        <span class="dato"><?= $totalVendidas ?></span>
                        <hr>
                        <a href="<?=base_url()?>Accesoad/vendidas/<?=$this->session->id_usu?>/<?=$this->session->token?>">Ver Detalles</a>
                    </div>
-->
                    <div class="caja-info ciudades">
                        <p>Total Solicitudes de Renta</p>
                        <hr>
                        <span class="dato" id="solicitudes"><?= $totalSoli ?></span>
                        <hr>
                        <a href="<?=base_url()?>Accesoad/solicitud/<?=$this->session->id_usu?>/<?=$this->session->token?>">Ver Detalles</a>
                    </div>

                     <div class="caja-info propiedades">
                        <p>Total Personas en Rent House</p>
                        <hr>
                        <span class="dato" id="clientes"><?= $totalcli ?></span>
                        <hr>
                        <a href="<?=base_url()?>Accesoad/clientes/<?=$this->session->id_usu?>/<?=$this->session->token?>">Ver Detalles</a>
                    </div>

                    <div class="caja-info tipo">
                        <p>Total Mensajes</p>
                        <hr>
                        <span class="dato" id="mensajes"><?= $totalmens ?></span>
                        <hr>
                        <a href="<?=base_url()?>Accesoad/mensajes/<?=$this->session->id_usu?>/<?=$this->session->token?>">Ver Detalles</a>
                    </div>
                 
                </div>

            </div>
        </div>
    </div>

    <script>
        $('#link-dashboard').addClass('pagina-activa');
    </script>

</body>

</html>
