<?php

if (!$_SESSION["validar"]) {
   header ("location:index.php?action=inicio");
      exit();
}
  $id_usuario=$_SESSION["id_usuario"];
  $sitios=sitiosController::listarSitioPropietario($id_usuario);
  $cant=count($sitios);

  if (!isset($_REQUEST["function"])) {
  $estados=sitiosController::listarController($funcion="listar-estados");
  $tipos=sitiosController::listarController($funcion="listar-tipos");
  $servicios=ServiciosController::listarServicios();

  } else {
    if ($_REQUEST["function"]=="eliminar") {
      sitiosController::eliminarController();
    }

    if ($_REQUEST["function"]=="consultar") {
        sitiosController::consultarController(); 
    }

    if ($_REQUEST["function"]=="modificar") {
        sitiosController::modificarController(); 
    }

    if ($_REQUEST["function"]=="get-ciudades") {
      sitiosController::listarCiudades($funcion="listar-ciudad");
      exit();
    }
  }

?>

<!DOCTYPE html>
<html>
<head>
	<title>Mochima | Mis Sitios</title>
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
         <nav class="pt-1">
             <ul class="menu d-flex flex-row  justify-content-end">
               <li><a href="index.php" class="text-white">Inicio</a></li>
                <li><a class="text-white" href="?action=explorer">Explorar</a></li>
              <?php if (isset($_SESSION["validar"])): ?>
              <?php endif; ?>
              <?php if (isset($_SESSION["validar"])): ?>
                <li><a class="text-white" href="?action=servicios">Servicios</a></li>
              <?php endif; ?>
              <?php if (!isset($_SESSION["validar"])&&!isset($_SESSION["validarA"])): ?>
                <li><a class="text-white" href="#" data-toggle="modal" data-target="#modal-2">Ingresar</a></li>
                <li><a class="text-white" href="#" data-toggle="modal" data-target="#modal">Registro</a></li>
              <?php endif; ?>
              <?php if (isset($_SESSION["validarA"])): ?>
                <li><a class="text-white" href="?action=dashboard">Panel</a></li>
              <?php endif; ?>
                <li><a class="text-white" href="?action=ofertas">Gestor Ofertas</a></li>
                <li><a class="text-white" href="?action=salir">Salir</a></li>
             </ul>
         </nav>
      </div>
   </div>
</header>

<div class="title"></div>

    <div class="container cartas" >
      <div class="card-group">
        <div class="row"> 
          <?php foreach ($sitios as $item): ?>
            <?php if ($item["estatus"]=="publicado"): ?>
                <div class="card cuadro_mostrar" id="" style="width: 20rem;">
                  <img class="card-img-top" src="src/img/hot3.jpg" alt="Card image cap">
                  <div class="card-body">
                    <h5 class="card-title"><?php echo $item["nombre_sitio"];?></h5>
                    <p class="card-text"><?php echo substr($item["descripcion"], 0,150);?></p>
                    <div class="botones_mostrar" rtn="<?php echo $item["rtn"];?>">

                        <button type="button" class="btn btn-outline-primary abrir_editar"><i class="far fa-edit"></i></button>

                        <a href="?action=sitio&sitio=<?php echo $item["id_sitio"];?>">
                          <button type="button" class="btn btn-outline-primary"><i class="far fa-eye"></i></button>
                        </a>

                        <button type="button" class="btn btn-outline-primary abrir_eliminar"><i class="far fa-trash-alt"></i></button>

                    </div>
                  </div>
                </div>
            <?php endif ?>
          <?php endforeach ?>
          <?php if ($cant<6): ?>
            <div class="card" style="width: 18rem;">
              <div class="card-body">
                <div class="mas-icons">
                    <i class="fas fa-plus text-info"></i>
                </div>
                <h5 class="card-title">Publica tu sitio aqui!</h5>
                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Placeat ducimus magni velit dignissimos.</p>
                <a href="?action=formulario_sitio">Publicar Sitio</a>
              </div>
            </div>
          <?php endif ?>
        </div>
      </div>
    </div>


