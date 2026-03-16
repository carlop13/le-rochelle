<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta author="Carlos Guadalupe López Trejo">
    <link rel="shortcut icon" href="<?=base_url()?>static/images/image.ico">
    <title>Login</title>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <script src="<?=base_url()?>static/js/jquery-3.6.1.min.js"></script>
    <script src="<?=base_url()?>static/js/jquery-3.6.1.js"></script>
    <script src="<?=base_url()?>static/js/mensajes.js"></script>

    <script>
        var appData = {
            uri_app: "<?= base_url() ?>",
            uri_ws: "<?= base_url() ?>../webservice/"
        };
    </script>

    <style type="text/css">
        @import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;700&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Open Sans', sans-serif;
        }

        html { min-height: 100%; }

        body.home2 {
            background-color: #e0dede;
            background-image: url(../images/fondo.jpg);
            background-size: cover;
            background-attachment: fixed;
            background-position: center center;
            background-repeat: no-repeat;
            
            display: flex;
            flex-direction: column;
            min-height: 100vh; 
            overflow-x: hidden;
        }

        /* =========================================================
           SE RESTAURÓ TU CSS ORIGINAL DEL HEADER Y NAVEGACIÓN
           ========================================================= */
        .container header .nav-responsive { display: none; font-size: 25px; }
        .container header nav.responsive { max-width: 100%; display: block; position: absolute; top: 70px; background: linear-gradient(to right, #0d083b, #0d083b); left: 0; }
        .container header nav.responsive a { display: block; width: 100%; text-align: center; margin: 15px 0; }
        .contenedor-header { background-color: #0d083b; }
        .contenedor-header .logo, .contenedor-header nav, .contenedor-header .info-contacto { width: 260px; width: 100%; }
        .contenedor-header .logo a { text-decoration: none; color: #fff; }
        .contenedor-header .logo h1 { font-size: 25px; line-height: 26px; }
        .contenedor-header .logo p { font-size: 11px; }
        .contenedor-header nav { display: flex; justify-content: space-evenly; }
        .contenedor-header .info-contacto { text-align: right; }
        .contenedor-header .info-contacto a { text-decoration: none; color: #fff; padding: 5px; transition: .5s; }
        .contenedor-header .info-contacto a:hover { color: #de4547; }
        .contenedor-header .info-contacto span { margin-left: 10px; }
        .contenedor-header header { max-width: 1200px; margin: auto; display: flex; justify-content: space-between; align-items: center; padding: 10px; color: #fff; }
        .contenedor-header nav a { font-size: 14px; padding: 5px 15px; color: #fff; display: inline-block; text-decoration: none; font-weight: bold; margin: 0 10px; transition: .5s; border-radius: 50px; }
        .contenedor-header nav a:hover { background-color: #de4547; font-size: 14px; color: #fff; display: inline-block; text-decoration: none; font-weight: bold; margin: 0 10px; }
        
        @media only screen and (max-width: 1100px) {
            .contenedor-header{ position: absolute; top: 0; left: 0; z-index: 1000; width: 100%; }
        }
        @media only screen and (max-width: 900px) {
            .container header nav { display: none; }
            .container header .info .numero-telefono { display: none; }
            .container header .nav-responsive { display: block; }
        }

        /* =========================================================
           CONTENEDORES PRINCIPALES Y FOOTER
           ========================================================= */
        .main-content-wrapper {
            flex: 1; 
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 110px 20px 40px 20px; /* 100px para no chocar con el header */
            width: 100%;
        }

        footer {
            width: 100%;
            background-color: #1b1b38;
            color: #d4d4d9;
            text-align: center;
            padding: 15px;
            margin-top: auto;
        }

        /* =======================================================
           CAJA DE LOGIN RESPONSIVA (YA NO SE APLASTA)
           ======================================================= */
        .container2 {
            position: relative; 
            width: 100%;
            max-width: 750px; 
            height: 500px;
            display: flex;
            align-items: center;
        }

        .backbox {
            background-color: #0d083b;
            width: 100%;
            height: 80%;
            position: relative;
            display: flex;
            border-radius: 15px;
            box-shadow: 0 15px 40px rgba(0,0,0,0.4);
        }

        .loginMsg, .signupMsg {
            width: 50%;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            padding: 20px 30px;
            box-sizing: border-box;
            transition: opacity .8s ease-in-out;
            color: white;
        }

        .loginMsg .title, .signupMsg .title { font-weight: 600; font-size: 24px; margin-bottom: 10px; }
        .loginMsg p, .signupMsg p { font-weight: 300; font-size: 14px; margin-bottom: 20px; color:#d4d4d9; }
        
        .loginMsg button, .signupMsg button {
            background-color: transparent;
            border: 2px solid white;
            border-radius: 30px;
            color: white;
            font-size: 14px;
            font-weight: 600;
            padding: 10px 30px;
            cursor: pointer;
            transition: background 0.3s;
        }
        .loginMsg button:hover, .signupMsg button:hover { background-color: rgba(255,255,255,0.1); color: white;}

        .frontbox {
            background-color: white;
            border-radius: 20px;
            height: 100%;
            width: 50%;
            z-index: 10;
            position: absolute;
            right: 0;
            transition: all .8s cubic-bezier(0.68, -0.55, 0.265, 1.55);
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
            overflow: hidden;
            border-top: 5px solid #de4547;
        }

        .moving { right: 50%; }

        .login, .signup {
            padding: 30px 40px;
            text-align: center;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .login h2, .signup h2 { color: #0d083b; font-size: 22px; margin-bottom: 15px; font-weight: 700;}

        .image-container { display: flex; justify-content: center; width: 100%; margin: 0 auto 15px auto; }
        .circular-image { max-width: 80px; height: auto; }

        .inputbox { width: 100%; }
        .form-control { position: relative; margin-bottom: 15px; }
        
        .login input, .signup input {
            width: 100%;
            height: 45px;
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            font-size: 14px;
            padding: 0 15px;
            border-radius: 8px;
            outline: none;
            color: #333;
            transition: border-color 0.3s ease;
        }

        .login input:focus, .signup input:focus { border-color: #de4547; background-color: #fff;}

        .form-control button {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            background: transparent;
            border: none;
            cursor: pointer;
            color: #666;
            outline: none;
        }

        .entra, .save-button {
            background-color: #de4547;
            border: none;
            color: white;
            font-size: 15px;
            font-weight: bold;
            padding: 14px;
            border-radius: 8px;
            width: 100%;
            cursor: pointer;
            transition: background 0.3s;
            margin-top: 5px;
        }
        .entra:hover, .save-button:hover { background-color: #c43c3e; }

        .visibility { opacity: 0; pointer-events: none; }
        .hide { display: none !important; }

        /* =======================================================
           ANIMACIÓN Y AJUSTES PARA CELULARES
           ======================================================= */
        @media only screen and (max-width: 768px) {
            .container2 {
                max-width: 420px;
                height: 760px; /* Altura ideal para que nada se aplaste */
                flex-direction: column;
            }
            .backbox {
                flex-direction: column;
                height: 100%;
            }
            .loginMsg, .signupMsg {
                width: 100%;
                height: 50%;
                padding: 15px;
            }
            .frontbox {
                width: 100%;
                height: 55%;
                right: 0 !important;
                bottom: 0;
                top: auto;
                border-radius: 20px;
                transition: bottom .8s cubic-bezier(0.68, -0.55, 0.265, 1.15);
            }
            .moving {
                right: 0 !important; 
                bottom: 45%; 
            }
            .login, .signup {
                padding: 20px;
            }
            .login h2, .signup h2 { font-size: 20px; margin-bottom: 10px; }
            .circular-image { max-width: 60px; }
        }
    </style>
</head>

<body class="home2" id="home">

    <div class="container">
        <?php $this->load->view( "header_view" ); ?>
    </div>

    <main class="main-content-wrapper">
        <div class="container2">
            
            <div class="backbox">
                <div class="loginMsg">
                    <p class="title">¿No tienes una cuenta?</p>
                    <p>Explora nuestras propiedades.</p>
                    <button id="switch1">Regístrate</button>
                </div>
                <div class="signupMsg visibility">
                    <p class="title">¿Tienes una cuenta?</p>
                    <p>Inicia sesión para ver tu colección.</p>
                    <button id="switch2">Inicia Sesión</button>
                </div>
            </div>

            <div class="frontbox">
                
                <div class="login">
                    <h2>INICIA SESIÓN</h2>
                    <div class="image-container">
                        <img src="<?=base_url()?>static/images/logorenhouse.png" alt="Logo" class="circular-image">
                    </div>
                    
                    <div class="inputbox">
                        <form id="lo" method="post">
                            <div class="form-control" id="group-corr">
                                <?php if ($correoCli == "") : ?>
                                    <input type="text" name="corr" id="corr" placeholder="CORREO">
                                <?php else: ?>
                                    <input value="<?=$correoCli?>" type="text" name="corr" id="corr" placeholder="CORREO">
                                <?php endif; ?>
                            </div>
                            <div class="form-control" id="group-con">
                                <input type="password" name="con" id="con" placeholder="CONTRASEÑA">
                                <button id="mostrarContraseniaa" type="button"><i class="fas fa-eye"></i></button>
                            </div>
                            <button class="entra" type="submit">ENTRAR</button>
                        </form>
                    </div>
                </div>

                <div class="signup hide">
                    <h2>REGÍSTRATE</h2>
                    <div class="image-container">
                        <img src="<?=base_url()?>static/images/logorenhouse.png" alt="Logo" class="circular-image">
                    </div>
                    <div class="inputbox">
                        <form id="re" method="post">
                            <div class="form-control" id="group-nombre">
                                <input type="text" name="nombre" id="nombre" placeholder="NOMBRE">
                            </div>
                            <div class="form-control" id="group-cor">
                                <input type="text" name="cor" id="cor" placeholder="CORREO">
                            </div>
                            <div class="form-control" id="group-tel">
                                <input type="number" name="tel" id="tel" placeholder="TELÉFONO">
                            </div>
                            <div class="form-control" id="group-contra">
                                <input type="password" name="contra" id="contra" placeholder="CONTRASEÑA">
                                <button id="mostrarContrasenia" type="button"><i class="fas fa-eye"></i></button>
                            </div>
                            <button id="guardar" class="save-button" type="submit">GUARDAR</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </main>

    <footer>
        <?php $this->load->view( "footer_view" );?>
    </footer>

    <script src="<?=base_url()?>static/js/script.js"></script>
    <script src="<?=base_url()?>static/js/reg.js"></script>

    <script>
        // Lógica Mostrar/Ocultar Contraseñas
        const togglePassword = (inputId, btnId) => {
            const input = document.getElementById(inputId);
            const btn = document.getElementById(btnId);
            
            if(btn && input) {
                btn.addEventListener('click', function(e) {
                    e.preventDefault(); // Evitar comportamientos raros al presionar el botón de ojo
                    if (input.type === 'password') {
                        input.type = 'text';
                        btn.innerHTML = '<i class="fas fa-eye-slash"></i>';
                    } else {
                        input.type = 'password';
                        btn.innerHTML = '<i class="fas fa-eye"></i>';
                    }
                });
            }
        };

        togglePassword('contra', 'mostrarContrasenia');
        togglePassword('con', 'mostrarContraseniaa');

        // Lógica Animación de la Caja
        var $loginMsg = $('.loginMsg'),
            $login = $('.login'),
            $signupMsg = $('.signupMsg'),
            $signup = $('.signup'),
            $frontbox = $('.frontbox');

        $('#switch1').on('click', function(e) {
            e.preventDefault();
            $loginMsg.toggleClass("visibility");
            $frontbox.addClass("moving");
            $signupMsg.toggleClass("visibility");

            $signup.toggleClass('hide');
            $login.toggleClass('hide');
        });

        $('#switch2').on('click', function(e) {
            e.preventDefault();
            $loginMsg.toggleClass("visibility");
            $frontbox.removeClass("moving");
            $signupMsg.toggleClass("visibility");

            $signup.toggleClass('hide');
            $login.toggleClass('hide');
        });
    </script>
</body>
</html>