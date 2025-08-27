<?php
$consulta8 = $this->db->select("count(cliente.id) as ciu")->from("cliente")->join("usuario","cliente.id_usu = usuario.id")->where("usuario.activo",1)->get()->result_array();
$totalcli = $consulta8["0"]["ciu"];

function fecha($sFecha) {
    // Convierte un String en arreglo
    $aFecha = explode("-", $sFecha);

    $aMes = ["enero", "febrero", "marzo", "abril", "mayo", "junio",
        "julio", "agosto", "septiembre", "octubre", "noviembre", "diciembre"];

    return number_format($aFecha[2]) . " de " . $aMes[$aFecha[1] - 1] . " de " . $aFecha[0];
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="<?=base_url()?>static/css/estilolog.css">
    <link rel="shortcut icon" href="<?=base_url()?>static/images/image.ico">
    <meta author="Carlos Guadalupe López Trejo">
    <title>SAWPLR - Admin</title>

</head>

<style type="text/css">
  .container {
  max-width: 100%;
  margin-left: auto;
  margin-right: auto;
  padding-left: 1rem;
  padding-right: 1rem;
  padding-top: 2rem;
  padding-bottom: 2rem;
}

 #contenedor-admin {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            max-width: 1500px;
            margin: 0 auto;
            padding: 20px;
        }

.mx-auto {
  margin-left: auto;
  margin-right: auto;
}

.px-4 {
  padding-left: 1rem;
  padding-right: 1rem;
}

.py-8 {
  padding-top: 2rem;
  padding-bottom: 2rem;
}

.text-2xl {
  font-size: 1.5rem;
  line-height: 2rem;
}

.font-semibold {
  font-weight: 600;
}

.text-gray-800 {
  --tw-text-opacity: 1;
  color: rgba(31, 41, 55, var(--tw-text-opacity));
}

.bg-gray-100 {
    --tw-bg-opacity: 1;
    background-color: #d1d1d1; /* Ajusta el valor de la transparencia aquí */
}


.rounded-lg {
  border-radius: 0.5rem;
}

.p-4 {
  padding: 1rem;
}

.mb-4 {
  margin-bottom: 1rem;
}

.flex {
  display: flex;
}

.items-center {
  align-items: center;
}

.justify-center {
  justify-content: center;
}

.bg-blue-500 {
  --tw-bg-opacity: 1;
  background-color: rgba(59, 130, 246, var(--tw-bg-opacity));
}

.text-white {
  --tw-text-opacity: 1;
  color: rgba(255, 255, 255, var(--tw-text-opacity));
}

.w-12 {
  width: 3rem;
}

.h-12 {
  height: 3rem;
}

.rounded-full {
  border-radius: 9999px;
}

.ml-4 {
  margin-left: 1rem;
}

.titulo {
  font-size: 1.25rem;
  font-weight: 600;
  --tw-text-opacity: 1;
  color: rgba(31, 41, 55, var(--tw-text-opacity));
}

.text-gray-600 {
  --tw-text-opacity: 1;
  color: rgba(113, 128, 150, var(--tw-text-opacity));
}

.detalles {
  display: flex;
}

.dato1 {
  display: flex;
  flex-direction: column;
}

.header {
  font-weight: 600;
  --tw-text-opacity: 1;
  color: rgba(113, 128, 150, var(--tw-text-opacity));
}

.font-semibold {
  font-weight: 600;
}

.texto {
  --tw-text-opacity: 1;
  color: rgba(107, 114, 128, var(--tw-text-opacity));
}

.solicitudes-icono {
  font-size: 1rem;
  margin-right: 0.25rem;
}

.solicitudes-contenido {
  flex-grow: 1;
  margin-left: 1rem;
}

.solicitudes-titulo {
  font-size: 1.25rem;
  font-weight: 600;
  --tw-text-opacity: 1;
  color: rgba(31, 41, 55, var(--tw-text-opacity));
}

