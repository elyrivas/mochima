<?php

if (!$_SESSION["validarA"]) {
   header ("location:401.php");
   exit();
}

$usuarios=UsuarioController::listarUsuarios();

if (isset($_POST["function"])=="editar") {
   UsuarioController::editarUsuario();
   exit();
}

if (isset($_GET["function"])=="crear") {
    $estatuscrear=UsuarioController::crearUsuarios();
}

if (isset($_GET["function"])=="eliminar") {
   $estatuseliminar=UsuarioController::eliminarUsuarios();
}

if (isset($_GET["function"])=="modificar") {
   
   if (UsuarioController::modificarUsuarios()) {
     header("location:index.php?action=adminusuarios");
   }
}


?>  
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Mochima | Usuarios</title>
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
            <h1 class="m-0 text-dark">Administrar usuarios</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php?action=dashboard">Inicio</a></li>
              <li class="breadcrumb-item active">Usuarios</li>
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

            <div class="col-8 ui-sortable-handle">
               <div class="card">
                  <div class="card-header bg-info">
                     <h3 class="card-title">Listado de Usuarios</h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body col-12">
                     <table id="tabla-usuarios" class="table table-bordered table-striped col-12">
                        <thead>
                           <tr>
                              <th>ID</th>
                              <th>Tipo</th>
                              <th>Nombre</th>
                              <th>Apellido</th>
                              <th>Usuario</th>
                              <th>Correo</th>
                              <th class="text-center">Accion</th>
                           </tr>
                        </thead>
                        <tbody>
                        <?php foreach($usuarios as $item): ?>
                        	<tr id="<?php echo $item["id_usuario"]; ?>">
                        		<td class="id-usuairo"><?php echo $item["id_usuario"]; ?></td>
                            <td class="rol-usuairo">
                              <?php if ($item["rol"]=="1") {
                                  echo 'Administrador';
                              } elseif ($item["rol"]=="2") {
                                  echo 'Propietario';
                              }?>
                            </td>
                            <td><?php echo $item["nombre"]; ?></td>
                            <td><?php echo $item["apellido"]; ?></td>
                            <td><?php echo $item["usuario"]; ?></td>
                      		  <td><?php echo $item["correo"]; ?></td>
                            <td class="d-flex justify-content-around">
                               <button type="button" class="btn btn-sm btn-info btn-editar" data-toggle="tooltip" dataplacement="top" title="Modificar"><i class="ni ni-app"></i></button>
                               <button type="button" class="btn btn-sm btn-danger btn-eliminar" data-toggle="tooltip" dataplacement="top" title="Eliminar"><i class="ni ni-fat-remove"></i></button>
                            </td>
                        	</tr>
                        <?php endforeach ?>
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>

            <div class="col-4 ">

             <!-- Horizontal Form -->
             <div class="card card-info">
               <div class="card-header">
                 <h3 class="card-title">Crear Nuevos Usuarios</h3>
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
                 <div class="info-box mb-3 bg-info" data-toggle="modal" data-target="#modal-crear-propietario">
                   <span class="info-box-icon"><i class="ni ni-single-02"></i></span>
                   <div class="info-box-content">
                     <h4 class="info-box-text pt-3">Propietario de Sitio</h4>
                   </div>
                 </div>
                 <div class="info-box mb-3 bg-info" data-toggle="modal" data-target="#modal-crear">
                   <span class="info-box-icon"><i class="ni ni-world-2"></i></span>
                   <div class="info-box-content">
                     <h4 class="info-box-text pt-3">Administrador</h4>
                   </div>
                 </div>
               </div>
             </div>
           </div>

         </div>
      </div>
      </section>
  </div>



  <!--MODAL PARA CREAR USUARIOS ADMINISTRADOR-->
  <div class="modal fade" id="modal-crear">
   <div class="modal-dialog modal-md">
     <div class="modal-content">
       <div class="modal-header">
         <h4 class="modal-title">Crear Usuario Administrador</h4>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <div class="modal-body">
         <form id="formulario-crear-admin" class="form-horizontal" method="post" action="?action=adminusuarios&function=crear">
           <div class="card-body d-flex flex-wrap">
                <input type="hidden" name="rol_user" value="1">
             <div class="form-group col-6">
               <label>Nombre de usuario</label>
               <input name="nombre_admin" type="text" class="form-control" required>
             </div>
             <div class="form-group col-6">
               <label>Apellido</label>
               <input name="apellido_admin" type="text" class="form-control" required>
             </div>
             <div class="form-group col-6">
               <label>Correo</label>
               <input id="email-crear-admin" name="email_admin" type="email" class="form-control" required>
             </div>
             <div class="form-group col-6">
               <label>Direccion</label>
               <input name="direccion_admin" type="text" class="form-control" required>
             </div>
             <div class="form-group col-6">
               <label>Telefono</label>
               <input name="telefono_admin" type="tel" class="form-control" required>
             </div>
             <div class="form-group col-6">
               <label>Usuario</label>
               <input name="usuario_admin" type="text" class="form-control" required>
             </div>
             <div class="form-group col-6">
               <label>Contraseña</label>
               <input name="password_admin" type="password" class="form-control" required id="password-admin">
             </div>
             <div class="form-group col-6">
               <label>Repetir Contraseña</label>
               <input name="password_repeat" type="password" class="form-control" required id="password-repeat-admin" equalTo="password">
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


  <!--MODAL PARA CREAR USUARIOS Propietario-->
  <div class="modal fade" id="modal-crear-propietario">
   <div class="modal-dialog modal-md">
     <div class="modal-content">
       <div class="modal-header">
         <h4 class="modal-title">Crear Usuario Propietario</h4>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <div class="modal-body">
         <form id="formulario-crear-propietario" class="form-horizontal" method="post" action="?action=adminusuarios&function=crear"><!--ESTA ACCION DE CREARP ES PARA LLAMAR AL METODO CREAR PROPIETARIO-->
           <div class="card-body d-flex flex-wrap">
            <input type="hidden" name="rol_user" value="2"> 
             <div class="form-group col-6">
               <label>Nombre de usuario</label>
               <input name="nombre_propietario" type="text" class="form-control" required>
             </div>
             <div class="form-group col-6">
               <label>Apellido</label>
               <input name="apellido_propietario" type="text" class="form-control" required>
             </div>
             <div class="form-group col-6">
               <label>Correo</label>
               <input name="email_propietario" type="email" class="form-control" required>
             </div>
             <div class="form-group col-6">
               <label>Direccion</label>
               <input name="direccion_propietario" type="text" class="form-control" required>
             </div>
             <div class="form-group col-6">
               <label>Telefono</label>
               <input name="telefono_propietario" type="tel" class="form-control" required>
             </div>
             <div class="form-group col-6">
               <label>Usuario</label>
               <input name="usuario_propietario" type="text" class="form-control" required>
             </div>
             <div class="form-group col-6">
               <label>Contraseña</label>
               <input id="password-propietario" name="password_propietario" type="password" class="form-control" required id="password">
             </div>
             <div class="form-group col-6">
               <label>Repetir Contraseña</label>
               <input name="password_repeat_prop" type="password" class="form-control" required id="password-repeat-prop" equalTo="password">
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



