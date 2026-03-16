<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?=base_url()?>static/images/image.ico">
    <meta author="Carlos Guadalupe López Trejo">
    <title>Destacadas</title>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="<?=base_url()?>/static/css/estilo.css">
    
    <script src="<?=base_url()?>static/js/jquery-3.6.1.min.js"></script>
    <script src="<?=base_url()?>static/js/mensajes.js" ></script>

    <script>
        var appData = {
            uri_app : "<?= base_url() ?>",
            uri_ws  : "<?= base_url() ?>../webservice/"
        }

        function cargarMasPropiedades(contador, numero) {
            $.ajax({
                url: appData.uri_ws + "backend/obtenerPropiedadesDes",
                method: "POST",
                data: { contador: contador },
                success: function(response) {
                    var nuevasPropiedades = JSON.parse(response);
                    var contenedorPropiedades = document.getElementById("contenedor-propiedades");
                    var con = parseInt(contador) + 3;

                    nuevasPropiedades.forEach(function(propiedad) {
                        $.ajax({
                            url: appData.uri_ws + "backend/obtenerdat",
                            dataType : "json",
                            method: "POST",
                            data: { 
                                id_pro: propiedad.id,
                                id_ciu : propiedad.id_ciu 
                            },
                            success: function(respons) {
                                var prec = formatMoney(Math.trunc(propiedad.precio));

                                // NUEVA ESTRUCTURA HTML DE LA TARJETA EN AJAX
                                var nuevaPropiedadHTML = `
                                    <form action="<?=base_url()?>frontend/informacion/${propiedad.id}/`+con+`" id="form_${propiedad.id}" method="post">
                                        <input type="hidden" value="${propiedad.id}" name="idPropiedad">
                                        <div class="modern-card" onclick="document.getElementById('form_${propiedad.id}').submit();">
                                            
                                            <div class="modern-badge">${propiedad.estado}</div>
                                            <img class="modern-card-img" src="<?=base_url()?>static/images/casas/${propiedad.foto}" alt="${propiedad.titulo}">
                                            
                                            <div class="modern-card-body">
                                                <div class="modern-card-price">
                                                    ${respons.simbolo} ${respons.signo == "?" ? "€" : respons.signo}${prec}
                                                </div>
                                                <div class="modern-card-title">
                                                    ${propiedad.titulo}
                                                </div>
                                                <div class="modern-card-location">
                                                    <i class="fa-solid fa-location-dot"></i> ${respons.ciudad}
                                                </div>
                                                
                                                <div class="modern-card-features">
                                                    ${propiedad.habitaciones !== "" ? `<div class="modern-card-feature" title="Habitaciones"><i class="fa-solid fa-bed"></i> ${propiedad.habitaciones} Hab</div>` : ''}
                                                    ${propiedad.banios !== "" ? `<div class="modern-card-feature" title="Baños"><i class="fa-solid fa-bath"></i> ${propiedad.banios} Baños</div>` : ''}
                                                    ${propiedad.suptot !== "" ? `<div class="modern-card-feature" title="Superficie"><i class="fa-solid fa-ruler-combined"></i> ${propiedad.suptot}</div>` : ''}
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                `;

                                contenedorPropiedades.insertAdjacentHTML("beforeend", nuevaPropiedadHTML);
                            }
                        });
                    });

                    var botonCargarMas = document.getElementById("botonCargarMas");
                    botonCargarMas.setAttribute("data-contador", parseInt(contador) + nuevasPropiedades.length);

                    if (nuevasPropiedades.length === 0) {
                        botonCargarMas.style.display = "none";
                    }
                }
            });
        }

        function formatMoney(amount) {
            return amount.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
        }
    </script>

    <style type="text/css">
        /* =======================================================
           1. FIX GLOBAL Y FLEXBOX
           ======================================================= */
        html, body {
            height: 100%;
            margin: 0;
            overflow-x: hidden; 
            font-family: 'Open Sans', sans-serif;
        }

        body.page-propiedades {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .main-content {
            flex: 1; 
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px 20px 60px 20px; 
            box-sizing: border-box;
        }

        footer.footer-global {
            width: 100%;
            background-color: #1b1b38;
            color: #d4d4d9;
            text-align: center;
            padding: 20px 15px;
            margin-top: auto;
        }

        /* =======================================================
           2. BUSCADOR MODERNIZADO
           ======================================================= */
        .modern-search-box {
            background: #ffffff;
            padding: 25px 30px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            margin-bottom: 40px;
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

        /* =======================================================
           3. TARJETAS MODERNAS (GRID)
           ======================================================= */
        .titulo-seccion {
            font-size: 28px;
            color: #404040;
            margin-bottom: 30px;
            text-align: center;
            font-weight: 700;
        }

        .gold-star {
            color: gold;
            text-shadow: 0 0 5px rgba(255, 215, 0, 0.5); /* Le da un ligero brillo a la estrella */
        }

        .modern-results-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 30px;
        }

        .modern-card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            cursor: pointer;
            position: relative;
            height: 100%;
        }

        .modern-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.15);
        }

        .modern-card-img {
            width: 100%;
            height: 220px;
            object-fit: cover;
        }

        .modern-badge {
            position: absolute;
            top: 15px;
            left: 15px;
            background: #de4547;
            color: white;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
            text-transform: uppercase;
            box-shadow: 0 4px 10px rgba(0,0,0,0.2);
        }

        .modern-card-body {
            padding: 20px;
        }

        .modern-card-price {
            font-size: 22px;
            font-weight: 800;
            color: #0d083b;
            margin-bottom: 5px;
        }

        .modern-card-title {
            font-size: 16px;
            font-weight: 600;
            color: #333;
            margin-bottom: 10px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .modern-card-location {
            font-size: 13px;
            color: #777;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .modern-card-features {
            display: flex;
            justify-content: space-between;
            border-top: 1px solid #eee;
            padding-top: 15px;
            font-size: 13px;
            color: #555;
        }

        .modern-card-feature i {
            color: #de4547;
            margin-right: 5px;
        }

        /* ESTILO DEL BOTÓN VER MÁS */
        .btn-ver-mas-container {
            text-align: center;
            margin-top: 40px;
            width: 100%;
        }
        .btn-ver-mas {
            background-color: #0d083b;
            color: white;
            padding: 12px 30px;
            border: none;
            border-radius: 25px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            box-shadow: 0 5px 15px rgba(13, 8, 59, 0.3);
            transition: all 0.3s ease;
        }
        .btn-ver-mas:hover {
            background-color: #de4547;
            box-shadow: 0 5px 15px rgba(222, 69, 71, 0.4);
            transform: translateY(-2px);
        }
    </style>
</head>

<body class="page-propiedades">

    <div class="container" style="position: relative; z-index: 9999;">
        <?php $this->load->view("header_view"); ?>
    </div>

    <main class="main-content">
        
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


        <?php 
        $contpro = $this->db->select("count(propiedad.id) as id")->from("destacado")->join("propiedad","destacado.id_prop = propiedad.id")->where("disponible",1)->get()->row()->id;
        if ($contpro > 0) :
        ?>
            <h2 class="titulo-seccion">Propiedades Destacadas <i class="fas fa-star gold-star"></i></h2>
        <?php else: ?>
            <h2 class="titulo-seccion">Por el momento no hay propiedades en Destacadas</h2>
        <?php endif; ?>


        <div class="modern-results-grid" id="contenedor-propiedades">

            <?php 
            $result_propiedades = $this->db->select("propiedad.*")->from("destacado")->join("propiedad","destacado.id_prop = propiedad.id")->where("disponible",1)->get();
            $contador = 0;
            ?>

            <?php foreach ($result_propiedades->result_array() as $propiedad) : ?>

                <?php 
                $idd = $this->db->select("id_ciu")->from("propiedad")->where("id",$propiedad['id'])->get()->result_array();
                $id_ciu=$idd["0"]["id_ciu"];

                $ci = $this->db->select("nombre")->from("propiedad")->join("ciudad","propiedad.id_ciu = ciudad.id")->where("id_ciu",$id_ciu)->get()->result_array();
                $ciudad=$ci["0"]["nombre"];
                ?>

                <?php if ($contador < $numero) : 
                    $contador++;

                    $mon = $this->db->select("simbolo,signo")->from("propiedad")->join("moneda","propiedad.id_mon = moneda.id")->where("propiedad.id",$propiedad['id'])->get()->result_array();
                    $simbolo=$mon["0"]["simbolo"];
                    $signo=$mon["0"]["signo"];
                ?>

                    <form action="<?=base_url()?>frontend/informacion/<?=$propiedad['id']?>/<?=$numero?>" id="form_<?= $propiedad['id'] ?>" method="post">
                        <input type="hidden" value="<?=$propiedad['id'] ?>" name="idPropiedad">
                        
                        <div class="modern-card" onclick="document.getElementById('form_<?= $propiedad['id'] ?>').submit();">
                            
                            <div class="modern-badge"><?= $propiedad['estado'] ?></div>
                            <img class="modern-card-img" src="<?=base_url()?>static/images/casas/<?=$propiedad['foto']?>" alt="<?=$propiedad['titulo']?>">
                            
                            <div class="modern-card-body">
                                <div class="modern-card-price">
                                    <?=$simbolo?> <?=$signo == "?" ? "€" : $signo ?><?= number_format($propiedad['precio'], 2, '.', ',') ?>
                                </div>
                                <div class="modern-card-title">
                                    <?= $propiedad['titulo'] ?>
                                </div>
                                <div class="modern-card-location">
                                    <i class="fa-solid fa-location-dot"></i> <?=$ciudad?>
                                </div>
                                
                                <div class="modern-card-features">
                                    <?php if ($propiedad['habitaciones'] != "") : ?>
                                        <div class="modern-card-feature" title="Habitaciones">
                                            <i class="fa-solid fa-bed"></i> <?= $propiedad['habitaciones'] ?> Hab
                                        </div>
                                    <?php endif; ?>

                                    <?php if ($propiedad['banios'] != "") : ?>
                                        <div class="modern-card-feature" title="Baños">
                                            <i class="fa-solid fa-bath"></i> <?= $propiedad['banios'] ?> Baños
                                        </div>
                                    <?php endif; ?>

                                    <?php if ($propiedad['suptot'] != "") : ?>
                                        <div class="modern-card-feature" title="Superficie">
                                            <i class="fa-solid fa-ruler-combined"></i> <?= $propiedad['suptot'] ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </form>

                <?php endif; ?>
            <?php endforeach ?>
        </div>

        <?php if ($contpro > 6) : ?>
            <div class="btn-ver-mas-container">
                <button class="btn-ver-mas" value="0" onclick="cargarMasPropiedades(this.getAttribute('data-contador'),<?=$numero?>)" id="botonCargarMas" data-contador="<?= $contador ?>">Ver Más Destacadas</button>
            </div>
        <?php endif;?>

    </main>

    <footer class="footer-global">
         <?php $this->load->view( "footer_view" );?>
    </footer>

    <script src="<?=base_url()?>static/js/script.js"></script>
</body>

</html>