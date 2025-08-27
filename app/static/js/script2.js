var fotosSeleccionadas = [];

function eliminarFoto(idFoto, idContenedor) {

    fotosSeleccionadas.push(idFoto);
    document.getElementById("fotosSeleccionadas").value = JSON.stringify(fotosSeleccionadas);
    fotosAEliminar = idFoto + "," + fotosAEliminar;
    document.getElementById('fotosAEliminar').value = fotosAEliminar;

    //Eliminamos el el contenedor de la foto

    $('#' + idContenedor).remove();
}

/****************************************************/
/***** VENTANA MODAL PARA ACEPTAR LA ELIMINACION DE UNA PROIEDAD*********/
// Get the modal
//variable global que manendrá el id a eliminar en caso que confirme
var idEliminar;
var propi;

function abrirModal(id,titulo) {
    idEliminar = id;
    propi = titulo;
    var modal = document.getElementById("myModal");

    // Get the button that opens the modal
    var btn = document.getElementById(id);

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

   var mensaje = document.getElementById("men");
    mensaje.innerHTML = '¿Realmente deseas eliminar la propiedad: <strong>' + titulo + '</strong>?';


    // When the user clicks on the button, open the modal 
    //btn.onclick = function() {
    modal.style.display = "flex";
    //}

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
}

function eliminarPropiedad() {
    $(document).ready(function(){

 $.ajax({
      "url": appData.uri_ws + "backend/deleteprop/",
      "dataType": "json",
      "type": "post",
      "data": {
        "id": idEliminar,
        "titulo" : propi
      }
    })
    .done(function(obj) {
        alert(obj.mensaje);
       $(location).attr("href","");
    });

});

    //window.location.href = "eliminar-propiedad.php?idPropiedad=" + idEliminar;
}



/*tipo de muestra de las publicaciones */
function tipoDeMuestra(formato) {
    if (formato == "f") {
        document.getElementById("personalizada").style.display = "none";
    } else {
        document.getElementById("personalizada").style.display = "block";
    }
}




var idEliminarT;

function abrirModalT(idt,tipo) {
    idEliminarT = idt;
    var modal = document.getElementById("myModalT");

    // Get the button that opens the modal
    var btn = document.getElementById(idt);

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    var mensaje = document.getElementById("men");
    mensaje.innerHTML = "¿Realmente deseas eliminar <strong>"+tipo+"</strong> como tipo de propiedad?";

    // When the user clicks on the button, open the modal 
    //btn.onclick = function() {
    modal.style.display = "flex";
    //}

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
}

function eliminarTipo() {
    $(document).ready(function(){

 $.ajax({
      "url": appData.uri_ws + "backend/deletipo/",
      "dataType": "json",
      "type": "post",
      "data": {
        "id": idEliminarT
      }
    })
    .done(function(obj) {
        alert(obj);
       $(location).attr("href","");
    });

});
    //window.location.href = "eliminar-propiedad.php?idPropiedad=" + idEliminarT;
}



var idEliminarPa;

function abrirModalPa(idt,pais) {
    idEliminarPa = idt;
    var modal = document.getElementById("myModalPa");

    // Get the button that opens the modal
    var btn = document.getElementById(idt);

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    var mensaje = document.getElementById("men");
    mensaje.innerHTML = "¿Realmente deseas eliminar a <strong>"+pais+"</strong> de tu lista de paises?";

    // When the user clicks on the button, open the modal 
    //btn.onclick = function() {
    modal.style.display = "flex";
    //}

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
}

function eliminarPais() {
    $(document).ready(function(){

 $.ajax({
      "url": appData.uri_ws + "backend/delepais/",
      "dataType": "json",
      "type": "post",
      "data": {
        "id": idEliminarPa
      }
    })
    .done(function(obj) {
        alert(obj);
       $(location).attr("href","");
    });

});

}

