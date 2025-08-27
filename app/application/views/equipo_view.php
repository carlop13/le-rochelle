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
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        h2 {
            text-align: center;
            font-size: 30px;
            font-weight: bold;
            margin-bottom: 30px;
            color: #333;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .container2 {
            max-width: 900px;
            margin: 0 auto;
            padding: 20px;
        }

        .team-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }

        .team-card {
            background-color: #fff;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
            text-align: center;
            padding: 20px;
            transition: transform 0.3s ease;
             border: 1px solid #333;
        }

        .team-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 10px 10px 0 0;
            border: 1px solid #333;
        }

        .team-card h3 {
            font-size: 20px;
            font-weight: bold;
            margin-top: 15px;
        }

        .team-card p {
            font-size: 16px;
            color: #666;
            margin-bottom: 15px;
        }

        .team-card ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .team-card ul li {
            display: inline-block;
            margin-right: 10px;
        }

        .team-card ul li a {
            font-size: 20px;
            color: #de4547;
            text-decoration: none;
        }

        .team-card:hover {
            transform: scale(1.05);
        }
    </style>
</head>

<body class="page-equipo">
    <div class="container">
        <?php $this->load->view("header_view"); ?>

        <h2>Nuestro Equipo</h2>

        <div class="team-grid container2">
            <!-- Miembro 1 -->
            <div class="team-card">
                <img src="<?=base_url()?>/static/images/usuario.png" alt="Miembro del Equipo">
                <h3>Cuauhtémoc Suárez Rangel</h3>
                <p>CEO</p>
                <ul>
                    <li><a href="#" target="_blank"><i class="fas fa-phone-alt"></i></a></li>
                    <li><a href="#" target="_blank"><i class="fas fa-envelope"></i></a></li>
                    <li><a href="#" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
                </ul>
            </div>

            <!-- Miembro 2 -->
            <div class="team-card">
                <img src="<?=base_url()?>/static/images/usuario.png" alt="Miembro del Equipo">
                <h3>Fatima Paola Alvarez Ontiveros</h3>
                <p>Capital Humano</p>
                <ul>
                    <li><a href="#" target="_blank"><i class="fas fa-phone-alt"></i></a></li>
                    <li><a href="#" target="_blank"><i class="fas fa-envelope"></i></a></li>
                    <li><a href="#" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
                </ul>
            </div>

            <!-- Miembro 3 -->
            <div class="team-card">
                <img src="<?=base_url()?>/static/images/usuario.png" alt="Miembro del Equipo">
                <h3>Fátima Denisse Martínez Mora</h3>
                <p>Marketing</p>
                <ul>
                    <li><a href="#" target="_blank"><i class="fas fa-phone-alt"></i></a></li>
                    <li><a href="#" target="_blank"><i class="fas fa-envelope"></i></a></li>
                    <li><a href="#" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
                </ul>
            </div>

            <!-- Miembro 4 -->
            <div class="team-card">
                <img src="<?=base_url()?>/static/images/usuario.png" alt="Miembro del Equipo">
                <h3>Lizbeth Williams Guerrero</h3>
                <p>Marketing</p>
                <ul>
                    <li><a href="#" target="_blank"><i class="fas fa-phone-alt"></i></a></li>
                    <li><a href="#" target="_blank"><i class="fas fa-envelope"></i></a></li>
                    <li><a href="#" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
                </ul>
            </div>

            <!-- Miembro 5 -->
            <div class="team-card">
                <img src="<?=base_url()?>/static/images/usuario.png" alt="Miembro del Equipo">
                <h3>Carlos Guadalupe López Trejo</h3>
                <p>Sistemas</p>
                <ul>
                    <li><a href="#" target="_blank"><i class="fas fa-phone-alt"></i></a></li>
                    <li><a href="#" target="_blank"><i class="fas fa-envelope"></i></a></li>
                    <li><a href="#" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
                    <li><a href="#" target="_blank"><i class="fab fa-github"></i></a></li>
                </ul>
            </div>

            <!-- Miembro 6 -->
            <div class="team-card">
                <img src="<?=base_url()?>/static/images/usuario.png" alt="Miembro del Equipo">
                <h3>Miembro 6</h3>
                <p>Ventas</p>
                <ul>
                    <li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="#" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
                </ul>
            </div>

        </div>
    </div>

    <footer class="inferior9">
        <?php $this->load->view("footer_view");?>
    </footer>
    <script src="<?=base_url()?>static/js/script.js"></script>
</body>

</html>
