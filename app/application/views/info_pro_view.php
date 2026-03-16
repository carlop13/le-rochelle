<?php
 $consulta = $this->db->select("tipo")->from("tipo")->join("propiedad","propiedad.id_tipo = tipo.id")->where("propiedad.id",$id_info)->get()->result_array();

 if (!empty($consulta)) {
$tipo = $consulta["0"]["tipo"];
}
else{
  $tipo = "tipo";  
}

$idd = $this->db->select("id_ciu")->from("propiedad")->where("id",$id_info)->get()->result_array();
 if (!empty($idd)) {
    $id_ciu=$idd["0"]["id_ciu"];

    $ci = $this->db->select("nombre")->from("propiedad")->join("ciudad","propiedad.id_ciu = ciudad.id")->where("id_ciu",$id_ciu)->get()->result_array();
    $ciudad=$ci["0"]["nombre"];

    $consulta2 = $this->db->select("*")->from("propiedad")->where("id",$id_info)->get()->result_array();

    $id=$consulta2["0"]["id"];
    $estado=$consulta2["0"]["estado"];
    $precio=$consulta2["0"]["precio"];
    $calle=$consulta2["0"]["calle"];
    $noext=$consulta2["0"]["noext"];
    $col=$consulta2["0"]["col"];
    $titulo=$consulta2["0"]["titulo"];
    $foto=$consulta2["0"]["foto"];
    $habitaciones=$consulta2["0"]["habitaciones"];
    $banios=$consulta2["0"]["banios"];
    $garage=$consulta2["0"]["garage"];
    $pisos=$consulta2["0"]["pisos"];
    $id_propie = $consulta2["0"]["id_propi"];
    $noesta=$consulta2["0"]["noesta"];
    $ancho=$consulta2["0"]["ancho"];
    $fondo=$consulta2["0"]["fondo"];
    $suptot=$consulta2["0"]["suptot"];
    $mconst=$consulta2["0"]["mconst"];
    $ctoser=$consulta2["0"]["ctoser"];
    $mbanios=$consulta2["0"]["mbanios"];
}
else{
    $id_ciu=0;
    $ciudad="ciudad";
    $id=0;
    $estado="estado";
    $precio=0;
    $calle="calle";
    $noext="no";
    $col="colonia";
    $titulo="titulo";
    $foto="foto";
    $habitaciones="habitaciones";
    $banios="baños";
    $garage="garage";
    $pisos="pisos";
    $id_propie = 0;
    $noesta="";
    $ancho="";
    $fondo="";
    $suptot="";
    $mconst="";
    $ctoser="";
    $mbanios="";
}

    $consulta3 = $this->db->select("descripcion")->from("descripcion")->where("id_prop",$id_info)->get()->result_array();

    if (!empty($consulta3)) {
    $descripcion = $consulta3["0"]["descripcion"];
}
else{
    $descripcion = "No hay descripción";
}


$mon = $this->db->select("simbolo,signo")->from("propiedad")->join("moneda","propiedad.id_mon = moneda.id")->where("propiedad.id",$id_info)->get()->result_array();

if (!empty($mon)) {
            $simbolo=$mon["0"]["simbolo"];
            $signo=$mon["0"]["signo"];
        }
        else{
           $simbolo="simbolo";
            $signo="signo"; 
        }
$paiss = $this->db->select("pais")->from("ciudad")->join("pais","ciudad.id_pais = pais.id")->where("ciudad.id",$id_ciu)->get()->result_array();

if (!empty($paiss)) {
            $pais=$paiss["0"]["pais"];
        }
        else{
            $pais = "pais";
        }

$consulta7 = $this->db->select("*")->from("propietario")->where("id",$id_propie)->get()->result_array();

