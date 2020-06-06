<?php

if (!$_SESSION["validarA"]) {
   header ("location:index.php?action=inicio");
   exit();
}

if (!isset($_REQUEST["function"])) {
  $sitios=sitiosController::listarController($funcion="listar-sitios");
  $estados=sitiosController::listarController($funcion="listar-estados");
  $tipos=sitiosController::listarController($funcion="listar-tipos");
  $servicios=ServiciosController::listarServicios();

} else {
  if ($_REQUEST["function"]=="eliminar") {
      sitiosController::eliminarController();
  }

  if ($_REQUEST["function"]=="crear") {
      sitiosController::crearController(); 
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
  if ($_REQUEST["function"]=="galeria") {
    gestorGaleriaController::subirGaleria();
    exit();
  }
  if ($_REQUEST["function"]=="galeriaEliminar") {
    gestorGaleriaController::eliminarGaleria();
    exit();
  }
  if ($_REQUEST["function"]=="listar_galeria") {
    gestorGaleriaController::listarGaleria();
    exit();
  }

}

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Mochima | Sitios Turisticos</title>
  <?php require_once 'include/css.php'; ?>
  <style>
    .dropzone {
        background: white;
        border-radius: 5px;
        border: 2px dashed rgb(0, 135, 247);
        border-image: none;
        max-width: 500px;
        margin-left: auto;
        margin-right: auto;
    }

       
  </style>
</head>
  <?php require_once 'include/head.php'; ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Sitios Turisticos</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php?action=dashboard">Inicio</a></li>
              <li class="breadcrumb-item active">Sitios Turisticos</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

       <!-- Contenido principal -->
        <div class="row">

          <div class="col-9">
            <div class="card">
              <div class="card-header bg-info">
                <h3 class="card-title">Listado de sitios turisticos </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="tabla-sitios" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>RTN</th>
                    <th>Nombre del Sitio</th>
                    <th>Tipo</th>
                    <th>Estado</th>
                    <th>Ciudad</th>
                    <th>Usuario</th>
                    <th>Estatus</th>
                    <th class="text-center">Accion</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php foreach($sitios as $item): ?>
                          <tr id="<?php echo $item["rtn"]; ?>" numero="<?php echo $item["id_sitio"]; ?>">
                            <td class="id-sitio"><?php echo $item["rtn"]; ?></td>
                            <td><?php echo $item["nombre_sitio"];?></td>
                            <td><?php echo $item["nombre_tipo"];?></td>
                            <td><?php echo $item["nombre_estado"];?></td>
                            <td><?php echo $item["nombre_ciudad"];?></td>
                            <td><?php echo $item["nombre"];?></td>
                            <td>
                              <?php if ($item["estatus"]=="publicado"): ?>
                                <?php echo "Publicado"; ?> 
                                <?php else: ?>
                                  <?php echo "No Publicado"; ?>
                              <?php endif ?>
                            </td>
                            <td class="d-flex justify-content-around">
                               <button type="button" class="btn btn-sm btn-info btn-modificar" data-toggle="tooltip" dataplacement="top" title="Modificar"><i class="ni ni-app"></i></button>
                               <button type="button" class="btn btn-sm btn-success btn-galeria" data-toggle="tooltip" dataplacement="top" title="Galeria"><i class="ni ni-album-2"></i></button>
                               <button type="button" class="btn btn-sm btn-danger btn-eliminar" data-toggle="tooltip" dataplacement="top" title="Eliminar"><i class="ni ni-fat-remove"></i></button>
                            </td>
                          </tr>
                  <?php endforeach ?>
                 </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>

          <div class="col-3">

            <!-- Horizontal Form -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Crear Nuevo Sitio</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body pt-2">
                <div class="info-box mb-3 bg-info">
                  <span class="info-box-icon"><i class="ni ni-square-pin"></i></span>
                  <div class="info-box-content" data-toggle="modal" data-target="#modal-crear">
                    <h4 class="info-box-text pt-4"><a href="#">Recreacion</a></h4>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
        <!-- Fin contenido principal-->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  


<!-- MODAL PARA CREAR SITIO -->

<div class="modal fade" id="modal-crear">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Crear Sitio Turistico</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formulario-crear-sitio" class="form-horizontal" method="post" action="?action=adminsitio&function=crear">
          <div class="card-body d-flex flex-wrap">
            <input type="hidden" name="usuario_crear" value="<?php echo $_SESSION["id_usuario"];?>">
            <input type="hidden" name="tipo_crear" value="2">
            <input type="hidden" name="estatus_crear" value="true">
            <div class="form-group col-4">
              <label>Nombre del Sitio</label>
              <input type="text" class="form-control" name="nombre_crear">
            </div>
            <div class="form-group col-4">
              <label>RTN</label>
              <input type="text" class="form-control" name="rtn_crear">
            </div>
            <div class="form-group col-4">
              <label>Fecha</label>
              <input type="date" class="form-control" name="fecha_crear">
            </div>
            <div class="form-group col-4">
              <label>RIF</label>
              <input type="text" class="form-control" name="rif_crear">
            </div>
            <div class="form-group col-4">
              <label>Telefono</label>
              <input type="text" class="form-control" name="telefono_crear">
            </div>
            <div class="form-group col-4">
              <label>Correo</label>
              <input type="text" class="form-control" name="correo_crear">
            </div>
            <div class="form-group col-4">
              <label>Facebook</label>
              <input type="text" class="form-control" name="facebook_crear">
            </div>
            <div class="form-group col-4">
              <label>Instagram</label>
              <input type="text" class="form-control" name="instagram_crear">
            </div>
            <div class="form-group col-4">
              <label>Sitio web</label>
              <input type="text" class="form-control" name="web_crear">
            </div>
            <div class="form-group col-4">
              <label>Licencia</label>
              <input type="text" class="form-control" name="licencia_crear">
            </div>
            <div class="form-group col-4">
              <label>Latitud</label>
              <input type="text" class="form-control" name="latitud_crear">
            </div>
            <div class="form-group col-4">
              <label>Longitud</label>
              <input type="text" class="form-control" name="longitud_crear">
            </div>
            <div class="form-group col-4">
              <label>Estado</label>
              <select id="estados-select" class="form-control estados" name="estado_crear">
                <?php foreach($estados as $item): ?>      
                  <option value="<?php echo $item["id_estado"]; ?>"><?php echo $item["nombre_estado"]; ?></option>      
                <?php endforeach ?>
              </select>
            </div>
            <div class="form-group col-4">
              <label>Ciudad</label>
              <select class="form-control ciudades" disabled  name="ciudad_crear" required>
              </select>
            </div>
            <div class="form-group col-4">
              <label>Dirección</label>
              <input type="text" class="form-control" name="direccion_crear">
            </div>
            <div class="form-group col-12">
              <label>Descripcion</label>
              <textarea class="form-control" rows="2" placeholder="Describe tu sitio turistico." name="descripcion_crear"></textarea>
            </div>
            <div class="form-group col-12">
              <label>Servicios</label>
              <select class="select2 form-control" multiple="multiple" name="servicio_crear[]" data-placeholder="Selecciona un servicio" style="width: 100%;">
              
                <?php foreach($servicios as $item): ?>      
                  <option value="<?php echo $item["id_servicio"]; ?>"><?php echo $item["nombre_servicio"]; ?></option>      
                <?php endforeach ?>
                
              </select>
            </div>
          </div>
          <div class="modal-footer d-flex justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-info">Publicar Sitio</button>
          </div>
        </form>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.FIN DEL MODAL PARA CREAR -->


<!--MODAL PARA ELIMINAR-->
  <div class="modal fade" id="modal-eliminar">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-body text-center">
          <h5>Eliminar Sitio Turistico</h5>
        </div>
        <form id="eliminar" method="post" action="?action=adminsitio&function=eliminar">
          <input type="hidden" name="rtn-eliminar" >
        
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


<!--MODAL MODIFICAR-->
<div class="modal fade" id="modal-modificar">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Modificar Sitio Turistico</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formulario-editar-sitio" class="form-horizontal" method="post" action="?action=adminsitio&function=modificar">
          <div class="card-body d-flex flex-wrap">
            <input type="hidden" class="form-control" name="id_editar">
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
            <div class="form-group col-4">
              <label>Estatus</label>
              <select id="estatus-select" class="form-control estatu_editar" data-placeholder="Selecionar Estatus" name="estatus_editar">      
                <option value="publicado">Publicado</option>
                <option value="nopublicado">No Publicado</option> 
              </select>
            </div>
            <div class="form-group col-8">
              <label>Descripcion</label>
              <textarea class="form-control" rows="2" placeholder="Describe tu sitio turistico." name="descripcion_editar"></textarea>
            </div>
          </div>
          <div class="modal-footer d-flex justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-info">Publicar Sitio</button>
          </div>
        </form>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- MODAL MODIFICAR-->

<!-- MODAL GALERIA-->
<div class="modal fade" id="modal-galeria">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
        <h4 class="modal-title">Galeria del Sitio Turistico</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body ">
          <form action="?action=adminsitio&function=galeria" class="dropzone needsclick dz-clickable" id="subirImagen">
            <div class="dz-message needsclick">
              Arrastra las imagenes de tu Sitio Turistico.
            </div>
              <input type="hidden" value="" name="id_sitio">
          </form>
          <div id="galeria_listar" class="row photos col-8 offset-2">
                     <input type="hidden" name="id_ditio_eliminar">
                     <button>Eliminar</button>
          </div>
        </div>
        <div class="modal-footer d-flex justify-content-between">
            <button id="cerrar" type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>


<!--INCLUDE THE FOOTER-->
<?php require_once 'include/footer.php'; ?>
<!-- FUNCIONES AJAX PARA LISTAR CIUDADES Y CARGAR INPUT AL EDITAR-->
<script src="src/js/dropzone.min.js"></script>
<script src="src/js/ajax/dropzone-config.js"></script>
<script src="src/js/ajax/ajax-sitios.js"></script>
<!-- JQUERY PARA VALIDAR TODOS LOS FORMULARIOS-->
<script src="src/js/validacion/validar-sitios.js"></script>
<?php require_once 'include/tabla.php' ?>

