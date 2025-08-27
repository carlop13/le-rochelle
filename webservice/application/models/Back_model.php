<?php 
class Back_model extends CI_Model{

	public function get_datos(){
		$rs = $this->db
		->select("*")
		->from("datos")
		->get();
		return $rs->num_rows() > 0 ? $rs->result() : NULL;
}

public function get_ub($id){
	$rs = $this->db
		->select("lat,lng")
		->from("propiedad")
		->where("id",$id)
		->get();
		return $rs->num_rows() > 0 ? $rs->result() : NULL;
}

public function get_ub2(){
	$rs = $this->db
		->select("lat,lng")
		->from("datos")
		->get();
		return $rs->num_rows() > 0 ? $rs->result() : NULL;
}

public function exists_usuario( $correo,$contra ) {
	$rs= $this->db
		->from("administrador")
		->join("usuario","administrador.id_usu=usuario.id")
		->where("correo",$correo)
		->where("password",$contra)
		->where("activo",1)
		->get();
		return $rs->num_rows() > 0 ? 1 : 2;
}

public function update_token($id,$token){
	$this->db
		 ->set("token",$token)
		 ->where("id",$id)
		 ->update("usuario");

		 return $this->db->affected_rows() == 1;
}

public function obtenerCiudadesPorPais($id){
	$rs = $this->db
		->select("id,nombre")
		->from("ciudad")
		->where("id_pais",$id)
		->where("activo",1)
		->get();
		return $rs->num_rows() > 0 ? $rs->result() : NULL;
}

public function insert_foto($data3){
		$this->db->insert("foto",$data3);
		return $this->db->affected_rows() == 1;
}

public function delete_foto($id){
		$this->db->where("id",$id)->delete("foto");
		return $this->db->affected_rows() == 1;
	}

public function insert_propiedad($data1,$data2,$data4){
		$this->db->insert("propietario",$data1);
		$this->db->insert("propiedad",$data2);
		$this->db->insert("descripcion",$data4);
		return $this->db->affected_rows() == 1;
}

public function delete_prop($id){
	$rs = $this->db
		->set("disponible",0)
		->where("id",$id)
		->update("propiedad");
	
		return $this->db->affected_rows() == 1;
}

public function insert_tipo($data){
		$this->db->insert("tipo",$data);
		return $this->db->affected_rows() == 1;
}

public function update_tipo($id,$tipo){
	$rs = $this->db
		->set("tipo",$tipo)
		->where("id",$id)
		->update("tipo");
	
		return $this->db->affected_rows() == 1;
}

public function delete_tipo($id){
		$this->db->set("activo",0)->where("id",$id)->update("tipo");
		return $this->db->affected_rows() == 1;
}

public function insert_pais($data){
		$this->db->insert("pais",$data);
		return $this->db->affected_rows() == 1;
}

public function update_pais($id,$pais){
	$rs = $this->db
		->set("pais",$pais)
		->where("id",$id)
		->update("pais");
	
		return $this->db->affected_rows() == 1;
}

public function delete_pais($id) {

		$this->db->set("activo",0)->where("id_pais", $id)->update("ciudad");
		$this->db->set("activo",0)->where("id", $id)->update("pais");

        return $this->db->affected_rows() == 1;

}

public function insert_ciudad($data){
		$this->db->insert("ciudad",$data);
		return $this->db->affected_rows() == 1;
}

public function update_ciudad($id,$id_pais,$ciudad){
	$rs = $this->db
		->set("nombre",$ciudad)
		->set("id_pais",$id_pais)
		->where("id",$id)
		->update("ciudad");
	
		return $this->db->affected_rows() == 1;
}

public function delete_ciudad($id) {

        $this->db->set("activo",0)->where("id", $id)->update("ciudad");
        return $this->db->affected_rows() == 1;

}


public function update_propietario($id_propietario,$nombre_propietario,$apellido_propietario,$correo_propietario,$telefono_propietario){
		$this->db
		 ->set("nombre",$nombre_propietario)
		 ->set("ap",$apellido_propietario)
		 ->set("correo",$correo_propietario)
		 ->set("tel",$telefono_propietario)
		 ->where("id",$id_propietario)
		 ->update("propietario");

		 return $this->db->affected_rows() == 1;
}

public function update_cliente($id_propietario,$nombre_propietario,$correo_propietario,$telefono_propietario){
		$this->db
		 ->set("nombre",$nombre_propietario)
		 ->set("correo",$correo_propietario)
		 ->set("tel",$telefono_propietario)
		 ->where("id",$id_propietario)
		 ->update("cliente");

		 return $this->db->affected_rows() == 1;
}


public function update_propietario2($id_propietario,$nombre_propietario,$apellido_propietario,$correo_propietario,$telefono_propietario,$id_usu){
		$this->db
		 ->set("nombre",$nombre_propietario)
		 ->set("ap",$apellido_propietario)
		 ->set("correo",$correo_propietario)
		 ->set("tel",$telefono_propietario)
		 ->set("id_usu",$id_usu)
		 ->where("id",$id_propietario)
		 ->update("propietario");

		 return $this->db->affected_rows() == 1;
}

public function update_usuario($id_usu,$contrasenia){
		$this->db
		 ->set("password",$contrasenia)
		 ->where("id",$id_usu)
		 ->update("usuario");

		 return $this->db->affected_rows() == 1;
}

public function update_propiedad($id_propiedad,$titulo,$calle,$col,$noext,$habitaciones,$banios,$pisos,$garage,$precio,$ciudad,$tipo,$estado,$lat,$lng,$moneda,$noesta,$ancho,$fondo,$suptot,$mconst,$ctoser,$mbanios){
		$this->db
		 ->set("titulo",$titulo)
		 ->set("calle",$calle)
		 ->set("col",$col)
		 ->set("noext",$noext)
		 ->set("habitaciones",$habitaciones)
		 ->set("banios",$banios)
		 ->set("pisos",$pisos)
		 ->set("garage",$garage)
		 ->set("precio",$precio)
		 ->set("id_ciu",$ciudad)
		 ->set("id_tipo",$tipo)
		 ->set("estado",$estado)
		 ->set("lat",$lat)
		 ->set("lng",$lng)
		 ->set("id_mon",$moneda)
		 ->set("noesta",$noesta)
		 ->set("ancho",$ancho)
		 ->set("fondo",$fondo)
		 ->set("suptot",$suptot)
		 ->set("mconst",$mconst)
		 ->set("ctoser",$ctoser)
		 ->set("mbanios",$mbanios)
		 ->where("id",$id_propiedad)
		 ->update("propiedad");

		return $this->db->affected_rows() == 1;
}

public function update_desc($id_desc,$descripcion){
		$this->db
		 ->set("descripcion",$descripcion)
		 ->where("id",$id_desc)
		 ->update("descripcion");

		 return $this->db->affected_rows() == 1;
}

public function update_foto($id_propiedad,$fotonu){
		$this->db
		 ->set("foto",$fotonu)
		 ->where("id",$id_propiedad)
		 ->update("propiedad");

		 return $this->db->affected_rows() == 1;
}

public function con_foto($fotoaelimi) {
	$rs= $this->db
				->from("propiedad")
				->where("foto",$fotoaelimi)
				->get();

				return $rs->num_rows() > 0 ? 1 : 2;
}

public function con_fotos($fotoaelimi,$id) {
	$rs= $this->db
				->from("foto")
				->where("foto",$fotoaelimi)
				->where("id !=",$id)
				->get();

				return $rs->num_rows() > 0 ? 1 : 2;
}

public function con_foto2($fotoaelimi) {
	$rs= $this->db
				->from("foto")
				->where("foto",$fotoaelimi)
				->get();

				return $rs->num_rows() > 0 ? 1 : 2;
}

public function con_fotos2($fotoAnt,$id) {
	$rs= $this->db
				->from("propiedad")
				->where("foto",$fotoAnt)
				->where("id !=",$id)
				->get();

				return $rs->num_rows() > 0 ? 1 : 2;
}

public function update_contra($id_usuario,$contrasenia){
		$this->db
		 ->set("password",$contrasenia)
		 ->where("id",$id_usuario)
		 ->update("usuario");

		 return $this->db->affected_rows() == 1;
}

public function update_admin($id_usuario,$administrador,$correoad){
		$this->db
		 ->set("nombre",$administrador)
		 ->set("correo",$correoad)
		 ->where("id_usu",$id_usuario)
		 ->update("administrador");

		 return $this->db->affected_rows() == 1;
}

public function update_datos($nombre,$calle,$numero,$colonia,$cp,$ciudad,$estado,$pais,$tel,$correo,$horario,$lat,$lng,$fb,$ig,$ws,$tk){
		$this->db
		 ->set("nombre",$nombre)
		 ->set("calle",$calle)
		 ->set("numero",$numero)
		 ->set("colonia",$colonia)
		 ->set("cp",$cp)
		 ->set("ciudad",$ciudad)
		 ->set("estado",$estado)
		 ->set("pais",$pais)
		 ->set("tel",$tel)
		 ->set("correo",$correo)
		 ->set("horario",$horario)
		 ->set("lat",$lat)
		 ->set("lng",$lng)
		 ->set("fb",$fb)
		 ->set("ig",$ig)
		 ->set("ws",$ws)
		 ->set("tk",$tk)
		 ->where("id",1)
		 ->update("datos");

		 return $this->db->affected_rows() == 1;
}

public function guardarDestacada($data){
		$this->db->insert("destacado",$data);
		return $this->db->affected_rows() == 1;
}

public function delete_fav($id_prop) {
        $this->db->where("id_prop", $id_prop)->delete("destacado");
        return $this->db->affected_rows() == 1;

}

public function delete_soli($id) {
        $this->db->where("id", $id)->delete("solicitud");
        return $this->db->affected_rows() == 1;

}

public function exists_correo( $correo ) {
	$rs= $this->db
	->from("cliente")
	->join("usuario","cliente.id_usu=usuario.id")
	->where("correo",$correo)
	->where("activo",1)
	->get();
	return $rs->num_rows() > 0 ? 1 : 2;
}

public function insert_cliente($data,$data2){
	$this->db->insert("usuario",$data);
	$this->db->insert("cliente",$data2);
	return $this->db->affected_rows() == 1;
}

public function insert_usu($dat){
	$this->db->insert("usuario",$dat);
	return $this->db->affected_rows() == 1;
}

public function exists_usuario2( $correo,$contra ) {
	$rs= $this->db
				->from("cliente")
				->join("usuario","cliente.id_usu=usuario.id")
				->where("correo",$correo)
				->where("password",$contra)
				->where("activo",1)
				->get();
				return $rs->num_rows() > 0 ? 1 : 2;
}

public function exists_usuario3( $correo,$contra ) {
	$rs= $this->db
				->from("propietario")
				->join("usuario","propietario.id_usu=usuario.id")
				->where("correo",$correo)
				->where("password",$contra)
				->where("activo",1)
				->get();
				return $rs->num_rows() > 0 ? 1 : 2;
}

public function generarContrasenia($longitud = 10) {
        $caracteres = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@$&';
    
        $bytes = random_bytes($longitud);
        $caracteresLen = strlen($caracteres);
        $contrasenia = '';
    
        for ($i = 0; $i < $longitud; ++$i) {
            $indice = ord($bytes[$i]) % $caracteresLen;
            $contrasenia .= $caracteres[$indice];
        }
    
        return $contrasenia;
    }

public function insert_inquilino($data){
	$this->db->insert("inquilino",$data);
	return $this->db->affected_rows() == 1;
}

public function insert_resenia($data){
	$this->db->insert("resenia",$data);
	return $this->db->affected_rows() == 1;
}

public function exists_inqui($id) {
	$rs= $this->db
	->from("inquilino")
	->where("id_prop",$id)
	->get();
	return $rs->num_rows() > 0 ? 1 : 2;
}

public function exists_inqui2($id) {
	$rs= $this->db
	->from("inquilino")
	->where("id_cli",$id)
	->get();
	return $rs->num_rows() > 0 ? 1 : 2;
}

public function delete_resenia($id) {
        $this->db->where("id", $id)->delete("resenia");
        return $this->db->affected_rows() == 1;

}

public function delete_inquilino($id_cli,$id_propiedad) {
        $this->db->where("id_cli", $id_cli)->where("id_prop", $id_propiedad)->delete("inquilino");
        return $this->db->affected_rows() == 1;

}

public function insert_estrella($data){
	$this->db->insert("estrella",$data);
	return $this->db->affected_rows() == 1;
}

public function insert_mensaje($data){
	$this->db->insert("mensaje",$data);
	return $this->db->affected_rows() == 1;
}

public function delete_mensaje($id) {
        $this->db->where("id", $id)->delete("mensaje");
        return $this->db->affected_rows() == 1;

}

public function delete_sol($id) {
        $this->db->where("id", $id)->delete("solicitud");
        return $this->db->affected_rows() == 1;

}

}