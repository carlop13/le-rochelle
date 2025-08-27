<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?=base_url()?>static/images/image.ico">
    <meta author="Carlos Guadalupe López Trejo">
    <title>Conócenos</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="<?=base_url()?>/static/css/estilo.css">

    <script src="<?=base_url()?>static/js/jquery-3.6.1.min.js"></script>
    <script src="<?=base_url()?>static/js/jquery-3.6.1.js"></script>
    <script src="<?=base_url()?>static/js/mensajes.js" ></script>
</head>

    <style type="text/css">
        /* Estilos del contenido */
        .contenedor-contactos {
            display: flex;
            justify-content: center;
            background-color: #fff;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            border-radius: 30px;
            padding: 20px; /* Agregar un espacio interno de 20px al contenedor */
            max-width: 700px; /* Establecer el ancho máximo deseado */
            margin: 0 auto; /* Centrar el contenedor en la página */
            animation: fadeIn 1s ease; /* Agregar la animación */
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        .contenedor-contactos .info {
            max-width: 900px;
        }

        .contenedor-contactos h3 {
            font-size: 26px;
            margin-bottom: 10px;
            color: #007bff;
        }

        .contenedor-contactos h4 {
            font-size: 21px;
            margin-bottom: 20px;
            color: #555;
        }

        .contenedor-contactos p {
            font-size: 18px;
            line-height: 1.6;
            color: #444;
        }

        .contenedor-contactos img {
            max-width: 250px; /* Ajusta el tamaño máximo del logo según tus necesidades */
            margin-right: 20px; /* Agregamos un margen derecho para separar el logo del título */
        }

        /* Estilos para dispositivos más pequeños */
        @media screen and (max-width: 600px) {
            .contenedor-contactos {
                flex-direction: column;
                align-items: center;
            }

            .contenedor-contactos img {
                max-width: 150px; /* Ajusta el tamaño máximo del logo para dispositivos más pequeños */
                margin-right: 0; /* Elimina el margen derecho del logo en dispositivos más pequeños */
                margin-bottom: 20px; /* Agrega un espacio inferior para separar el logo del título */
            }

        }


    @media only screen and (min-width: 650px) and (max-width: 1200px) {
    .inferior8 {
    position: relative;
    bottom: 0;
    width: 100%;
            }
    }

  
    </style>

<body class="page-contacto">
    <div class="container">
        <?php $this->load->view("header_view"); ?>

        <h2 class="titulo-seccion">Conócenos</h2>
        <br>
        <div class="contenedor-contactos">
     <div class="contenedor-contactos">
            <img src="<?=base_url()?>/static/images/image.ico" alt="Logo de Le Rochelle Real State">
            <div class="col info">
                <div>
                    <h3><i class="fa-solid fa-globe"></i> Le Rochelle Real State</h3>
                    <h4>"Un sueño por construir"</h4>
                    <p>Somos una empresa del sector inmobiliario y construcción, con más de 15 años de operaciones en el mercado, creando experiencias únicas a nuestros clientes en su estilo de vida. Contribuimos al crecimiento económico de las familias y grupos de interés. Encontramos el sitio ideal para tu vida, buscando cumplir las expectativas y excelencia, además de ayudarte a construir tus sueños.</p>
                </div>
            </div>
        </div>
</div>
    </div>

    <footer class="inferior8">
        <?php $this->load->view("footer_view");?>
    </footer>

    <script src="<?=base_url()?>static/js/script.js"></script>
</body>

</html>
