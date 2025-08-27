<footer class="footer">
        <?php 

    $consulta = $this->db->select("*")->from("datos")->where("id",1)->get()->result_array();

    $nombre = $consulta["0"]["nombre"];
    $tel = $consulta["0"]["tel"];
    $cor = $consulta["0"]["correo"];
  

    ?>

<?=$nombre?> - Rent House <br>
<style>
  .no-link-style {
    text-decoration: none;
    color: inherit;
  }
</style>
<span id="numero"><a href="tel:<?=$tel?>" class="no-link-style"><?=$tel?></a> - <a href="mailto:<?=$cor?>" class="no-link-style"><?=$cor?></a></span>
    </footer>