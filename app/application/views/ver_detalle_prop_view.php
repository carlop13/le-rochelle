<?php

$idd = $this->db->select("id_ciu")->from("propiedad")->where("id",$id)->get()->result_array();
$id_ciu=$idd["0"]["id_ciu"];

$iddd = $this->db->select("id_propi")->from("propiedad")->where("id",$id)->get()->result_array();
$id_propi=$iddd["0"]["id_propi"];

$ci = $this->db->select("nombre")->from("propiedad")->join("ciudad","propiedad.id_ciu = ciudad.id")->where("id_ciu",$id_ciu)->get()->result_array();
$ciudad=$ci["0"]["nombre"];

$tip = $this->db->select("tipo")->from("propiedad")->join("tipo","propiedad.id_tipo = tipo.id")->where("propiedad.id",$id)->get()->result_array();

$tipo=$tip["0"]["tipo"];

$consulta = $this->db->select("*")->from("propiedad")->where("id",$id)->get()->row();

$titulo=$consulta->titulo;
$estado=$consulta->estado;
$calle=$consulta->calle;
$col=$consulta->col;
$noext=$consulta->noext;
$habitaciones=$consulta->habitaciones;
$banios=$consulta->banios;
$pisos=$consulta->pisos;
$garage=$consulta->garage;
$precio=$consulta->precio;
$foto=$consulta->foto;
$noesta = $consulta->noesta;
$ancho = $consulta->ancho;
$fondo = $consulta->fondo;
$suptot = $consulta->suptot;
$mconst = $consulta->mconst;
$ctoser = $consulta->ctoser;
$mbanios = $consulta->mbanios;

$consulta2 = $this->db->select("*")->from("descripcion")->where("id_prop",$id)->get()->row();

    if (!empty($consulta2)) {
    $desc=$consulta2->descripcion;
}
else{
    $desc = "No hay descripción";
}


$mon = $this->db->select("simbolo,signo")->from("propiedad")->join("moneda","propiedad.id_mon = moneda.id")->where("propiedad.id",$id)->get()->result_array();

if (!empty($mon)) {
            $simbolo=$mon["0"]["simbolo"];
            $signo=$mon["0"]["signo"];
        }
        else{
           $simbolo="simbolo";
            $signo="signo"; 
        }


$paiss = $this->db->select("pais")->from("ciudad")->join("pais","ciudad.id_pais = pais.id")->where("ciudad.id",$id_ciu)->get()->result_array();

if (!empty($paiss)) {
            $pais=$paiss["0"]["pais"];
        }
        else{
            $pais = "Sin país";
        }


$pr = $this->db->select("nombre,ap,tel,correo")->from("propietario")->where("id",$id_propi)->get()->result_array();

if (!empty($pr)) {
            $nombre_propietario=$pr["0"]["nombre"];
            $ap_propietario=$pr["0"]["ap"];
            $telefono_propietario=$pr["0"]["tel"];
            $co_propietario=$pr["0"]["correo"];
        }
        else{
            $nombre_propietario="Sin propietario";
            $ap_propietario=" ";
            $telefono_propietario="Sin telefono";
            $co_propietario="Sin correo";
        }


?>






<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <meta author="Carlos Guadalupe López Trejo">
    <link rel="stylesheet" href="<?=base_url()?>static/css/estilolog.css">
    <link rel="shortcut icon" href="<?=base_url()?>static/images/image.ico">
    <link rel="stylesheet" href="estilo.css">
    <title>SAWPLR - Admin</title>
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

