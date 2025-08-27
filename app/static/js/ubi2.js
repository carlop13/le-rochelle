var mapa, marcador, centro;
var lat = appData.latitude;
var lng = appData.longitude;

$(document).ready(function() {
  // Código del botón guardar
  $("#btn-guardar").click(function() {
    document.getElementById("lat").value = marcador.getPosition().lat();
    document.getElementById("lng").value = marcador.getPosition().lng();
    $("#btn-guardar").prop("disabled", true);
    $("#modal-mapa").modal("hide");
  });


  // Click del botón de búsqueda
    $("#search-button").click(function() {
        var address = $("#search-input").val();
        buscarDireccion(address);
    });

});

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
    navigator.geolocation.getCurrentPosition(function(pos) {
      if (lat == 0.000000000000 && lng == 0.000000000000) {
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
          draggable: true
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
  } else {
    marcador = new google.maps.Marker({
      position: e.latLng,
      map: mapa,
      draggable: true
    });

    marcador.addListener("drag", function() {
      $("#btn-guardar").prop("disabled", true);
    });

    google.maps.event.clearListeners(mapa, "click");
    $("#btn-guardar").prop("disabled", false);
  }
}

function click_listener2() {
  marcador.setMap(null);
  marcador = undefined;
}

