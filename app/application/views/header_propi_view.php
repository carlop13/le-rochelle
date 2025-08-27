  <?php
$fec = $this->db->select("left(now(),10)as fecha")->get()->result_array();
$fecha = $fec["0"]["fecha"];

function fecha_fancy($sFecha) {
    // Convierte un String en arreglo
    $aFecha = explode("-", $sFecha);

    $aMes = ["enero", "febrero", "marzo", "abril", "mayo", "junio",
        "julio", "agosto", "septiembre", "octubre", "noviembre", "diciembre"];

    return number_format($aFecha[2]) . " de " . $aMes[$aFecha[1] - 1] . " de " . $aFecha[0];
}
 
$idd = $this->db->select("id")->from("propiedad")->where("id_propi",$this->session->id_cli)->get()->row();
$id_propieda = $idd->id;



?>
  <header class="header bg-gray-900 text-white">
    <nav class="flex flex-wrap items-center justify-between py-4 px-8">
        <div class="flex items-center space-x-4">
            <img src="<?=base_url()?>static/images/image.ico" alt="Descripción de la imagen" class="w-10 h-10">
            <h1 class="text-xl font-semibold">Rent House <i class="fas fa-key"></i></h1>
        </div>
        <div class="flex items-center space-x-4">
            <h2><i class="far fa-calendar-alt"></i> Hoy es: <?=fecha_fancy($fecha)?></h2>
        </div>
        <div class="flex items-center space-x-4">
            <a href="<?=base_url()?>Frontend/propietario/<?=$this->session->id_usu?>/<?=$this->session->tokenn?>" class="nav-link"><i class="fas fa-home"></i> Inicio</a>
            <a href="<?=base_url()?>Frontend/solicitud/<?=$this->session->id_usu?>/<?=$this->session->tokenn?>/<?=$id_propieda?>" class="nav-link">
                <i class="fas fa-list"></i> Solicitudes
                <span class="badge" id="solicitudes">0</span>
            </a>
            <a href="<?=base_url()?>Frontend/perfil/<?=$this->session->id_usu?>/<?=$this->session->tokenn?>/<?=$id_propieda?>" class="nav-link"><i class="fas fa-user"></i> Perfil</a>
            <a href="<?=base_url()?>Acceso/cierrasesion/<?=$this->session->id_usu?>/<?=$this->session->tokenn?>" class="nav-link"><i class="fas fa-sign-out-alt"></i> Cerrar Sesión</a>
        </div>
    </nav>
</header>