if (!empty($consulta7)) {
$propietario_nombre = $consulta7["0"]["nombre"];
$propietario_ap = $consulta7["0"]["ap"];
$propietario_tel = $consulta7["0"]["tel"];
$propietario_correo = $consulta7["0"]["correo"];
}
else{
$propietario_nombre = "";
$propietario_ap = "";
$propietario_tel = "";
$propietario_correo = "";
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?=base_url()?>static/images/image.ico">
    <meta author="Carlos Guadalupe López Trejo">
    <title>Información - <?= $titulo ?></title>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="<?=base_url()?>/static/css/estilo.css">
    
    <script src="<?=base_url()?>static/js/jquery-3.6.1.min.js"></script>
    <script src="<?=base_url()?>static/js/mensajes.js" ></script>
    
    <script>
      var appData = {
        uri_app : "<?= base_url() ?>",
        uri_ws  : "<?= base_url() ?>../webservice/",
        titulo : "<?=$titulo?>",
        num : "<?=$id_info?>",
        nomb : "<?=$propietario_nombre?>",
        ap : "<?=$propietario_ap?>",
        tel : "<?=$propietario_tel?>",
        cor : "<?=$propietario_correo?>",
        estado : "<?=$estado?>"
      }
    </script>

    <style type="text/css">
        /* =======================================================
           1. ESTILOS BASE Y LIMPIEZA
           ======================================================= */
        body {
            margin: 0;
            padding: 0;
            overflow-x: hidden; 
            font-family: 'Open Sans', sans-serif;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* =======================================================
           2. HEADER INCORPORADO DIRECTAMENTE (RESPONSIVO AL 100%)
           ======================================================= */
        .integrated-header-container {
            width: 100%;
            background-color: #0d083b;
            position: relative;
            z-index: 99999;
        }

        .integrated-header {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 20px;
            box-sizing: border-box;
        }

        .header-logo-group {
            display: flex;
            align-items: center;
            gap: 15px;
            color: white;
        }

        .header-logo-group img {
            width: 45px;
            height: 45px;
            object-fit: contain;
        }

        .header-logo-text h1 { margin: 0; font-size: 18px; display: flex; align-items: center; gap: 8px;}
        .header-logo-text p { margin: 0; font-size: 12px; color: #d4d4d9;}

        .integrated-nav {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .integrated-nav a {
            color: white;
            text-decoration: none;
            font-size: 14px;
            font-weight: bold;
            padding: 8px 15px;
            border-radius: 20px;
            transition: background-color 0.3s ease;
        }

        .integrated-nav a:hover {
            background-color: #de4547;
        }

        .header-user-icons {
            display: flex;
            gap: 15px;
        }

        .header-user-icons a {
            color: white;
            font-size: 20px;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .header-user-icons a:hover { color: #de4547; }

        .hamburger-btn {
            display: none;
            color: white;
            font-size: 24px;
            cursor: pointer;
            background: none;
            border: none;
            padding: 0;
        }

        @keyframes blinking { 0% { opacity: 1; } 50% { opacity: 0.6; } 100% { opacity: 1; } }
        .blinking-link { animation: blinking 1.5s infinite; color: #de4547 !important; }
        .blinking-link:hover { color: white !important; }

        /* HEADER MOBILE */
        @media screen and (max-width: 900px) {
            .hamburger-btn { display: block; }
            .header-user-icons { display: none; }
            
            .integrated-nav {
                display: none; /* Oculto inicialmente */
                position: absolute;
                top: 100%;
                left: 0;
                width: 100%;
                background-color: #0d083b;
                flex-direction: column;
                padding: 10px 0 20px 0;
                box-shadow: 0 10px 20px rgba(0,0,0,0.3);
            }

            .integrated-nav.show-mobile-nav {
                display: flex;
            }

            .integrated-nav a {
                width: 100%;
                text-align: center;
                padding: 12px 20px;
                border-radius: 0;
                box-sizing: border-box;
            }
        }

        /* =======================================================
           3. CONTENEDOR PRINCIPAL
           ======================================================= */
        .main-content {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 60px 20px 60px 20px; 
            box-sizing: border-box;
            flex: 1 0 auto;
        }

        /* Saludo y Menú de Bienvenida */
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

        /* =======================================================
           4. LAYOUT MODERNO (GRID DE 2 COLUMNAS)
           ======================================================= */
        .property-layout {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 30px;
            align-items: start;
        }
        @media (max-width: 900px) {
            .property-layout { grid-template-columns: 1fr; }
        }

        .property-left, .property-right {
            min-width: 0; 
            width: 100%;
        }

        /* =======================================================
           5. ESTILOS COMUNES DE TARJETAS (CARDS)
           ======================================================= */
        .modern-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
            padding: 30px;
            margin-bottom: 30px;
            border-top: 5px solid #de4547;
            box-sizing: border-box;
        }

        /* =======================================================
           6. COLUMNA IZQUIERDA (Info, Fotos, Detalles)
           ======================================================= */
        .modern-prop-header {
            margin-bottom: 25px;
            padding-bottom: 15px;
            border-bottom: 2px solid #f0f0f0;
        }
        .modern-prop-badges {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 15px;
        }
        .modern-badge {
            background-color: #de4547;
            color: white;
            padding: 6px 15px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        .modern-price {
            font-size: 32px;
            font-weight: 800;
            color: #0d083b;
            margin: 0;
        }
        .modern-prop-title {
            font-size: 28px;
            color: #333;
            margin: 0 0 10px 0;
            font-weight: 700;
        }
        .modern-prop-address {
            font-size: 15px;
            color: #666;
            margin: 0;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .modern-prop-address i { color: #de4547; }

        /* Imágenes */
        .modern-main-img {
            width: 100%;
            height: 480px;
            object-fit: cover;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
            margin-bottom: 20px;
        }
        @media (max-width: 768px) { .modern-main-img { height: 320px; } }

        .modern-gallery {
            display: flex;
            gap: 15px;
            overflow-x: auto;
            padding-bottom: 15px;
            margin-bottom: 10px; 
            max-width: 100%;
        }
        .modern-gallery::-webkit-scrollbar { height: 8px; }
        .modern-gallery::-webkit-scrollbar-thumb { background-color: #ddd; border-radius: 10px; }
        
        .modern-gallery img {
            width: 140px;
            height: 90px;
            flex-shrink: 0;
            object-fit: cover;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 3px 10px rgba(0,0,0,0.1);
            border: 2px solid transparent;
        }
        .modern-gallery img:hover {
            transform: translateY(-5px);
            border: 2px solid #de4547;
        }

        /* Detalles y Descripción */
        .modern-card h3 {
            font-size: 22px;
            color: #0d083b;
            margin-top: 0;
            margin-bottom: 25px;
            padding-bottom: 10px;
            border-bottom: 2px solid #f0f0f0;
        }
        
        .specs-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(160px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }
        .spec-item {
            display: flex;
            flex-direction: column;
            background: #f9f9f9;
            padding: 15px;
            border-radius: 10px;
            text-align: center;
            border: 1px solid #eee;
        }
        .spec-header {
            font-size: 13px;
            color: #777;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 5px;
            font-weight: 600;
        }
        .spec-valor {
            font-size: 16px;
            color: #333;
            font-weight: 700;
        }

        .prop-desc-text {
            font-size: 16px;
            line-height: 1.8;
            color: #555;
            text-align: justify;
        }

        /* Mapa */
        .map-container-modern {
            height: 380px;
            width: 100%;
            border-radius: 10px;
            overflow: hidden;
            border: 1px solid #ddd;
        }

        /* =======================================================
           7. COLUMNA DERECHA (Formulario Sticky)
           ======================================================= */
        .sticky-wrapper {
            position: sticky;
            top: 20px;
        }
        @media (max-width: 900px) {
            .sticky-wrapper { position: static; }
        }

        .modern-form-title {
            font-size: 20px;
            color: #333;
            margin-bottom: 20px;
            font-weight: 600;
            text-align: center;
            line-height: 1.4;
        }
        
        /* Controles de Formulario */
        .form-control { margin-bottom: 1.2rem; }
        .form-control label {
            display: block; margin-bottom: 8px; font-size: 14px; font-weight: 600; color: #444;
        }
        .modern-input {
            width: 100%; padding: 12px 15px; border-radius: 8px; border: 1px solid #ddd;
            font-size: 14px; background-color: #f9f9f9; box-sizing: border-box; transition: all 0.3s ease; font-family: inherit;
        }
        .modern-input:focus { border-color: #de4547; background-color: #fff; outline: none; box-shadow: 0 0 0 3px rgba(222, 69, 71, 0.1); }
        
        .modern-submit-btn {
            background-color: #0d083b; color: white; font-weight: bold; font-size: 16px;
            border: none; border-radius: 8px; padding: 15px; width: 100%; cursor: pointer;
            transition: all 0.3s ease; box-shadow: 0 4px 10px rgba(13, 8, 59, 0.3); margin-top: 10px;
        }
        .modern-submit-btn:hover { background-color: #de4547; transform: translateY(-2px); box-shadow: 0 6px 15px rgba(222, 69, 71, 0.4); }

        /* Prompt de Login */
        .login-prompt {
            text-align: center;
            padding: 20px 0;
        }
        .login-prompt h2 { font-size: 22px; color: #333; margin-bottom: 20px; line-height: 1.5; }
        .boton-rentar {
            display: inline-block; background-color: #de4547; color: #fff; font-weight: bold;
            padding: 15px 30px; border-radius: 30px; text-decoration: none; transition: all 0.3s ease; font-size: 16px;
            box-shadow: 0 4px 10px rgba(222, 69, 71, 0.3);
        }
        .boton-rentar:hover { background-color: #c43c3e; transform: translateY(-2px); color: white;}

        /* Estilos de errores JS originales */
        .invalid-feedback { width: 100%; margin-top: 0.25rem; font-size: 80%; color: #dc3545; }
        .is-invalid { border-color: #dc3545; }

        /* Estilos del Modal adaptados */
        .imagen-casa {
            max-width: 90%;
            max-height: 85vh;
            object-fit: contain;
            display: block;
            margin: auto;
            border-radius: 10px;
            box-shadow: 0 5px 30px rgba(0,0,0,0.5);
        }
    </style>
</head>

<body class="page-publicacion">

    <div class="integrated-header-container">
        <?php 
        $consulta = $this->db->select("*")->from("datos")->where("id",1)->get()->result_array();
        $nombre = $consulta["0"]["nombre"];
        ?>
        <header class="integrated-header">
            <div class="header-logo-group">
                <img src="<?=base_url()?>static/images/image.ico" alt="Logo">
                <div class="header-logo-text">            
                    <h1><i class="fa-solid fa-globe"></i> <?=$nombre?></h1>
                </div>
            </div>

            <button class="hamburger-btn" onclick="toggleMobileNav()">
                <i class="fa-solid fa-bars"></i>
            </button>
            
            <nav class="integrated-nav" id="integratedNav">
                <a href="<?=base_url()?>">Inicio</a>
                <a href="<?=base_url()?>frontend/propiedades/6">Propiedades</a>
                <a href="<?=base_url()?>frontend/destacadas/6">Destacadas</a>
                <a href="<?=base_url()?>frontend/contactos">Contacto</a>
                <a href="<?=base_url()?>frontend/conocenos">Conócenos</a>
                <a href="<?=base_url()?>frontend/equipo">Equipo</a>
                <a href="<?=base_url()?>frontend/insesion/">Rent House</a>
                
                <?php if($this->session->userdata( "tokenn" )):  ?> 
                    <?php if($this->session->tipo == "cliente"):  ?> 
                        <a href="<?=base_url()?>Frontend/perfil2/<?=$this->session->id_usu?>/<?=$this->session->tokenn?>" class="mobile-only-icon" style="display:none;"><i class="fas fa-user"></i> Perfil</a>
                    <?php endif;  ?> 
                    <a href="<?=base_url()?>Acceso/cierrasesion/<?=$this->session->id_usu?>/<?=$this->session->tokenn?>" class="mobile-only-icon" style="display:none;"><i class="fa-solid fa-right-from-bracket"></i> Salir</a>
                <?php endif;  ?>
            </nav>

            <div class="header-user-icons">
                <?php if($this->session->userdata( "tokenn" )):  ?> 
                    <?php if($this->session->tipo == "cliente"):  ?> 
                        <a href="<?=base_url()?>Frontend/perfil2/<?=$this->session->id_usu?>/<?=$this->session->tokenn?>" title="Perfil"><i class="fas fa-user"></i></a>
                    <?php endif;  ?> 
                    <a href="<?=base_url()?>Acceso/cierrasesion/<?=$this->session->id_usu?>/<?=$this->session->tokenn?>" title="Cerrar Sesión"><i class="fa-solid fa-right-from-bracket"></i></a>
                <?php endif;  ?> 
            </div>
        </header>
    </div>

    <script>
        function toggleMobileNav() {
            var nav = document.getElementById("integratedNav");
            nav.classList.toggle("show-mobile-nav");
            
            var mobileIcons = document.querySelectorAll('.mobile-only-icon');
            mobileIcons.forEach(icon => {
                if (window.innerWidth <= 900) {
                    icon.style.display = nav.classList.contains("show-mobile-nav") ? "block" : "none";
                }
            });
        }
    </script>

    <main class="main-content">

        <?php if($this->session->userdata("tokenn") && $this->session->tipo == "cliente"): ?>
            <a href="" class="no-link-style" title="Perfil">
                <span class="bienvenido">
                   <i class="fas fa-user"></i> Hola, <?= urldecode($this->session->nombre) ?> 
                </span>
            </a>
        <?php endif; ?>

        <div class="property-layout">
            
            <div class="property-left">
                
                <div class="modern-card">
                    <div class="modern-prop-header">
                        <div class="modern-prop-badges">
                            <span class="modern-badge"><?= $estado ?></span>
                            <h2 class="modern-price"><?=$simbolo?> <?=$signo == "?" ? "€" : $signo ?><?= number_format($precio, 2, '.', ',') ?></h2>
                        </div>
                        <h1 class="modern-prop-title"><?= $titulo ?></h1>
                        <p class="modern-prop-address"><i class="fa-solid fa-location-dot"></i> <?= $calle ?> <?= $noext ?> <?= $col?>, <?=$ciudad?> <?=$pais?></p>
                    </div>

                    <img class="modern-main-img" src="<?=base_url()?>static/images/casas/<?=$foto?>" alt="<?=$titulo?>">

                    <div class="modern-gallery" id="galeria">
                        <?php 
                        $fotos = $this->db->select("*")->from("foto")->where("id_prop",$id_info)->get();
                        $i = 0; 
                        foreach ($fotos->result_array() as $f) : ?>
                            <img src="<?=base_url()?>static/images/casas/<?=$f['foto']?>" onclick="abrirModal(this, <?php echo $i ?>)" alt="Foto Galería">
                        <?php $i++; endforeach; ?>
                    </div>
                </div>

                <div class="modern-card">
                    <h3>Detalles de la Propiedad</h3>
                    <div class="specs-grid">
                        <div class="spec-item">
                            <span class="spec-header">Tipo</span>
                            <span class="spec-valor"><?= $tipo ?></span>
                        </div>

                        <?php if ($habitaciones != "") : ?>
                        <div class="spec-item">
                            <span class="spec-header">Habitaciones</span>
                            <span class="spec-valor"><?= $habitaciones ?></span>
                        </div>
                        <?php endif; ?>

                        <?php if ($banios != "") : ?>
                        <div class="spec-item">
                            <span class="spec-header">Baños</span>
                            <span class="spec-valor"><?= $banios ?></span>
                        </div>
                        <?php endif; ?>

                        <?php if ($mbanios != "") : ?>
                        <div class="spec-item">
                            <span class="spec-header">Medios Baños</span>
                            <span class="spec-valor"><?= $mbanios ?></span>
                        </div>
                        <?php endif; ?>

                        <?php if ($ancho != "") : ?>
                        <div class="spec-item">
                            <span class="spec-header">Ancho</span>
                            <span class="spec-valor"><?= $ancho ?></span>
                        </div>
                        <?php endif; ?>

                        <?php if ($fondo != "") : ?>
                        <div class="spec-item">
                            <span class="spec-header">Fondo</span>
                            <span class="spec-valor"><?= $fondo ?></span>
                        </div>
                        <?php endif; ?>

                        <?php if ($suptot != "") : ?>
                        <div class="spec-item">
                            <span class="spec-header">Sup. Total</span>
                            <span class="spec-valor"><?= $suptot ?></span>
                        </div>
                        <?php endif; ?>

                        <?php if ($pisos != "") : ?>
                        <div class="spec-item">
                            <span class="spec-header">Pisos</span>
                            <span class="spec-valor"><?= $pisos ?></span>
                        </div>
                        <?php endif; ?>

                        <?php if ($garage != "noMo" && $garage != "") : ?>
                        <div class="spec-item">
                            <span class="spec-header">Garage</span>
                            <span class="spec-valor"><?= $garage ?></span>
                        </div>
                        <?php endif; ?>

                        <?php if ($ctoser != "noMo" && $ctoser != "") : ?>
                        <div class="spec-item">
                            <span class="spec-header">Cto. Servicio</span>
                            <span class="spec-valor"><?= $ctoser ?></span>
                        </div>
                        <?php endif; ?>

                        <?php if ($noesta != "") : ?>
                        <div class="spec-item">
                            <span class="spec-header">Estacionamientos</span>
                            <span class="spec-valor"><?= $noesta ?></span>
                        </div>
                        <?php endif; ?>

                        <?php if ($mconst != "") : ?>
                        <div class="spec-item">
                            <span class="spec-header">Construcción</span>
                            <span class="spec-valor"><?= $mconst ?></span>
                        </div>
                        <?php endif; ?>
                    </div>

                    <h3>Descripción</h3>
                    <div class="prop-desc-text">
                        <?=$descripcion ?>
                    </div>
                </div>

                <div class="modern-card">
                    <h3>Ubicación</h3>
                    <div id="map1" class="map-container-modern"></div>
                    
                    <script>
                      function initMap() {
                          var id = <?= $id_info ?>;
                          $.ajax({
                            "url": appData.uri_ws + "backend/getubi/",
                            "dataType": "json",
                            "type": "post",
                            "data": { "id": id }
                          }).done(function(data) {
                            if(data && data.length > 0) {
                                var location = data[0]; 
                                var lat = parseFloat(location.lat);
                                var lng = parseFloat(location.lng);

                                if (lat == 0.000000000000 && lng == 0.000000000000) {
                                    lat = null; lng = null;
                                }

                                var map = new google.maps.Map(document.getElementById("map1"), {
                                  zoom: 15,
                                  center: { lat: lat, lng: lng },
                                  styles: [{ featureType: "poi", elementType: "labels", stylers: [{ visibility: "off" }] }]
                                });

                                var marker = new google.maps.Marker({
                                  position: { lat: lat, lng: lng },
                                  map: map,
                                  animation: google.maps.Animation.DROP
                                });
                            }
                          });
                      }
                    </script>
                    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC9NVdgMz2GdZa-UEpa4fyHkjcO0b60xiQ&callback=initMap" async defer></script>
                </div>

            </div>

            <div class="property-right">
                <div class="sticky-wrapper">
                    <div class="modern-card">
                        
                        <?php if($estado == "Alquiler" && !$this->session->userdata( "tokenn" )): ?>
                            <div class="login-prompt">
                                <h2 id="saludo" style="animation: fadeIn 0.8s ease;">¡Hola! Para rentar esta propiedad, ingresa a tu cuenta.</h2>
                                <a href="<?=base_url()?>frontend/insesion/" class="boton-rentar"><i class="fas fa-home"></i> Rent House</a>
                            </div>
                        <?php else: ?>
                            
                            <form action="<?=base_url()?>../webservice/correo/enviarCorreo" id="mensaje" method="post">
                                
                                <input type="hidden" class="form-control" id="propietario_nombre" name="propietario_nombre" value="<?=$propietario_nombre?>" />
                                <input type="hidden" class="form-control" id="propietario_ap" name="propietario_ap" value="<?=$propietario_ap?>" />
                                <input type="hidden" class="form-control" id="propietario_tel" name="propietario_tel" value="<?=$propietario_tel?>" />
                                <input type="hidden" class="form-control" id="propietario_correo" name="propietario_correo" value="<?=$propietario_correo?>" />
                                <input type="hidden" class="form-control" id="id_info" name="id_info" value="<?=$id_info?>" />
                                <input type="hidden" class="form-control" id="numero" name="numero" value="<?=$numero?>" />
                                <input type="hidden" class="form-control" id="corre" name="corre" value="<?=$corre?>" />
                                <input type="hidden" class="form-control" id="id_cliente" name="id_cliente" value="<?=$this->session->id_cli?>" />
                                <input type="hidden" class="form-control" id="estado" name="estado" value="<?=$estado?>" />

                                <h3 class="modern-form-title">Me interesa esta propiedad</h3>

                                <?php if ($this->session->userdata( "tokenn" ) && $this->session->tipo == "cliente") : ?>
                                    <div class="form-control" id="group-nombre">
                                        <label for="nombre">Nombre</label>
                                        <input class="modern-input" type="text" placeholder="Ingrese su nombre" name="nombre" id="nombre" value="<?=urldecode($this->session->nombre)?>">
                                    </div>
                                    <div class="form-control" id="group-email">
                                        <label for="email">Dirección de Correo</label>
                                        <input class="modern-input" type="text" placeholder="Dirección de Correo" name="email" id="email" value="<?=$this->session->correo?>">
                                    </div>
                                    <div class="form-control" id="group-telefono">
                                        <label for="telefono">Teléfono</label>
                                        <input class="modern-input" type="number" placeholder="Ingrese su teléfono" name="telefono" id="telefono" value="<?=$this->session->tel?>">
                                    </div>
                                <?php else: ?>
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
                                <?php endif; ?>

                                <div class="form-control" id="group-mensajee">
                                    <label for="mensajee">Mensaje</label>
                                    <?php if ($this->session->userdata( "tokenn" ) && $this->session->tipo == "cliente") : ?>
                                        <textarea class="modern-input" rows="4" placeholder="Escriba su mensaje" name="mensajee" id="mensajee">¡Hola! Me llamo <?= urldecode($this->session->nombre) ?> y quiero que se comuniquen conmigo porque me interesa <?=$titulo?>. ¡Por favor contáctame!</textarea>
                                    <?php else: ?>
                                        <textarea class="modern-input" rows="4" placeholder="Escriba su mensaje" name="mensajee" id="mensajee">¡Hola! Quiero que se comuniquen conmigo porque me interesa <?=$titulo?>. ¡Por favor contáctame!</textarea>
                                    <?php endif; ?>
                                </div>
                                
                                <input class="modern-submit-btn" type="submit" value="Enviar Mensaje" name="enviar">
                            </form>
                            
                        <?php endif; ?>
                    </div>
                </div>
            </div>

        </div>

        <div id="myModal" class="modal">
            <div class="modal-content">
                <img src="" alt="" id="fotoModal" class="imagen-casa">
                <span class="close">&times;</span>
                <span onclick="anterior()"><i class="fa-solid fa-angles-left"></i></span>
                <span onclick="proxima()"><i class="fa-solid fa-angles-right"></i></span>
            </div>
        </div>

    </main>

    <footer style="width: 100%; background-color: #1b1b38; padding: 20px 0; color: white;">
        <?php $this->load->view( "footer_view" );?>
    </footer>

    <script src="<?=base_url()?>static/js/script.js"></script>
    <script src="<?=base_url()?>static/js/mensaje2.js"></script>
</body>

</html>