<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?=base_url()?>static/images/image.ico">
    <meta author="Carlos Guadalupe López Trejo">
    <title>Perfil</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="<?=base_url()?>/static/css/estilo.css">

    <script src="<?=base_url()?>static/js/jquery-3.6.1.min.js"></script>
    <script src="<?=base_url()?>static/js/mensajes.js" ></script>

    <script>
        var appData = {
            uri_app : "<?= base_url() ?>",
            uri_ws  : "<?= base_url() ?>../webservice/",
            id_cli : "<?= $this->session->id_cli ?>",
            id_usu : "<?= $this->session->id_usu ?>"
        }
    </script>

    <style type="text/css">
        /* =======================================================
           1. FIX GLOBAL Y FLEXBOX
           ======================================================= */
        html { min-height: 100%; }
        
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
            max-width: 800px; /* Un poco más angosto para el perfil */
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
            padding: 15px;
            margin-top: auto;
            box-sizing: border-box;
        }

        .titulo-seccion {
            font-size: 32px;
            color: #0d083b;
            margin-bottom: 30px;
            text-align: center;
            font-weight: 700;
        }

        /* =======================================================
           2. TARJETA DE PERFIL Y FORMULARIO MODERNIZADOS
           ======================================================= */
        .modern-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
            padding: 40px 30px;
            border-top: 5px solid #de4547;
            box-sizing: border-box;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
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
            font-size: 15px;
            background-color: #f9f9f9;
            box-sizing: border-box;
            transition: all 0.3s ease;
            font-family: inherit;
            color: #333;
        }

        .modern-input:focus {
            border-color: #de4547;
            background-color: #fff;
            outline: none;
            box-shadow: 0 0 0 3px rgba(222, 69, 71, 0.1);
        }

        /* Contenedor relativo para el ojito de la contraseña */
        .password-wrapper {
            position: relative;
            display: flex;
            align-items: center;
        }

        .eye-btn {
            position: absolute;
            right: 15px;
            background: transparent;
            color: #666;
            border: none;
            cursor: pointer;
            font-size: 16px;
            transition: color 0.3s;
        }

        .eye-btn:hover {
            color: #de4547;
        }

        /* Estilos de Botones Modernizados */
        .action-buttons {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            justify-content: center;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #eee;
        }

        .modern-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            font-weight: 600;
            padding: 12px 25px;
            border-radius: 30px;
            font-size: 14px;
            text-decoration: none;
            cursor: pointer;
            transition: all 0.3s ease;
            border: none;
            color: white;
            box-shadow: 0 4px 10px rgba(0,0,0,0.15);
        }

        .modern-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(0,0,0,0.25);
        }

        .btn-blue { background-color: #007bff; }
        .btn-blue:hover { background-color: #0056b3; color: white;}
        
        .btn-red { background-color: #de4547; }
        .btn-red:hover { background-color: #c43c3e; color: white;}

        .btn-green { background-color: #1a8232; }
        .btn-green:hover { background-color: #146c29; color: white;}

        .btn-gray { background-color: #6c757d; }
        .btn-gray:hover { background-color: #5a6268; color: white;}

        /* Estilos de errores JS originales */
        .invalid-feedback { width: 100%; margin-top: 0.25rem; font-size: 80%; color: #dc3545; }
        .is-invalid { border-color: #dc3545; background-color: #fff0f0; }

    </style>
</head>

<body class="page-perfil">

    <div class="container" style="position: relative; z-index: 9999;">
        <?php $this->load->view( "header_view" ); ?>
    </div>

    <script type="text/javascript">
        $(document).ready(function(){
            borra_mensajes();

            $("#btn-guardar").click(function(){
                $(".form-group").keydown(borra_mensajes);
                borra_mensajes();

                let formato = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;

                if ($("#nombre").val()=="") {
                    error_formulario("nombre","El nombre es requerído");
                    return false;
                }
                if ($("#cor").val()=="") {
                    error_formulario("cor","El correo es requerído");
                    return false;
                }
                else if (!formato.test($("#cor").val())) {
                    error_formulario("cor","El formato de correo es incorrecto");
                    return false;
                }
                else if ($("#tel").val()=="") {
                    error_formulario("tel","El teléfono es requerído");
                    return false;
                }
                else if ($("#tel").val().length !== 10) {
                    error_formulario("tel","Ingresa un teléfono válido");
                    return false;
                }
                else if ($("#contrasenia").val()=="") {
                    error_formulario("contrasenia","La contraseña es requerída");
                    return false;
                }
                else if ($("#contrasenia").val().length < 8) {
                    error_formulario("contrasenia","La contraseña debe contener por lo menos 8 caracteres");
                    return false;
                }
                else{
                    $.ajax({
                        "url" : appData.uri_ws+"backend/updatecliente/",
                        "dataType" : "json",
                        "type"  :   "post",
                        "data"  :   {
                            "id_cli" : appData.id_cli,
                            "id_usu" : appData.id_usu,
                            "nombre" : $("#nombre").val(),
                            "ap" : $("#ap").val(),
                            "correo" : $("#cor").val(),
                            "password" : $("#contrasenia").val(),
                            "tel" : $("#tel").val()
                        }
                    })
                    .done(function(obj){
                        alert(obj.mensaje);
                        if(obj.resultado){
                            $(location).attr("href","");
                        }
                    });
                }
            });
        });
    </script>

    <?php 
        $co = $this->db->select("*")->from("cliente")->where("id",$this->session->id_cli)->get()->row();
        $nopro = $co->nombre;
        $telpro = $co->tel;
        $fec_registropro = $co->fec_registro;
        $corpro = $co->correo;
        $contrasenia = urldecode($this->session->contrasenia);
        $arre = $this->db->from("inquilino")->where("id_cli",$this->session->id_cli)->get()->num_rows() > 0 ? 1 : 2;
    ?>

    <main class="main-content">
        
        <h2 class="titulo-seccion">Perfil de Usuario</h2>
        
        <div class="modern-card">
            <form method="post">

                <div class="form-group" id="group-nombre">
                    <label for="nombre">Nombre Completo:</label>
                    <input type="text" name="nombre" id="nombre" value="<?=$nopro?>" class="modern-input form-control" />
                </div>

                <div class="form-group" id="group-cor">
                    <label for="cor">Correo Electrónico:</label>
                    <input type="text" name="cor" id="cor" value="<?=$corpro?>" class="modern-input form-control" />
                </div>

                <div class="form-group" id="group-tel">
                    <label for="tel">Teléfono:</label>
                    <input type="number" name="tel" id="tel" value="<?=$telpro?>" class="modern-input form-control" />
                </div>

                <div class="form-group" id="group-contrasenia">
                    <label for="contrasenia">Contraseña:</label>
                    <div class="password-wrapper">
                        <input type="password" name="contrasenia" id="contrasenia" value="<?=$contrasenia?>" class="modern-input form-control" style="padding-right: 45px;" />
                        <button id="mostrarContrasenia" type="button" class="eye-btn"><i class="fas fa-eye"></i></button>
                    </div>
                </div>

                <div class="action-buttons">
                    <a href="<?=base_url()?>Frontend/soli/<?=$this->session->id_usu?>/<?=$this->session->tokenn?>/<?=$this->session->id_cli?>" class="modern-btn btn-blue" title="Ver Solicitudes">
                        <i class="fas fa-users fa-lg"></i> Ver solicitudes
                    </a>

                    <?php if($arre == 1): ?>
                        <a href="<?=base_url()?>Frontend/arrendamiento/<?=$this->session->id_usu?>/<?=$this->session->tokenn?>/<?=$this->session->id_cli?>" class="modern-btn btn-red" title="Ver Arrendamiento">
                            <i class="fas fa-file-contract fa-lg"></i> Ver arrendamiento
                        </a>
                    <?php endif; ?>
                </div>

                <div class="action-buttons" style="border-top: none; padding-top: 0;">
                    <button class="modern-btn btn-green" type="button" id="btn-guardar" name="btn-guardar">
                        <i class="fas fa-save fa-lg"></i> Guardar Cambios
                    </button>
                    <a href="<?=base_url()?>Frontend/insesion" class="modern-btn btn-gray">
                        <i class="fas fa-arrow-circle-left fa-lg"></i> Cancelar
                    </a>
                </div>

            </form>
        </div>

    </main>

    <footer class="footer-global">
        <?php $this->load->view( "footer_view" );?>
    </footer>

    <script>
        const contraseniaInput = document.getElementById('contrasenia');
        const mostrarContraseniaBtn = document.getElementById('mostrarContrasenia');

        mostrarContraseniaBtn.addEventListener('click', function() {
            if (contraseniaInput.type === 'password') {
                contraseniaInput.type = 'text';
                mostrarContraseniaBtn.innerHTML = '<i class="fas fa-eye-slash"></i>'; 
            } else {
                contraseniaInput.type = 'password';
                mostrarContraseniaBtn.innerHTML = '<i class="fas fa-eye"></i>'; 
            }
        });
    </script>
    <script src="<?=base_url()?>static/js/script.js"></script>

</body>
</html>