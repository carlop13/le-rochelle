<?php
/*
	Archivo: sesiones_helper.php
	Ubicación: application/helpers
*/

function verifica_sesionn( $correo, $token ) {
	$miApp = &get_instance();

	if ( !( 	$miApp->session->has_userdata( "correo" ) &&
			 	$miApp->session->has_userdata( "token" ) &&
			 	$miApp->session->correo == $correo &&
			 	$miApp->session->token  == $token ) ) {
		mensaje_usuario( "danger", "Sesión inválida, debes volver a ingresar" );
		redirect( base_url() );
	}
}
?>