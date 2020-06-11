<?php

if (!$_SESSION["validar"]) {
   header ("location:401.php");
      exit();
}

  $id_usuario=$_SESSION["id_usuario"];
  $sitios=sitiosController::listarSitioPropietario($id_usuario);
  $cant=count($sitios);

  $id_sitio=$_GET["sitio"];
  if (isset($_GET["sitio"])) {
    $sitios=sitiosController::listarSitioUnico($id_sitio);
  };

  $oferta= OfertaController::listarOfertasUnicas($id_sitio);
  



?>

<!DOCTYPE html>
<html>
<head>
  <title>Mochima | Sitio Turistico</title>
  <!-- Para poder usar acentos , Ñ, entre otros -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Para que sea compatible con todos los navegadores -->
  <meta http-equiv="x-ua-compatible" content="ie-edge">
  <link rel="stylesheet" type="text/css" href="src/css/buscar.css">
  <link rel="stylesheet" type="text/css" href="src/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="src/css/estilo_sitio.css">
  <!--<link rel="stylesheet" type="text/css" href="css/all.min.js"> -->
  <script src="src/js/all.min.js"></script>

  <!-- CSS Files -->
    <link href="src/css/gsdk-bootstrap-wizard.css" rel="stylesheet" />
    <link rel="stylesheet" href="src/css/estilo_modal.css">


</head>
<body>
<!-- Navigation -->
<header class="barra ">
      <div class="row pt-2 ">
        <div class="col-2 offset-1">
          <a href="index.php">
            <img class="pt-1" src="src/img/logo-m.png" alt="logo" height="30">
          </a>
        </div>
        <div class="col-4 mt-1">
          <form href="?action=explorer" class="filtro-name" id="filtro-name">
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
        <div class="col-4">
          <nav class="pt-1">
              <ul class="menu d-flex flex-row  justify-content-end">
                <li><a href="index.php" class="text-white">Inicio</a></li>
                      <?php if (isset($_SESSION["validar"])): ?>
                          <li><a href="?action=misitio" class="text-white">Mis Sitios</a></li>
                      <?php endif; ?>
                      <?php if (!isset($_SESSION["validar"])&&!isset($_SESSION["validarA"])): ?>
                          <li><a href="#" data-toggle="modal" data-target="#modal-2" class="text-white">Ingresar</a></li>
                          <li><a href="#" data-toggle="modal" data-target="#modal" class="text-white">Registro</a></li>
                      <?php endif; ?>
                      <?php if (isset($_SESSION["validarA"])): ?>
                          <li><a class="text-white" href="?action=dashboard">Panel</a></li>
                      <?php endif; ?>
                <li><a class="text-white" href="?action=explorer">Explorar</a></li>
                    <li><a class="text-white" href="?action=salir">Salir</a></li>
             </ul>
          </nav>
        </div>
      </div>
    </header>

<div>
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
    </ol>
    <div class="carousel-inner" role="listbox">

      <div class="carousel-item active" style="background-image: url('src/img/hot5.jpg')">
        <div class="carousel-caption d-none d-md-block">
          <h1 class="display-3 text-left text-black"><?php echo $sitios["nombre_sitio"]; ?></h1>
          <h3 class="lead text-left"><b>Ubicación: </b><?php echo $sitios["direccion_sitio"]; ?></h3>
          <fieldset class="stars-fieldset"><span class="stars stars-45"></span></fieldset>
        </div>
      </div>
    </div>
     </div>
</div>
<div class="container-fluid">
    <div class="row">
      <div class="col-8">
            <div class="container">
              <div class="container lista">
                <section class="text-center">
             <div class="card-group listservi">
              </div>

              </div>

            </div>
        <div class="col-md-9" >
           <div class="media mt-3">
            <a class="mr-3" href="#">
            </a>
            <div class="media-body">
              <div class="media-body text-info">
            <h3 class="font-weight-bold"> Descripción y Servicios</h3>
            </div>
            <h4 class="mt-0 font-weight-bold">El sitio <?php echo $sitios["nombre_sitio"]; ?>, es un sitio de <?php echo $sitios["nombre_tipo"]; ?>. </h4>
            <div class="font-weight-bold">
            <?php echo $sitios["descripcion"]; ?>
            </div>
            </div>
            </h4>
            </div>
            <div class=" ml-3">
            <a class="mr-4" href="#">
            </a>
            <h4 class="font-weight-bold">
              <div class="text-info">
            <h3 class="font-weight-bold">Ofertas</h3>
            </div>
            <?php foreach ($oferta as $items):?>
              <br>
              <?php echo $items["nombre_oferta"]; ?> :
              <br>
              <span class="text-info "> PRECIO <?php echo $items["precio"]; ?></span>
              <p><?php echo $items["descripcion_ofertas"]; ?> </p>

            <?php endforeach ?>
            <div class="text-info">
            <h3 class="font-weight-bold">Galeria</h3>
          </div>
          </div>
            <div id="carouselExampleControls" class="carousel slide ml-3" data-ride="carousel">
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img class="d-block w-100" src="src/img/fondo.png" alt="First slide">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100" src="src/img/img1.jpg" alt="Second slide">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100" src="src/img/fondo.png" alt="Third slide">
                </div>
              </div>
              <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>

        </div>


        </div>


                <div class="col-md-4 lateral py-1">
                  <h4 class="text-dark font-weight-bold text-center"><b>Dirección</b></h4>
                  <h5 class="text-center font-weight-bold"><?php echo $sitios["direccion_sitio"]; ?> , Ciudad <?php echo $sitios["nombre_ciudad"]; ?>, Estado <?php echo $sitios["nombre_estado"]; ?></h5>
                  <div class="mapa-icons text-center">
                    <a class="text-decoration-none" href="#">
                    <i class="fas fa-map-marked-alt"></i>
                    </a>
                  </div>


                  <hr class="my-4">
                  <h4 class="text-center font-weight-bold text-dark"><b>Contacto</b></h4>
                  <p class="text-center font-weight-bold">Llamanos aqui...
                  <br>
                  <?php echo $sitios["telefono_sitio"]; ?>
                  <br>
                  Oh escribenos aqui...
                  <br>
                  <?php echo $sitios["email"]; ?>
                 </p>
                  <h4 class="text-center font-weight-bold text-dark"><b>Nuestras redes sociales</b></h4>
                  <div class="redes-icons text-center font-weight-bold">
                  <a class="text-decoration-none" href="#">
                    <p>Nuestro Facebook: <?php echo $sitios["facebook"]; ?></p>
                    <p>Nuestro Instagram: <?php echo $sitios["instagram"]; ?></p>
                    <p>Nuestro Sitio Web: <?php echo $sitios["sitioweb"]; ?></p>
                  </a>
                  <a href="#">
                  </a>
                  </div>



                </div>
                </div>
            </div>
            </div>
        </div>

  <hr>


<!-- Llamando a los archivos js, desde la carpeta -->
<script src="src/js/jquery-3.4.1.min.js"></script>
<script src="src/js/popper.min.js"></script>
<script src="src/js/bootstrap.min.js"></script>
<script src="src/js/all.min.js"></script>


  <script src="src/js/jquery.validate.min.js"></script>
</body>
</html>