<?php
$consulta5 = $this->db->select("count(id) as ciu")->from("destacado")->get()->result_array();
$totalDestacado = $consulta5["0"]["ciu"];

$consulta = $this->db->select("propiedad.*")->from("destacado")->join("propiedad","destacado.id_prop = propiedad.id")->where("disponible",1)->get();

function fecha_fancy($sFecha) {
    // Convierte un String en arreglo
    $aFecha = explode("-", $sFecha);

    $aMes = ["enero", "febrero", "marzo", "abril", "mayo", "junio",
        "julio", "agosto", "septiembre", "octubre", "noviembre", "diciembre"];

    return number_format($aFecha[2]) . " de " . $aMes[$aFecha[1] - 1] . " de " . $aFecha[0];
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="<?=base_url()?>static/css/estilolog.css">
    <link rel="shortcut icon" href="<?=base_url()?>static/images/image.ico">
    <meta author="Carlos Guadalupe López Trejo">
    <title>SAWPLR - Admin</title>
    <script src="<?=base_url()?>static/js/jquery-3.6.1.min.js"></script>
    <script src="<?=base_url()?>static/js/jquery-3.6.1.js"></script>
    <style>



        #contenedor-admin {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            max-width: 1500px;
            margin: 0 auto;
            padding: 20px;
        }

    

    </style>
</head>

<script type="text/javascript">
  var appData = {
    uri_app : "<?= base_url() ?>",
    uri_ws  : "<?= base_url() ?>../webservice/"
}
</script>

<body>
<?php $this->load->view( "header_admin" ); ?>    
    <div id="contenedor-admin">

        <?php $this->load->view( "contenedor_menu" ); ?>

        <div class="contenedor-principal">
            <div id="listado-propiedades">
                <h2>Propiedades Destacadas</h2>
                <hr>

                <div class="contenedor-tabla">
                    <?php if($totalDestacado==0): ?>
                        <h3>No hay propiedades destacadas</h3>
                    <?php else: ?>
                        <h2>Listado de Propiedades Destacadas</h2>

                        <table>
                        <tr>
                            <th>No.</th>
                            <th>Título</th>
                            <th>Tipo</th>
                            <th>Estado</th>
                            <th>Ubicación</th>
                            <th>Fecha de Publicación</th>
                            <th> Acciones </th>
                        </tr>
                        <?php 
                        $s=1;
                        foreach ($consulta->result_array() as $propiedad) : 

                        $idd = $this->db->select("id_ciu")->from("propiedad")->where("id",$propiedad['id'])->get()->result_array();
                        $id_ciu=$idd["0"]["id_ciu"];

                        $ci = $this->db->select("nombre")->from("propiedad")->join("ciudad","propiedad.id_ciu = ciudad.id")->where("id_ciu",$id_ciu)->get()->result_array();
                        $ciudad=$ci["0"]["nombre"];

                        $tip = $this->db->select("tipo")->from("propiedad")->join("tipo","propiedad.id_tipo = tipo.id")->where("propiedad.id",$propiedad['id'])->get()->result_array();

                        $tipo=$tip["0"]["tipo"];

                            ?>

                        <tr>
                                <td> <?= $s ?></td>
                                <td> <?= $propiedad['titulo'] ?></td>
                                <td> <?= $tipo ?></td>
                                <td> <?= $propiedad['estado'] ?></td>
                                <td> <?= $ciudad ?></td>
                                <td> <?= fecha_fancy($propiedad['fecha_alta']); ?></td>
                                <td>

                                    <form action="<?=base_url()?>Accesoad/verdetalle" method="post" class="form-acciones">
                                        <input type="hidden" name="id" value="<?= $propiedad['id'] ?>">
                                        <input type="hidden" name="id_usu" value="<?= $this->session->id_usu ?>">
                                        <input type="hidden" name="token" value="<?= $this->session->token ?>">
                                        <input type="submit" value="Ver Detalle" name="detalle">
                                    </form>


                                    <a href="#" id="<?= $propiedad['id'] ?>" onclick="abrirModalFa(<?= $propiedad['id'] ?>)" class="btn-eliminar">
                                        Eliminar
                                    </a>
                                </td>
                            </tr>
                            <?php 
                            $s++;
                         endforeach ?>
                    </table>

                    <?php endif; ?>
                </div>

                  <!-- The Modal para la eliminación de una propiedad -->
                <div id="myModalFa" class="modal">

                    <!-- Modal content -->
                    <div class="modal-content">
                        <span class="close">&times;</span>
                        <p id="men"></p>
                        <button onclick="eliminarFavorita()">Si</button>
                    </div>
                </div>

                <br>
   <style>

   h3 {
      text-align: center;
   }

   select {
      width: 100%;
      margin-bottom: 10px;
   }

   #seleccionadaContainer {
      margin-bottom: 10px;
   }

   #propiedadesSeleccionadasContainer {
      margin-top: 20px;
   }

   #propiedadesSeleccionadasList {
      list-style: none;
      padding: 0;
   }

   #propiedadesSeleccionadasList li {
      margin-bottom: 5px;
   }

   #propiedadesSeleccionadasTitulo {
      display: none;
   }

   #propiedadesSeleccionadasTitulo.show {
      display: block;
   }

     #agregarBtn {
      background-color: #007bff; /* Azul */
      color: #fff;
      border: none;
      padding: 8px 16px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 14px;
      margin-top: 10px;
      cursor: pointer;
      transition: background-color 0.3s;
   }

   #agregarBtn:hover {
      background-color: #0056b3; /* Azul oscuro */
   }

   #destacarBtn {
      background-color: #ff4500; /* Naranja oscuro */
      color: #fff;
      border: none;
      padding: 8px 16px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 14px;
      margin-top: 10px;
      cursor: pointer;
      transition: background-color 0.3s;
   }

   #destacarBtn:hover {
      background-color: #e63900; /* Naranja */
   }

   .delete-button {
      background-color: #ff0000; /* Rojo */
      color: #fff;
      border: none;
      padding: 5px 10px;
      border-radius: 3px;
      cursor: pointer;
   }

   .delete-button:hover {
      background-color: #cc0000; /* Rojo oscuro */
   }
