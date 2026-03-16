<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?=base_url()?>static/images/image.ico">
    <meta author="Carlos Guadalupe López Trejo">
    <title><?=ucfirst($estado)?></title>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <link rel="stylesheet" href="<?=base_url()?>/static/css/estilo.css">
    
    <script src="<?=base_url()?>static/js/jquery-3.6.1.min.js"></script>
    <script src="<?=base_url()?>static/js/mensajes.js" ></script>

    <style type="text/css">
        html, body {
            height: 100%;
            margin: 0;
            overflow-x: hidden; 
            font-family: 'Open Sans', sans-serif;
        }

        body.page-busqueda {
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

        .resultado-titulo {
            font-size: 24px;
            color: #404040;
            margin-bottom: 25px;
            border-bottom: 2px solid #ddd;
            padding-bottom: 10px;
        }
        .resultado-titulo span {
            color: #de4547;
            font-weight: 700;
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
    </style>
</head>

<body class="page-busqueda">

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
                    foreach ($result_ciudades->result_array() as $ciudad_item) : ?>
                        <option value="<?= $ciudad_item['id'] ?>" <?= (isset($id_ciu) && $id_ciu == $ciudad_item['id']) ? 'selected' : '' ?>>
                            <?= $ciudad_item['nombre'] ?>
                        </option>
                    <?php endforeach ?>
                </select>

                <select name="tipo" id="tipo">
                    <option value="0">Tipo de Propiedad</option>
                    <?php
                    $result_tipo = $this->db->select("*")->from("tipo")->where("activo",1)->get();
                     foreach ($result_tipo->result_array() as $tipo_item) : ?>
                        <option value="<?= $tipo_item['id'] ?>" <?= (isset($id_tipo) && $id_tipo == $tipo_item['id']) ? 'selected' : '' ?>>
                            <?= $tipo_item['tipo'] ?>
                        </option>
                    <?php endforeach ?>
                </select>

                <div class="estado-radios">
                    <span>
                        <input type="radio" value="alquiler" name="estado" <?= (!isset($estado) || strtolower($estado) == 'alquiler') ? 'checked' : '' ?>> Alquiler
                    </span>
                    <span>
                        <input type="radio" value="venta" name="estado" <?= (isset($estado) && strtolower($estado) == 'venta') ? 'checked' : '' ?>> Venta
                    </span>
                </div>

                <input type="submit" value="Buscar Propiedad" name="buscar">
            </form>
        </div>


        <div class="resultados-container">

            <?php  
            $consulta =  $this->db->select("tipo")->from("tipo")->where("id",$id_tipo)->get()->result_array();
            $tipo = (!empty($consulta)) ? $consulta["0"]["tipo"] : "nada";

            $consulta2 =  $this->db->select("nombre")->from("ciudad")->where("id",$id_ciu)->get()->result_array();
            $ciudad = (!empty($consulta2)) ? $consulta2["0"]["nombre"] : "nada";
            
            $es = ucfirst($estado);

            if($id_ciu == 0 && $id_tipo == 0){
                $result_propiedades = $this->db->select("*")->from("propiedad")->where("estado",$es)->where("disponible",1)->get();
                echo "<h3 class='resultado-titulo'>Resultado de Búsqueda: <span>$es</span></h3>";
            }
            elseif($id_ciu == 0){
                $result_propiedades = $this->db->select("*")->from("propiedad")->where("id_tipo",$id_tipo)->where("estado",$es)->where("disponible",1)->get();
                echo "<h3 class='resultado-titulo'>Resultado de Búsqueda: <span>$tipo en $es</span></h3>";
            }
            elseif($id_tipo == 0){
                $result_propiedades = $this->db->select("*")->from("propiedad")->where("id_ciu",$id_ciu)->where("estado",$es)->where("disponible",1)->get();
                echo "<h3 class='resultado-titulo'>Resultado de Búsqueda: <span>$ciudad en $es</span></h3>";
            }
            else{
                $result_propiedades = $this->db->select("*")->from("propiedad")->where("id_ciu",$id_ciu)->where("id_tipo",$id_tipo)->where("estado",$es)->where("disponible",1)->get();
                echo "<h3 class='resultado-titulo'>Resultado de Búsqueda: <span>$ciudad, $tipo en $es</span></h3>";
            }
            ?>

            <div class="modern-results-grid">
                <?php foreach ($result_propiedades->result_array() as $propiedad) : 
                
                    $mon = $this->db->select("simbolo,signo")->from("propiedad")->join("moneda","propiedad.id_mon = moneda.id")->where("propiedad.id",$propiedad['id'])->get()->result_array();
                    $simbolo = $mon["0"]["simbolo"];
                    $signo = $mon["0"]["signo"];

                    $t = $this->db->select("tipo")->from("tipo")->where("id",$propiedad['id_tipo'])->get()->result_array();
                    $tipoo = $t["0"]["tipo"];

                    $consulta3 =  $this->db->select("nombre")->from("ciudad")->where("id",$propiedad['id_ciu'])->get()->result_array();
                    $ciudadd = $consulta3["0"]["nombre"];
                ?>
                    
                    <form action="<?=base_url()?>frontend/informacion/<?=$propiedad['id']?>/6" id="form_<?= $propiedad['id'] ?>" method="post">
                        <input type="hidden" value="<?=$propiedad['id'] ?>" name="idPropiedad">
                        
                        <div class="modern-card" onclick="document.getElementById('form_<?= $propiedad['id'] ?>').submit();">
                            
                            <div class="modern-badge"><?= $propiedad['estado'] ?></div>
                            <img class="modern-card-img" src="<?=base_url()?>static/images/casas/<?=$propiedad['foto']?>" alt="<?=$propiedad['titulo']?>">
                            
                            <div class="modern-card-body">
                                <div class="modern-card-price">
                                    <?=$simbolo?> <?=$signo == "?" ? "€" : $signo ?><?=number_format($propiedad['precio'],2,'.',',') ?>
                                </div>
                                <div class="modern-card-title">
                                    <?=$propiedad['titulo'] ?>
                                </div>
                                <div class="modern-card-location">
                                    <i class="fa-solid fa-location-dot"></i> <?= $propiedad['calle'] ?> <?= $propiedad['noext'] ?>, <?=$ciudadd?>
                                </div>
                                
                                <div class="modern-card-features">
                                    <div class="modern-card-feature" title="Habitaciones">
                                        <i class="fa-solid fa-bed"></i> <?= $propiedad['habitaciones'] ?> Hab
                                    </div>
                                    <div class="modern-card-feature" title="Baños">
                                        <i class="fa-solid fa-bath"></i> <?= $propiedad['banios'] ?> Baños
                                    </div>
                                    <div class="modern-card-feature" title="Superficie">
                                        <i class="fa-solid fa-ruler-combined"></i> <?= $propiedad['suptot'] ?> m²
                                    </div>
                                    <div class="modern-card-feature" title="Tipo">
                                        <i class="fa-solid fa-home"></i> <?=$tipoo?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                <?php endforeach; ?>
            </div>
            
        </div>
    </main>

    <footer class="footer-global">
         <?php $this->load->view("footer_view");?>
    </footer>
    
    <script src="<?=base_url()?>static/js/script.js"></script>
</body>

</html>