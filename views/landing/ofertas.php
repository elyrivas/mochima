<?php

if (!$_SESSION["validar"]) {
   header ("location:401.php");
   exit();
}

  $oferta= OfertaController::listarPorpietarioOfertas($_SESSION["id_usuario"]);
  $sitios=sitiosController::listarSitioPropietario($_SESSION["id_usuario"]);

  
  if (isset($_POST["tituloOferta"])) {
    $titulo=OfertaController::guardarOfertaController();
  }

  if (isset($_GET["function"])=="eliminar") {
      OfertaController::eliminarOfertas();
  }

  if (isset($_POST["titulo_editar"])) {
    OfertaController::modificarController();
  }

  if (isset($_REQUEST["function"])=="consultar"){
    OfertaController::consultarOfertas();   
  }




?>

<!DOCTYPE html>
<html>
<head>
	<title>Mochima | Ofertas </title>
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
   <div class="row pt-2">
      <div class="col-2 offset-1">
         <a href="index.php">
            <img class="pt-1" src="src/img/logo-m.png" alt="logo" height="30">
         </a>
      </div>
      <div class="col-4 ">
         <div class="input-group input-group-sm ancho-i pt-1" >
            <div class="input-group-prepend ">
                   <span class="input-group-text bg-white "><i class="ni ni-pin-3 text-secondary"></i></span>
                 </div>
            <input type="text" class="form-control input-sm">
            <span class="input-group-append">
             <button type="button" class="btn color-azul btn-sm"><i class="color-blanco ni ni-spaceship"></i></button>
           </span>
         </div>		</div>
      <div class="col-5">
         <nav class="pt-1 pr-1">
             <ul class="menu d-flex flex-row  justify-content-end">
               <li><a href="index.php" class="text-white">Inicio</a></li>
                <li><a class="text-white" href="?action=explorer">Explorar</a></li>
              <?php if (isset($_SESSION["validar"])): ?>
              <?php endif; ?>
              <?php if (!isset($_SESSION["validar"])&&!isset($_SESSION["validarA"])): ?>
                <li><a class="text-white" href="#" data-toggle="modal" data-target="#modal-2">Ingresar</a></li>
                <li><a class="text-white" href="#" data-toggle="modal" data-target="#modal">Registro</a></li>
              <?php endif; ?>
              <?php if (isset($_SESSION["validarA"])): ?>
                <li><a class="text-white" href="?action=dashboard">Panel</a></li>
              <?php endif; ?>
                <li><a class="text-white" href="?action=salir">Salir</a></li>
             </ul>
         </nav>
      </div>
   </div>
</header>

<div id="seccionOferta" class="col-12 mt-5">
  
    <div class="row">

      <div class="col-8">

        <div class="col-12">
          <div class="card">
            <div class="card-header bg-info">
              <h3 class="card-title text-white">Listar Ofertas </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="tabla-ofertas" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Titulo</th>
                  <th>Precio</th>
                  <th>Sitio Turistico</th>
                  <th>Contenido</th>
                  
                  <th class="text-center">Accion</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($oferta as $item): ?>
                        <tr id="<?php echo $item["id_oferta"]; ?>">
                          <td><?php echo $item["nombre_oferta"]; ?></td>
                          <td><?php echo $item["precio"]; ?></td>
                          <td><?php echo $item["nombre_sitio"]; ?></td>
                          <td><?php echo $item["descripcion_ofertas"]; ?></td>
                    
                          <td class="d-flex justify-content-around">
                             <button type="button" class="btn btn-sm btn-info btn-modificar" data-toggle="tooltip" dataplacement="top" title="Modificar"><i class="ni ni-app"></i></button>
                             <button type="button" class="btn btn-sm btn-danger btn-eliminar" data-toggle="tooltip" dataplacement="top" title="eliminarOfertas"><i class="ni ni-fat-remove"></i></button>
                          </td>
                        </tr>
                <?php endforeach ?>
               </tbody>
              </table>
            </div>

          </div>
        </div>
            
      </div>

      <div class="col-4 ">
        <button id="btnAgregarOferta" class="btn btn-info btn-lg mt-1">Agregar Oferta</button>

        <!--==== AGREGAR ARTÍCULO  ====-->
        <div id="agregarOferta" style="display:none ">
          
          <form method="post" action="?action=ofertas">
            
            <input name="tituloOferta" type="text" placeholder="Título del Oferta" class="form-control mt-3" required>

            <input type="number" name="precioOferta" id="" cols="30" rows="1" placeholder="Precio" class="form-control mt-2"  maxlength="170" required></input>
            
            <select id="estados-select" class="form-control estados mt-2" name="sitio_crear">
              <option disabled>Sitio Turistico</option>
              <?php foreach($sitios as $item): ?>      
                <option value="<?php echo $item["id_sitio"]; ?>"><?php echo $item["nombre_sitio"]; ?></option>      
              <?php endforeach ?>
            </select>
          
            <textarea name="contenidoOferta" id="" cols="30" rows="7" placeholder="Contenido del Oferta" class="form-control mt-2" required></textarea>
            <br>
            <input type="submit" id="guardarOferta" value="Guardar Oferta" class="btn btn-info">

          </form>
        </div>
      </div>

    </div>

