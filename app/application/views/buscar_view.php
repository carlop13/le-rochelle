
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?=base_url()?>static/images/image.ico">
    <meta author="Carlos Guadalupe López Trejo">
    <title><?=ucfirst($estado)?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="<?=base_url()?>/static/css/estilo.css">
    <script src="<?=base_url()?>static/js/jquery-3.6.1.min.js"></script>
    <script src="<?=base_url()?>static/js/jquery-3.6.1.js"></script>
    <script src="<?=base_url()?>static/js/mensajes.js" ></script>


</head>


<body class="page-busqueda">
    <div class="container">
        <?php $this->load->view( "header_view" ); ?>

        <div class="box-buscar-propiedades pos-centrada">
            <div class="box-interior">
                <p>Encuentra la propiedad que buscas</p>

                <form action="<?=base_url()?>frontend/buscar/" method="post">

                    <select name="ciudad" id="ciudad">
                        <option value="0">Seleccione Ciudad</option>
                        <?php 
                        $result_ciudades = $this->db->select("ciudad.*,pais")->from("ciudad")->join("pais","ciudad.id_pais = pais.id")->where("ciudad.activo",1)->order_by("pais","desc")->get();
                        foreach ($result_ciudades->result_array() as $ciudad) : ?>

                            <option value="<?= $ciudad['id'] ?>">
                                <?= $ciudad['nombre'] ?>
                            </option>
                        <?php endforeach ?>

                    </select>
                    <select name="tipo" id="tipo">
                        <option value="0">Tipo de Propiedad</option>
                        <?php
                        $result_tipo = $this->db->select("*")->from("tipo")->where("activo",1)->get();
                         foreach ($result_tipo->result_array() as $tipo) : ?>
                            <option value="<?= $tipo['id'] ?>">
                                <?= $tipo['tipo'] ?>
                            </option>
                        <?php endforeach ?>
                    </select>
                    <div class="estado">
                        <span>
                            <input type="radio" value="alquiler" name="estado" checked> Alquiler
                        </span>
                        <span>
                            <input type="radio" value="venta" name="estado"> Venta
                        </span>
                    </div>

                    <input type="submit" value="Buscar" name="buscar">
                </form>
            </div>
        </div>


        <div class="contenedor-busqueda">

            <?php  
$consulta =  $this->db->select("tipo")->from("tipo")->where("id",$id_tipo)->get()->result_array();

 if (!empty($consulta)) {
$tipo = $consulta["0"]["tipo"];
}
else{
    $tipo = "nada";
}


$consulta2 =  $this->db->select("nombre")->from("ciudad")->where("id",$id_ciu)->get()->result_array();

 if (!empty($consulta2)) {
$ciudad = $consulta2["0"]["nombre"];
}
else{
    $ciudad = "nada";
}

