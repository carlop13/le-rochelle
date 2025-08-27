<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?=base_url()?>static/images/image.ico">
    <meta author="Carlos Guadalupe López Trejo">
    <title>Propiedades</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="<?=base_url()?>/static/css/estilo.css">
    

    <script src="<?=base_url()?>static/js/jquery-3.6.1.min.js"></script>
    <script src="<?=base_url()?>static/js/jquery-3.6.1.js"></script>
    <script src="<?=base_url()?>static/js/mensajes.js" ></script>


    <script>

  var appData = {
    uri_app : "<?= base_url() ?>",
    uri_ws  : "<?= base_url() ?>../webservice/"
}


        function cargarMasPropiedades(contador,numero) {
  // Enviar solicitud al servidor para obtener las siguientes propiedades a partir del contador actual
  // Utilizando AJAX con método POST

  $.ajax({
    url: appData.uri_ws+"backend/obtenerPropiedades",
    method: "POST",
    data: { contador: contador },
    success: function(response) {
      // Procesar la respuesta del servidor
      var nuevasPropiedades = JSON.parse(response);

      // Obtener el contenedor de propiedades existente
      var contenedorPropiedades = document.getElementById("contenedor-propiedades");



      var con = parseInt(contador) + 3;

      // Recorrer las nuevas propiedades y crear elementos HTML para mostrarlas
      nuevasPropiedades.forEach(function(propiedad) {
       
        $.ajax({
            url: appData.uri_ws+"backend/obtenerdat",
            dataType : "json",
            method: "POST",
            data: { 
                id_pro: propiedad.id,
                id_ciu : propiedad.id_ciu 
            },
            success: function(respons) {

                var prec = formatMoney(Math.trunc(propiedad.precio));

        var nuevaPropiedadHTML = `
          <div class="fila">
            <form action="<?=base_url()?>frontend/informacion/${propiedad.id}/`+con+`" id="${propiedad.id}"  method="post">
              <div class="contenedor-propiedad" onclick="document.getElementById('${propiedad.id}').submit();">
                <div class="contenedor-img">
                  <img src="<?=base_url()?>static/images/casas/${propiedad.foto}" alt="${propiedad.titulo}">
                  <div class="estado">
                    ${propiedad.estado}
                  </div>
                </div>
                <div class="info">
                  <h2>${propiedad.titulo}</h2>
                  <p><i class="fa-solid fa-location-pin"></i>${respons.ciudad}</p>
                  <span class="precio">${respons.simbolo} ${respons.signo == "?" ? "€" : respons.signo}${prec}</span>
                  <hr>
                  <table>
                    <tr>
                      <th>${propiedad.habitaciones !== "" ? "Habitaciones" : ''}</th>
                      <th>${propiedad.banios !== "" ? "Baños" : ''}</th>
                      <th>${propiedad.suptot !== "" ? "Superficie Total" : ''}</th>
                    </tr>
                    <tr>
                      <td>${propiedad.habitaciones !== "" ? propiedad.habitaciones : ''}</td>
                      <td>${propiedad.banios !== "" ? propiedad.banios : ''}</td>
                      <td>${propiedad.suptot !== "" ? propiedad.suptot : ''}</td>
                    </tr>
                  </table>
                </div>
              </div>
            </form>
          </div>
        `;

        // Agregar la nueva propiedad al contenedor existente
        contenedorPropiedades.insertAdjacentHTML("beforeend", nuevaPropiedadHTML);

        }
  });

      });

      // Actualizar el valor del contador en el botón "Ver Más"
      var botonCargarMas = document.getElementById("botonCargarMas");
      botonCargarMas.setAttribute("data-contador", parseInt(contador) + nuevasPropiedades.length);

      // Opcional: Ocultar el botón "Ver Más" si no hay más propiedades disponibles
      if (nuevasPropiedades.length === 0) {
        botonCargarMas.style.display = "none";
      }
    },
  });
}


function formatMoney(amount) {
    return amount.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
}

    </script>


</head>

<body class="page-propiedades">
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

        <style>
  @media only screen and (min-width: 200px) and (max-width: 371px) {
                       footer.inferior3 {
                        position: relative;
                        bottom: 0;
                        margin-top: 50px;
                    }

      footer.inferior2 {
                        position: relative;
                        bottom: 0;
                        margin-top: 50px;
                        width: 100%;
                    }

                    .page-propiedades .contenedor-propiedades {
            max-width: 1500px;
            margin: auto;
            justify-content: center
        
        }

        body {
            width: 100%;
        }

        .container {
            width: 100%;
        }

        .contenedor-propiedades {
            width: 100%;
        }

        .fila{
            width: 95%;
        }

    }
       
