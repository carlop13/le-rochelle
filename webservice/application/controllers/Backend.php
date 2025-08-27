<?php 
class Backend extends CI_Controller{

	public function __construct(){
		parent :: __construct();
		$this->load->model("back_model");
	}

	public function index(){
		$this->load->view("error404_view");
	}

	public function getdatos(){
	$data = $this->back_model->get_datos();

		echo json_encode($data);
}


public function obtenerdat(){

$id = $this->input->post("id_pro");
$id_ciu = $this->input->post("id_ciu");

$mon = $this->db->select("simbolo,signo")->from("propiedad")->join("moneda","propiedad.id_mon = moneda.id")->where("propiedad.id",$id)->get()->result_array();

        $simbolo=$mon["0"]["simbolo"];
        $signo=$mon["0"]["signo"];



$consulta3 =  $this->db->select("nombre")->from("ciudad")->where("id",$id_ciu)->get()->result_array();
$ciudad = $consulta3["0"]["nombre"];

$data["simbolo"] = $simbolo;
$data["signo"] = $signo;
$data["ciudad"] = $ciudad;

		echo json_encode($data);
}

public function obtenerPropiedades() {
	$contador = $this->input->post("contador");

    $this->db->select('*');
    $this->db->from('propiedad');
   	$this->db ->where("disponible",1);
    $this->db->limit(3, $contador);
    $query = $this->db->get();
    $propiedades = $query->result_array();
    
    // Retornar las propiedades en formato JSON
    echo json_encode($propiedades);
}

public function obtenerPropiedadesDes() {
	$contador = $this->input->post("contador");

    $this->db->select('*');
    $this->db->from('destacado');
    $this->db->join("propiedad","destacado.id_prop = propiedad.id");
    $this->db ->where("disponible",1);
    $this->db->limit(3, $contador);
    $query = $this->db->get();
    $propiedades = $query->result_array();
    
    // Retornar las propiedades en formato JSON
    echo json_encode($propiedades);
}

public function obtenerPropiedadesrent() {
	$contador = $this->input->post("contador");

    $this->db->select('*');
    $this->db->from('propiedad');
   	$this->db ->where("disponible",1);
   	$this->db ->where("estado","Alquiler");
    $this->db->limit(3, $contador);
    $query = $this->db->get();
    $propiedades = $query->result_array();
    
    // Retornar las propiedades en formato JSON
    echo json_encode($propiedades);
}

public function getubi(){
	$id = $this->input->post("id");

	$data = $this->back_model->get_ub($id);

		echo json_encode($data);
}

public function getubi2(){

	$data = $this->back_model->get_ub2();

		echo json_encode($data);
}


public function login(){

$usuario=$this->input->post("usuario");
$contrasenia=$this->input->post("contrasenia");

$contr=md5($contrasenia);

$exis = $this->back_model->exists_usuario($usuario,$contr);

if ($exis==1) {
	session_regenerate_id();
	$token = md5(session_id());

	$id_us = $this->db->select("usuario.id as id")->from("usuario")->join("administrador","administrador.id_usu=usuario.id")->where("correo",$usuario)->where("activo",1)->get()->result_array();

	$id_usuu = $id_us["0"]["id"];


	if ($this->back_model->update_token($id_usuu,$token)) {
				$obj = array(
					"resultado" => true,
					"id_usu" => $id_usuu,
					"token" => $token,
					"usuario" => $usuario
				);
				
			}
			else{
				$obj = array(
				"resultado" =>false,
				"mensaje" => "Imposible crear sesión"
			);
				
			}
}else{
	$obj = array(
				"resultado" =>false,
				"mensaje" => "Correo o password incorrectos"

			);
}

		echo json_encode($obj);
}

public function obtenerCiudades()
{
    $idPais = $this->input->post('id_pais'); 

    $ciudades = $this->back_model->obtenerCiudadesPorPais($idPais);

    $data['ciudades'] = $ciudades; 

   $this->load->view('ciudad_partial', $data); 
}


public function insertarProp(){
$this->load->library('email');
	$id_usu=$this->session->id_usu;
	$token=$this->session->token;

    //tomamos los datos que vienen del formulario
    $titulo = $this->input->post('titulo'); 
    $descripcion = $this->input->post('desc'); 
    $tipo = $this->input->post('tipo'); 
    $estado = $this->input->post('estado'); 
    $calle = $this->input->post('calle') ?? ""; 
    $col = $this->input->post('col'); 
    $noext = $this->input->post('noext') ?? ""; 
    $noesta = $this->input->post('noesta') ?? "";
    $habitaciones = $this->input->post('habitaciones') ?? "";  
    $banios = $this->input->post('banios') ?? ""; 
    $mbanios = $this->input->post('mbanios') ?? ""; 
    $pisos = $this->input->post('pisos') ?? "";  
    $garage = $this->input->post('garage'); 
    $precio = $this->input->post('precio');
    $ancho = $this->input->post('ancho') ?? ""; 
    $fondo = $this->input->post('fondo') ?? ""; 
    $suptot = $this->input->post('suptot') ?? ""; 
    $mconst = $this->input->post('mconst') ?? "";
    $ctoser = $this->input->post('ctoser'); 
    $moneda = $this->input->post('moneda'); 
    $foto1 = $this->input->post('foto1'); 
    $fotoss = $this->input->post('fotos'); 
    $pais = $this->input->post('pais'); 
    $ciudad = $this->input->post('ciudad'); 
    $lat = $this->input->post('lat') ?? null; 
    $lng = $this->input->post('lng') ?? null; 
    $nombre_propietario = $this->input->post('nombre_propietario') ?? "Sin propietario"; 
    $apellido_propietario = $this->input->post('apellido_propietario') ?? " "; 
    $telefono_propietario = $this->input->post('telefono_propietario') ?? "Sin telefono"; 
    $correo_propietario = $this->input->post('correo_propietario') ?? "Sin correo"; 
	$fotos = $_FILES['fotos'];
	$fec = $this->db->select("now() as fecha")->get()->result_array();
	$fecha = $fec["0"]["fecha"];


if ($estado=="Alquiler") {

	$idus = $this->db->select("max(usuario.id)+1 as id_usua")->from("usuario")->get()->row();

		if (!empty($idus)) {
		$iduss=$idus->id_usua;
		}
		else{
            $iduss = 1;
		}

$passwor = $this->back_model->generarContrasenia(8);
$password = md5($passwor);

		$dat = array(
			"id" => $iduss,
			"password" => $password,
			"tipo" => "propietario",
			"activo" => 1,
			"token" => ""
		);

	$this->back_model->insert_usu($dat);

	$asunto = "Bienvenido a Le Rochelle Real State ".ucwords($nombre_propietario);
	$mensaje = "Hola ".ucwords($nombre_propietario)." ".ucwords($apellido_propietario)." y Bienvenido a Le Rochelle Real State, a continuación te daré tu contraseña para ingresar a Rent House.";
	$mensaje .= "\n";
	$mensaje .= "Ingresa con este correo y contraseña en la sección de Rent House para ver las solicitudes por tu propiedad.";
	$mensaje .= "\n";
	$mensaje .= "Una vez iniciada la sesión tienes la opción de cambiar tu contraseña.";
	$mensaje .= "\n";
    $mensaje .= "\n";
    $mensaje .= "La contraseña es: ".$passwor;
    $mensaje .= "\n";
    $mensaje .= "Link para iniciar sesión en Rent House: ".base_url()."../app/frontend/insesion/";

	$this->email->from('csuarez@lerochellerealstate.com', "Le Rochelle Real State");
        $this->email->to($correo_propietario);
        $this->email->subject($asunto);
        $this->email->message($mensaje);

        $this->email->send();

}else{

	$iduss = null;

	$asunto = "Bienvenido a Le Rochelle Real State";
	$mensaje = "Hola y Bienvenido a Le Rochelle Real State, le notificaremos cuando pregunten por su propiedad.";

	$this->email->from('csuarez@lerochellerealstate.com', "Le Rochelle Real State");
        $this->email->to($correo_propietario);
        $this->email->subject($asunto);
        $this->email->message($mensaje);

        $this->email->send();

}


	$maxid = $this->db->select("max(id) as id")->from("propietario")->get()->row();

if (!empty($maxid)) {
    $id_propietario = $maxid->id + 1;
} else {
    $id_propietario = 1;
}


$maxidp = $this->db->select("max(id) as id")->from("propiedad")->get()->row();

if (!empty($maxidp)) {
    $id_propiedad = $maxidp->id + 1;
} else {
    $id_propiedad = 1;
}

	$data1 = array(
		"id" => $id_propietario,
		"nombre" => ucwords($nombre_propietario),
		"ap" => ucwords($apellido_propietario),
		"correo" => $correo_propietario,
		"fec_registro" => $fecha,
		"tel" => $telefono_propietario,
		"id_usu" => $iduss
	);


	$data2 = array(
		"id" => $id_propiedad,
		"titulo" => ucwords($titulo),
		"calle" => ucfirst($calle),
		"col"=>ucfirst($col),
		"noext"=>$noext,
		"habitaciones"=>$habitaciones,
		"banios"=>$banios,
		"pisos"=>$pisos,
		"garage"=>$garage,
		"precio"=>$precio,
		"foto"=>$_FILES['foto1']['name']??"sinfoto",
		"id_ciu"=>$ciudad,
		"id_propi"=>$id_propietario,
		"id_tipo"=>$tipo,
		"estado"=>$estado,
		"lat"=>$lat,
		"lng"=>$lng,
		"id_mon"=>$moneda,
		"fecha_alta"=>$fecha,
		"disponible"=>1,
		"noesta"=>$noesta,
		"ancho"=>$ancho,
		"fondo"=>$fondo,
		"suptot"=>$suptot,
		"mconst"=>$mconst,
		"ctoser"=>$ctoser,
		"mbanios"=>$mbanios,
	);


	$maxiddesc = $this->db->select("max(id) as id")->from("descripcion")->get()->row();

if (!empty($maxiddesc)) {
    $id_descripcion = $maxiddesc->id + 1;
} else {
    $id_descripcion = 1;
}

$data4 = array(
		"id" => $id_descripcion,
		"descripcion" => ucfirst($descripcion),
		"id_prop" => $id_propiedad
	);


	$d2 = $this->back_model->insert_propiedad($data1,$data2,$data4);
	$mensaje = $d2 ? "Registro Exitoso" : "Registro Fallido"; 


	if (!move_uploaded_file($_FILES["foto1"]["tmp_name"],"../app/static/images/casas/".$_FILES["foto1"]["name"])) {
					$mensaje = "No se pudo subir la Foto";
			}

for($x=0; $x<count($_FILES["fotos"]["name"]); $x++){

    $nombre_fo = $fotos["name"][$x];
    $ruta_provisional = $fotos["tmp_name"][$x];

if ($nombre_fo != "") {

    $data3 = array(
    	"id" => null,
    	"foto" => $nombre_fo,
    	"id_prop" => $id_propiedad
    );

    $this->back_model->insert_foto($data3);

	if (!move_uploaded_file($ruta_provisional,"../app/static/images/casas/".$nombre_fo)) {
					$mensaje = "No se pudo subir la Foto";
			}

		}

}

redirect(base_url()."../app/Accesoad/addprop/$id_usu/$token/$mensaje");

}






public function actProp(){
	$this->load->library('email');
	$contador = 0;

	$id_usu=$this->session->id_usu;
	$token=$this->session->token;

    //Los datos que vienen del formulario
    $fotoAnt = $this->input->post('fotoAnt');
    $id_propiedad = $this->input->post('id'); 
    $titulo = $this->input->post('titulo');
    $descripcion = $this->input->post('desc');  
    $tipo = $this->input->post('tipo'); 
    $estado = $this->input->post('estado'); 
    $calle = $this->input->post('calle') ?? ""; 
    $col = $this->input->post('col');  
    $noext = $this->input->post('noext') ?? ""; 
    $noesta = $this->input->post('noesta') ?? "";
    $habitaciones = $this->input->post('habitaciones') ?? ""; 
    $banios = $this->input->post('banios') ?? ""; 
    $mbanios = $this->input->post('mbanios') ?? "";
    $pisos = $this->input->post('pisos') ?? "";  
    $garage = $this->input->post('garage'); 
    $dimensiones = $this->input->post('dimensiones'); 
    $precio = $this->input->post('precio'); 
    $ancho = $this->input->post('ancho') ?? "";
    $fondo = $this->input->post('fondo') ?? "";
    $suptot = $this->input->post('suptot') ?? "";
    $mconst = $this->input->post('mconst') ?? "";
    $ctoser = $this->input->post('ctoser');
    $moneda = $this->input->post('moneda'); 
    $foto1 = $this->input->post('foto1'); 
    $fotoss = $this->input->post('fotos'); 
    $pais = $this->input->post('pais'); 
    $ciudad = $this->input->post('ciudad'); 
    $lat = $this->input->post('lat') ?? null; 
    $lng = $this->input->post('lng') ?? null; 
    $nombre_propietario = $this->input->post('nombre_propietario') ?? "Sin propietario"; 
    $apellido_propietario = $this->input->post('apellido_propietario') ?? " "; 
    $telefono_propietario = $this->input->post('telefono_propietario') ?? "Sin telefono"; 
    $correo_propietario = $this->input->post('correo_propietario') ?? "Sin correo"; 
	$fotos = $_FILES['fotos'];
	$fecha =  $this->input->post('fecha'); 
	$fotosSeleccionadas = $this->input->post('fotosSeleccionadas');
  	$fotosSeleccionadasArray = explode(',', $fotosSeleccionadas);

  	$estadoactual =  $this->db->select("estado")->from("propiedad")->where("id",$id_propiedad)->get()->row()->estado;


  	if($estadoactual == "Venta" && $estado == "Alquiler"){

  		$idus = $this->db->select("max(usuario.id)+1 as id_usua")->from("usuario")->get()->row();

		if (!empty($idus)) {
		$iduss=$idus->id_usua;
		}
		else{
            $iduss = 1;
		}

$passwor = $this->back_model->generarContrasenia(8);
$password = md5($passwor);

		$dat = array(
			"id" => $iduss,
			"password" => $password,
			"tipo" => "propietario",
			"activo" => 1,
			"token" => ""
		);

	$this->back_model->insert_usu($dat);

	$asunto = "Bienvenido a Le Rochelle Real State ".ucwords($nombre_propietario);
	$mensaje = "Hola ".ucwords($nombre_propietario)." ".ucwords($apellido_propietario)." y Bienvenido a Le Rochelle Real State, a continuación te daré tu contraseña para ingresar a Rent House.";
	$mensaje .= "\n";
	$mensaje .= "Ingresa con este correo y contraseña en la sección de Rent House para ver las solicitudes por tu propiedad.";
	$mensaje .= "\n";
	$mensaje .= "Una vez iniciada la sesión tienes la opción de cambiar tu contraseña.";
	$mensaje .= "\n";
    $mensaje .= "\n";
    $mensaje .= "La contraseña es: ".$passwor;
    $mensaje .= "\n";
    $mensaje .= "Link para iniciar sesión en Rent House: ".base_url()."../app/frontend/insesion/";

		$this->email->from('lerochelle@ejemplo.com', "Le Rochelle Real State");
        $this->email->to($correo_propietario);
        $this->email->subject($asunto);
        $this->email->message($mensaje);

        $this->email->send();

    $iddd = $this->db->select("id_propi")->from("propiedad")->where("id",$id_propiedad)->get()->result_array();
	$id_propietario=$iddd["0"]["id_propi"];

	$d = $this->back_model->update_propietario2($id_propietario,ucwords($nombre_propietario),ucwords($apellido_propietario),$correo_propietario,$telefono_propietario,$iduss);
	$contador = $d ? $contador + 1 : $contador + 0;

  	}
  	else{

	$iddd = $this->db->select("id_propi")->from("propiedad")->where("id",$id_propiedad)->get()->result_array();
	$id_propietario=$iddd["0"]["id_propi"];

	$d = $this->back_model->update_propietario($id_propietario,ucwords($nombre_propietario),ucwords($apellido_propietario),$correo_propietario,$telefono_propietario);
	$contador = $d ? $contador + 1 : $contador + 0;

}


	$d2 = $this->back_model->update_propiedad($id_propiedad,ucwords($titulo),ucfirst($calle),ucfirst($col),$noext,$habitaciones,$banios,$pisos,$garage,$precio,$ciudad,$tipo,$estado,$lat,$lng,$moneda,$noesta,$ancho,$fondo,$suptot,$mconst,$ctoser,$mbanios);
	$contador = $d2 ? $contador + 1 : $contador + 0;

	$consulta = $this->db->select("id")->from("descripcion")->where("id_prop",$id_propiedad)->get()->row();
	$id_desc=$consulta->id;

	$d3 = $this->back_model->update_desc($id_desc,ucfirst($descripcion));
	$contador = $d3 ? $contador + 1 : $contador + 0;

	if($contador > 0){
		$mensaje = "Actualizado";
	}
	else{
		$mensaje = "";
	}



	if($_FILES['foto1']['name']){
   $fotonu = $_FILES['foto1']['name'];

	$this->back_model->update_foto($id_propiedad,$fotonu);

	$archivo = "../app/static/images/casas/".$fotoAnt;

	$co2 = $this->back_model->con_foto2($fotoAnt);
	$cos2 = $this->back_model->con_fotos2($fotoAnt,$id_propiedad);

			if($co2==2 && $cos2==2){
				unlink($archivo);
			}


if (!move_uploaded_file($_FILES["foto1"]["tmp_name"],"../app/static/images/casas/".$_FILES["foto1"]["name"])) {
$mensaje = "No se pudo subir la Foto";
			}
			else{
			$mensaje = "Actualizado";	
			}

	}





	if($fotos["name"][0]){
		for($x=0; $x<count($_FILES["fotos"]["name"]); $x++){

			$nombre_fo = $fotos["name"][$x];
		    $ruta_provisional = $fotos["tmp_name"][$x];

		    if ($nombre_fo != "") {
		    $data3 = array(
		    	"id" => null,
		    	"foto" => $nombre_fo,
		    	"id_prop" => $id_propiedad
		    );

		    $this->back_model->insert_foto($data3);

// Ruta de destino para guardar la imagen redimensionada
$ruta_destino = "../app/static/images/casas/".$nombre_fo;

move_uploaded_file($ruta_provisional,$ruta_destino);
$mensaje = "Actualizado";

				}

		}

	}

	if ($fotosSeleccionadas){
		$fotosSeleccionadasArray = json_decode($fotosSeleccionadas, true);
		foreach ($fotosSeleccionadasArray as $fotoSeleccionada) {
			$consulta5 = $this->db->select("foto")->from("foto")->where("id",$fotoSeleccionada)->get()->row();
			$fotoaelimi = $consulta5->foto;
			$archivko = "../app/static/images/casas/".$fotoaelimi;

			$co = $this->back_model->con_foto($fotoaelimi);

			$cos = $this->back_model->con_fotos($fotoaelimi,$fotoSeleccionada);

			if($co==2 && $cos==2){
				unlink($archivko);
			}

		    $this->back_model->delete_foto($fotoSeleccionada);
		    $mensaje = "Actualizado";

		}
	}


redirect(base_url()."../app/Accesoad/lisprop/$id_usu/$token/$mensaje");

}


public function deleteprop(){
$id = $this->input->post("id");
$titulo = $this->input->post("titulo");

$this->db->where("id_prop",$id)->delete("destacado");

$obj["resultado"] = $this->back_model->delete_prop($id);
$obj["mensaje"] = $obj["resultado"] ? "La propiedad: \"".$titulo."\" se ha eliminado correctamente" : "Falló la eliminación de la propiedad: \"".$titulo."\""; 

	echo json_encode($obj);
}





public function agretipo(){
	$tipo = ucwords($this->input->post("tipo"));

	$data = array(
		"id" => null,
		"tipo" => $tipo,
		"activo" => 1
	);

	$obj["resultado"] = $this->back_model->insert_tipo($data);

	$obj["mensaje"] = $obj["resultado"] ? "Registro Exitoso" : "Registro Fallido"; 

		echo json_encode($obj);
}


public function updatetipo(){
	$tipo = $this->input->post("tipo");
	$id = $this->input->post("id");


	$obj["resultado"] = $this->back_model->update_tipo($id,$tipo);

	$obj["mensaje"] = $obj["resultado"] ? "Actualizado" : "Fallido"; 

		echo json_encode($obj);
}


public function deletipo(){
	$id = $this->input->post("id");


	$obj["resultado"] = $this->back_model->delete_tipo($id);

	$obj["mensaje"] = $obj["resultado"] ? "Se eliminó" : "Imposible eliminar"; 

		echo json_encode($obj["mensaje"]);
}


public function agrepais(){
	$pais = ucwords($this->input->post("pais"));

	$data = array(
		"id" => null,
		"pais" => $pais,
		"activo" => 1
	);

	$obj["resultado"] = $this->back_model->insert_pais($data);

	$obj["mensaje"] = $obj["resultado"] ? "Registro Exitoso" : "Registro Fallido"; 

		echo json_encode($obj);
}

public function updatepais(){
	$pais = $this->input->post("pais");
	$id = $this->input->post("id");


	$obj["resultado"] = $this->back_model->update_pais($id,$pais);

	$obj["mensaje"] = $obj["resultado"] ? "Actualizado" : "Fallido"; 

		echo json_encode($obj);
}

public function delepais() {
    $id = $this->input->post("id");


        $obj["resultado"] = $this->back_model->delete_pais($id);
        $obj["mensaje"] = $obj["resultado"] ? "Se eliminó" : "Imposible eliminar";


    echo json_encode($obj["mensaje"]);
}


public function agreciudad(){
	$pais = $this->input->post("pais");
	$ciudad = $this->input->post("ciudad");

	$excludedWords = array("de", "el", "la","del","en"); // Lista de palabras a excluir
	$words = explode(" ", $ciudad); // Divide la cadena en palabras

	// Itera sobre las palabras y capitaliza solo las que no están en la lista de exclusiones
	$capitalizedWords = array_map(function($word) use ($excludedWords) {
	    if (!in_array(strtolower($word), $excludedWords)) {
	        return ucfirst($word); // Capitaliza la primera letra de la palabra
	    } else {
	        return $word; // Mantén la palabra en minúsculas sin capitalizar
	    }
	}, $words);

	$capitalizedString = implode(" ", $capitalizedWords); 

	$data = array(
		"id" => null,
		"nombre" => $capitalizedString,
		"id_pais" => $pais,
		"activo" => 1
	);

	$obj["resultado"] = $this->back_model->insert_ciudad($data);

	$obj["mensaje"] = $obj["resultado"] ? "Registro Exitoso" : "Registro Fallido"; 

		echo json_encode($obj);
}

public function updateciudad(){
	$id_pais = $this->input->post("pais");
	$ciudad = $this->input->post("ciudad");
	$id = $this->input->post("id");


	$obj["resultado"] = $this->back_model->update_ciudad($id,$id_pais,$ciudad);

	$obj["mensaje"] = $obj["resultado"] ? "Actualizado" : "Fallido"; 

		echo json_encode($obj);
}

public function deleciudad() {
    $id = $this->input->post("id");

        $obj["resultado"] = $this->back_model->delete_ciudad($id);
        $obj["mensaje"] = $obj["resultado"] ? "Se eliminó" : "Imposible eliminar";

    echo json_encode($obj["mensaje"]);
}

public function updatedatos(){

	$id_usuario = $this->input->post("id_usuario");
	$nombre = $this->input->post("nombre");
	$calle = $this->input->post("calle");
	$colonia = $this->input->post("colonia");
	$numero = $this->input->post("numero");
	$cp = $this->input->post("cp");
	$ciudad = $this->input->post("ciudad");
	$estado = $this->input->post("estado");
	$pais = $this->input->post("pais");
	$tel = $this->input->post("tel");
	$correo = $this->input->post("correo");
	$horario = $this->input->post("horario");
	$fb = $this->input->post("fb");
	$ig = $this->input->post("ig");
	$tik = $this->input->post("tik");
	$ws = $this->input->post("ws");
	$lat = $this->input->post("lat");
	$lng = $this->input->post("lng");
	$administrador = $this->input->post("administrador");
	$contrasenia = $this->input->post("password");
	$correoad = $this->input->post("correoad");

	$contador = 0;

	$password = md5($contrasenia);

	//echo $tik;
	//echo $ws;

	//die();

	$this->session->set_userdata( "contrasenia", $contrasenia);

	$d = $this->back_model->update_contra($id_usuario,$password);
	$contador = $d ? $contador + 1 : $contador + 0;

	$d2 = $this->back_model->update_admin($id_usuario,$administrador,$correoad);
	$contador = $d2 ? $contador + 1 : $contador + 0;

	$d3 = $this->back_model->update_datos($nombre,$calle,$numero,$colonia,$cp,$ciudad,$estado,$pais,$tel,$correo,$horario,$lat,$lng,$fb,$ig,$ws,$tik);
	$contador = $d3 ? $contador + 1 : $contador + 0;

	if($contador > 0){
		$obj["mensaje"] = "Actualizado";
		$obj["resultado"] = true;
	}
	else{
		$obj["mensaje"] = "Son los mismos datos";
		$obj["resultado"] = true;
	}

		echo json_encode($obj);
}

public function destacada() {
     $ids = $this->input->post('ids');
   if (!empty($ids)) {
      foreach ($ids as $id) {
      	
      	$data = array(
      		"id"=>null,
      		"id_prop" => $id
      	);
        
        $obj["resultado"] = $this->back_model->guardarDestacada($data);
      	$obj["mensaje"] = $obj["resultado"] ? "Se añadió a favoritos" : "No se pudo añadir";
      }

      }
      echo json_encode($obj);
   }

public function delefav() {
    $id_prop = $this->input->post("id");
        $obj["resultado"] = $this->back_model->delete_fav($id_prop);
        $obj["mensaje"] = $obj["resultado"] ? "Se eliminó" : "Imposible eliminar";


    echo json_encode($obj["mensaje"]);
}


public function registracli(){
	$nombre = ucwords($this->input->post("nombre"));
	$correo = $this->input->post("correo");
	$tel = $this->input->post("tel");
	$password = md5($this->input->post("password"));

	$excor = $this->back_model->exists_correo($correo);

	if ($excor == 1) {
				$obj=array(
					"resultado" => false,
					"mensaje" => "Este correo electrónico ya está registrado"
				);
					
			}
	else{
	$idus = $this->db->select("max(usuario.id)+1 as id_usua")->from("usuario")->get()->row();

		if (!empty($idus)) {
		$iduss=$idus->id_usua;
		}
		else{
            $iduss = 1;
		}

		$data = array(
			"id" => $iduss,
			"password" => $password,
			"tipo" => "cliente",
			"activo" => 1,
			"token" => ""
		);


	$fec= $this->db->select("now() as fecha")->get()->result_array();
	$fecc=$fec["0"]["fecha"];

	$idd = $this->db->select("max(id) as id")->from("cliente")->get()->row();

	if (!empty($idd)) {
    $id_cliente = $idd->id + 1;
	} else {
	    $id_cliente = 1;
	}

	$data2 = array(
		"id" => $id_cliente,
		"nombre" => $nombre,
		"correo" => $correo,
		"fec_registro" => $fecc,
		"tel" => $tel,
		"id_usu" => $iduss
	);

	$obj["resultado"] = $this->back_model->insert_cliente($data,$data2);

	$obj["mensaje"] = $obj["resultado"] ? "Registro exitoso" : "Imposible insertar cliente";
}
echo json_encode($obj);
}



//LOGIN
public function verificausuario(){
	$correo=$this->input->post("correo");
	$contrasenia=$this->input->post("contrasenia");

	$contr=md5($contrasenia);

	$exis = $this->back_model->exists_usuario2($correo,$contr);

	$exis2 = $this->back_model->exists_usuario3($correo,$contr);
		
		if($exis == 1 || $exis2 == 1){
			//CREA LAS VARIABLES DE TOKEN
			session_regenerate_id();
			$token = md5(session_id());

			if ($exis == 1) {

			$clin = $this->db->select("cliente.nombre")->from("usuario")->join("cliente","cliente.id_usu=usuario.id")->where("correo",$correo)->where("password",$contr)->where("activo",1)->get()->result_array();

			$clinom = $clin["0"]["nombre"]; 
			$ap = "";

			$id_us = $this->db->select("usuario.id as id")->from("usuario")->join("cliente","cliente.id_usu=usuario.id")->where("correo",$correo)->where("password",$contr)->where("activo",1)->get()->result_array();

			$id_usuu = $id_us["0"]["id"];

			$id_clii = $this->db->select("cliente.id as id_cli")->from("usuario")->join("cliente","cliente.id_usu=usuario.id")->where("correo",$correo)->where("password",$contr)->where("activo",1)->get()->result_array();

			$id_cli = $id_clii["0"]["id_cli"];

			$te = $this->db->select("tel")->from("usuario")->join("cliente","cliente.id_usu=usuario.id")->where("correo",$correo)->where("password",$contr)->where("activo",1)->get()->result_array();

			$tel = $te["0"]["tel"];

			$this->db->select('tipo');
			$this->db->from('usuario');
			$this->db->join('cliente', 'cliente.id_usu = usuario.id');
			$this->db->where('correo', $correo);
			$query = $this->db->get();

			 $row = $query->row();
    		 $tipo = $row->tipo;

		}
		else{

			$clin = $this->db->select("nombre,ap")->from("usuario")->join("propietario","propietario.id_usu=usuario.id")->where("correo",$correo)->where("password",$contr)->where("activo",1)->get()->result_array();

			$clinom = $clin["0"]["nombre"]; 
			$ap = $clin["0"]["ap"]; 

			$id_us = $this->db->select("usuario.id as id")->from("usuario")->join("propietario","propietario.id_usu=usuario.id")->where("correo",$correo)->where("password",$contr)->where("activo",1)->get()->result_array();

			$id_usuu = $id_us["0"]["id"];

			$id_clii = $this->db->select("propietario.id as id_cli")->from("usuario")->join("propietario","propietario.id_usu=usuario.id")->where("correo",$correo)->where("password",$contr)->where("activo",1)->get()->result_array();

			$id_cli = $id_clii["0"]["id_cli"];

			$te = $this->db->select("tel")->from("usuario")->join("propietario","propietario.id_usu=usuario.id")->where("correo",$correo)->where("password",$contr)->where("activo",1)->get()->result_array();

			$tel = $te["0"]["tel"];

			$this->db->select('tipo');
			$this->db->from('usuario');
			$this->db->join('propietario', 'propietario.id_usu = usuario.id');
			$this->db->where('correo', $correo);
			$query = $this->db->get();

			 $row = $query->row();
    		 $tipo = $row->tipo;
		}


			if ($this->back_model->update_token($id_usuu,$token)) {
				$obj = array(
					"resultado" => true,
					"id_usu" => $id_usuu,
					"mensaje" => "Bienvenido ".$clinom." ".$ap,
					"tokenn" => $token,
					"correo" => $correo,
					"id_cli" => $id_cli,
					"tipo" => $tipo,
					"nomcli" => $clinom,
					"tel" => $tel,
					"ap" => $ap
				);
				
			}
			else{
				$obj = array(
				"resultado" =>false,
				"mensaje" => "Imposible crear sesión"
			);
				
			}

		}
		else{
			$obj = array(
				"resultado" =>false,
				"mensaje" => "Correo o password incorrectos"

			);
			
		}

		echo json_encode($obj);
	}

public function getsolicitud(){
	$id = $this->input->post("id");

	$data = $this->db
	->select("count(id) as solicitud")
	->from("solicitud")
	->where("id_prop",$id)
	->get()->result_array();

	$dataa = $data["0"]["solicitud"];


		echo json_encode($dataa);

}

public function deletesolicitud(){
	$id = $this->input->post("id");

	$obj["resultado"] = $this->back_model->delete_soli($id);
    $obj["mensaje"] = $obj["resultado"] ? "Se eliminó la solicitud" : "Imposible eliminar";


    echo json_encode($obj);

}

public function updatepropietario(){
	$id_cli = $this->input->post("id_cli");
	$id_usu = $this->input->post("id_usu");
	$nombre = ucwords($this->input->post("nombre"));
	$ap = ucwords($this->input->post("ap"));
	$correo = $this->input->post("correo");
	$password = $this->input->post("password");
	$tel = $this->input->post("tel");
	$contador = 0;
	$contrasenia = md5($password);

	$update = $this->back_model->update_propietario($id_cli,$nombre,$ap,$correo,$tel);
	$contador = $update ? $contador + 1 : $contador + 0;

	$update2 = $this->back_model->update_usuario($id_usu,$contrasenia);
	$contador = $update2 ? $contador + 1 : $contador + 0;

	if ($contador > 0) {
		$obj["mensaje"] = "Datos actualizados";
		$obj["resultado"] = true;
	}
	else{
		$obj["mensaje"] = "Son los mismos datos";
		$obj["resultado"] = false;
	}

	$nom = $nombre." ".$ap;

	$this->session->set_userdata( "nombre", $nom);

	$this->session->set_userdata( "contrasenia", $password);

	echo json_encode($obj);

}


public function updatecliente(){
	$id_cli = $this->input->post("id_cli");
	$id_usu = $this->input->post("id_usu");
	$nombre = ucwords($this->input->post("nombre"));
	$ap = ucwords($this->input->post("ap"));
	$correo = $this->input->post("correo");
	$password = $this->input->post("password");
	$tel = $this->input->post("tel");
	$contador = 0;
	$contrasenia = md5($password);

	$update = $this->back_model->update_cliente($id_cli,$nombre,$correo,$tel);
	$contador = $update ? $contador + 1 : $contador + 0;

	$update2 = $this->back_model->update_usuario($id_usu,$contrasenia);
	$contador = $update2 ? $contador + 1 : $contador + 0;

	if ($contador > 0) {
		$obj["mensaje"] = "Datos actualizados";
		$obj["resultado"] = true;
	}
	else{
		$obj["mensaje"] = "Son los mismos datos";
		$obj["resultado"] = false;
	}

	$nom = $nombre." ".$ap;

	$this->session->set_userdata( "nombre", $nom);

	$this->session->set_userdata( "contrasenia", $password);

	echo json_encode($obj);

}

public function registrainqui(){
	$id_cli = $this->input->post("id");
	$id_propiedad = $this->input->post("id_propiedad");
	$fec = $this->db->select("now() as fecha")->get()->result_array();
	$fecha = $fec["0"]["fecha"];

	$exis = $this->back_model->exists_inqui2($id_cli);

	if ($exis == 1) {
		$obj["resultado"] = false;
		$obj["mensaje"] = "Esta persona ya tiene contrato de arrendamiento con otro propietario.";
	}else{
	$data = array(
		"id" => null,
		"id_cli" => $id_cli,
		"id_prop" => $id_propiedad,
		"fecha" => $fecha
	);

	$nom = $this->db->select("nombre")->from("cliente")->where("id",$id_cli)->get()->result_array();
	$nombre = $nom["0"]["nombre"];

	$obj["resultado"] = $this->back_model->insert_inquilino($data);
	$obj["mensaje"] = $obj["resultado"] ? "Has aceptado a ".$nombre." como tu inquilino" : "Ocurrió un error";
}

	echo json_encode($obj);

}

public function insertaresenia(){
	$id_cli = $this->input->post("id_cli");
	$id_propietario = $this->input->post("id_propietario");
	$resenia = ucfirst($this->input->post("resenia"));
	$fec = $this->db->select("now() as fecha")->get()->result_array();
	$fecha = $fec["0"]["fecha"];

	$data = array(
		"id" => null,
		"id_cli" => $id_cli,
		"id_propietario" => $id_propietario,
		"resenia" => $resenia,
		"fecha" => $fecha
	);

$obj["resultado"] = $this->back_model->insert_resenia($data);
$obj["mensaje"] = $obj["resultado"] ? "Se ha registrado tu comentario" : "Ocurrió un error";

echo json_encode($obj);

}

public function deleteresenia(){
$id = $this->input->post("id");

$obj["resultado"] = $this->back_model->delete_resenia($id);
$obj["mensaje"] = $obj["resultado"] ? "Se ha eliminado tu comentario" : "Ocurrió un error";

echo json_encode($obj);

}

public function deletearrenda(){
$id_cli = $this->input->post("id_cli");
$id_propiedad = $this->input->post("id_propiedad");
$id_propietario = $this->input->post("id_propietario");
$estrellas = $this->input->post("estrellas");
$fec = $this->db->select("now() as fecha")->get()->result_array();
$fecha = $fec["0"]["fecha"];

$cliente = $this->db->select("nombre")->from("cliente")->where("id",$id_cli)->get()->row()->nombre;

$data = array(
"id" => null,
"estrellas" => $estrellas,
"fecha" => $fecha,
"id_cliente" => $id_cli,
"id_propietario" => $id_propietario
);

$this->back_model->insert_estrella($data);

$obj["resultado"] = $this->back_model->delete_inquilino($id_cli,$id_propiedad);
$obj["mensaje"] = $obj["resultado"] ? "Gracias por tu opinión. Has finalizado tu arrendamiento con \"".$cliente."\"." : "Ocurrió un error";

echo json_encode($obj);
	
}

public function mensaje(){
$nombre = ucfirst($this->input->post("nombre"));
$email = $this->input->post("email");
$telefono = $this->input->post("telefono");
$mensajee = ucfirst($this->input->post("mensajee"));
$fec = $this->db->select("now() as fecha")->get()->result_array();
$fecha = $fec["0"]["fecha"];

$data = array(
	"id" => null,
	"nombre" => $nombre,
	"correo" => $email,
	"tel" => $telefono,
	"mensaje" => $mensajee,
	"fecha" => $fecha
);

$obj["resultado"] = $this->back_model->insert_mensaje($data);
$obj["mensaje"] = $obj["resultado"] ? "Mensaje enviado, nos estaremos comunicando con usted para pedir más información" : "Ocurrió un error";

echo json_encode($obj);

}

public function deletemensaje(){
$id = $this->input->post("id");

$obj["resultado"] = $this->back_model->delete_mensaje($id);
$obj["mensaje"] = $obj["resultado"] ? "Se ha eliminado el mensaje" : "Ocurrió un error";

echo json_encode($obj);

}

public function delesol(){
$id = $this->input->post("id");

$obj["resultado"] = $this->back_model->delete_sol($id);
$obj["mensaje"] = $obj["resultado"] ? "Se ha eliminado la solicitud" : "Ocurrió un error";

echo json_encode($obj);

}

public function totalDatos(){

$consulta7 = $this->db->select("count(solicitud.id) as ciu")->from("solicitud")->join("propiedad","solicitud.id_prop = propiedad.id")->where("disponible",1)->get()->result_array();
$totalSoli = $consulta7["0"]["ciu"];

$consulta8 = $this->db->select("count(cliente.id) as ciu")->from("cliente")->join("usuario","cliente.id_usu = usuario.id")->where("usuario.activo",1)->get()->result_array();
$totalcli = $consulta8["0"]["ciu"];

$consulta9 = $this->db->select("count(id) as ciu")->from("mensaje")->get()->result_array();
$totalmens = $consulta9["0"]["ciu"];

$obj["solicitudes"] = $totalSoli;
$obj["clientes"] = $totalcli;
$obj["mensajes"] = $totalmens;

echo json_encode($obj);
}

}