<body>
     <?php $this->load->view( "header_admin" ); ?>   
    

    <div id="contenedor-admin">
       <?php $this->load->view( "contenedor_menu" ); ?>

       <script>
        $('#link-listado-propiedades').addClass('pagina-activa');
    </script>

        <div class="contenedor-principal">
            <div id="detalle-propiedad">
                <h2>Detalle de Propiedad</h2>
                <hr>
                <div class="contenedor-tabla">
                    <h3>Descripción de la propiedad</h3>
                    <table class="descripcion">
                        <tr>
                            <td>No. de Propiedad</td>
                            <td><?= $id ?></td>
                        </tr>
                        <tr>
                            <td>Título de la Propiedad:</td>
                            <td> <?= $titulo ?> </td>
                        </tr>

                        <tr>
                            <td>Descripción de la Propiedad</td>
                            <td> <?= $desc ?> </td>
                        </tr>

                        <tr>
                            <td>Tipo de propiedad</td>
                            <td> <?= $tipo ?> </td>
                        </tr>

                        <tr>
                            <td>Estado de la propiedad</label></td>
                            <td> <?= $estado ?> </td>
                        </tr>

                        <tr>
                            <td>Ubicación</label></td>
                            <td> <?= $calle ?> <?= $noext ?> <?= $col?>, <?=$ciudad?> <?=$pais?> </td>
                        </tr>

                        <tr>
                            <td>Habitaciones</label></td>
                            <td> <?= $habitaciones ?> </td>
                        </tr>

                        <tr>
                            <td>Baños Completos</td>
                            <td> <?= $banios ?> </td>
                        </tr>

                        <tr>
                            <td>Medios Baños</td>
                            <td> <?= $mbanios ?> </td>
                        </tr>

                        <tr>
                            <td>Estacionamientos</td>
                            <td> <?= $noesta ?> </td>
                        </tr>

                         <tr>
                            <td>Pisos</td>
                            <td> <?= $pisos ?> </td>
                        </tr>

                        <tr>
                            <td>Metros de Construcción</td>
                            <td> <?= $mconst ?> </td>
                        </tr>

                        <tr>
                            <td>Cuarto de Servicio</td>
                            <td> <?= $ctoser != "noMo" ? $ctoser : "" ?> </td>
                        </tr>

                        <tr>
                            <td>Garage</td>
                            <td> <?= $garage != "noMo" ? $garage : "" ?> </td>
                        </tr>

                        <tr>
                            <td>Dimensiones</td>
                            <td> <strong>Ancho:</strong> <?= $ancho ?> &nbsp;&nbsp;  <strong>Fondo:</strong> <?=$fondo?> &nbsp;&nbsp; <strong>Superficie Total:</strong> <?=$suptot?></td>
                        </tr>

                        <tr>
                            <td>Precio (Alquiler o Venta)</td>
                            <td> <?=$simbolo?> <?=$signo == "?" ? "€" : $signo ?><?=number_format($precio, 2, '.', ',') ?> </td>
                        </tr>
                    </table>
                </div>

                <div class="contenedor-tabla">
                    <h3>Galería de Fotos</h3>
                    <table class="descripcion">
                        <tr>
                            <td>Foto Principal</td>
                            <td><img src="<?=base_url()?>static/images/casas/<?=$foto?>" alt="<?=$titulo?>"></td>
                        </tr>

                        <tr>
                            <td> Galería</td>
                            <td><?php $fotos = $this->db->select("*")->from("foto")->where("id_prop",$id)->get(); ?>
                                <?php foreach ($fotos->result_array() as $foto) : ?>

                                    <img src="<?=base_url()?>static/images/casas/<?=$foto['foto']?>">

                                <?php endforeach ?>
                            </td>
                        </tr>
                    </table>
                </div>


                <div class="contenedor-tabla">
                    <h3>Ubicación y Datos del propietario</h3>

                    <table class="descripcion">
                        <tr class="fila">
                            <td><label for="pais">Pais</td>
                            <td> <?= $pais ?> </td>
                        </tr>
                        <tr class="fila">
                            <td>Ciudad</td>
                            <td> <?= $ciudad ?> </td>
                        </tr>

                        <tr>
                            <td>Nombre del propietario</td>
                            <td> <?= $nombre_propietario ?> <?= $ap_propietario ?> </td>
                        </tr>
                        <tr>
                            <td>Teléfono del propietario</td>
                            <?php 
                            if ($telefono_propietario == "Sin telefono"):
                            ?>
                            <td><?= $telefono_propietario ?></td>
                            <?php 
                            else:
                            ?>
                            <td><a href="tel:<?=$telefono_propietario?>"><?= $telefono_propietario ?></a></td>
                            <?php 
                            endif;
                            ?>
                        </tr>
                         <tr>
                            <td>Correo del propietario</td>
                            <?php 
                            if ($co_propietario == "Sin correo"):
                            ?>
                            <td><?= $co_propietario ?></td>
                            <?php 
                            else:
                            ?>
                            <td><a href="mailto:<?=$co_propietario?>"><?= $co_propietario ?></a></td>
                            <?php 
                            endif;
                            ?>
                        </tr>
                    </table>
                </div>


            </div>
        </div>
    </div>

</body>

</html>