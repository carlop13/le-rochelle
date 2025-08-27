<?php

$resultado_tipos = $this->db->select("*")->from("tipo")->where("activo",1)->get();

$resultado_moneda = $this->db->select("*")->from("moneda")->get();

$resultado_pais = $this->db->select("*")->from("pais")->where("activo",1)->get();

$idd = $this->db->select("id_ciu")->from("propiedad")->where("id",$id)->get()->result_array();
$id_ciu=$idd["0"]["id_ciu"];

$iddd = $this->db->select("id_propi")->from("propiedad")->where("id",$id)->get()->result_array();
$id_propi=$iddd["0"]["id_propi"];

$ci = $this->db->select("nombre")->from("propiedad")->join("ciudad","propiedad.id_ciu = ciudad.id")->where("id_ciu",$id_ciu)->get()->result_array();
$ciudad=$ci["0"]["nombre"];

$tip = $this->db->select("tipo")->from("propiedad")->join("tipo","propiedad.id_tipo = tipo.id")->where("propiedad.id",$id)->get()->result_array();

$tipo=$tip["0"]["tipo"];

$consulta = $this->db->select("*")->from("propiedad")->where("id",$id)->get()->row();

$titulo=$consulta->titulo;
$estado=$consulta->estado;
$calle=$consulta->calle;
$col=$consulta->col;
$noext=$consulta->noext;
$habitaciones=$consulta->habitaciones;
$banios=$consulta->banios;
$pisos=$consulta->pisos;
$garage=$consulta->garage;
$precio=$consulta->precio;
$foto=$consulta->foto;
$id_ti=$consulta->id_tipo;
$id_mo=$consulta->id_mon;
$lati = $consulta->lat;
$lngi = $consulta->lng;
$fc = $consulta->fecha_alta;
$noesta = $consulta->noesta;
$ancho = $consulta->ancho;
$fondo = $consulta->fondo;
$suptot = $consulta->suptot;
$mconst = $consulta->mconst;
$ctoser = $consulta->ctoser;
$mbanios = $consulta->mbanios;


$consulta2 = $this->db->select("*")->from("descripcion")->where("id_prop",$id)->get()->row();

    if (!empty($consulta2)) {
    $desc=$consulta2->descripcion;
}
else{
    $desc = "";
}


$mon = $this->db->select("simbolo,signo")->from("propiedad")->join("moneda","propiedad.id_mon = moneda.id")->where("propiedad.id",$id)->get()->result_array();

if (!empty($mon)) {
            $simbolo=$mon["0"]["simbolo"];
            $signo=$mon["0"]["signo"];
        }
        else{
           $simbolo="simbolo";
            $signo="signo"; 
        }


$paiss = $this->db->select("pais,pais.id as id_pais")->from("ciudad")->join("pais","ciudad.id_pais = pais.id")->where("ciudad.id",$id_ciu)->get()->result_array();

if (!empty($paiss)) {
            $pais=$paiss["0"]["pais"];
            $id_pais = $paiss["0"]["id_pais"];
        }
        else{
            $pais = "Sin país";
            $id_pais=0;
        }


$pr = $this->db->select("nombre,ap,tel,correo")->from("propietario")->where("id",$id_propi)->get()->result_array();

if (!empty($pr)) {
            $nombre_propietario=$pr["0"]["nombre"];
            $ap_propietario=$pr["0"]["ap"];
            $telefono_propietario=$pr["0"]["tel"];
            $correo_pro=$pr["0"]["correo"];
        }
        else{
            $nombre_propietario="Sin propietario";
            $ap_propietario=" ";
            $telefono_propietario="Sin telefono";
            $correo_pro="Sin correo";
        }

$resultado_ciudades = $this->db->select("*")->from("ciudad")->where("id_pais",$id_pais)->where("activo",1)->get();

?>



<!DOCTYPE html>

