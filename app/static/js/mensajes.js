function error_formulario(campo,mensaje){
	$("#" + campo ).addClass("is-invalid");
	$("#group-"+campo).append('<div class="invalid-feedback">'+mensaje+'</div>');

	$("#" + campo).focus();
}

function borra_mensajes() {
	$( ".is-invalid" ).removeClass( "is-invalid" );
	$( ".invalid-feedback" ).remove();
}

function error_ajax() {
	alert( "danger", "Error en AJAX" );
}



function fecha_fancy(sFecha){
	//Convierte un String en arreglo
	aFecha = sFecha.split("-");

	aMes= ["ene","feb","mar","abr","may","jun",
			"jul","ago","sep","oct","nov","dic"]

	return aFecha[2]+ " " + aMes[aFecha[1]-1]+" "+aFecha[0];
}