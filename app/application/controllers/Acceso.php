<?php
class Acceso extends CI_Controller{

	public function index(){
		echo "<h3>Acceso restringido</h3>";
	}

	public function inicio($id_usu=0,$token="",$nombre="",$contra="",$correo="",$id_cli=0,$tipo="",$tel="",$ap=""){

	if ($id_usu == 0 && $token == "" && $nombre == "" && $contra == "" && $correo == "" && $id_cli == 0 && $tipo == "" && $tel == "") {
		redirect(base_url()."Frontend/insesion");
	}
	else{
	$this->session->set_userdata( array(
		"id_usu" => $id_usu,
		"tokenn" => $token,
		"nombre" => $nombre." ".$ap,
		"contrasenia" => $contra,
		"correo" => $correo,
		"id_cli" => $id_cli,
		"tipo" => $tipo,
		"tel" => $tel 
	));
if ($tipo == "cliente") {
	redirect(base_url()."Frontend/princliente/$id_usu/$token/6");
}else{
redirect(base_url()."Frontend/propietario/$id_usu/$token");
}

		}
	}


public function cierrasesion($id_usu,$token){
	verifica_sesion2($id_usu,$token);

    $this->session->unset_userdata( array("id_usu","tokenn","nombre","contrasenia","correo","id_cli","tipo","tel"));
	$this->session->sess_destroy();

	redirect(base_url());
}


}
?>