<!--MODAL PARA EDITAR USUARIOS-->
<div class="modal fade" id="modal-editar">
 <div class="modal-dialog modal-md">
   <div class="modal-content">
     <div class="modal-header">
       <h4 class="modal-title">Modificar Usuarios</h4>
       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
         <span aria-hidden="true">&times;</span>
       </button>
     </div>
     <div class="modal-body">
       <form id="formulario-editar-usuarios" class="form-horizontal" method="post" action="?action=adminusuarios&function=modificar">
        <input type="hidden" name="id_editar" >
         <div class="card-body d-flex flex-wrap">
           <div class="form-group col-6">
             <label>Nombre </label>
             <input type="text" class="form-control" required name="nombre_editar">
           </div>
           <div class="form-group col-6">
             <label>Apellido</label>
             <input type="text" class="form-control" required name="apellido_editar">
           </div>
           <div class="form-group col-6">
             <label>Direccion</label>
             <input type="text" class="form-control" required name="direccion_editar">
           </div>
           <div class="form-group col-6">
             <label>Telefono</label>
             <input type="text" class="form-control" required name="telefono_editar">
           </div>
           <div class="form-group col-6">
             <label>Correo</label>
             <input type="text" class="form-control" required name="email_editar">
           </div>
           <div class="form-group col-6">
             <label>Usuario</label>
             <input type="text" class="form-control" required name="usuario_editar">
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
          <h5>Eliminar Usuario</h5>
        </div>
        <form id="eliminar" method="post" action="?action=adminusuarios&function=eliminar">
          <input type="text" name="id-eliminar">
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
<?php require_once 'include/footer.php';?>
<script src="src/js/ajax/ajax-usuarios.js"></script>
<!-- JQUERY PARA VALIDAR TODOS LOS FORMULARIOS-->
<script src="src/js/validacion/validar-usuarios.js"></script>
<?php require_once 'include/tabla.php'?>
