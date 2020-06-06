<?php

if (!$_SESSION["validar"]) {
   header ("location:index.php?action=ingresar");
   exit();
}

?>


<?php

if (!$_SESSION["validar"]) {
   header ("location:index.php?action=inicio");
   exit();
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Mochima | Perfil</title>
	<!-- Para poder usar acentos , Ñ, entre otros -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Para que sea compatible con todos los navegadores -->
	<meta http-equiv="x-ua-compatible" content="ie-edge">

   <?php require_once 'include/css.php'; ?>
   <link rel="stylesheet" type="text/css" href="src/css/buscar.css">
	<link rel="stylesheet" type="text/css" href="src/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="src/css/estilo_mis_sitios.css">
		<!--     Iconos     -->
  <script src="src/js/all.min.js"></script>
  <style type="text/css">

  	.marco {
  		width: 100%;
  		height: 250px;
  	}

  	.imagen {
  		width: 100%;
  		height: 180px;
  		background-size: cover;
  		box-shadow: 0 0 1px rgba(0,0,0,.125), 0 1px 3px rgba(0,0,0,.4);
  	}

  	.info-img{
  		color: white;
  		padding-left: 10px;
  		padding-bottom: 5px;
  		font-size: 15px;
  	}

  	.precio {
  		color: #1AB6DF;
  		font-size: 25px;
  		font-weight: bold;
  		padding-bottom: 18px;
  		padding-right: 13px;
  		padding-left: 10px;
  	}

  	.anchos {
  		width: 450px;
  	}

  	label {
  		font-size: 15px;
  		font-weight: normal;
  	}

  	.text-boton {
  		font-size: 13px;
  		font-weight: bold;
  		color: white;
  	}

  	.text-info {
  		font-size: 12px;
  	}

  	.color-gris{
  		background-color: #F3F3F5;
  	}
  </style>


</head>
<body>
<header class="barra">
   <div class="row pt-2 ">
      <div class="col-2 offset-1">
         <a href="index.php">
            <img class="pt-1" src="src/img/logo-m.png" alt="logo" height="30">
         </a>
      </div>
      <div class="col-4 mt-2">
         <div class="input-group input-group-sm ancho-i pt-1" >
            <div class="input-group-prepend ">
	           <span class="input-group-text bg-white "><i class="ni ni-pin-3 text-secondary"></i></span>
	        </div>
            <input type="text" class="form-control input-sm">
            <span class="input-group-append">
             <button type="button" class="btn color-azul btn-info"><i class="color-blanco ni ni-spaceship"></i></button>
           </span>
         </div>		</div>
      <div class="col-5">
         <nav class="pt-1 pr-4">
             <ul class="menu d-flex flex-row  justify-content-end">
               <li><a href="index.php" class="text-white">Inicio</a></li>
                <li><a class="text-white" href="?action=explorer">Explorar</a></li>
              <?php if (isset($_SESSION["validar"])): ?>
                <li><a class="text-white" href="?action=misitio">Mis sitios</a></li>
              <?php endif; ?>
              <?php if (!isset($_SESSION["validar"])&&!isset($_SESSION["validarA"])): ?>
                <li><a class="text-white" href="#" data-toggle="modal" data-target="#modal-2">Ingresar</a></li>
                <li><a class="text-white" href="#" data-toggle="modal" data-target="#modal">Registro</a></li>
              <?php endif; ?>
              <?php if (isset($_SESSION["validarA"])): ?>
                <li><a class="text-white" href="?action=dashboard">Panel</a></li>
              <?php endif; ?>
                <li><a class="text-white" href="?action=contacto">Contactos</a></li>
                <li><a class="text-white" href="?action=salir">Salir</a></li>
             </ul>
         </nav>
      </div>
   </div>
</header>

 



<!-- Llamando a los archivos js, desde la carpeta -->
<script src="src/js/jquery-3.4.1.min.js"></script>
<script src="src/js/popper.min.js"></script>
<script src="src/js/bootstrap.min.js"></script>
<script src="src/js/all.min.js"></script>

</body>
</html>
