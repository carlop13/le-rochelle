<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta author="Carlos Guadalupe López Trejo">
    <link rel="shortcut icon" href="<?=base_url()?>static/images/image.ico">
    <title>Le Rochelle Real State</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <link rel="stylesheet" href="<?=base_url()?>/static/css/estilo.css">

    <script src="<?=base_url()?>static/js/jquery-3.6.1.min.js"></script>
    <script src="<?=base_url()?>static/js/jquery-3.6.1.js"></script>
    <script src="<?=base_url()?>static/js/mensajes.js" ></script>


</head>



<body class="home" id="home">
    <div class="container">
        <?php $this->load->view( "header_view" ); ?>

        <h2>Casas y departamentos <br>
        Al mejor precio.</h2>

        <div class="box-buscar-propiedades pos-inferior">
            <div class="box-interior" style="background: rgba(255, 255, 255, 0.4);">
                <p style="color: #000;">Encuentra la propiedad que buscas</p>

                <form action="<?=base_url()?>frontend/buscar/" method="post">

                    <select name="ciudad" id="ciudad">
                        <option  value="0">Seleccione Ciudad</option>
                        <?php 
                        $result_ciudades = $this->db->select("ciudad.*,pais")->from("ciudad")->join("pais","ciudad.id_pais = pais.id")->where("ciudad.activo",1)->order_by("pais","desc")->get();

                        foreach ($result_ciudades->result_array() as $ciudad) : ?>

                            <option value="<?= $ciudad['id'] ?>">
                                <?= $ciudad['nombre'] ?>
                            </option>
                        <?php endforeach ?>

                    </select>
       

                    
                    <select name="tipo" id="tipo" required>
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
                            <input type="radio" value="Alquiler" name="estado" checked  ="true"> Alquiler
                        </span>
                        <span>
                            <input type="radio" value="Venta" name="estado"> Venta
                        </span>
                    </div>

                    <input type="submit" value="Buscar" name="buscar">
                </form>
            </div>
        </div>

        <footer class="inferior" style="margin-top: 100px;">
            <?php $this->load->view( "footer_view" );?>
        </footer>
    </div>
</body>

<script src="<?=base_url()?>static/js/script.js"></script>

</html>