?>

                    <?php 
                    $es=ucfirst($estado);

                    if($id_ciu == 0 && $id_tipo == 0){
                        $result_propiedades = $this->db->select("*")->from("propiedad")->where("estado",$es)->where("disponible",1)->get();
                         ?>
                    <h3>Resultado de Busqueda: <span><?=$es ?> <span></h3>
                    <?php 
                    }
                    elseif($id_ciu == 0){
                        $result_propiedades = $this->db->select("*")->from("propiedad")->where("id_tipo",$id_tipo)->where("estado",$es)->where("disponible",1)->get();
                         ?>
                    <h3>Resultado de Busqueda: <span><?=$tipo?> en <?=$es ?><span></h3>
                    <?php 
                    }
                    elseif($id_tipo == 0){
                        $result_propiedades = $this->db->select("*")->from("propiedad")->where("id_ciu",$id_ciu)->where("estado",$es)->where("disponible",1)->get();
                         ?>
                    <h3>Resultado de Busqueda: <span><?=$ciudad?> en <?=$es ?><span></h3>
                    <?php 
                    }
                    else{
                    $result_propiedades = $this->db->select("*")->from("propiedad")->where("id_ciu",$id_ciu)->where("id_tipo",$id_tipo)->where("estado",$es)->where("disponible",1)->get();
                    ?>
                    <h3>Resultado de Busqueda: <span><?=$ciudad?>, <?=$tipo?> en <?=$es ?> <span></h3>
                    <?php 
                    }
                    $contador=0;
                    ?>


           <?php foreach ($result_propiedades->result_array() as $propiedad) : 
            
            $mon = $this->db->select("simbolo,signo")->from("propiedad")->join("moneda","propiedad.id_mon = moneda.id")->where("propiedad.id",$propiedad['id'])->get()->result_array();

            $simbolo=$mon["0"]["simbolo"];
            $signo=$mon["0"]["signo"];

            $t = $this->db->select("tipo")->from("tipo")->where("id",$propiedad['id_tipo'])->get()->result_array();

            $tipoo=$t["0"]["tipo"];
            ?>
                <form action="<?=base_url()?>frontend/informacion/<?=$propiedad['id']?>/6" id="<?= $propiedad['id'] ?>" method="post">
                    <input type="hidden" value="<?=$propiedad['id'] ?>" name="idPropiedad">
                    <div class="resultado" onclick="document.getElementById('<?= $propiedad['id'] ?>').submit();">
                        <div class="contenedor-imagen">
                            <img src="<?=base_url()?>static/images/casas/<?=$propiedad['foto']?>"alt="<?=$propiedad['titulo']?>"  >
                        </div>
                        <div class="info">
                            <?php 
                            $consulta3 =  $this->db->select("nombre")->from("ciudad")->where("id",$propiedad['id_ciu'])->get()->result_array();
                            $ciudadd = $consulta3["0"]["nombre"];
                            ?>
                            <span class="titulo"><?=$propiedad['titulo'] ?></span>
                            <p> <i class="fa-solid fa-location-pin"></i> <?= $propiedad['calle'] ?> <?= $propiedad['noext'] ?> <?= $propiedad['col']?>, <?=$ciudadd?></p>
                            <div class="detalles">
                                <div class="dato1">
                                    <span class="header">Tipo</span>
                                    <span class="texto"><?=$tipoo?></span>
                                </div>
                                <div class="dato1">
                                    <span class="header">Estado</span>
                                    <span class="texto"><?= $propiedad['estado'] ?></span>
                                </div>
                                <div class="dato1" id="detalle-ocultar">
                                    <span class="header">Habitaciones</span>
                                    <span class="texto"><?= $propiedad['habitaciones'] ?></span>
                                </div>
                                <div class="dato1" id="detalle-ocultar">
                                    <span class="header">Baños</span>
                                    <span class="texto"><?= $propiedad['banios'] ?></span>
                                </div>
                                <?php  
                                if ($propiedad["mbanios"] != "") :
                                ?>
                                <div class="dato1" id="detalle-ocultar">
                                    <span class="header">Medios Baños</span>
                                    <span class="texto"><?= $propiedad['mbanios'] ?></span>
                                </div>
                                <?php  
                            endif;
                                ?>
                                <div class="dato1" id="detalle-ocultar">
                                    <span class="header">Superficie Total</span>
                                    <span class="texto"><?= $propiedad['suptot'] ?></span>
                                </div>
                                <div class="dato1">
                                    <span class="header">Precio</span>
                                    <span class="texto"><?=$simbolo?> <?=$signo == "?" ? "€" : $signo ?><?=number_format($propiedad['precio'],2,'.',',') ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

            <?php
            $contador++;
             endforeach ?>
        </div>

    </div>

<style type="text/css">
        .inferior3 {
  position: fixed;
  bottom: 0;
  left: 0;
  width: 100%;
}

 @media only screen and (min-width: 120px) and (max-width: 650px) {
        /* Footer */
    footer.inferior3 {
        position: relative;
        margin-top: 200px;
    }
 }

  @media only screen and (min-height: 900px) and (max-height: 1090px) {
        /* Footer */
    footer.inferior3 {
        position: fixed;
    }
 }


  @media only screen and (min-width: 120px) and (max-width: 650px) {
        /* Footer */
    footer.inferior2 {
        position: relative;
        margin-top: 200px;
    }
 }

  @media only screen and (min-width: 651px) and (max-width: 1300px) {
        /* Footer */
    footer.inferior2 {
        position: fixed;
        bottom: 0;
    }

 }


 @media only screen and (min-height: 599px) and (max-height: 690px) {
        /* Footer */
  footer.inferior2 {
        position: relative;
        margin-top: 200px;
    }
 }


 @media only screen  and (min-width: 1300px) and (max-width: 1500px) and (min-height: 720px) and (max-height: 1300px) {
        /* Footer */
    footer.inferior2 {
        position: fixed;
        bottom: 0;
    }

 }

  @media only screen  and (min-width: 700px) and (max-width: 715px) and (min-height: 1100px) and (max-height: 1140px) {
        /* Footer */
   footer.inferior2 {
        position: relative;
        margin-top: 200px;
    }

 }

   @media only screen  and (min-width: 799px) and (max-width: 815px) and (min-height: 1279px) and (max-height: 1290px) {
        /* Footer */
   footer.inferior2 {
        position: relative;
        margin-top: 200px;
    }

 }

    @media only screen  and (min-width: 819px) and (max-width: 830px) and (min-height: 1179px) and (max-height: 1190px) {
        /* Footer */
   footer.inferior2 {
        position: relative;
        margin-top: 200px;
    }

 }

     @media only screen  and (min-width: 759px) and (max-width: 770px) and (min-height: 1020px) and (max-height: 1030px) {
        /* Footer */
   footer.inferior2 {
        position: relative;
        margin-top: 200px;
    }

 }

      @media only screen  and (min-width: 1279px) and (max-width: 1290px) and (min-height: 790px) and (max-height: 810px) {
        /* Footer */
   footer.inferior2 {
        position: relative;
        margin-top: 200px;
    }

 }

    </style>

    <?php 
    if($contador==0){
        $gh=3;
    }else{
        $gh=2;
    }
    
    ?>

    <footer class="inferior<?=$gh?>">
             <?php $this->load->view( "footer_view" );?>
    </footer>
    <script src="<?=base_url()?>static/js/script.js"></script>
</body>

</html>