<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta author="Carlos Guadalupe López Trejo">
    <link rel="stylesheet" href="<?=base_url()?>static/css/estilolog.css">
    <link rel="shortcut icon" href="<?=base_url()?>static/images/image.ico">
    <script src="<?=base_url()?>static/js/mensajes.js" ></script>
    <title>SAWPLR - Admin</title>
    <script src="<?=base_url()?>static/js/jquery-3.6.1.min.js"></script>
    <script src="<?=base_url()?>static/js/jquery-3.6.1.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <script>

    var appData = {
    uri_app : "<?= base_url() ?>",
    uri_ws  : "<?= base_url() ?>../webservice/",
    id : "<?=$id?>",
    latitude: "<?=$lati?>",
    longitude : "<?=$lngi?>"
    }

    function muestraselect(str) {
        if (str == 0) {
            document.getElementById("ciudad").innerHTML = "";
            return;
        }

        $.ajax({
            type: "POST",
            url: appData.uri_ws+"backend/obtenerCiudades",
            data: {
                id_pais: str
            },
            success: function(response) {
                document.getElementById("ciudad").innerHTML = response;
            }
        });
    }
</script>
</head>

<style type="text/css">
    #contenedor-admin {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            max-width: 1500px;
            margin: 0 auto;
            padding: 20px;
        }

          .alert-dismissible{
      position: fixed;
      bottom: 20px;
      right: 10px;
    }

