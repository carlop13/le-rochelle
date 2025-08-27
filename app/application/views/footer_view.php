<style type="text/css">
  .no-link-style {
    text-decoration: none;
    color: inherit;
}

  .social-icons a {
    display: inline-block;
    width: 40px;
    height: 40px;
    line-height: 40px;
    border-radius: 50%;
    background-color: #555;
    color: #fff;
    font-size: 24px;
    margin-right: 10px;
    transition: background-color 0.3s ease;
}

.social-icons a:hover {
    background-color: #de4547;
}

/* Estilos para dividir el contenido en dos columnas */
#contact-info {
    max-width: 900px;
    margin: 0 auto;
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
}

.contact-left,
.contact-right {
    width: 48%;
}

/* Ajustes para dispositivos móviles */
@media screen and (max-width: 600px) {
    #contact-info {
        flex-direction: column;
        align-items: center;
    }
    
    .contact-left,
    .contact-right {
        width: 100%;
        margin-bottom: 20px;
        text-align: center;
    }

    .h8 {
    margin-bottom: 90px;
}

}
</style>
  
    <div id="contact-info">
       <div class="contact-left" style="margin-top: 10px;">
    <?php 
        $consulta = $this->db->select("*")->from("datos")->where("id", 1)->get()->result_array();
        $nombre = $consulta["0"]["nombre"];
        $tel = $consulta["0"]["tel"];
        $cor = $consulta["0"]["correo"];
    ?>
    <h8 class="h8"><?=$nombre?></h8><br>
    <a href="tel:<?=$tel?>" class="no-link-style"><?=$tel?></a> - <a href="mailto:<?=$cor?>" class="no-link-style"><?=$cor?></a>
</div>
        <div class="contact-right">
            <?php 
                $fb = $consulta["0"]["fb"];
                $ig = $consulta["0"]["ig"];
                $ws = $consulta["0"]["ws"];
                $tk = $consulta["0"]["tk"];
            ?>
            <h3>Síguenos en redes sociales</h3>
            <div class="social-icons">
                <?php if ($fb != null || $fb != "") : ?>
                    <a href="<?=$fb?>" target="_blank" title="Facebook"><i class="fa-brands fa-facebook-f"></i></a>
                <?php endif ?>

                <?php if ($ig != null || $ig != "") : ?>
                    <a href="<?=$ig?>" target="_blank" title="Instagram"><i class="fa-brands fa-instagram"></i></a>
                <?php endif ?>

                <?php if ($tk != null || $tk != "") : ?>
                    <a href="<?=$tk?>" target="_blank" title="Tiktok"><i class="fab fa-tiktok"></i></a>
                <?php endif ?>

                <?php if ($ws != null || $ws != "") : ?>
                    <a href="https://wa.me/52<?=$ws?>" role="button" target="_blank" title="Whatsapp"><i class="fab fa-whatsapp"></i></a>
                <?php endif ?>
            </div>
        </div>
    </div>