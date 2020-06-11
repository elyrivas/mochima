<?php


$estados=sitiosController::listarController($funcion="listar-estados");
$tipos=sitiosController::listarController($funcion="listar-tipos");

/*$sitios=sitiosController::listarController($funcion="listar-sitios");*/
$sitios=sitiosController::listarFoticosController();
$coordenadas=sitiosController::coordenadas();
$coordenadas = json_encode($coordenadas);

if (isset($_REQUEST["function"])=="get-ciudades") {
    sitiosController::listarCiudades($funcion="listar-ciudad");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Mochima | Explorar</title>
  <!-- Para poder usar acentos , Ñ, entre otros -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Para que sea compatible con todos los navegadores -->
  <meta http-equiv="x-ua-compatible" content="ie-edge">

  <?php require_once 'include/css.php'; ?>
  <link rel="stylesheet" type="text/css" href="src/css/buscar.css">
  <link rel="stylesheet" type="text/css" href="src/css/bootstrap.min.css">

  <script type="text/javascript" src="./plugins/leaflet/leaflet.js"></script>
  <link rel="stylesheet" href="./plugins/leaflet/leaflet.css" />
    <!--     Iconos     -->
  <script src="src/js/all.min.js"></script>

  <style>
    .circular{
      border-radius: 50%;
    }

    .content-img{
      width: 150px;
    }
    
    .inputfile {
      width: 0.1px;
      height: 0.1px;
      opacity: 0;
      overflow: hidden;
      position: absolute;
      z-index: -1;
    }
    .inputfile + label {
      text-align: center;
      width: 150px;
      border: 1px dotted #17a2b8;
      background-color: transparent;
      display: inline-block;
    }

    .inputfile:focus + label,
    .inputfile + label:hover {
        border: 2px dotted #17a2b8;
    }

    .icon-file{
      font-size: 20px;
    }
  </style>

</head>
<body>
<header class="barra">
   <div class="row pt-2 mr-1">
      <div class="col-2 offset-1">
         <a href="index.php">
            <img class="pt-1" src="src/img/logo-m.png" alt="logo" height="30">
         </a>
      </div>
      <div class="col-4 mt-1">
          <form action=""  class="filtro-name" id="filtro-name">
         <div class="input-group input-group-sm ancho-i" >
            <div class="input-group-prepend ">
             <span class="input-group-text bg-white "><i class="ni ni-pin-3 text-secondary"></i></span>
          </div>
            <input type="text" class="form-control input-sm" name="filtro">
            <span class="input-group-append">
            <button type="submit" class="btn color-azul btn-info"><i class="color-blanco ni ni-spaceship"></i></button>
            </span>
         </div>   
          </form>
      </div>
      <div class="col-5">
         <nav class="pt-1 pr-4">
             <ul class="menu d-flex flex-row  justify-content-end">
               <li><a href="index.php" class="text-white">Inicio</a></li>
                <li><a class="text-white" href="?action=explorer">Explorar</a></li>
              <?php if (isset($_SESSION["validar"])): ?>
                <li><a class="text-white" href="?action=misitio">Mis sitios</a></li>
              <?php endif; ?>
              <?php if (isset($_SESSION["validar"])): ?>
                <li><a class="text-white" href="?action=contacto">Contacto</a></li>
              <?php endif; ?>
                <li><a class="text-white" href="?action=salir">Salir</a></li>
             </ul>
         </nav>
      </div>
   </div>
</header>

<div class="container-fluid">
  <div class="row">
    <div class="col-3">
      <div class="content-img">
        <img class="circular" src="./src/img/irepelusa.jpg" alt="profiles" height="150">
      </div>
      <div class="change-image">
        <form action="?action=perfil" method="post" id="imagen-submit">
          <input type="file" name="img-change" id="file" class="inputfile" />
          <label for="file"><i class="text-info ni ni-cloud-upload-96 icon-file pt-2 pb-"></i></label>
        </form>
      </div>
    </div>
    <div class="col-6 ">
      <form role="form ">
        <div class="card-body">
          <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control is-valid" id="nombre" name="edit-nombre" value="">
          </div>
          <div class="form-group">
            <label for="apellido">Apellido</label>
            <input type="text" class="form-control" id="apellido" name="edit-apellido" value="">
          </div>
          <div class="form-group">
            <label for="usuario">Usuario</label>
            <input type="text" class="form-control" id="usuario" name="edit-usuario" value="">
          </div>
          <div class="form-group">
            <label for="telefono">Telefono</label>
            <input type="text" class="form-control" id="telefono" name="edit-telefono" value="">
          </div>
          <div class="form-group">
            <label for="direccion">Direccion</label>
            <input type="text" class="form-control" id="direccion" name="edit-direccion" value="">
          </div>
        </div>
        <!-- /.card-body -->

        <div class="">
          <button  type="submit" class="float-right btn btn-primary mr-5">Submit</button>
        </div>
      </form>
    </div>
    <div class="col-3">
      
    </div>
  </div>
</div>




<!-- Llamando a los archivos js, desde la carpeta -->
<script src="src/js/jquery-3.4.1.min.js"></script>
<script src="src/js/popper.min.js"></script>
<script src="src/js/bootstrap.min.js"></script>
<script src="src/js/all.min.js"></script>
<script src="src/js/ajax/ajax-explorar.js"></script>

<script>
  $( "#imagen-submit" ).change(function() {
  $( "#imagen-submit" ).submit();
});

</script>
<script type="text/javascript">
    
    
  var mymap = L.map('mapid').setView([6.4237499, -66.5897293], 5);

  L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    maxZoom: 18,
    id: 'mapbox/streets-v11',
    tileSize: 512,
    zoomOffset: -1,
    accessToken: 'pk.eyJ1IjoiZWx5aWxsZXIiLCJhIjoiY2s5dzllYm83MDMyNjNrbzZvNHV4a3B4YiJ9.dmaGYU5bGDiKpBfav0nDAA'
  }).addTo(mymap);


  var data='<?php echo $coordenadas; ?>'
  data=JSON.parse(data);  
  var jsonFeatures = [];

  data.forEach(function(point){
    var name= point.nombre;
    var nombre=point.nombre;
      var lat = point.latitud;
      var lon = point.longitud;

      var feature = {type: 'Feature',
          properties: {
            name:name,
            amenity: 'Ciudad',
            popupContent: nombre
          },
          geometry: {
              type: 'Point',
              coordinates: [lon,lat]
          }
      };

      jsonFeatures.push(feature);
  });

  var geoJson = { type: 'FeatureCollection', features: jsonFeatures };

  /*L.geoJson(geoJson).addTo(mymap);

  var geojsonMarkerOptions = {
    radius: 8,
    fillColor: "#ff7800",
    color: "#000",
    weight: 1,
    opacity: 1,
    fillOpacity: 0.8
  };

  L.geoJSON(jsonFeatures, {
      pointToLayer: function (feature, latlng) {
          return L.circleMarker(latlng, geojsonMarkerOptions);
      }
  }).addTo(mymap);*/

  function onEachFeature(feature, layer) {
    // does this feature have a property named popupContent?
    if (feature.properties && feature.properties.popupContent) {
        layer.bindPopup(feature.properties.popupContent);
      }
  }

  L.geoJSON(jsonFeatures, {
      onEachFeature: onEachFeature
  }).addTo(mymap);
  </script>

</body>
</html>
