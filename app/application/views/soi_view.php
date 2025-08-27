<?php
$Totalpropiedades = $this->db->select("count(id) as id")->from("propiedad")->where("disponible",1)->where("estado","Alquiler")->get()->row()->id;
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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
        .contenedor-busqueda {
  display: flex;
  flex-wrap: wrap;
  gap: 1rem;
}

.contenedor-resultados {
  display: flex;
  gap: 2rem;
}


.resultado {
  display: flex;
  align-items: center;
  gap: 1rem;
  padding: 1rem;
  background-color: #ededf0;
  border-radius: 0.5rem;
  cursor: pointer;
  flex-basis: 50%;
}



.solicitudes-icono {
  font-size: 24px;
  margin-right: 5px;
}

.solicitudes-titulo {
  font-weight: bold;
}

.solicitudes-enlace a {
  color: blue;
  text-decoration: underline;
}



.contenedor-imagen img {
  width: 100px;
  height: 100px;
  object-fit: cover;
  border-radius: 0.25rem;
}

.info {
  flex-grow: 1;
}

.titulo {
  font-size: 1.25rem;
  font-weight: bold;
}

.detalles {
  display: flex;
  gap: 1rem;
}

.dato1 {
  display: flex;
  flex-direction: column;
}

.header {
  font-weight: bold;
  color: #4B5563;
}

.texto {
  color: #6B7280;
}


    

    </style>
</head>

<body>
<?php $this->load->view( "header_admin" ); ?>    
    <div id="contenedor-admin">

        <?php $this->load->view( "contenedor_menu" ); ?>

        <div class="contenedor-principal">
            <div id="dashboard">
                <h2>Rent House</h2>
                <hr>

                <div class="contenedor-cajas-info">

                       <div class="contenedor-busqueda">


                    <?php 
                        $result_propiedades = $this->db->select("*")->from("propiedad")->where("disponible",1)->where("estado","Alquiler")->get();

                    ?>
<?php if($Totalpropiedades==0): ?>
                        <h3>Por el momento no hay solicitudes</h3>

           <?php
         else:
          foreach ($result_propiedades->result_array() as $propiedad) : 
            
            $mon = $this->db->select("simbolo,signo")->from("propiedad")->join("moneda","propiedad.id_mon = moneda.id")->where("propiedad.id",$propiedad['id'])->get()->result_array();

            $simbolo=$mon["0"]["simbolo"];
            $signo=$mon["0"]["signo"];

            $t = $this->db->select("tipo")->from("tipo")->where("id",$propiedad['id_tipo'])->get()->result_array();

            $tipoo=$t["0"]["tipo"];
            ?>
                <form action="<?=base_url()?>Accesoad/propcli/<?=$this->session->id_usu?>/<?=$this->session->token?>/<?=$propiedad['id']?>" id="<?= $propiedad['id'] ?>" method="post">
                    <input type="hidden" value="<?=$propiedad['id'] ?>" name="idPropiedad">


                    <div class="contenedor-resultados">
  <div class="resultado" onclick="document.getElementById('<?= $propiedad['id'] ?>').submit();">
    <div class="contenedor-imagen">
      <img src="<?=base_url()?>static/images/casas/<?=$propiedad['foto']?>" alt="<?=$propiedad['titulo']?>"  >
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
        <div class="dato1" id="detalle-ocultar">
          <span class="header">Habitaciones</span>
          <span class="texto"><?= $propiedad['habitaciones'] ?></span>
        </div>
        <div class="dato1" id="detalle-ocultar">
          <span class="header">Baños</span>
          <span class="texto"><?= $propiedad['banios'] ?></span>
        </div>
        <div class="dato1">
          <span class="header">Precio</span>
          <span class="texto"><?=$simbolo?> <?=$signo == "?" ? "€" : $signo ?><?=number_format($propiedad['precio'],2,'.',',') ?></span>
        </div>
      </div>
    </div>
  </div>

<?php
$con = $this->db->select("count(id) as id")->from("solicitud")->where("id_prop",$propiedad['id'])->get()->row();
$cansol = $con->id;
?>

<div class="resultado">
  <div class="solicitudes-icono">
    <i class="fas fa-file-alt"></i>
  </div>
  <div class="solicitudes-contenido">
    <div class="solicitudes-titulo">
      Cantidad de solicitudes:
      <?= $cansol ?>
    </div>
    <div class="solicitudes-enlace">
      <a href="<?=base_url()?>Accesoad/solicitudes/<?=$this->session->id_usu?>/<?=$this->session->token?>/<?=$propiedad['id']?>">Ver solicitudes</a>
    </div>
  </div>
</div>


</div>


                </form>

            <?php
             endforeach;
             endif; ?>
        </div>


                
                </div>
<br>


            </div>
        </div>
    </div>

    <script>
        $('#link-dashboard').addClass('pagina-activa');
    </script>

</body>

</html>
