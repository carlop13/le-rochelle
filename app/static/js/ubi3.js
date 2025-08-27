var mapa, marcador, centro;
var lat = appData.latitude;
var lng = appData.longitude;


$(document).ready(function() {

  // Click del botón de búsqueda
    $("#search-button").click(function() {
        var address = $("#search-input").val();
        buscarDireccion(address);
    });

});//FIN DEL READY


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

                document.getElementById("lat").value = marcador.getPosition().lat();
                document.getElementById("lng").value = marcador.getPosition().lng();
                
            } else {
                marcador.setPosition(location);
                document.getElementById("lat").value = marcador.getPosition().lat();
                document.getElementById("lng").value = marcador.getPosition().lng();
            }
        } else {
            alert("No se pudo encontrar la dirección: " + address);
        }
    });
}


function iniciomapa() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(pos) {
      if (lat == "" && lng == "") {
        centro = {
          lat: pos.coords.latitude,
          lng: pos.coords.longitude
        };

        mapa = new google.maps.Map(document.getElementById("mapa"), {
          center: centro,
          zoom: 15
        });

        if (typeof marcador === "undefined"){
        mapa.addListener("click", click_listener);
        mapa.addListener("dblclick", click_listener2);
      }

      } else {
        lat = parseFloat(appData.latitude);
        lng = parseFloat(appData.longitude);
        centro = {
          lat: lat,
          lng: lng
        };

        mapa = new google.maps.Map(document.getElementById("mapa"), {
          center: centro,
          zoom: 15
        });

        marcador = new google.maps.Marker({
          position: centro,
          map: mapa,
          draggable: false
        });

        mapa.addListener("click", click_listener);
        mapa.addListener("dblclick", click_listener2);
      }
    });
  } else {
    alert("danger","Tu navegador no permite geolocalización");
  }
}

function click_listener(e) {
  if (marcador) {
    marcador.setPosition(e.latLng);
    document.getElementById("lat").value = marcador.getPosition().lat();
    document.getElementById("lng").value = marcador.getPosition().lng();
  } else {
    marcador = new google.maps.Marker({
      position: e.latLng,
      map: mapa,
      draggable: false
    });

    document.getElementById("lat").value = marcador.getPosition().lat();
    document.getElementById("lng").value = marcador.getPosition().lng();
  }
}

function click_listener2() {
  marcador.setMap(null);
  marcador = undefined;
}

