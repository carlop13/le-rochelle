<?php

$consulta = $this->db->select("*")->from("tipo")->where("id",$id)->get()->row();
$tipo=$consulta->tipo;


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
    uri_ws  : "<?= base_url() ?>../webservice/",
    id_usu : "<?=$id_usu?>",
    token : "<?=$token?>"
}


$(document).ready(function(){
$("form").submit(function(event) {
      event.preventDefault();
      var formulario = $("form");

      if ($("#tipo").val() == "") {
        alert("El campo no puede estar vacio")
        return false;

      }
      else{

 $.ajax({
      "url": appData.uri_ws + "backend/updatetipo/",
      "dataType": "json",
      "type": "post",
      "data": {
        "tipo": $("#tipo").val(),
        "id" : $("#id").val()
      }
    })
    .done(function(obj) {
        alert(obj.mensaje);
        //formulario.unbind("submit").submit();
        $(location).attr("href",appData.uri_app+"Accesoad/listip/"+appData.id_usu+"/"+appData.token);
    });
}

});
});
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

        <div class="contenedor-principal" style="width: 350px;">
            <!-- utilizamos el id de nuevo-tipo-propiedad para aprovechar los estilos ya creados -->
            <div id="nuevo-tipo-propiedad" style="width: 400px;">
                <h2>Actualizar Tipo de Propiedad</h2>
                <hr>

                <div class="box-nuevo-tipo" style="width: 350px;">
                    <h3>Actualizar Tipo de Propiedad</h3>
                    <hr>
                    <form action="" method="post">
                        <input type="hidden" name="id" id="id" value="<?= $id ?>"> 
                        <input type="text" name="tipo"  id="tipo" value="<?= $tipo ?>" placeholder="Tipo de propiedad" required>
                        <input type="submit" name="modificar" value="Modificar" class="btn-accion">
                    </form>

                </div>

            </div>
        </div>
    </div>
</body>

</html>