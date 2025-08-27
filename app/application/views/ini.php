<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?=base_url()?>static/images/image.ico">
    <meta author="Carlos Guadalupe López Trejo">
    <title>Le Rochelle Real State</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="<?=base_url()?>/static/css/estilo.css">
    

    <script src="<?=base_url()?>static/js/jquery-3.6.1.min.js"></script>
    <script src="<?=base_url()?>static/js/jquery-3.6.1.js"></script>
    <script src="<?=base_url()?>static/js/mensajes.js" ></script>



</head>

<style type="text/css">
    body {
        background: url(../app/static/images/fondo.jpg);
        background-size: cover;
        background-attachment: fixed;
            background-position: center center;
            background-repeat: no-repeat;
            width: 100%;
            height: 100%;
    }

    .lin {
        text-align: center;
    padding-top: 10px;
    font-size: 50px;
    }




.announcement {
    position: absolute;
    top: 100px;
    right: 20px;
    display: flex;
    align-items: center;
    background-color: #f8f8f8;
    padding: 10px;
    border-radius: 5px;
    border: 1px solid black;
    animation: jumping 2s infinite;
}

.announcement-content {
    font-size: 17px;
    font-weight: bold;
    color: #333;
    text-decoration: none;
}

.close-button {
    background: none;
    border: none;
    color: #888;
    cursor: pointer;
    font-size: 18px;
    margin-left: 10px;
}

.close-button:hover {
    color: #555;
}

@keyframes jumping {
  0% {
    transform: translateY(0);
  }
  50% {
    transform: translateY(-10px);
  }
  100% {
    transform: translateY(0);
  }
}

.blinking-lin {
  animation: jumping 2s infinite;
}


</style>


<body class="page-propiedades">
    <div class="container">
        
        <div class="contenedor-header">

    <?php 

    $consulta = $this->db->select("*")->from("datos")->where("id",1)->get()->result_array();

    $nombre = $consulta["0"]["nombre"];
    $tel = $consulta["0"]["tel"];
    $fb = $consulta["0"]["fb"];
    $ig = $consulta["0"]["ig"];
    $ws = $consulta["0"]["ws"];
    $tk = $consulta["0"]["tk"];

    ?>

    <header>
    <div class="logo">
        <img src="<?=base_url()?>static/images/image.ico" alt="Descripción de la imagen" style="width: 50px; height: 50px;">
    </div>

    <div class="logo">           

            <h1><i class="fa-solid fa-globe"></i></h1>
            <p><?=$nombre?></p>

    </div>

    <div class="nav-responsive" onclick="mostrarMenuResponsive()">
        <i class="fa-solid fa-bars"></i>
    </div>
    <nav class="" id="nav">
        <a href="<?=base_url()?>">Inicio</a>
        <a href="<?=base_url()?>frontend/propiedades/6">Propiedades</a>
        <a href="<?=base_url()?>frontend/destacadas/6" class="blinking-link">Destacadas</a>
        <a href="<?=base_url()?>frontend/contactos">Contacto</a>
        <a href="<?=base_url()?>frontend/conocenos">Conócenos</a>
        <a href="<?=base_url()?>frontend/equipo">Equipo</a>
        <a href="<?=base_url()?>frontend/insesion/" class="blinking-link">Rent House</a>
    </nav>
&nbsp;&nbsp;
    <div class="info-contacto">
        <?php if($this->session->userdata( "tokenn" )):  ?> 
            <?php if($this->session->tipo == "cliente"):  ?> 
        <span title="Perfil" class="info">
                <a href="<?=base_url()?>Frontend/perfil2/<?=$this->session->id_usu?>/<?=$this->session->tokenn?>" role="button"><i class="fas fa-user"></i></a>
        </span>
        <?php endif;  ?> 

        <span title="Cerrar Sesión" class="info">
                <a href="<?=base_url()?>Acceso/cierrasesion/<?=$this->session->id_usu?>/<?=$this->session->tokenn?>" role="button"><i class="fa-solid fa-right-from-bracket"></i></a>
        </span>
        <?php endif;  ?> 
    </div>
</header>


</div>
<br>
&nbsp;&nbsp;
<style type="text/css">
    .bienvenido {
        font-size: 18px;
        font-weight: bold;
        color: #333;
        background-color: #f8f8f8;
        padding: 10px;
        border-radius: 5px;
        border: 1px solid black;
        left: 10px;
    }

    .no-link-style {
    text-decoration: none;
    color: inherit;
  }
