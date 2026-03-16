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
    <script src="<?=base_url()?>static/js/mensajes.js" ></script>

    <style type="text/css">
        /* =======================================================
           1. FIX GLOBAL Y FLEXBOX (Para Footer y Pantalla Móvil)
           ======================================================= */
        html, body {
            height: 100%;
            margin: 0;
            overflow-x: hidden; /* EVITA el error de "mitad de pantalla" en celulares */
            font-family: 'Open Sans', sans-serif;
        }

        body.page-propiedades {
            background: url(../app/static/images/fondo.jpg);
            background-size: cover;
            background-attachment: fixed;
            background-position: center center;
            background-repeat: no-repeat;
            
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* Protege el header para que siempre esté por encima del resto */
        .header-wrapper {
            position: relative;
            z-index: 9999;
            width: 100%;
        }

        /* Contenedor que centra el buscador en el espacio de la imagen */
        .main-content {
            flex: 1; /* Empuja el footer hacia abajo */
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 40px 20px;
            box-sizing: border-box;
        }

        /* Footer moderno adaptado a Flexbox */
        footer.footer-global {
            width: 100%;
            background-color: #1b1b38;
            color: #d4d4d9;
            text-align: center;
            padding: 20px 15px;
            margin-top: auto;
        }

        /* =======================================================
           2. ESTILOS DEL TÍTULO CENTRAL
           ======================================================= */
        .lin {
            text-align: center;
            padding-top: 10px;
            font-size: 50px;
            color: #333; /* Restaurado a tu color oscuro original */
            margin-bottom: 30px;
        }
        @media only screen and (max-width: 600px) {
            .lin {
                font-size: 35px;
            }
        }

        /* =======================================================
           3. ESTILOS DE TUS ANUNCIOS Y BIENVENIDA (INTACTOS)
           ======================================================= */
  .bienvenido {
            font-size: 16px;
            font-weight: 600;
            color: #333;
            background-color: #fff;
            padding: 10px 20px;
            border-radius: 25px;
            border: 1px solid #ddd;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            margin-bottom: 20px;
            transition: all 0.3s ease;
        }
        .bienvenido i { color: #de4547; }
        .bienvenido:hover { border-color: #de4547; color: #de4547; }
        .no-link-style { text-decoration: none; color: inherit; }

.announcement {
            position: absolute;
            top: 100px;
            right: 20px;
            display: flex;
            align-items: center;
            background-color: #fff; /* Fondo blanco limpio */
            padding: 10px 20px; /* Más espacio a los lados */
            border-radius: 25px; /* Bordes redondeados tipo píldora */
            border: 1px solid #ddd; /* Borde gris muy sutil */
            box-shadow: 0 5px 15px rgba(0,0,0,0.08); /* Sombra moderna y suave */
            animation: jumping 2s infinite;
            transition: all 0.3s ease;
            z-index: 9998; /* Asegura que flote sobre las imágenes pero debajo del menú */
        }

        /* Efecto al pasar el mouse sobre la cajita */
        .announcement:hover {
            border-color: #de4547;
            box-shadow: 0 8px 20px rgba(222, 69, 71, 0.15);
        }

        .announcement-content {
            font-size: 15px;
            font-weight: 600;
            color: #333;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        /* El texto se vuelve del rojo corporativo al pasar el mouse */
        .announcement:hover .announcement-content {
            color: #de4547; 
        }

        /* Estilo para la crucecita de cerrar */
        .close-button {
            background: none;
            border: none;
            color: #888;
            cursor: pointer;
            font-size: 18px;
            margin-left: 15px;
            transition: color 0.3s ease;
            outline: none;
        }

        .close-button:hover {
            color: #de4547;
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
            0% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
            100% { transform: translateY(0); }
        }

        .blinking-lin {
            animation: jumping 2s infinite;
        }

        /* =======================================================
           4. BUSCADOR MODERNIZADO
           ======================================================= */
        .modern-search-box {
            background: rgba(255, 255, 255, 0.95); /* Ligeramente transparente para ver el fondo */
            padding: 25px 30px;
            border-radius: 15px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 900px;
            border-top: 5px solid #de4547;
        }

        .modern-search-box p {
            font-size: 22px;
            font-weight: 600;
            color: #0d083b;
            margin-bottom: 20px;
            text-align: center;
        }

        .modern-search-form {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            align-items: center;
            justify-content: center;
        }

        .modern-search-form select,
        .modern-search-form input[type="submit"] {
            padding: 12px 20px;
            border-radius: 8px;
            border: 1px solid #ddd;
            font-size: 15px;
            outline: none;
            flex: 1;
            min-width: 200px;
            background-color: #f9f9f9;
            transition: all 0.3s ease;
        }

        .modern-search-form select:focus {
            border-color: #de4547;
            background-color: #fff;
        }

        .modern-search-form .estado-radios {
            display: flex;
            gap: 20px;
            background: #f9f9f9;
            padding: 12px 20px;
            border-radius: 8px;
            border: 1px solid #ddd;
            flex: 1;
            min-width: 200px;
            justify-content: center;
        }

        .modern-search-form .estado-radios span {
            font-weight: 600;
            color: #404040;
            cursor: pointer;
        }

        .modern-search-form input[type="submit"] {
            background-color: #de4547;
            color: white;
            font-weight: bold;
            border: none;
            cursor: pointer;
            box-shadow: 0 4px 10px rgba(222, 69, 71, 0.3);
        }

        .modern-search-form input[type="submit"]:hover {
            background-color: #c43c3e;
            transform: translateY(-2px);
        }
    </style>
</head>

<body class="page-propiedades">

    <div class="header-wrapper">
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

            <br>&nbsp;&nbsp;

            <?php if($this->session->userdata("tokenn") && $this->session->tipo == "cliente"): ?>
                <span class="bienvenido">
                   <i class="fas fa-user"></i> Hola, <?= urldecode($this->session->nombre) ?> 
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
        </div>
    </div>


    <main class="main-content">
        
        <h2 class="lin">Casas y departamentos <br> Al mejor precio.</h2>

        <div class="modern-search-box">
            <p>Encuentra la propiedad que buscas</p>

            <form action="<?=base_url()?>frontend/buscar/" method="post" class="modern-search-form">

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

                <div class="estado-radios">
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

    </main>


    <footer class="footer-global">
         <?php $this->load->view( "footer_view" );?>
    </footer>

    <script src="<?=base_url()?>static/js/script.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#close-announcement").click(function() {
                $(".announcement").fadeOut();
            });
        });
    </script>
</body>

</html>