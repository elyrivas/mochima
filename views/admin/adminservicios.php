<?php

if (!$_SESSION["validarA"]) {
   header ("location:index.php?action=inicio");
   exit();
}

$Oservicios=ServiciosController::listarServicios();

if (isset($_GET["function"])=="crear") {
    $Oservicios=ServiciosController::crearServicioController();
}

if (isset($_GET["function"])=="eliminar") {
    $Oservicios=ServiciosController::eliminarServicios();
}

if (isset($_POST["function"])=="editar") {
   $Oservicios=ServiciosController::consultarServicios();
   exit();
}

if (isset($_GET["function"])=="modificar") {
   
   if (ServiciosController::ModificarServicios()) {
     header("location:index.php?action=adminusuarios");
   }
}


?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Mochima | Servicios</title>
  <?php require_once 'include/css.php'; ?>

</head>
  <?php require_once 'include/head.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Servicios</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php?action=dashboard">Inicio</a></li>
              <li class="breadcrumb-item active">Servicios</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
      <div class="container-fluid">

       <!-- Contenido principal -->
        <div class="row">

          <div class="col-9">
            <div class="card">
              <div class="card-header bg-info">
                <h3 class="card-title">Listar Servicios </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="tabla-servicio" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>id</th>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th class="text-center">Accion</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php foreach($Oservicios as $item): ?>
                      <tr id="<?php echo $item["id_servicio"]; ?>">
                        <td class="id_oferta"><?php echo $item["id_servicio"]; ?></td>
                        <td><?php echo $item["nombre_servicio"]; ?></td>
                        <td><?php echo $item["descripcion"]; ?></td>
                  
                        <td class="d-flex justify-content-around">
                          <button type="button" class="btn btn-sm btn-info btn-editar" data-toggle="tooltip" dataplacement="top" title="Modificar"><i class="ni ni-app"></i></button>
                          <button type="button" class="btn btn-sm btn-danger btn-eliminar" data-toggle="tooltip" dataplacement="top" title="eliminarOfertas"><i class="ni ni-fat-remove"></i></button>
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
                 <h3 class="card-title">Crear Nuevo Servicio</h3>
                 <div class="card-tools">
                   <button type="button" class="btn btn-tool" data-widget="collapse">
                     <i class="fas fa-minus"></i>
                   </button>
                   <button type="button" class="btn btn-tool" data-widget="remove">
                     <i class="fas fa-times"></i>
                   </button>
                 </div>
               </div>
               <div class="card-body pt-2" >
                 <div class="info-box mb-3 bg-info" data-toggle="modal" data-target="#modal-crear-servicio">
                   <span class="info-box-icon"><i class="ni ni-single-02"></i></span>
                   <div class="info-box-content">
                     <h4 class="info-box-text pt-3">Nuevo Servcio</h4>
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




  <!-- MODAL -->
<!--MODAL PARA CREAR USUARIOS Propietario-->
  <div class="modal fade" id="modal-crear-servicio">
   <div class="modal-dialog modal-md">
     <div class="modal-content">
       <div class="modal-header">
         <h4 class="modal-title">Crear Servicios</h4>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <div class="modal-body">
         <form id="formulario-crear-servicio" class="form-horizontal" method="post" action="?action=adminservicios&function=crear"><!--ESTA ACCION DE CREARP ES PARA LLAMAR AL METODO CREAR PROPIETARIO-->
           <div class="card-body d-flex flex-wrap">
            <input type="hidden" name="rol_user" value="2"> 
             <div class="form-group col-6">
               <label>Nombre de Servicio</label>
               <input name="nombre_servicio" type="text" class="form-control" required>
             </div>
             <div class="form-group col-6">
               <label>Descripcion</label>
               <input name="descripcion_servicio" type="text" class="form-control" required>
             </div>
           </div>
           <div class="modal-footer justify-content-between">
             <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
             <button type="submit" class="btn btn-info">Enviar</button>
           </div>
         </form>
       </div>
     </div>
     <!-- /.modal-content -->
   </div>
   <!-- /.modal-dialog -->
  </div>



  <!--MODAL PARA EDITAR SERVICIOS-->
<div class="modal fade" id="modal-editar">
 <div class="modal-dialog modal-md">
   <div class="modal-content">
     <div class="modal-header">
       <h4 class="modal-title">Modificar Servicios</h4>
       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
         <span aria-hidden="true">&times;</span>
       </button>
     </div>
     <div class="modal-body">
       <form id="formulario-editar-servicio" class="form-horizontal" method="post" action="?action=adminservicios&function=modificar">
        <input type="hidden" name="id_editar" >
         <div class="card-body d-flex flex-wrap">
           <div class="form-group col-6">
             <label>Nombre del Servicio</label>
             <input type="text" class="form-control" required name="nombre_editar">
           </div>
           <div class="form-group col-6">
             <label>Descripcion</label>
             <input type="text" class="form-control" required name="descripcion_editar">
           </div>
         </div>
         <div class="d-flex justify-content-between">
           <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
           <button type="submit" class="btn btn-info">Actualizar</button>
         </div>
       </form>
     </div>
   </div>
   <!-- /.modal-content -->
 </div>
 <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


<!--MODAL PARA ELIMINAR-->
  <div class="modal fade" id="modal-eliminar">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-body text-center">
          <h5>Eliminar Servicio</h5>
        </div>
        <form id="eliminar" method="post" action="?action=adminservicios&function=eliminar">
          <input type="hidden" name="id-eliminar">
        </form>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">NO</button>
          <button type="submit" form="eliminar" class="btn btn-sm btn-success pr-3 pl-3 swalDefaultSuccess-1">SI</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->


<!--INCLUDE THE FOOTER-->
<?php require_once 'include/footer.php'; ?>
<!-- FUNCIONES AJAX PARA CARGAR INPUT AL EDITAR-->
<script src="src/js/ajax/ajax-servicios.js"></script>
<!-- JQUERY PARA VALIDAR TODOS LOS FORMULARIOS-->
<script src="src/js/validacion/validar-servicios.js"></script>
<?php require_once 'include/tabla.php' ?>