</style>
<br>

<?php 
$contpro = $this->db->select("count(id) as id")->from("propiedad")->where("disponible",1)->get()->row()->id;
if ($contpro > 0) :
?>
        <h2 class="titulo-seccion">Propiedades Disponibles</h2>
<?php else: ?>
<h2 class="titulo-seccion">Por el momento no hay propiedades Disponibles</h2>
<?php endif; ?>


        <div class="contenedor-propiedades" id="contenedor-propiedades" style="display: flex; flex-wrap: wrap;">

           <?php 
    $result_propiedades = $this->db->select("*")->from("propiedad")->where("disponible",1)->get();
    $contador = 0;
        ?>


<?php foreach ($result_propiedades->result_array() as $propiedad) : ?>


     <?php 
$idd = $this->db->select("id_ciu")->from("propiedad")->where("id",$propiedad['id'])->get()->result_array();
    $id_ciu=$idd["0"]["id_ciu"];

    $ci = $this->db->select("nombre")->from("propiedad")->join("ciudad","propiedad.id_ciu = ciudad.id")->where("id_ciu",$id_ciu)->get()->result_array();
    $ciudad=$ci["0"]["nombre"];



?>

<?php if ($contador < $numero) : 
$contador++;

$mon = $this->db->select("simbolo,signo")->from("propiedad")->join("moneda","propiedad.id_mon = moneda.id")->where("propiedad.id",$propiedad['id'])->get()->result_array();

    $simbolo=$mon["0"]["simbolo"];
    $signo=$mon["0"]["signo"];


    ?>

    <div class="fila">
        <form action="<?=base_url()?>frontend/informacion/<?=$propiedad['id']?>/<?=$numero?>" id="<?= $propiedad['id'] ?>" method="post">
           
            <div class="contenedor-propiedad" onclick="document.getElementById('<?=$propiedad['id'] ?>').submit();">
                <div class="contenedor-img">
                    <img src="<?=base_url()?>static/images/casas/<?=$propiedad['foto']?>"alt="<?=$propiedad['titulo']?>"  >
                    <div class="estado">
                        <?= $propiedad['estado'] ?>
                    </div>
                </div>
                <div class="info">
                    <h2><?= $propiedad['titulo'] ?></h2>
                    <p><i class="fa-solid fa-location-pin"></i><?=$ciudad?></p>
                    <span class="precio"><?=$simbolo?> <?=$signo == "?" ? "€" : $signo ?><?= number_format($propiedad['precio'], 2, '.', ',') ?></span>
                    <hr>
                    <table>

                        <tr>
                            <?php
                            if ($propiedad['habitaciones'] != "") :
                            ?>
                            <th>Habitaciones</th>
                            <?php
                            endif;
                            ?>


                            <?php
                            if ($propiedad['banios'] != "") :
                            ?>
                            <th>Baños</th>
                            <?php
                            endif;
                            ?>


                            <?php
                            if ($propiedad['suptot'] != "") :
                            ?>
                            <th>Superficie Total</th>
                            <?php
                            endif;
                            ?>

                        </tr>
                        <tr>
                            <?php
                            if ($propiedad['habitaciones'] != "") :
                            ?>
                            <td><?= $propiedad['habitaciones'] ?></td>
                            <?php
                            endif;
                            ?>


                            <?php
                            if ($propiedad['banios'] != "") :
                            ?>
                            <td><?= $propiedad['banios'] ?></td>
                            <?php
                            endif;
                            ?>


                            <?php
                            if ($propiedad['suptot'] != "") :
                            ?>
                            <td><?= $propiedad['suptot'] ?></td>
                            <?php
                            endif;
                            ?>

                        </tr>

                    </table>
                </div>
            </div>
        </form>
    </div>
    <?php endif; ?>
<?php endforeach ?>
</div>



   
        
<?php 
if ($contpro > 6) :
?>
        <button value="0" onclick="cargarMasPropiedades(this.getAttribute('data-contador'),<?=$numero?>)" id="botonCargarMas" data-contador="<?= $contador ?>"> <strong>Ver Más</strong></button>
<?php endif;?>

    </div>

    <style type="text/css">
        .inferior3 {
  position: fixed;
  bottom: 0;
  left: 0;
  width: 100%;
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