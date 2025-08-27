<?php
/*
	Archivo: sesiones_helper.php
	Ubicación: application/helpers
*/

function verifica_sesion( $idusuario, $token ) {
	// Referencia a mi propia aplicacion
	$miApp = &get_instance();

	if ( !( 	$miApp->session->has_userdata( "id_usu" ) &&
			 	$miApp->session->has_userdata( "token" ) &&
			 	$miApp->session->id_usu == $idusuario &&
			 	$miApp->session->token  == $token ) ) {
		redirect( base_url()."Accesoad/login" );
	}
}


function verifica_sesion2( $idusuario, $token ) {
	// Referencia a mi propia aplicacion
	$miApp = &get_instance();

	if ( !( 	$miApp->session->has_userdata( "id_usu" ) &&
			 	$miApp->session->has_userdata( "tokenn" ) &&
			 	$miApp->session->id_usu == $idusuario &&
			 	$miApp->session->tokenn  == $token ) ) {
		redirect( base_url()."Frontend/insesion" );
	}
}


?>