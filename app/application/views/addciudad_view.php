<?php
$resultado_pais = $this->db->select("*")->from("pais")->where("activo",1)->get();
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


$(document).ready(function(){
$("form").submit(function(event) {
      event.preventDefault();
      var formulario = $("form");

      if ($("#pais").val() == 0) {
        alert("El pais no puede estar vacío")
        return false;

      }
      else if($("#ciudad").val() == ""){
        alert("La ciudad no puede estar vacía")
        return false;
      }
      else{

 $.ajax({
      "url": appData.uri_ws + "backend/agreciudad/",
      "dataType": "json",
      "type": "post",
      "data": {
        "pais": $("#pais").val(),
        "ciudad" : $("#ciudad").val()
      }
    })
    .done(function(obj) {
        alert(obj.mensaje);
        formulario.unbind("submit").submit();
    });
}

});
});
</script>



<body>
    <?php $this->load->view( "header_admin" ); ?>  
    <div id="contenedor-admin">
       <?php $this->load->view( "contenedor_menu" ); ?>

        <div class="contenedor-principal">
            <div id="nueva-ciudad">
                <h2>Agregar Nueva Ciudad</h2>
                <hr>

                <div class="box-nuevo-tipo">
                    <h3>Agregar Nueva Ciudad</h3>
                    <hr>
                    <form action="" method="post">
                        <label for="pais">Seleccione el pais</label>
                        <select name="pais" id="pais">
                           <option value="0">-- Seleccione Pais --</option>
                                <?php foreach ($resultado_pais->result_array() as $pais) : ?>
                                    <option value="<?= $pais['id'] ?>">
                                        <?= $pais['pais'] ?>
                                    </option>
                                <?php endforeach ?>
                        </select>
                        <input type="text" name="ciudad" id="ciudad" placeholder="Nombre de la Ciudad">
                        <input type="submit" name="agregar" value="Agregar" class="btn-accion">
                    </form>
                </div>

            </div>
        </div>
    </div>

    <script>
        $('#link-add-ciudad').addClass('pagina-activa');
    </script>
</body>