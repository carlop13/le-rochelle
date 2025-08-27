var mapa, marcador, centro;

$(document).ready(function(){

 
//click del boton guardar
$("#btn-guardar").click(function(){

	document.getElementById("lat").value = marcador.getPosition().lat();
	document.getElementById("lng").value = marcador.getPosition().lng();
	$("#btn-guardar").prop("disabled",true);
	//$("#modal-mapa").modal("hide"); 

});

 // Click del botón de búsqueda
    $("#search-button").click(function() {
        var address = $("#search-input").val();
        buscarDireccion(address);
    });
}); //FIN DEL READY


// Función para buscar una dirección
function buscarDireccion(address) {
    var geocoder = new google.maps.Geocoder();
    geocoder.geocode({ address: address }, function(results, status) {
        if (status === google.maps.GeocoderStatus.OK) {
            var location = results[0].geometry.location;
            mapa.setCenter(location);
            if (typeof marcador == "undefined") {
                marcador = new google.maps.Marker({
                    position: location,
                    map: mapa,
                    draggable: true
                });
            } else {
                marcador.setPosition(location);
            }
        } else {
            alert("No se pudo encontrar la dirección: " + address);
        }
    });
}

function iniciomapa() {
	
	if (navigator.geolocation) {

		navigator.geolocation.getCurrentPosition(function(pos){
			centro = {
				lat : pos.coords.latitude,
				lng : pos.coords.longitude
			};

		mapa = new google.maps.Map( 
		document.getElementById("mapa"),
		{
			center : centro,
			zoom : 15
		}
		);

mapa.addListener("click",function(e){
							
							//Muestra la posición en donde sucedió el evento
							console.log(e.latLng);
							console.log(marcador);

							//Crea un Marcador en la posición del click
							if (typeof marcador == "undefined") {
								marcador = new google.maps.Marker({
								position : e.latLng,
								map : mapa,
								draggable : true
							});
								
							}
							else{
								marcador.setPosition(e.latLng);
							}
						});

		});
		
	}
	else{
		alert("danger","Tu navegador no permite geolocalización");
	}
}



function click_listener(e){
	marcador = new google.maps.Marker({
				position : e.latLng,
				map : mapa,
				draggable : true
			});

			marcador.addListener("drag",function(){
				$("#btn-guardar").prop("disabled",false);
			});
			google.maps.event.clearListeners(mapa,"click");
			$("#btn-guardar").prop("disabled",false);
}
