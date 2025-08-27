<div class="contenedor-header">

    <?php 

    $consulta = $this->db->select("*")->from("datos")->where("id",1)->get()->result_array();

    $nombre = $consulta["0"]["nombre"];
    $tel = $consulta["0"]["tel"];
    $fb = $consulta["0"]["fb"];
    $ig = $consulta["0"]["ig"];
    $ws = $consulta["0"]["ws"];
    $tk = $consulta["0"]["tk"];

    ?>

    <style type="text/css">
        /*
        @keyframes blinking {
  0% {
    opacity: 1;
  }
  50% {
    opacity: 0;
  }
  100% {
    opacity: 1;
  }
}

.blinking-link {
  animation: blinking 1.5s infinite;
}
*/

    </style>

    <header>
    <div class="logo">
        <img src="<?=base_url()?>static/images/image.ico" alt="Descripción de la imagen" style="width: 50px; height: 50px;">
    </div>

    <div class="logo">           

            <h1><i class="fa-solid fa-globe"></i></h1>
            <p><?=$nombre?></p>

    </div>

    <div class="nav-responsive" onclick="mostrarMenuResponsive()">
        <i class="fa-solid fa-bars"></i>
    </div>
    <nav class="" id="nav">
        <a href="<?=base_url()?>">Inicio</a>
        <a href="<?=base_url()?>frontend/propiedades/6">Propiedades</a>
        <a href="<?=base_url()?>frontend/destacadas/6" class="blinking-link">Destacadas</a>
        <a href="<?=base_url()?>frontend/contactos">Contacto</a>
        <a href="<?=base_url()?>frontend/conocenos">Conócenos</a>
        <a href="<?=base_url()?>frontend/equipo">Equipo</a>
        <a href="<?=base_url()?>frontend/insesion/" class="blinking-link">Rent House</a>
    </nav>
&nbsp;&nbsp;
    <div class="info-contacto">
        <?php if($this->session->userdata( "tokenn" )):  ?> 
            <?php if($this->session->tipo == "cliente"):  ?> 
        <span title="Perfil" class="info">
                <a href="<?=base_url()?>Frontend/perfil2/<?=$this->session->id_usu?>/<?=$this->session->tokenn?>" role="button"><i class="fas fa-user"></i></a>
        </span>
        <?php endif;  ?> 

        <span title="Cerrar Sesión" class="info">
                <a href="<?=base_url()?>Acceso/cierrasesion/<?=$this->session->id_usu?>/<?=$this->session->tokenn?>" role="button"><i class="fa-solid fa-right-from-bracket"></i></a>
        </span>
        <?php endif;  ?> 
    </div>
</header>


</div>
<br>
&nbsp;&nbsp;
<style type="text/css">
    .bienvenido {
        font-size: 18px;
        font-weight: bold;
        color: #333;
        background-color: #f8f8f8;
        padding: 10px;
        border-radius: 5px;
        border: 1px solid black;
    }

    .no-link-style {
    text-decoration: none;
    color: inherit;
  }
</style>

<?php if($this->session->userdata("tokenn") && $this->session->tipo == "cliente"): ?>
    <span class="bienvenido">
       <i class="fas fa-user"></i> Hola: <?= urldecode($this->session->nombre) ?> 
    </span>
    <br><br>
<?php endif; ?>