</style>

<div class="contenedor-tabla">
   <div class="caja-info destacadas">
      <h3>Agregar Propiedades a Destacar</h3>
      <hr>
      <select id="propiedadesSelect">
         <option value="0">
            -- Seleccione --
         </option> 
         <?php
            $result_prop = $this->db->select("*")->from("propiedad")->where("disponible",1)->get();
            foreach ($result_prop->result_array() as $propiedad) :

               $iddd = $this->db->select("id_ciu")->from("propiedad")->where("id",$propiedad['id'])->get()->result_array();
               $id_ciuu=$iddd["0"]["id_ciu"];
               $cii = $this->db->select("nombre")->from("propiedad")->join("ciudad","propiedad.id_ciu = ciudad.id")->where("id_ciu",$id_ciuu)->get()->result_array();
               $ciudadd=$cii["0"]["nombre"];

               $d = $this->db->select("count(id) as d")->from("destacado")->where("id_prop",$propiedad['id'])->get()->result_array();
               $dd = $d["0"]["d"];

                if($dd==0) : 

         ?>
         <option value="<?= $propiedad['id'] ?>">
            No.<?= $propiedad['id'] ?>   <?= $propiedad['titulo'] ?>   <?= $ciudadd ?>
         </option>
         <?php 
     endif;
     endforeach ?>
      </select>
      
      <div id="seleccionadaContainer" style="display: none;">
         <h4 id="seleccionadaTitulo"></h4>
      </div>
      <hr>

      <button id="agregarBtn">Agregar</button>
      <div id="propiedadesSeleccionadasContainer" style="display: none;">
         <h4 id="propiedadesSeleccionadasTitulo">Propiedades seleccionadas:</h4>
         <ul id="propiedadesSeleccionadasList"></ul>
         <button id="destacarBtn">Destacar</button>
      </div>
   </div>
</div>

