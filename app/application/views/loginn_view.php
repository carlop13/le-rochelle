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
        body {
            background-color: #e0dede;
            font-family: 'Roboto', sans-serif;
        }

        @import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;700&family=Prompt:wght@300;400;600;700&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
/*
        .container2 * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
                font-family: 'Open Sans';
        }
*/

        .container2 {
            margin-top: 40px;
            margin-bottom: 30px;
            width: 100%;
            max-width: 390px;
            height: 450px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            display: inline-flex;
        }

        .backbox {
            background-color: #404040;
            width: 100%;
            height: 80%;
            position: relative;
            transform: translate(0, -50%);
            top: 50%;
            display: inline-flex;
        }

        .frontbox {
            background-color: white;
            border-radius: 20px;
            height: 100%;
            width: 50%;
            z-index: 10;
            position: absolute;
            right: 0;
            margin-right: 3%;
            margin-left: 3%;
            transition: right .8s ease-in-out;
        }

        .moving {
            right: 45%;
        }

        .loginMsg,
        .signupMsg {
            width: 50%;
            height: 100%;
            font-size: 15px;
            box-sizing: border-box;
        }

        .loginMsg .title,
        .signupMsg .title {
            font-weight: 300;
            font-size: 23px;
        }

        .loginMsg p,
        .signupMsg p {
            font-weight: 100;
        }

        .textcontent {
            color: white;
            margin-top: 65px;
            margin-left: 12%;
        }

        .loginMsg button,
        .signupMsg button {
            background-color: #404040;
            border: 2px solid white;
            border-radius: 10px;
            color: white;
            font-size: 12px;
            box-sizing: content-box;
            font-weight: 300;
            padding: 10px;
            margin-top: 20px;
        }

        .container header .nav-responsive {
            display: none;
            font-size: 25px;
        }

        .container header nav.responsive {
            max-width: 100%;
            display: block;
            position: absolute;
            top: 70px;
            background: linear-gradient(to right, #0d083b, #0d083b);
            left: 0;
        }

        .container header nav.responsive a {
            display: block;
            width: 100%;
            text-align: center;
            margin: 15px 0;
        }

        .contenedor-header {
            background-color: #0d083b;
        }

        .contenedor-header .logo,
        .contenedor-header nav,
        .contenedor-header .info-contacto {
            width: 260px;
            width: 100%;
        }

        .contenedor-header .logo a {
            text-decoration: none;
            color: #fff;
        }

        .contenedor-header .logo h1 {
            font-size: 25px;
            line-height: 26px;
        }

        .contenedor-header .logo p {
            font-size: 11px;
        }

        .contenedor-header nav {
            display: flex;
            justify-content: space-evenly;
        }

        .contenedor-header .info-contacto {
            text-align: right;
        }

        .contenedor-header .info-contacto a {
            text-decoration: none;
        }

        .contenedor-header .info-contacto a {
            color: #fff;
            padding: 5px;
            transition: .5s;
        }

        .contenedor-header .info-contacto a:hover {
            color: #de4547;
        }

        .contenedor-header .info-contacto span {
            margin-left: 10px;
        }

        .contenedor-header header {
            max-width: 1200px;
            margin: auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            color: #fff;
        }

        .contenedor-header nav a {
            font-size: 14px;
            padding: 5px 15px;
            color: #fff;
            display: inline-block;
            text-decoration: none;
            font-weight: bold;
            margin: 0 10px;
            transition: .5s;
            border-radius: 50px;
        }

        .contenedor-header nav a:hover {
            background-color: #de4547;
            font-size: 14px;
            color: #fff;
            display: inline-block;
            text-decoration: none;
            font-weight: bold;
            margin: 0 10px;
        }

        .home {
            background: url(../images/fondo.jpg);
            background-size: cover;
            background-attachment: fixed;
            background-position: center center;
            background-repeat: no-repeat;
            width: 100%;
            height: 100%;
        }

        .home2 {
            background-size: cover;
            background-attachment: fixed;
            background-position: center center;
            background-repeat: no-repeat;
            width: 100%;
            height: 100%;
        }

        .home h2 {
            text-align: center;
            padding-top: 50px;
            color:rgba(33, 33, 33, 0.8);
            font-size: 50px;
        }

        /* FOOTER */
        footer {
            width: 100%;
            background-color: #1b1b38;
            color: #d4d4d9;
            text-align: center;
            padding: 5px;
        }

        footer.inferior {
            position: absolute;
            bottom: 0;
        }

        footer.inferior7 {
            position: relative;
            bottom: 0;
            margin-top: 399px;
        }

        /* front box content*/
        .login,
        .signup {
            padding: 20px;
            text-align: center;
        }

        .login h2,
        .signup h2 {
            color: #de4547;
            font-size: 22px;
        }

        .inputbox {
            margin-top: 1px;
        }

        .login input,
        .signup input {
            display: block;
            width: 100%;
            height: 40px;
            background-color: #f2f2f2;
            border: none;
            margin-bottom: 20px;
            font-size: 12px;
        }

        .entra {
            background-color: #0d083b;
            border: none;
            color: white;
            font-size: 12px;
            font-weight: 300;
            box-sizing: content-box;
            padding: 10px;
            border-radius: 10px;
            width: 60px;
            position: absolute;
            right: 30px;
            bottom: 30px;
            cursor: pointer;
        }

        .save-button {
            background-color: #0d083b;
            border: none;
            color: white;
            font-size: 12px;
            font-weight: 300;
            box-sizing: content-box;
            padding: 10px;
            border-radius: 10px;
            width: 60px;
            position: absolute;
            right: 30px;
            bottom: 30px;
            cursor: pointer;
        }

        /* Fade In & Out*/
        .login p {
            cursor: pointer;
            color: #404040;
            font-size: 15px;
        }

        .loginMsg,
        .signupMsg {
            transition: opacity .8s ease-in-out;
        }

        .visibility {
            opacity: 0;
        }

        .hide {
            display: none;
        }

        .form-group {
            margin-bottom: 1rem;
        }

        .invalid-feedback {
            width: 100%;
            margin-top: 0.25rem;
            font-size: 80%;
            color: #dc3545;
        }

        .is-invalid {
            border-color: #dc3545;
            padding-right: calc(1.5em + 0.75rem);
            background-repeat: no-repeat;
            background-position: right calc(0.375em + 0.1875rem) center;
            background-size: calc(0.75em + 0.375rem) calc(0.75em + 0.375rem);
        }

        .hidden {
            display: none;
        }

        /* S E C C I O N P A R A M O V I L */
        @media only screen and (max-width: 1100px) {
            .page-publicacion .contenedor-principal {
                max-width: 1200px;
                margin: 40px 10px;
                display: block;
            }

            .page-publicacion .contenedor-principal .info-publicacion {
                max-width: 100%;
            }

            .page-publicacion .info-publicacion .galeria img {
                width: 30%;
                object-fit: cover;
                height: 154px;
                margin-right: 10px;
                cursor: pointer;
            }

            .page-publicacion .form-contacto-publicacion {
                max-width: 100%;
            }

            .page-contacto .contenedor-contacto {
                max-width: 1200px;
                width: 100%;
                margin: 10px auto;
                display: block;
                padding: 10px;
            }

            .page-contacto .contenedor-contacto .col {
                width: 100%;
                margin-bottom: 20px;
            }

            .page-contacto .formulario input,
            .page-contacto .formulario textarea {
                display: block;
                width: 100%;
                padding: 10px;
            }

            footer.inferior2 {
                position: relative;
            }

            .contenedor-header{
                 position: absolute;
                  top: 0;
                  left: 0;
                  z-index: 1;
                  width: 100%;
            }
        }

         /* Estilos para dispositivos más pequeños */
        @media only screen and (max-width: 1280px) {
            /* Footer */
            footer.inferior7 {
                position: relative; /* Cambiar de 'absolute' a 'relative' */
                margin-top: 650px; /* Ajustar el margen superior según tus preferencias */
            }

            @media only screen and (min-width: 701px) and (max-width: 999px) {
    /* Footer */
    footer.inferior7 {
        position: fixed;
        margin-top: 50px;
    }
}

            @media only screen and (min-width: 1000px) and (max-width: 1100px) {
    /* Footer */
    footer.inferior7 {
        position: fixed;
        margin-top: 50px;
    }
}

            @media only screen and (min-width: 600px) and (max-width: 689px) {
    /* Footer */
    footer.inferior7 {
        position: fixed;
        margin-top: 50px;
    }
}

 @media only screen and (min-width: 1000px) and (max-width: 1100px)  and (min-height: 599px) and (max-height: 611px) {
        /* Footer */
    footer.inferior7 {
        position: relative;
        margin-top: 500px;
    }
 }


  @media only screen and (min-width: 1000px) and (max-width: 1500px)  and (min-height: 1000px) and (max-height: 1200px) {
        /* Footer */
    footer.inferior7 {
        position: fixed;
    }
 }

  @media only screen and (min-width: 150px) and (max-width: 600px)  and (min-height: 1000px) and (max-height: 1200px) {
        /* Footer */
    footer.inferior7 {
        position: fixed;
    }
 }

        @media only screen and (max-width: 900px) {
            .container header nav {
                display: none;
            }

            .container header .info .numero-telefono {
                display: none;
            }

            .container header .nav-responsive {
                display: block;
            }

            .home h2 {
                padding-top: 40px;
                font-size: 30px;
            }

            .home .box-buscar-propiedades {
                position: relative;
                max-width: 350px;
                width: 100%;
                top: 30px;
                background: rgba(0, 0, 0, 0.5);
                left: 50%;
            }

            .home .pos-inferior {
                position: relative;
            }

            .home .box-interior {
                padding: 15px;
            }

            .home .box-buscar-propiedades .box-interior select,
            .home .box-buscar-propiedades .box-interior input[type=submit],
            .home .box-buscar-propiedades .box-interior .estado {
                width: 100%;
                display: block;
                margin-bottom: 10px;
                margin-left: 0;
            }
        }

</style>

</head>
<style type="text/css">
    .image-container {
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100%;
    max-width: 80px; /* Tamaño máximo deseado para la imagen */
    margin: 0 auto;
}

.circular-image {
    max-width: 100%;
    height: auto;
}

</style>
<body class="home2" id="home">
    <div class="container">
  <?php $this->load->view( "header_view" ); ?>
<br><br><br><br>
  <div class="container2" style="font-family: 'Open Sans';">
    <br>
    <div class="backbox">
      <div class="loginMsg">
        <div class="textcontent">
          <p class="title">¿No tienes una cuenta?</p>
          <p>Explora nuestras propiedades.</p>
          <button id="switch1" style="cursor: pointer; font-family: 'Open Sans';">Regístrate</button>
        </div>
      </div>
      <div class="signupMsg visibility">
        <div class="textcontent">
          <p class="title">¿Tienes una cuenta?</p>
          <p>Inicia sesión para ver tu colección.</p>
          <button id="switch2" style="cursor: pointer; font-family: 'Open Sans';">Inicia Sesión</button>
        </div>
      </div>
    </div>


    <!-- backbox -->
    <div class="frontbox">
      <div class="login">
        <h2>INICIA SESIÓN</h2>
        <div class="image-container">
            <img src="<?=base_url()?>static/images/logorenhouse.png" alt="Logo" class="circular-image">
        </div>
        
        <div class="inputbox" style="margin-top: 12px;">
          <form id="lo" method="post">
            <div class="form-control" id="group-corr">
                <?php 
                if ($correoCli == "") :
                ?>
          <input style="font-family: 'Open Sans';" type="text" name="corr" id="corr" placeholder="  CORREO">
                  <?php 
              else:
                  ?>
          <input style="font-family: 'Open Sans';" value="<?=$correoCli?>" type="text" name="corr" id="corr" placeholder="  CORREO">
            <?php 
              endif;
            ?>
        </div>
        <div class="form-control" id="group-con">
          <input style="font-family: 'Open Sans';" type="password" name="con" id="con" placeholder="  CONTRASEÑA">
          <button id="mostrarContraseniaa" type="button" style="background: transparent; border: transparent; color: black;"><i class="fas fa-eye" style="color: black; cursor: pointer;"></i></button>
        </div>
        </div>
        <button class="entra" type="submit" style="font-family: 'Open Sans';">ENTRAR</button>
      </form>
      </div>


      <!-- inputbox -->
   <div class="signup hide">
  <h2>REGÍSTRATE</h2>
  <div class="image-container">
        <img src="<?=base_url()?>static/images/logorenhouse.png" alt="Logo" class="circular-image">
</div>
  <div class="inputbox">
    <form id="re" method="post">
      <div class="form-control" id="group-nombre">
        <input style="font-family: 'Open Sans';" type="text" name="nombre" id="nombre" placeholder="NOMBRE">
      </div>
      <div class="form-control" id="group-cor">
        <input style="font-family: 'Open Sans';" type="text" name="cor" id="cor" placeholder="CORREO">
      </div>
      <div class="form-control" id="group-tel">
        <input style="font-family: 'Open Sans';" type="number" name="tel" id="tel" placeholder="TELÉFONO">
      </div>
      <div class="form-control" id="group-contra">
        <input style="font-family: 'Open Sans';" type="password" name="contra" id="contra" placeholder="CONTRASEÑA">
        <button id="mostrarContrasenia" type="button" style="background: transparent; border: transparent; color: black;"><i class="fas fa-eye" style="color: black; cursor: pointer;"></i></button>
      </div>
      <button style="font-family: 'Open Sans';" id="guardar" class="save-button" type="submit" style="margin-top: 10px;">GUARDAR</button>
    </form>
  </div>
</div>




    </div>

  </div>

<br><br>
     <footer class="inferior7">
            <?php $this->load->view( "footer_view" );?>
        </footer>
      </div>
</body>

<script src="<?=base_url()?>static/js/script.js"></script>
<script src="<?=base_url()?>static/js/reg.js"></script>

<script>
  // Obtiene el campo de contraseña y el botón
  const contraseniaInput = document.getElementById('contra');
  const mostrarContraseniaBtn = document.getElementById('mostrarContrasenia');

  // Agrega un evento de clic al botón
  mostrarContraseniaBtn.addEventListener('click', function() {
    if (contraseniaInput.type === 'password') {
      // Si el campo es de tipo contraseña, cambia a tipo texto
      contraseniaInput.type = 'text';
       mostrarContraseniaBtn.innerHTML = '<i class="fas fa-eye-slash" style="color: black; cursor: pointer;"></i>'; // Cambia el ícono a ojo cerrado
    } else {
      // Si el campo es de tipo texto, cambia a tipo contraseña
      contraseniaInput.type = 'password';
       mostrarContraseniaBtn.innerHTML = '<i class="fas fa-eye" style="color: black; cursor: pointer;"></i>'; // Cambia el ícono a ojo abierto
    }
  });
</script>

<script>
  // Obtiene el campo de contraseña y el botón
  const contraseniaInputt = document.getElementById('con');
  const mostrarContraseniaBtnt = document.getElementById('mostrarContraseniaa');

  // Agrega un evento de clic al botón
  mostrarContraseniaBtnt.addEventListener('click', function() {
    if (contraseniaInputt.type === 'password') {
      // Si el campo es de tipo contraseña, cambia a tipo texto
      contraseniaInputt.type = 'text';
       mostrarContraseniaBtnt.innerHTML = '<i class="fas fa-eye-slash" style="color: black; cursor: pointer;"></i>'; // Cambia el ícono a ojo cerrado
    } else {
      // Si el campo es de tipo texto, cambia a tipo contraseña
      contraseniaInputt.type = 'password';
       mostrarContraseniaBtnt.innerHTML = '<i class="fas fa-eye" style="color: black; cursor: pointer;"></i>'; // Cambia el ícono a ojo abierto
    }
  });
</script>

<script type="text/javascript">
  var $loginMsg = $('.loginMsg'),
  $login = $('.login'),
  $signupMsg = $('.signupMsg'),
  $signup = $('.signup'),
  $frontbox = $('.frontbox');

$('#switch1').on('click', function() {
  $loginMsg.toggleClass("visibility");
  $frontbox.addClass("moving");
  $signupMsg.toggleClass("visibility");

  $signup.toggleClass('hide');
  $login.toggleClass('hide');
})

$('#switch2').on('click', function() {
  $loginMsg.toggleClass("visibility");
  $frontbox.removeClass("moving");
  $signupMsg.toggleClass("visibility");

  $signup.toggleClass('hide');
  $login.toggleClass('hide');
})


</script>

</html>