.form-control {
  display: block;
  width: 100%;
  height: calc(1.5em + 0.75rem + 2px);
  padding: 0.375rem 0.75rem;
  font-size: 1rem;
  font-weight: 400;
  line-height: 1.5;
  color: #495057;
  background-color: #fff;
  background-clip: padding-box;
  border: 1px solid #ced4da;
  border-radius: 0.25rem;
  transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
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
        </style>

<body>

    <?php $this->load->view( "header_admin" ); ?>  

    <div id="contenedor-admin">
        <?php $this->load->view( "contenedor_menu" ); ?>

        <div class="contenedor-principal">
            
            <div id="actualizar-propiedad">
                <h2>Actualizar propiedad</h2>
                <hr>
                <form action="<?=base_url()?>../webservice/backend/actProp" enctype="multipart/form-data" method="post">

                    <input type="hidden" name="id" value="<?= $id ?>">

                    <input type="hidden"
                   class="form-control" 
                   id="lat"
                   name="lat"
                   value="<?=$lati?>" />

                   <input type="hidden"
                   class="form-control" 
                   id="fotoAnt"
                   name="fotoAnt"
                   value="<?=$foto?>" />

                   <input type="hidden"
                   class="form-control" 
                   id="lng"
                   name="lng"
                   value="<?=$lngi?>" />

                   <input type="hidden"
                   class="form-control" 
                   id="fecha"
                   name="fecha"
                   value="<?=$fc?>" />

                    <div class="fila-una-columna form-group" id="group-titulo">
                        <label for="titulo">Título de la Propiedad</label>
                        <input type="text" name="titulo" id="titulo" value="<?=$titulo?>" class="input-entrada-texto form-control">
                    </div>

                    <div class="fila-una-colummna form-group" id="group-desc">
                        <label for="desc">Descripción de la Propiedad (opcional)</label>
                        <textarea name="desc" id="desc" cols="150" rows="8" placeholder="La descripción no debe de ser mayor a 900 caracteres" class="input-entrada-texto"><?=$desc?></textarea>
                    </div>

                    <div class="fila">

                        <div class="box" id="group-tipo">
                            <label for="tipo">Seleccione tipo de propiedad</label>
                            <select name="tipo" id="tipo" class="input-entrada-texto">
                                <option value="0">
                                       -- Seleccione tipo --
                                    </option>
                               <?php
                         foreach ($resultado_tipos->result_array() as $tipo) : ?>

                            <?php if ($tipo['id'] == $id_ti) : ?>
                                        <option value="<?= $tipo['id'] ?>" selected>
                                            <?= $tipo['tipo'] ?>
                                        </option>
                                    <?php else : ?>
                                        <option value="<?= $tipo['id'] ?>">
                                            <?= $tipo['tipo'] ?>
                                        </option>
                                    <?php endif ?>
                                    
                        <?php endforeach ?>
                            </select>
                        </div>

                        <div class="box" id="group-estado">
                            <label for="estado">Elija estado de la propiedad</label>
                            <select name="estado" id="estado" class="input-entrada-texto">
                                <option value="Venta" <?php if ($estado == "Venta") {
                                                            echo "selected";
                                                        } ?>>Venta</option>
                                <option value="Alquiler" <?php if ($estado == "Alquiler") {
                                                                echo "selected";
                                                            } ?>>Alquiler</option>
                            </select>
                        </div>

                        <div class="box" id="group-calle">
                            <label for="calle">Calle (opcional)</label>
                            <input type="text" name="calle" value="<?=$calle?>" id="calle" class="input-entrada-texto">
                        </div>
                    </div>

                    <div class="fila">
                        <div class="box" id="group-col">
                            <label for="col">Colonia o Fraccionamiento</label>
                            <input type="text" name="col" id="col" value="<?=$col?>" class="input-entrada-texto">
                        </div>

                        <div class="box" id="group-noext">
                            <label for="noext">Número (opcional)</label>
                            <input type="number" name="noext" id="noext" min="0" step="0" value="<?=$noext?>" class="input-entrada-texto">
                        </div>

                        <div class="box" id="group-noesta">
                            <label for="noesta">Número de estacionacientos (opcional)</label>
                            <input type="number" min="0" step="0" name="noesta" id="noesta" value="<?=$noesta?>" class="input-entrada-texto">
                        </div>

                    </div>


                    <div class="fila">
                        <div class="box" id="group-habitaciones">
                            <label for="habitaciones">Habitaciones (opcional)</label>
                            <input type="number" min="0" step="0" name="habitaciones" id="habitaciones" value="<?=$habitaciones?>" class="input-entrada-texto">
                        </div>

                        <div class="box" id="group-banios">
                            <label for="banios">Baños Completos (opcional)</label>
                            <input type="number" min="0" step="0" name="banios" id="banios" value="<?=$banios?>" class="input-entrada-texto">
                        </div>

                        <div class="box" id="group-mbanios">
                            <label for="mbanios">Medios Baños (opcional)</label>
                            <input type="number" min="0" step="0" name="mbanios" id="mbanios" value="<?=$mbanios?>" class="input-entrada-texto">
                        </div>

                    </div>


                    <div class="fila">

                        <div class="box">
                            <label for="garage">Garage</label>
                            <select name="garage" id="garage" class="input-entrada-texto">
                                <option value="No" <?php if ($garage == "No") {
                                                        echo "selected";
                                                    } ?>>No</option>
                                <option value="Si" <?php if ($garage == "Si") {
                                                        echo "selected";
                                                    } ?>>Si</option>
                                <option value="noMo" <?php if ($garage == "noMo") {
                                                        echo "selected";
                                                    } ?>>No Mostrar</option>
                            </select>
                        </div>

                        <div class="box" id="group-pisos">
                            <label for="pisos">Pisos (opcional)</label>
                            <input type="number" min="0" step="0" name="pisos" id="pisos" value="<?=$pisos?>" class="input-entrada-texto">
                        </div>

                        <div class="box" id="group-precio">
                            <label for="precio">Precio (Venta o Alquiler)</label>
                            <input type="number" name="precio" id="precio" value="<?=$precio?>" step="1" min="0" class="input-entrada-texto" >
                        </div>

                    </div>

                    <div class="fila">
                        <div class="box" id="group-ancho">
                            <label for="ancho">Ancho (opcional)</label>
                            <input type="text" name="ancho" id="ancho" value="<?=$ancho?>" class="input-entrada-texto">
                        </div>

                        <div class="box" id="group-fondo">
                            <label for="fondo">Fondo (opcional)</label>
                            <input type="text" name="fondo" id="fondo" value="<?=$fondo?>" class="input-entrada-texto">
                        </div>

                        <div class="box" id="group-suptot">
                            <label for="suptot">Superficie Total (opcional)</label>
                            <input type="text" name="suptot" id="suptot" value="<?=$suptot?>" class="input-entrada-texto" >
                        </div>
                    </div>

                    <div class="fila">

                        <div class="box" id="group-mconst">
                            <label for="mconst">Metros de Construcción (opcional)</label>
                            <input type="text" name="mconst" id="mconst" value="<?=$mconst?>" class="input-entrada-texto">
                        </div>

                        <div class="box">
                            <label for="ctoser">Cuarto de Servicio</label>
                            <select name="ctoser" id="ctoser" class="input-entrada-texto">
                                <option value="No" <?php if ($ctoser == "No") {
                                                        echo "selected";
                                                    } ?>>No</option>
                                <option value="Si" <?php if ($ctoser == "Si") {
                                                        echo "selected";
                                                    } ?>>Si</option>
                                <option value="noMo" <?php if ($ctoser == "noMo") {
                                                        echo "selected";
                                                    } ?>>No Mostrar</option>
                            </select>
                        </div>

                        <div class="box" id="group-moneda">
                            <label for="moneda">Moneda</label>
                            <select name="moneda" id="moneda" class="input-entrada-texto">
                                <option value="0">
                                       -- Seleccione moneda --
                                    </option>
                               <?php
                         foreach ($resultado_moneda->result_array() as $moneda) : ?>

                            <?php if ($moneda['id'] == $id_mo) : ?>
                                <option value="<?= $moneda['id'] ?>" selected>
                                <?= $moneda['nombre'] ?>&nbsp;(<?= $moneda['simbolo'] ?>)&nbsp;
                                 -<?php  
                                if ($moneda['signo'] == "?") {
                                    echo " €";
                                }else{
                                   echo " ".$moneda['signo']; 
                                }
                                
                                ?>
                            </option>
                            <?php else : ?>
                            <option value="<?= $moneda['id'] ?>">
                                <?= $moneda['nombre'] ?>&nbsp;(<?= $moneda['simbolo'] ?>)&nbsp;
                                 -<?php  
                                if ($moneda['signo'] == "?") {
                                    echo " €";
                                }else{
                                   echo " ".$moneda['signo']; 
                                }
                                
                                ?>
                            </option>
                        <?php endif; ?>
                        <?php endforeach ?>
                            </select>
                        </div>
                    </div>

                    <h2>Galería de Fotos</h2>
                    <div class="group-foto1">
                        
                        <p>Foto principal (<label for="foto1" class="btn-cambiar-foto">Cambiar foto</label>)</p>
                        <output id="list" class="contenedor-foto-principal">
                            <img src="<?=base_url()?>static/images/casas/<?=$foto?>" alt="<?=$titulo?>">
                        </output>
                        
                        <input type="file" id="foto1" accept="image/*" name="foto1" style="display:none">
                        <input type="hidden" id="fotoPrincipalActualizada" name="fotoPrincipalActualizada">
                    </div>

                    <div>
                        <p>Galería ( <label for="fotos" class="btn-cambiar-foto">Agregar mas Fotos</label>)</p>
                        <input type="hidden" id="fotosAEliminar" name="fotosAEliminar">
                        <input type="hidden" name="fotosSeleccionadas" id="fotosSeleccionadas" value="">
                        <div id="contenedor-fotos-publicacion">
                            <?php
                            $fotos = $this->db->select("*")->from("foto")->where("id_prop",$id)->get();
                            $i = 1; ?>
                            <?php foreach ($fotos->result_array() as $foto) :  ?>
                                <output class="contenedor-foto-galeria" id="<?php echo $i ?>">
                                    <img src="<?=base_url()?>static/images/casas/<?=$foto['foto']?>" class="foto-galeria">

                                    <span class="eliminar" id="<?= $foto['id'] ?>" onclick="eliminarFoto(<?= $foto['id'] ?>, <?php echo $i ?>)"> Eliminar</span>

                                </output>
                            <?php
                                $i++;
                            endforeach
                            ?>
                        </div>

                      

                        <div id="contenedor-fotos-nuevas">
            
                        </div>

                        <input type="file" id="fotos" accept="image/*" name="fotos[]" value="Foto" multiple="" style="display:none">
                        <input type="hidden" id="fotosGaleriaActualizada" name="fotosGaleriaActualizada">

                    </div>


                    <div class="fila">

                        <div class="box" id="group-pais">
                            <label for="pais">Seleccione País de la Propiedad</label>
                            <select name="pais" id="pais" onchange="muestraselect(this.value)" class="input-entrada-texto">
                                <option value="0">-- Seleccione Pais --</option>
                                <?php foreach ($resultado_pais->result_array() as $pais) : ?>

                                    <?php if ($pais['id'] == $id_pais) : ?>
                                        <option value="<?= $pais['id'] ?>" selected>
                                        <?= $pais['pais'] ?>
                                    </option>
                                    <?php else : ?>
                                        <option value="<?= $pais['id'] ?>">
                                        <?= $pais['pais'] ?>
                                    </option>
                                    <?php endif ?>

                                <?php endforeach ?>
                            </select>
                        </div>

                        <div class="box"id="group-ciudad">
                            <label for="ciudad">Seleccione una ciudad</label>
                            <select name="ciudad" id="ciudad" class="input-entrada-texto">
                                <option value="0">-- Seleccione Ciudad --</option>
                                <?php foreach ($resultado_ciudades->result_array() as $ciudad) : ?>

                                    <?php if ($ciudad['id'] == $id_ciu) : ?>
                                        <option value="<?= $ciudad['id'] ?>" selected>
                                            <?= $ciudad['nombre'] ?>
                                        </option>

                                    <?php else : ?>
                                        <option value="<?= $ciudad['id'] ?>">
                                            <?= $ciudad['nombre'] ?>
                                        </option>
                                    <?php endif ?>

                                <?php endforeach ?>
                            </select>
                        </div>


                        <div class="box">
                            <label for="nombre_propietario">Nombre del propietario (opcional)</label>
                            <input type="text" name="nombre_propietario" id="nombre_propietario" value="<?=$nombre_propietario?>" class="input-entrada-texto">
                        </div>


                    </div>

                     <div class="fila">
                        <div class="box">
                            <label for="apellido_propietario">Apellido del propietario (opcional)</label>
                            <input type="text" name="apellido_propietario" id="apellido_propietario" value="<?=$ap_propietario?>" class="input-entrada-texto">
                        </div>

                        <div class="box" id="group-telefono_propietario">
                            <label for="telefono_propietario">Teléfono del propietario (opcional)</label>
                            <input type="number" name="telefono_propietario" id="telefono_propietario" value="<?=$telefono_propietario?>" class="input-entrada-texto">
                        </div>

                        <div class="box" id="group-correo_propietario">
                            <label for="correo_propietario">Correo del propietario (opcional)</label>
                            <input type="text" name="correo_propietario" id="correo_propietario" value="<?=$correo_pro?>" class="input-entrada-texto">
                        </div>

                    </div>

<style type="text/css">
    .btn {
  display: inline-block;
  padding: 0.375rem 0.75rem;
  font-size: 0.875rem;
  font-weight: 400;
  line-height: 1.5;
  text-align: center;
  text-decoration: none;
  white-space: nowrap;
  vertical-align: middle;
  cursor: pointer;
  border: 1px solid transparent;
  border-radius: 0.25rem;
}

.btn-sm {
  padding: 0.25rem 0.5rem;
  font-size: 0.875rem;
  line-height: 1.5;
  border-radius: 0.2rem;
}

.btn-success {
  color: #fff;
  background-color: #28a745;
  border-color: #28a745;
}

.btn-success:hover {
  color: #fff;
  background-color: #218838;
  border-color: #1e7e34;
}

.btn-success:focus,
.btn-success.focus {
  color: #fff;
  background-color: #218838;
  border-color: #1e7e34;
  box-shadow: 0 0 0 0.2rem rgba(40, 167, 69, 0.5);
}

.modal {
  display: none;
  position: fixed;
  top: 0;
  left: 0;
  z-index: 1050;
  width: 100%;
  height: 100%;
  overflow: auto;
  background-color: rgba(0, 0, 0, 0.5);
}

.modal-dialog {
  position: relative;
  width: auto;
  margin: 1.75rem auto;
}

.modal-xl {
  max-width: 1140px;
}

.modal-content {
  position: relative;
  display: flex;
  flex-direction: column;
  background-color: #fff;
  border: 1px solid rgba(0, 0, 0, 0.2);
  border-radius: 0.3rem;
  outline: 0;
}

.modal-header {
  padding: 0.75rem;
  border-bottom: 1px solid #dee2e6;
}

.modal-title {
  margin-bottom: 0;
  font-size: 1.5rem;
  line-height: 1.2;
}

.modal-body {
  position: relative;
  flex: 1 1 auto;
}

.modal-footer {
  padding: 0.75rem;
  border-top: 1px solid #dee2e6;
  text-align: right;
}

.btn-close {
  float: right;
  font-size: 1.5rem;
  font-weight: 700;
  line-height: 1;
  color: #000;
  text-shadow: 0 1px 0 #fff;
  opacity: 0.5;
}

.btn-primary {
  color: #fff;
  background-color: #007bff;
  border-color: #007bff;
}

.btn-secondary {
  color: #fff;
  background-color: #6c757d;
  border-color: #6c757d;
}

.border-dark {
  border-color: #343a40 !important;
}

.rounded {
  border-radius: 0.25rem !important;
}

.d-flex {
  display: flex !important;
}

.justify-content-center {
  justify-content: center !important;
}

.align-items-center {
  align-items: center !important;
}

.flex-column {
  flex-direction: column !important;
}

.custom-header {
  background-color: rgba(0, 123, 255, 0.5);
  color: #fff;
}

.search-container {
    display: flex;
    align-items: center;
    margin-top: 10px;
}

#search-input {
    flex: 1;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 5px;
    margin-right: 10px;
    font-size: 16px;
}