<script>
   const propiedadesSelect = document.getElementById('propiedadesSelect');
   const seleccionadaContainer = document.getElementById('seleccionadaContainer');
   const seleccionadaTitulo = document.getElementById('seleccionadaTitulo');
   const agregarBtn = document.getElementById('agregarBtn');
   const propiedadesSeleccionadasContainer = document.getElementById('propiedadesSeleccionadasContainer');
   const propiedadesSeleccionadasList = document.getElementById('propiedadesSeleccionadasList');
   const propiedadesSeleccionadasTitulo = document.getElementById('propiedadesSeleccionadasTitulo');
   const destacarBtn = document.getElementById('destacarBtn');
   const propiedadesSet = new Set(); // Conjunto para evitar duplicados

   const propiedadesSeleccionadas = [];

   propiedadesSelect.addEventListener('change', function() {
      const selectedOption = propiedadesSelect.options[propiedadesSelect.selectedIndex];
      selectedValue = selectedOption.value;
      const selectedTitulo = selectedOption.innerText;

      if (selectedOption.value !== "0") {
         seleccionadaContainer.style.display = 'block';
         seleccionadaTitulo.innerText = selectedTitulo;
      } else {
         seleccionadaContainer.style.display = 'none';
         seleccionadaTitulo.innerText = '';
      }
   });


   agregarBtn.addEventListener('click', function() {
      const selectedOption = propiedadesSelect.options[propiedadesSelect.selectedIndex];
      const selectedTitulo = selectedOption.innerText;

      if (selectedOption.value !== "0" && selectedTitulo.trim() !== "" && !propiedadesSet.has(selectedTitulo)) { // Verifica si el título ya está en el conjunto
         const li = document.createElement('li');
         li.innerText = selectedTitulo;

         const deleteBtn = document.createElement('button');
         deleteBtn.innerText = 'Eliminar';
         deleteBtn.classList.add('delete-button');

         deleteBtn.addEventListener('click', function() {
            propiedadesSeleccionadasList.removeChild(li);
            propiedadesSet.delete(selectedTitulo);
           const index = propiedadesSeleccionadas.indexOf(selectedOption.value);
   if (index !== -1) {
      propiedadesSeleccionadas.splice(index, 1);
   }
            if (propiedadesSeleccionadasList.children.length === 0) {
               propiedadesSeleccionadasContainer.style.display = 'none';
               propiedadesSeleccionadasTitulo.classList.remove('show');
               destacarBtn.style.display = 'none';
            }
         });

selectedValue = propiedadesSelect.value;
propiedadesSeleccionadas.push(selectedValue);

         li.appendChild(deleteBtn);
         propiedadesSeleccionadasList.appendChild(li);

         propiedadesSet.add(selectedTitulo); // Agrega el título al conjunto

         propiedadesSelect.value = "0";
         seleccionadaContainer.style.display = 'none';
         seleccionadaTitulo.innerText = '';

         propiedadesSeleccionadasContainer.style.display = 'block';
         propiedadesSeleccionadasTitulo.classList.add('show');
         destacarBtn.style.display = 'inline-block';
      } else {
         alert("Ya has seleccionado esta propiedad o no has seleccionado ninguna");
      }
   });


destacarBtn.addEventListener('click', function() {
   if (propiedadesSeleccionadas.length > 0) {
      const url = appData.uri_ws + "backend/destacada";
      
      const data = { ids: propiedadesSeleccionadas }; // Enviar el array de IDs al controlador
      
      $.ajax({
         url: url,
         type: 'POST',
         dataType: 'json',
         data: data,
         success: function(obj) {
            alert(obj.mensaje);
            $(location).attr("href","");
         },
         error: function(xhr, status, error) {
            console.error('Error:', error);
         }
      });
   } else {
      alert("No has seleccionado ninguna propiedad para destacar");
   }
});



</script>

            </div>
        </div>
    </div>

    <script>
        $('#link-dashboard').addClass('pagina-activa');
    </script>

   <script>
       var idEliminarFA;

function abrirModalFa(idt) {
    idEliminarFA = idt;
    var modal = document.getElementById("myModalFa");

    // Get the button that opens the modal
    var btn = document.getElementById(idt);

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    var mensaje = document.getElementById("men");
    mensaje.innerText="¿Realmente deseas eliminar a la propiedad No."+idt+" de tus favoritas?";

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

function eliminarFavorita() {
    $(document).ready(function(){

 $.ajax({
      "url": appData.uri_ws + "backend/delefav/",
      "dataType": "json",
      "type": "post",
      "data": {
        "id": idEliminarFA
      }
    })
    .done(function(obj) {
        alert(obj);
       $(location).attr("href","");
    });

});

}
   </script>
   

</body>

</html>