.text-lg {
  font-size: 1.125rem;
  line-height: 1.75rem;
}

.text-blue-500 {
  --tw-text-opacity: 1;
  color: rgba(59, 130, 246, var(--tw-text-opacity));
}

.hover\:text-blue-600:hover {
  --tw-text-opacity: 1;
  color: rgba(37, 99, 235, var(--tw-text-opacity));
}

.font-semibold {
  font-weight: 600;
}

.transition-colors {
  transition-property: color;
  transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
  transition-duration: 150ms;
}

.duration-300 {
  transition-duration: 300ms;
}

 .no-link-style {
    text-decoration: none;
    color: inherit;
  }

</style>



<body>
    <?php $this->load->view("header_admin"); ?>
    <div id="contenedor-admin" class="container mx-auto px-4 py-8">
        <?php $this->load->view("contenedor_menu"); ?>
        <div class="contenedor-principal">
            <div id="dashboard">
                <h2 class="text-2xl font-semibold text-gray-800">Rent House - Personas</h2>
                <hr>
                <div class="contenedor-cajas-info">

                    <div class="contenedor-busqueda w-full">
    <?php $result_clientes = $this->db->select("cliente.*")->from("cliente")->join("usuario","cliente.id_usu = usuario.id")->order_by("fec_registro","desc")->where("usuario.activo",1)->get(); ?>
    <?php if ($totalcli == 0): ?>
        <h3 class="text-xl font-semibold text-gray-800">Por el momento no hay personas registradas en "Rent House"</h3>
    <?php else: ?>
        <?php foreach ($result_clientes->result_array() as $cliente): ?>
            <div class="contenedor-resultados bg-gray-100 rounded-lg p-4 mb-4">
                <div class="resultado flex items-center">
                    <div class="contenedor-imagen flex items-center justify-center bg-blue-500 text-white w-12 h-12 rounded-full">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="info ml-4">
                        <span class="titulo font-semibold text-gray-800"><?=$cliente['nombre'] ?></span>
                        <p class="text-gray-600"><i class="fas fa-envelope"></i> <strong>Correo:</strong> <a href="mailto:<?=$cliente['correo']?>" class="no-link-style"><?=$cliente['correo'] ?></a></p>
                        <p class="text-gray-600"><i class="fas fa-phone"></i> <strong>Teléfono:</strong> <a href="tel:<?=$cliente['tel']?>" class="no-link-style"><?=$cliente['tel'] ?></a></p>
                        <p class="text-gray-600"><i class="fas fa-calendar-alt"></i> <strong>Fecha de Unión:</strong> <?= fecha($cliente['fec_registro']); ?></p>
               
                    </div>
                </div>
                <br><br>
                <?php
                $con = $this->db->select("count(id) as id")->from("resenia")->where("id_cli",$cliente['id'])->get()->row();
                $cansol = $con->id;
                ?>
                <div class="resultado flex items-center">
                    <div class="solicitudes-icono bg-blue-500 text-white flex items-center justify-center w-12 h-12 rounded-full">
                        <i class="fas fa-file-alt"></i>
                    </div>
                    <div class="solicitudes-contenido ml-4">
                        <div class="solicitudes-titulo text-lg font-semibold text-gray-800">
                            Cantidad de Reseñas: <?=$cansol?>
                        </div>
                        <div class="solicitudes-enlace mt-2">
                            <a href="<?=base_url()?>Accesoad/resenia/<?=$this->session->id_usu?>/<?=$this->session->token?>/<?=$cliente['id']?>" class="text-blue-500 hover:text-blue-600 font-semibold transition-colors duration-300">
                                <i class="fas fa-star"></i> Ver reseñas
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>


                </div>
                <br>
            </div>
        </div>
    </div>
    <script>
        $('#link-dashboard').addClass('pagina-activa');
    </script>
</body>

</html>