</style>


<?php if($this->session->userdata("tokenn") && $this->session->tipo == "cliente"): ?>
    <span class="bienvenido">
       <i class="fas fa-user"></i> Hola: <?= urldecode($this->session->nombre) ?> 
    </span>
<?php endif; ?>


<?php if(!$this->session->userdata("tokenn")): ?>
    <div style="display: flex; z-index: -1;">
<div class="announcement blinking-lin">
    <a href="<?=base_url()?>frontend/contactos" class="announcement-content">
        <span>
            ¿Quieres vender o alquilar tu casa?
        </span>
    </a>
    <button title="Cerrar" class="close-button" id="close-announcement">
        <i class="fas fa-times"></i>
    </button>
</div>
</div>
<?php endif; ?>

<br>

<script type="text/javascript">
    $(document).ready(function() {
    $("#close-announcement").click(function() {
        $(".announcement").fadeOut();
    });
});

</script>

<!--
<a href="<?=base_url()?>frontend/contactos" class="bienvenido-link">
    ¿Quieres vender o alquilar tu casa?
</a>
-->

        <h2 class="lin">Casas y departamentos <br>
        Al mejor precio.</h2>

        <div class="box-buscar-propiedades pos-centrada">
            <div class="box-interior" style="background: rgba(255, 255, 255, 0.4);">
                <p style="color: #000;">Encuentra la propiedad que buscas</p>

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
            /*
  @media only screen and (min-width: 200px) and (max-width: 400px) {
                       footer.inferior3 {
                        position: relative;
                        bottom: 0;
                        margin-top: 85px;
                        width: 100%;
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

        .contenedor-header{
             width: 100%;
        }

        .page-propiedades{
             width: 100%;
        }

        .lin {
        text-align: center;
    padding-top: 15px;
    font-size: 35px;
    padding-bottom: 10px;
    }

    }



      @media only screen and (min-width: 539px) and (max-width: 550px) {
                       footer.inferior3 {
                        position: relative;
                        bottom: 0;
                        margin-top: 85px;
                        width: 100%;
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

        .contenedor-header{
             width: 100%;
        }

        .page-propiedades{
             width: 100%;
        }

        .lin {
        text-align: center;
    padding-top: 15px;
    font-size: 35px;
    padding-bottom: 10px;
    }

    }

      @media only screen and (min-width: 400px) and (max-width: 415px)  and (min-height: 699px) and (max-height: 801px) {
                       footer.inferior3 {
                        position: relative;
                        bottom: 0;
                        margin-top: 85px;
                        width: 100%;
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

        .contenedor-header{
             width: 100%;
        }

        .page-propiedades{
             width: 100%;
        }

        .lin {
        text-align: center;
    padding-top: 15px;
    font-size: 35px;
    padding-bottom: 10px;
    }

    }
       


      @media only screen and (min-width: 599px) and (max-width: 701px)  and (min-height: 299px) and (max-height: 401px) {


    }
       
 @media only screen and (min-width: 799px) and (max-width: 811px)  and (min-height: 599px) and (max-height: 611px) {


    }
*/

    /* Otros estilos... */

/* Media Queries */
@media only screen and (max-width: 600px) {
                       footer.inferior3 {
                        position: relative;
                        bottom: 0;
                        margin-top: 85px;
                        width: 100%;
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

        .contenedor-header{
             width: 100%;
        }

        .page-propiedades{
             width: 100%;
        }

        .lin {
        text-align: center;
    padding-top: 15px;
    font-size: 35px;
    padding-bottom: 10px;
    }
}

@media only screen and (min-width: 601px) and (max-width: 1024px) {
                       footer.inferior3 {
                        position: fixed;
                        bottom: 0;
                        margin-top: 85px;
                        width: 100%;
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

        .contenedor-header{
             width: 100%;
        }

        .page-propiedades{
             width: 100%;
        }

        .lin {
        text-align: center;
    padding-top: 15px;
    font-size: 35px;
    padding-bottom: 10px;
    }
}

/*
@media only screen and (min-width: 1025px) {
    /* Estilos específicos para pantallas grandes 
}
*/
       
</style>
<br>


</div>
        

    </div>

    <style type="text/css">
        .inferior3 {
  position: fixed;
  bottom: 0;
  left: 0;
  width: 100%;
}

    </style>


    <footer class="inferior3">
             <?php $this->load->view( "footer_view" );?>
    </footer>

    <script src="<?=base_url()?>static/js/script.js"></script>
</body>

</html>