#search-button {
    padding: 8px 15px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s;
}

#search-button:hover {
    background-color: #0056b3;
}
</style>
    <script src="<?= base_url() ?>static/bootstrap/js/bootstrap.bundle.min.js " rel="stylesheet"></script>


                    <input type="submit" value="Actualizar datos" name="agregar" class="btn-accion">

                </form>

                <div class="fila">
                        <div class="box">
                            <label for="ubi">Actualizar ubicación</label>
                            <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button class='btn btn-sm btn-success' data-bs-toggle='modal' data-bs-target='#modal-mapa'><i class='fas fa-map-pin fa-2x'></i>
                            </button></div>
                        </div>
                    </div>
                    <hr>

            </div>
        </div>
    </div>

    <!-- Modal ubicación -->
<div class="modal fade" id="modal-mapa" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header custom-header">
        <h1 class="modal-title fs-5" id="modal-mapa-titulo"></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><strong><i class='fas fa-close'></i></strong></button>
      </div>
      <div class="modal-body" id="modal-formato-body">

<div class="d-flex justify-content-center flex-column">
Haz clic para crear o cambiar posición
     <div id="mapa" class="border border-dark rounded col-md-10" style="height: 500px;"></div>
</div>
      </div>
      <div class="modal-footer">
        <br>
        <button type="button" class="btn btn-success" data-bs-dismiss="modal" id="btn-guardar">
        <i class="fas fa-save"></i>
        Guardar
      </button>
      &nbsp;
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
        <i class="fas fa-times"></i>
        Cerrar
        </button>
        <div class="search-container">
        <input id="search-input" type="text" placeholder="Buscar dirección">
        <button id="search-button">
        <i class="fas fa-search"></i> Buscar
        </button>
        </div>
      </div>
    </div>
  </div>
</div>

    <script>
        $('#link-add-propiedad').addClass('pagina-activa');
    </script>

    <script src="<?=base_url()?>static/js/script2.js"></script>
    <script src="<?=base_url()?>static/js/subirfoto.js"></script>
    <script src="<?=base_url()?>static/js/scriptFotosNuevas.js"></script>
    <script src="<?=base_url()?>static/js/ubi2.js" ></script>
    <script src="<?=base_url()?>static/js/actprop.js" ></script>

    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDZ7TvV1KlSm2HKZbZ0GvkovPDFkV1O-0Y&callback=iniciomapa" 
    type="text/javascript"></script>

    <div id="mensajee" class="col-md-5 d-flex flex-column-reverse position-fixed" style="bottom:20px;right:10px;"></div>

</body>

</html>