<div class="modal fade" id="modal-modificar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modificar datos del sitio</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <form id="formulario-editar-sitio" class="form-horizontal" method="post" action="?action=misitio&function=modificar">
          <div class="card-body d-flex flex-wrap">
            <input type="hidden" class="form-control" name="rtn_editar">
            <input type="hidden" class="form-control" name="id_editar">
            <input type="hidden" class="form-control" name="misitio" value="true">
            <div class="form-group col-4">
              <label>Nombre del Sitio</label>
              <input type="text" class="form-control" name="nombre_editar">
            </div>
            <div class="form-group col-4">
              <label>RTN</label>
              <input type="text" class="form-control" name="rtn_editar">
            </div>
            <div class="form-group col-4">
              <label>Tipo</label>
              <select class="form-control tipo_editar" name="tipos_editar">
                <?php foreach($tipos as $item): ?>      
                  <option value="<?php echo $item["id_tipo"]; ?>"><?php echo $item["nombre_tipo"]; ?></option>    
                <?php endforeach ?>
              </select>
            </div>
            <div class="form-group col-4">
              <label>Fecha</label>
              <input type="date" class="form-control" name="fecha_editar">
            </div>
            <div class="form-group col-4">
              <label>RIF</label>
              <input type="text" class="form-control" name="rif_editar">
            </div>
            <div class="form-group col-4">
              <label>Telefono</label>
              <input type="text" class="form-control" name="telefono_editar">
            </div>
            <div class="form-group col-4">
              <label>Correo</label>
              <input type="text" class="form-control" name="correo_editar">
            </div>
            <div class="form-group col-4">
              <label>Facebook</label>
              <input type="text" class="form-control" name="facebook_editar">
            </div>
            <div class="form-group col-4">
              <label>Instagram</label>
              <input type="text" class="form-control" name="instagram_editar">
            </div>
            <div class="form-group col-4">
              <label>Sitio web</label>
              <input type="text" class="form-control" name="web_editar">
            </div>
            <div class="form-group col-4">
              <label>Licencia</label>
              <input type="text" class="form-control" name="licencia_editar">
            </div>
            <div class="form-group col-4">
              <label>Latitud</label>
              <input type="text" class="form-control" name="latitud_editar">
            </div>
            <div class="form-group col-4">
              <label>Longitud</label>
              <input type="text" class="form-control" name="longitud_editar">
            </div>
            <div class="form-group col-4">
              <label>Estado</label>
              <select id="estados-select" class="form-control estados_editar" data-placeholder="Selecionar Tipo" name="estado_editar">
                <?php foreach($estados as $item): ?>      
                  <option value="<?php echo $item["id_estado"]; ?>"><?php echo $item["nombre_estado"]; ?></option>      
                <?php endforeach ?>
              </select>
            </div>
            <div class="form-group col-4">
              <label>Ciudad</label>
              <select class="form-control ciudades_editar" data-placeholder="Selecionar Tipo" name="ciudad_editar">
              </select>
            </div>
            <div class="form-group col-4">
              <label>Dirección</label>
              <input type="text" class="form-control"  name="direccion_editar">
            </div>
            <div class="form-group col-4">
              <label>Habitaciones</label>
              <input type="text" class="form-control"  name="habitacion_editar">
            </div>
            <div class="form-group col-4">
              <label>Licencia</label>
              <input type="text" class="form-control"  name="licencia_editar">
            </div>
            <div class="form-group col-12">
              <label>Descripcion</label>
              <textarea class="form-control" rows="2" placeholder="Describe tu sitio turistico." name="descripcion_editar"></textarea>
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
      </div>
    </form>
    </div>
  </div>
</div>


<div class="modal fade" id="modal-eliminar">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-body text-center">
        <h5>Eliminar Sitio Turistico</h5>
      </div>
      <form id="eliminar" method="post" action="?action=misitio&function=eliminar">
        <input type="hidden" name="rtn-eliminar">
        <input type="hidden" class="form-control" name="misitio" value="true">
      
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">NO</button>
        <button type="submit" form="eliminar" class="btn btn-sm btn-success pr-3 pl-3 ">SI</button>
      </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
  <!-- /.MODAL ELIMINAR-->

<!-- Llamando a los archivos js, desde la carpeta -->
<script src="src/js/jquery-3.4.1.min.js"></script>
<script src="src/js/popper.min.js"></script>
<script src="src/js/bootstrap.min.js"></script>
<script src="src/js/all.min.js"></script>
<script src="src/js/ajax/ajax-misitio.js"></script>

</body>
</html>