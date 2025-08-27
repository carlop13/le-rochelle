<?php
class Accesoad extends CI_Controller{

	public function index(){
		/*echo "<h3>Acceso restringido</h3>";*/
		$this->load->view("error404_view");
	}

	public function login(){
		if($this->session->userdata( "token" )){
			redirect(base_url().'Accesoad/principal/'.$this->session->id_usu.'/'.$this->session->token);
		}
		$this->load->view( "login_view" );
	}

	public function inicio($id_usu=0,$token="",$nombre="",$contra=""){

	if ($id_usu == 0 && $token == "" && $nombre == "" && $contra == "") {
		redirect(base_url()."Accesoad/login");
	}
	else{
	$this->session->set_userdata( array(
		"id_usu" => $id_usu,
		"token" => $token,
		"nombre" => $nombre,
		"contrasenia" => $contra
	));

	redirect(base_url()."Accesoad/principal/$id_usu/$token");
		}
	}

	public function principal($id_usu=0,$token=""){
			verifica_sesion($id_usu,$token);
			$this->load->view("panel_view");
		}

	public function addprop($id_usu=0,$token="",$mensaje=""){
			verifica_sesion($id_usu,$token);
			$data = array(
			"mensaje"=>$mensaje
		);
			$this->load->view("addpro_view",$data);
		}

	public function lisprop($id_usu=0,$token="",$mensaje=""){
			verifica_sesion($id_usu,$token);
			$data = array(
			"mensaje"=>$mensaje
		);
			$this->load->view("listado_prop",$data);
		}

	public function verdetalle(){

		$id_usu = $this->input->post("id_usu");
		$token = $this->input->post("token");
		$id = $this->input->post("id");

			verifica_sesion($id_usu,$token);

			$data = array(
				"id_usu" => $id_usu,
				"token" => $token,
				"id" => $id
			);

			$this->load->view("ver_detalle_prop_view",$data);
		}

	public function actualizarP(){

		$id_usu = $this->input->post("id_usu");
		$token = $this->input->post("token");
		$id = $this->input->post("id");

			verifica_sesion($id_usu,$token);

			$data = array(
				"id_usu" => $id_usu,
				"token" => $token,
				"id" => $id
			);

			$this->load->view("act_prop_view",$data);
		}

	public function actualizarT(){

		$id_usu = $this->input->post("id_usu");
		$token = $this->input->post("token");
		$id = $this->input->post("id");

			verifica_sesion($id_usu,$token);

			$data = array(
				"id_usu" => $id_usu,
				"token" => $token,
				"id" => $id
			);

			$this->load->view("act_tip_view",$data);
		}

	public function actualizarPa(){
		$id_usu = $this->input->post("id_usu");
		$token = $this->input->post("token");
		$id = $this->input->post("id");

			verifica_sesion($id_usu,$token);

			$data = array(
				"id_usu" => $id_usu,
				"token" => $token,
				"id" => $id
			);

			$this->load->view("act_pa_view",$data);
		}

	public function actualizarCiu(){
		$id_usu = $this->input->post("id_usu");
		$token = $this->input->post("token");
		$id = $this->input->post("id");

			verifica_sesion($id_usu,$token);

			$data = array(
				"id_usu" => $id_usu,
				"token" => $token,
				"id" => $id
			);

			$this->load->view("act_ciudad_view",$data);
		}


	public function cierrasesion($id_usu,$token){
	verifica_sesion($id_usu,$token);

    $this->session->unset_userdata( array("id_usu","token","nombre","contrasenia"));
	$this->session->sess_destroy();

	redirect(base_url()."Accesoad/login");
}

public function addtip($id_usu=0,$token=""){
			verifica_sesion($id_usu,$token);
			$this->load->view("agre_tipo_view");
		}

	public function listip($id_usu=0,$token=""){
			verifica_sesion($id_usu,$token);
			$this->load->view("listado_tipo_view");
		}

public function addpais($id_usu=0,$token=""){
			verifica_sesion($id_usu,$token);
			$this->load->view("addpais_view");
		}

public function lispais($id_usu=0,$token=""){
			verifica_sesion($id_usu,$token);
			$this->load->view("listado_pais_view");
		}

public function addciudad($id_usu=0,$token=""){
			verifica_sesion($id_usu,$token);
			$this->load->view("addciudad_view");
		}

public function lisciudad($id_usu=0,$token=""){
			verifica_sesion($id_usu,$token);
			$this->load->view("listado_ciudad_view");
		}

public function configuracion($id_usu=0,$token=""){
			verifica_sesion($id_usu,$token);
			$this->load->view("configuracion_view");
		}

public function destacadas($id_usu=0,$token=""){
			verifica_sesion($id_usu,$token);
			$this->load->view("destacadas_view");
		}

public function vendidas($id_usu=0,$token=""){
			verifica_sesion($id_usu,$token);
			$this->load->view("vendidas_view");
		}
public function solicitud($id_usu=0,$token=""){
			verifica_sesion($id_usu,$token);
			$this->load->view("soi_view");
		}
public function solicitudes($id_usu=0,$token="",$id=0){
	verifica_sesion($id_usu,$token);
	$data = array(
			"id_info" => $id,
		);
		$this->load->view( "solicitudesad_view" ,$data);
		}

public function propcli($id_usu=0,$token="",$id=0){
	verifica_sesion($id_usu,$token);
		$data = array(
			"id_info" => $id,
		);
		$this->load->view( "procli_view",$data );
		}
public function clientes($id_usu=0,$token=""){
			verifica_sesion($id_usu,$token);
			$this->load->view("clientes_view");
		}
public function resenia($id_usu=0,$token="",$id=0){
	verifica_sesion($id_usu,$token);
		$data = array(
			"id_cliente" => $id,
		);
		$this->load->view( "inquilino_ad_view",$data );
		}
public function mensajes($id_usu=0,$token=""){
			verifica_sesion($id_usu,$token);
			$this->load->view("mensajes_view");
		}

}

?>