</div>


<!--MODAL PARA MODIFICAR-->
<div class="modal fade" id="modal-editar">
 <div class="modal-dialog modal-md">
   <div class="modal-content">
     <div class="modal-header">
       <h4 class="modal-title">Modificar Ofertas</h4>
       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
         <span aria-hidden="true">&times;</span>
       </button>
     </div>
     <div class="modal-body">
       <form id="editar-ofertas" method="post" action="?action=ofertas&function=modificar">
        <input type="hidden" name="id_editar" >
         <div class="card-body d-flex flex-wrap">
           <div class="form-group col-6">
             <label>Titulo </label>
             <input type="text" class="form-control" required name="titulo_editar">
           </div>
           <div class="form-group col-6">
             <label>Precio</label>
             <input type="text" class="form-control" required name="precio_editar">
           </div>
           <div class="form-group col-12">
             <label>Sitio Turistico</label>
             <select id="" class="form-control " name="sitio_editar">
                <?php foreach($sitios as $item): ?>      
                  <option value="<?php echo $item["id_sitio"]; ?>"><?php echo $item["nombre_sitio"]; ?></option>      
                <?php endforeach ?>
              </select>
           </div>
           <div class="form-group col-12">
             <label>Descripcion</label>
             <textarea class="form-control" required name="contenido_editar" rows="5"></textarea>
           </div>
       
         </div>
         <div class="d-flex justify-content-between">
           <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
           <button type="submit" form="editar-ofertas" class="btn btn-info">Modificar</button>
         </div>
       </form>
     </div>
   </div>
 </div>
</div>

<!--MODAL PARA ELIMINAR-->
<div class="modal fade mt-5" id="modal-eliminar">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-body text-center">
        <h5>Eliminar Ofertas</h5>
      </div>
      <form id="eliminarOfertas" method="post" action="?action=ofertas&function=eliminar">
        <input type="hidden" name="id-eliminar" >
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">NO</button>
        <button type="submit" form="eliminarOfertas" class="btn btn-sm btn-success pr-3 pl-3 ">SI</button>
      </div>
      </form>
    </div>
  </div>
</div>






<!-- Llamando a los archivos js, desde la carpeta -->
<script src="src/js/jquery-3.4.1.min.js"></script>
<script src="src/js/popper.min.js"></script>
<script src="src/js/bootstrap.min.js"></script>
<script src="src/js/ajax/ajax-ofertas.js"></script>
<script src="src/js/ajax/gestorOfertas.js"></script>
<script src="plugins/datatables/jquery.dataTables.js"></script>
<script src="plugins/datatables/dataTables.bootstrap4.js"></script>
<?php require_once 'include/tabla.php' ?>
</body>
</html>
