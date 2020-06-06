<?php

if (!$_SESSION["validarA"]) {
   header ("location:index.php?action=inicio");
   exit();
}

$oferta= OfertaController::listarOfertas();
$sitios=sitiosController::listarController($funcion="listar-sitios");

if (isset($_GET["function"])=="eliminar") {
    OfertaController::eliminarOfertas();
}


?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Mochima | Ofertas</title>
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
            <h1 class="m-0 text-dark">Ofertas</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php?action=dashboard">Inicio</a></li>
              <li class="breadcrumb-item active">Ofertas</li>
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

          <div class="col-12">
            <div class="card">
              <div class="card-header bg-info">
                <h3 class="card-title">Listar Ofertas </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="tabla-ofertas" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>id</th>
                    <th>Titulo</th>
                    <th>Precio</th>
                    <th>Sitio turistico</th>
                    <th>Descripcion</th>
                    <th class="text-center">Accion</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php foreach($oferta as $item): ?>
                          <tr id="<?php echo $item["id_oferta"]; ?>">
                            <td class="id_oferta"><?php echo $item["id_oferta"]; ?></td>
                            <td><?php echo $item["nombre_oferta"]; ?></td>
                            <td><?php echo $item["precio"]; ?></td>                 
                            <td><?php echo $item["nombre_sitio"]; ?></td>
                            <td><?php echo $item["descripcion"]; ?></td>
                      
                            <td class="d-flex justify-content-around">
                            
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

        </div>
        <!-- Fin contenido principal-->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->






  </div>

  <!--MODAL PARA ELIMINAR-->
  <div class="modal fade" id="modal-eliminar">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-body text-center">
          <h5>Eliminar Ofertas</h5>
        </div>
        <form id="eliminarOfertas" method="post" action="?action=adminofertas&function=eliminar">
          <input type="hidden" name="id-eliminar" >
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">NO</button>
          <button type="submit" form="eliminarOfertas" class="btn btn-sm btn-success pr-3 pl-3 ">SI</button>
        </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.MODAL ELIMINAR-->






<!--INCLUDE THE FOOTER-->

<?php require_once 'include/footer.php'; ?>
<script src="src/js/ajax/ajax-ofertas.js"></script>
<?php require_once 'include/tabla.php' ?>
