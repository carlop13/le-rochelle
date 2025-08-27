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

<body>
    <?php $this->load->view( "header_admin" ); ?>  
    <div id="contenedor-admin">
       <?php $this->load->view( "contenedor_menu" ); ?>

<script type="text/javascript">


  var appData = {
    uri_app : "<?= base_url() ?>",
    uri_ws  : "<?= base_url() ?>../webservice/"
}


$(document).ready(function(){
$("form").submit(function(event) {
      event.preventDefault();
      var formulario = $("form");

      if ($("#tipo").val() == "") {
        alert("El campo no puede estar vacío")
        return false;

      }
      else{

 $.ajax({
      "url": appData.uri_ws + "backend/agretipo/",
      "dataType": "json",
      "type": "post",
      "data": {
        "tipo": $("#tipo").val()
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

        <div class="contenedor-principal" style="width: 350px;">
            <div id="nuevo-tipo-propiedad" style="width: 400px;">
                <h2>Agregar Nuevo Tipo de Propiedad</h2>
                <hr>

                <div class="box-nuevo-tipo" style="width: 350px;">
                    <h3>Agregar Nuevo Tipo de Propiedad</h3>
                    <hr>
                    <form action="" method="post">

                        <input type="text" name="tipo" id="tipo" placeholder="Tipo de propiedad" >
                        <input type="submit" name="agregar" value="Agregar" class="btn-accion">
                    </form>

                </div>

            </div>
        </div>
    </div>

    <script>
        $('#link-add-tipo-propiedad').addClass('pagina-activa');
    </script>
</body>

</html>