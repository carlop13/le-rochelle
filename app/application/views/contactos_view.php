<?php 
    $consulta = $this->db->select("*")->from("datos")->where("id",1)->get()->result_array();

    $nombre = $consulta["0"]["nombre"];
    $tel = $consulta["0"]["tel"];
    $correo = $consulta["0"]["correo"];
    $horario = $consulta["0"]["horario"];

    $calle = $consulta["0"]["calle"];
    $numero = $consulta["0"]["numero"];
    $colonia = $consulta["0"]["colonia"];
    $cp = $consulta["0"]["cp"];
    $ciudad = $consulta["0"]["ciudad"];
    $estado = $consulta["0"]["estado"];
    $pais = $consulta["0"]["pais"];
    $lat = $consulta["0"]["lat"];
    $lng = $consulta["0"]["lng"];
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?=base_url()?>static/images/image.ico">
    <meta author="Carlos Guadalupe López Trejo">
    <title>Contacto</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="<?=base_url()?>/static/css/estilo.css">

    <script src="<?=base_url()?>static/js/jquery-3.6.1.min.js"></script>
    <script src="<?=base_url()?>static/js/mensajes.js" ></script>

    <script type="text/javascript">
        var appData = {
            latitude: "<?=$lat?>",
            longitude : "<?=$lng?>",
            uri_app : "<?= base_url() ?>",
            uri_ws  : "<?= base_url() ?>../webservice/"
        }
    </script>

    <style type="text/css">
        /* =======================================================
           1. FIX GLOBAL Y FLEXBOX (Solución del espacio blanco)
           ======================================================= */
        html {
            min-height: 100%;
        }
        
        body {
            margin: 0;
            overflow-x: hidden; 
            font-family: 'Open Sans', sans-serif;
            display: flex;
            flex-direction: column;
            min-height: 90vh;
        }

        .main-content {
            flex: 1 0 auto; /* Empuja obligatoriamente el footer hasta el fondo */
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px 20px 60px 20px; 
            box-sizing: border-box;
        }

        footer.footer-global {
            flex-shrink: 0;
            width: 100%;
            background-color: #1b1b38;
            color: #d4d4d9;
            text-align: center;
            padding: 10px 15px; /* Reduje un poco el padding superior para que se una mejor con tu footer_view */
            margin-top: auto;
            box-sizing: border-box;
        }

        .titulo-seccion {
            font-size: 32px;
            color: #0d083b;
            margin-bottom: 40px;
            text-align: center;
            font-weight: 700;
        }

        /* =======================================================
           2. GRID DE CONTACTO MODERNIZADO
           ======================================================= */
        .modern-contact-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 30px;
            margin-bottom: 30px;
        }

        .modern-card {
            background: white;
            padding: 40px 30px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
            border-top: 5px solid #de4547;
            height: 100%;
            box-sizing: border-box;
        }

        /* Info de Contacto */
        .info-item {
            margin-bottom: 30px;
        }
        .info-item:last-child {
            margin-bottom: 0;
        }
        .info-item h3 {
            font-size: 18px;
            color: #0d083b;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .info-item h3 i {
            color: #de4547;
            font-size: 20px;
        }
        .info-item p, .info-item a {
            color: #555;
            font-size: 15px;
            line-height: 1.6;
            margin: 0;
            text-decoration: none;
            transition: color 0.3s;
        }
        .info-item a:hover {
            color: #de4547;
        }

        /* Formulario Moderno */
        .modern-form-title {
            font-size: 18px;
            color: #333;
            margin-bottom: 25px;
            font-weight: 600;
            text-align: center;
        }

        .form-control {
            margin-bottom: 1.2rem;
            position: relative;
        }
        .form-control label {
            display: block;
            margin-bottom: 8px;
            font-size: 14px;
            font-weight: 600;
            color: #444;
        }
        .modern-input {
            width: 100%;
            padding: 12px 15px;
            border-radius: 8px;
            border: 1px solid #ddd;
            font-size: 14px;
            background-color: #f9f9f9;
            box-sizing: border-box;
            transition: all 0.3s ease;
            font-family: inherit;
        }
        .modern-input:focus {
            border-color: #de4547;
            background-color: #fff;
            outline: none;
            box-shadow: 0 0 0 3px rgba(222, 69, 71, 0.1);
        }
        textarea.modern-input {
            resize: vertical;
            min-height: 100px;
        }

        .modern-submit-btn {
            background-color: #de4547;
            color: white;
            font-weight: bold;
            font-size: 16px;
            border: none;
            border-radius: 8px;
            padding: 15px;
            width: 100%;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 10px rgba(222, 69, 71, 0.3);
            margin-top: 10px;
        }
        .modern-submit-btn:hover {
            background-color: #c43c3e;
            transform: translateY(-2px);
        }

        /* Estilos para errores de validación de JS (intactos) */
        .invalid-feedback { width: 100%; margin-top: 0.25rem; font-size: 80%; color: #dc3545; }
        .is-invalid { border-color: #dc3545; }

        /* Contenedor del Mapa */
        .map-card {
            padding: 0;
            overflow: hidden;
            border-top: none;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
            border-radius: 15px;
        }

        /* Animación del título */
        @keyframes jumping {
            0% { transform: translateY(0); }
            50% { transform: translateY(-5px); }
            100% { transform: translateY(0); }
        }
        .blinking-lin {
            animation: jumping 2s infinite;
        }
    </style>
</head>

<body class="page-contacto">

    <div class="container" style="position: relative; z-index: 9999;">
        <?php $this->load->view("header_view"); ?>
    </div>

    <main class="main-content">
        
        <h2 class="titulo-seccion">Contacto</h2>

        <div class="modern-contact-grid">
            
            <div class="modern-card">
                <div class="info-item">
                    <h3><i class="fa-solid fa-location-dot"></i> Nuestra Oficina Central</h3>
                    <p><?= $calle ?>  <?=$numero?>, <?=$colonia?> , <?=$cp  ?><br><?=$ciudad?>, <?=$estado?>., <?=$pais?> </p>
                </div>

                <div class="info-item">
                    <h3><i class="fa-solid fa-phone"></i> Nuestro teléfono</h3>
                    <p><a href="tel:+52<?=$tel?>">+52 <?= $tel ?></a></p>
                </div>

                <div class="info-item">
                    <h3><i class="fa-solid fa-envelope"></i> Correo Electrónico</h3>
                    <p><a href="mailto:<?=$correo?>"><?= $correo ?></a></p>
                </div>

                <div class="info-item">
                    <h3><i class="fa-solid fa-clock"></i> Horarios de atención</h3>
                    <p><?= $horario ?></p>
                </div>
            </div>

            <div class="modern-card">
                <form action="" method="post">
                    <h3 class="modern-form-title blinking-lin">¿Quieres vender o alquilar tu casa? Comunícate con nosotros</h3>
                    
                    <div class="form-control" id="group-nombre">
                        <label for="nombre">Nombre</label>
                        <input class="modern-input" type="text" placeholder="Ingrese su nombre" name="nombre" id="nombre">
                    </div>
                    
                    <div class="form-control" id="group-email">
                        <label for="email">Dirección de Correo</label>
                        <input class="modern-input" type="text" placeholder="Dirección de Correo" name="email" id="email">
                    </div>
                    
                    <div class="form-control" id="group-telefono">
                        <label for="telefono">Teléfono</label>
                        <input class="modern-input" type="number" placeholder="Ingrese su teléfono" name="telefono" id="telefono">
                    </div>
                    
                    <div class="form-control" id="group-mensajee">
                        <label for="mensajee">Mensaje</label>
                        <textarea class="modern-input" placeholder="Escriba su mensaje" name="mensajee" id="mensajee"></textarea>
                    </div>
                    
                    <input class="modern-submit-btn" type="submit" value="Enviar Mensaje" name="enviar">
                </form>
            </div>

        </div>

        <div class="map-card">
            <div id="map" style="width: 100%; height: 450px;"></div>
        </div>

    </main>

    <footer class="footer-global">
        <?php $this->load->view("footer_view"); ?>
    </footer>

    <script src="<?=base_url()?>static/js/script.js"></script>
    <script src="<?=base_url()?>static/js/mensaje.js"></script>
    
    <script>
        var lati = parseFloat(appData.latitude);
        var lngi = parseFloat(appData.longitude);
        
        function initMap() {
            var location = { lat: lati, lng: lngi };

            var map = new google.maps.Map(document.getElementById("map"), {
                zoom: 15,
                center: location,
                styles: [
                    {
                        featureType: "poi",
                        elementType: "labels",
                        stylers: [{ visibility: "off" }]
                    }
                ]
            });

            var marker = new google.maps.Marker({
                position: location,
                map: map,
                animation: google.maps.Animation.DROP
            });
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC9NVdgMz2GdZa-UEpa4fyHkjcO0b60xiQ&callback=initMap" async defer></script>

</body>
</html>