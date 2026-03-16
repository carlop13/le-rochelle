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
    <script src="<?=base_url()?>static/js/mensajes.js" ></script>

    <style type="text/css">
        /* =======================================================
           1. FIX GLOBAL Y FLEXBOX
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
            min-height: 100vh;
        }

        .main-content {
            flex: 1 0 auto; 
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            /* Aquí está tu padding ajustado a 40px en la parte superior */
            padding: 20px 20px 60px 20px; 
            box-sizing: border-box;
            display: flex;
            flex-direction: column;
            align-items: center; /* Centra el contenido en la pantalla */
        }

        footer.footer-global {
            flex-shrink: 0;
            width: 100%;
            background-color: #1b1b38;
            color: #d4d4d9;
            text-align: center;
            padding: 10px 15px;
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
           2. TARJETA MODERNA DE "CONÓCENOS"
           ======================================================= */
        .modern-about-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
            border-top: 5px solid #de4547; /* Línea roja del tema */
            padding: 50px 40px;
            max-width: 900px;
            width: 100%;
            display: flex;
            align-items: center;
            gap: 40px;
            animation: fadeIn 1s ease;
            box-sizing: border-box;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .about-logo {
            flex-shrink: 0;
            width: 250px;
            height: auto;
            object-fit: contain;
            filter: drop-shadow(0 10px 15px rgba(0,0,0,0.1)); /* Sutil sombra al logo */
        }

        .about-info h3 {
            font-size: 28px;
            color: #0d083b; /* Azul oscuro corporativo */
            margin-bottom: 5px;
            display: flex;
            align-items: center;
            gap: 12px;
            margin-top: 0;
        }

        .about-info h3 i {
            color: #007bff; /* Mantuve tu ícono del mundo en azul claro */
        }

        .about-info h4 {
            font-size: 20px;
            color: #de4547; /* Rojo corporativo */
            margin-bottom: 20px;
            font-style: italic;
            font-weight: 600;
        }

        .about-info p {
            font-size: 16px;
            line-height: 1.8;
            color: #555;
            margin: 0;
            text-align: justify;
        }

        /* Responsive para celulares y tablets */
        @media screen and (max-width: 768px) {
            .modern-about-card {
                flex-direction: column;
                text-align: center;
                padding: 40px 25px;
                gap: 25px;
            }

            .about-logo {
                width: 180px;
            }

            .about-info h3 {
                justify-content: center;
            }

            .about-info p {
                text-align: center;
            }
        }
    </style>
</head>

<body class="page-contacto">

    <div class="container" style="position: relative; z-index: 9999;">
        <?php $this->load->view("header_view"); ?>
    </div>

    <main class="main-content">
        
        <h2 class="titulo-seccion">Conócenos</h2>
        
        <div class="modern-about-card">
            <img class="about-logo" src="<?=base_url()?>/static/images/image.ico" alt="Logo de Le Rochelle Real State">
            
            <div class="about-info">
                <h3><i class="fa-solid fa-globe"></i> Le Rochelle Real State</h3>
                <h4>"Un sueño por construir"</h4>
                <p>Somos una empresa del sector inmobiliario y construcción, con más de 15 años de operaciones en el mercado, creando experiencias únicas a nuestros clientes en su estilo de vida. Contribuimos al crecimiento económico de las familias y grupos de interés. Encontramos el sitio ideal para tu vida, buscando cumplir las expectativas y excelencia, además de ayudarte a construir tus sueños.</p>
            </div>
        </div>

    </main>

    <footer class="footer-global">
        <?php $this->load->view("footer_view");?>
    </footer>

    <script src="<?=base_url()?>static/js/script.js"></script>
</body>

</html>