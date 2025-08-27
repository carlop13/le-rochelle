<?php
class Frontend extends CI_Controller{

	public function index(){
		$this->load->view( "ini" );
		}


	public function contactos(){
		$this->load->view( "contactos_view" );
		}
/*
	public function ini(){
		$this->load->view( "principal_view" );
		}
*/
		public function conocenos(){
		$this->load->view( "conocenos_view" );
		}

		public function equipo(){
		$this->load->view( "equipo_view" );
		}


	public function propiedades($nume=6){
		if ($nume == 0) {
			$nume = 6;
		}
		else if($nume == 3){
			$nume = 6;
		}
		else{
		$nume = $nume;	
		}

		$data = array(
			"numero" => $nume
		);
		$this->load->view( "propiedades_view",$data );
		}


	public function informacion($id=0,$nume=0){
		$data = array(
			"id_info" => $id,
			"numero" => $nume
		);
		$this->load->view( "info_pro_view",$data );
		}

	public function buscar(){

		$id_ciu = $this->input->post("ciudad");
		$id_tipo = $this->input->post("tipo");
		$estado = $this->input->post("estado");

		$data = array(
			"id_ciu" => $id_ciu,
			"id_tipo" => $id_tipo,
			"estado" => $estado
		);

		$this->load->view( "buscar_view",$data );
		}

	public function destacadas($nume=6){
		if ($nume == 0) {
			$nume = 6;
		}
		else if($nume == 3){
			$nume = 6;
		}
		else{
		$nume = $nume;	
		}

		$data = array(
			"numero" => $nume
		);
		$this->load->view( "propiedades_destacadas_view",$data );
		}
		

		public function insesion($cor=""){

			if($this->session->userdata( "tokenn" )){
				if($this->session->tipo == "cliente"){
				redirect(base_url().'Frontend/princliente/'.$this->session->id_usu.'/'.$this->session->tokenn.'/6');
			}else{
				redirect(base_url().'Frontend/propietario/'.$this->session->id_usu.'/'.$this->session->tokenn);
			}
			}

			$data = array(
				"correoCli" => $cor
			);

		$this->load->view( "loginn_view",$data );
		}


		public function princliente($id_usu=0,$token="",$nume=6){
		verifica_sesion2($id_usu,$token);
		
		if ($nume == 0) {
			$nume = 6;
		}
		else if($nume == 3){
			$nume = 6;
		}
		else{
		$nume = $nume;	
		}

		$data = array(
			"numero" => $nume
		);
		$this->load->view( "renta_view",$data );
		}


		public function propietario($id_usu=0,$token=""){
		verifica_sesion2($id_usu,$token);
		/*echo $this->session->id_usu;
		echo "<br>";
		echo $this->session->tokenn;
		echo "<br>";
		echo urldecode($this->session->nombre);
		echo "<br>";
		echo $this->session->contrasenia;
		echo "<br>";
		echo $this->session->correo;
		echo "<br>";
		echo $this->session->id_cli;
		echo "<br>";
		echo $this->session->tipo;
*/
		$this->load->view( "solicitud_view" );
		}

public function mipropiedad($id_usu=0,$token="",$id=0){
	verifica_sesion2($id_usu,$token);
		$data = array(
			"id_info" => $id,
		);
		$this->load->view( "mipro_view",$data );
		}

public function perfil($id_usu=0,$token="",$id=0){
	verifica_sesion2($id_usu,$token);
	$data = array(
			"id_info" => $id,
		);
		$this->load->view( "perfil_view" ,$data);
		}

public function solicitud($id_usu=0,$token="",$id=0){
	verifica_sesion2($id_usu,$token);
	$data = array(
			"id_info" => $id,
		);
		$this->load->view( "solicitudes_view" ,$data);
		}

public function elegirinqui($id_usu=0,$token="",$id=0){
verifica_sesion2($id_usu,$token);

	$data = array(
			"id_info" => $id,
	);

$exis = $this->db->from("inquilino")->where("id_prop",$id)->get();

$existe = $exis->num_rows() > 0 ? 1 : 2;

if ($existe == 1) {
	$this->load->view( "inquilino_view",$data );
}else{
	$this->load->view( "elegirinqui_view",$data );
	}	
		}

public function perfil2($id_usu=0,$token="",$id=0){
	verifica_sesion2($id_usu,$token);
	$data = array(
			"id_info" => $id,
		);
		$this->load->view( "perfil2_view" ,$data);
		}

public function soli($id_usu=0,$token="",$id=0){
	verifica_sesion2($id_usu,$token);
	$data = array(
			"id_clienteSoli" => $id,
		);
		$this->load->view( "solicit_view" ,$data);
		}


public function arrendamiento($id_usu=0,$token="",$id=0){
	verifica_sesion2($id_usu,$token);
	$data = array(
			"id_clienteArre" => $id,
		);
		$this->load->view( "arrendamiento_view" ,$data);
		}


}

?>