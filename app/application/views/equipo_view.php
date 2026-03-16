<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?=base_url()?>static/images/image.ico">
    <meta author="Carlos Guadalupe López Trejo">
    <title>Equipo de Trabajo</title>
    
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
            /* Padding ajustado a 40px como lo tienes en las demás */
            padding: 40px 20px 60px 20px; 
            box-sizing: border-box;
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
            letter-spacing: 1px;
        }

        /* =======================================================
           2. TARJETAS MODERNAS DEL EQUIPO
           ======================================================= */
        .modern-team-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 40px;
            max-width: 900px;
            margin: 0 auto;
        }

        .modern-team-card {
            background-color: #fff;
            width: 100%;
            max-width: 320px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            overflow: hidden;
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border-top: 5px solid #de4547;
            animation: fadeIn 0.8s ease;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .modern-team-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
        }

        .modern-team-card img {
            width: 100%;
            height: 280px;
            object-fit: cover;
            border-bottom: 1px solid #eee;
        }

        .modern-team-info {
            padding: 25px 20px;
        }

        .modern-team-info h3 {
            font-size: 22px;
            font-weight: bold;
            color: #0d083b;
            margin: 0 0 5px 0;
        }

        .modern-team-info p {
            font-size: 16px;
            font-weight: 600;
            color: #de4547; /* Rojo corporativo para el puesto */
            margin: 0 0 20px 0;
        }

        .modern-team-social {
            display: flex;
            justify-content: center;
            gap: 15px;
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .modern-team-social li a {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: #f5f7fa;
            color: #404040;
            font-size: 18px;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .modern-team-social li a:hover {
            background-color: #de4547;
            color: #fff;
            transform: scale(1.1);
        }
    </style>
</head>

<body class="page-equipo">

    <div class="container" style="position: relative; z-index: 9999;">
        <?php $this->load->view("header_view"); ?>
    </div>

    <main class="main-content">
        <h2 class="titulo-seccion">Nuestro Equipo</h2>

        <div class="modern-team-container">
            
            <div class="modern-team-card">
                <img src="<?=base_url()?>/static/images/usuario.png" alt="Cuauhtémoc Suárez Rangel">
                <div class="modern-team-info">
                    <h3>Cuauhtémoc Suárez Rangel</h3>
                    <p>CEO</p>
                    <ul class="modern-team-social">
                        <li><a href="tel:+524427211537" title="Llamar"><i class="fas fa-phone-alt"></i></a></li>
                        <li><a href="mailto:csuarez@yahoo.com.mx" title="Enviar correo"><i class="fas fa-envelope"></i></a></li>
                    </ul>
                </div>
            </div>

            <div class="modern-team-card">
                <img src="<?=base_url()?>/static/images/usuario.png" alt="Carlos Guadalupe López Trejo">
                <div class="modern-team-info">
                    <h3>Carlos Guadalupe López Trejo</h3>
                    <p>Ingeniero de Software</p>
                    <ul class="modern-team-social">
                        <li><a href="tel:+524423535507" title="Llamar"><i class="fas fa-phone-alt"></i></a></li>
                        <li><a href="mailto:carlosguadalupelt13@gmail.com" title="Enviar correo"><i class="fas fa-envelope"></i></a></li>
                        <li><a href="https://www.linkedin.com/in/carlos-guadalupe-l%C3%B3pez-trejo-380947234/" target="_blank" title="LinkedIn"><i class="fab fa-linkedin-in"></i></a></li>
                        <li><a href="https://github.com/carlop13" target="_blank" title="GitHub"><i class="fab fa-github"></i></a></li>
                    </ul>
                </div>
            </div>

        </div>
    </main>

    <footer class="footer-global">
        <?php $this->load->view("footer_view");?>
    </footer>

    <script src="<?=base_url()?>static/js/script.js"></script>
</body>

</html>