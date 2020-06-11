<?php

if (!$_SESSION["validarA"]) {
   header ("location:401.php");
   exit();
}

$usuarios=UsuarioController::listarUltimosUsuarios();
$usuariosTotal=UsuarioController::contarUsuarios();
$ofertasTotal=OfertaController::contarOfertas($funcion="listar-ofertas");
$sitios=sitiosController::listarController($funcion="listar-ultimos");
$sitiosTotal=sitiosController::listarController($funcion="listar-total");

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Mochima | Dashboard</title>
  <?php require_once 'include/css.php'; ?>
</head>
  <?php require_once 'include/head.php'; ?> <!-- ESTE ARCHIVO CONTIENE LA ETIQUETA BODY Y EL MENU DE NAVEGACION-->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Panel de Control</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Inicio</a></li>
              <li class="breadcrumb-item active">Panel de Control</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

        <!-- Main row -->
        <div class="row">

          <!-- Left col -->
          <section class="col-lg-7 connectedSortable">


            <div class="card">
              <div class="card-header d-flex p-0">
                <h3 class="card-title p-3">
                  <i class="fas fa-chart-pie mr-1"></i>
                  Estado
                </h3>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content p-0">
                  <!-- Morris chart - Sales -->
                  <div class="chart tab-pane active" id="revenue-chart"
                       style="position: relative; height: 300px;">
                      <canvas id="revenue-chart-canvas" height="300" style="height: 300px;"></canvas>
                   </div>
                </div>
              </div><!-- /.card-body -->
            </div>


            <div class="card">
              <div class="card-header border-info bg-info">
                <h3 class="card-title">
                  <i class="ni ni-compass-04"></i>
                  Sitios Turisticos
                </h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table m-0">
                    <thead>
                      <tr>
                        <th>RTN</th>
                        <th>Nombre</th>
                        <th>Codigo</th>
                        <th>Dirección</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach($sitios as $item): ?>
                        <tr>
                          <td><?php echo $item["rtn"]; ?></td>
                          <td><?php echo $item["nombre_sitio"]; ?></td>
                          <td><?php echo $item["rif"]; ?></td>
                          <td><?php echo $item["direccion_sitio"]; ?></td>
                        </tr>
                      <?php endforeach ?>
                    </tbody>
                  </table>
                </div>
                <!-- /.table-responsive -->
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <a href="?action=adminsitio" class="btn btn-sm btn-secondary float-right">Ver Todos</a>
              </div>
              <!-- /.card-footer -->
            </div>


            <div class="card">
              <div class="card-header bg-info border-info">
                <h3 class="card-title">
                  <i class="ni ni-single-02"></i>
                  Usuarios Registrados
                </h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-widget="remove"><i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <ul class="users-list clearfix">
                  <?php foreach($usuarios as $item): ?>
                    <li style="width: 12%;">
                      <img src="src/img/user1-128x128.jpg" alt="User Image">
                      <a class="users-list-name" href="#"><?php echo $item["nombre"]; ?></a>
                      <span class="users-list-date"><?php echo $item["id_usuario"]; ?></span>
                    </li>
                  <?php endforeach ?>
                </ul>
                <!-- /.users-list -->
              </div>
              <!-- /.card-body -->
              <div class="card-footer text-center">
                <a href="?action=adminusuarios">Ver Todos</a>
              </div>
              <!-- /.card-footer -->
            </div>
          </section>
          <!-- /.Left col -->

          <!-- right col-->
          <section class="col-lg-5 connectedSortable">


            <div class="card ">
              <div class="card-header no-border">

                <h3 class="card-title">
                  Estadisticas
                </h3>
              </div>
              <!-- /.card-header -->

              <div class="card-body pt-2">
                <div class="info-box mb-3 bg-info">
                  <span class="info-box-icon"><i class="ni ni-single-02"></i></span>

                  <div class="info-box-content">
                    <span class="info-box-text">Prestadores de servicios</span>
                    <span class="info-box-number"><?php echo $usuariosTotal; ?></span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <div class="info-box mb-3 bg-info">
                  <span class="info-box-icon"><i class="ni ni-square-pin"></i></span>

                  <div class="info-box-content">
                    <span class="info-box-text">Sitios Turisticos</span>
                    <span class="info-box-number"><?php echo $sitiosTotal; ?></span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                  <!-- /.info-box -->
                <div class="info-box mb-3 bg-info">
                  <span class="info-box-icon"><i class="ni ni-like-2"></i></span>

                  <div class="info-box-content">
                    <span class="info-box-text">Ofertas</span>
                    <span class="info-box-number"><?php echo $ofertasTotal; ?></span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
              <!-- /.info-box -->
              </div>
              <!-- /.card-body -->
            </div>

            <div class="card bg-gradient-info">
              <div class="card-header no-border">
                <h3 class="card-title">
                  <i class="fas fa-map-marker-alt mr-1"></i>
                  Visitas
                </h3>
                <!-- card tools -->
                <div class="card-tools">

                  <button type="button"
                          class="btn btn-info btn-sm"
                          data-widget="collapse"
                          data-toggle="tooltip"
                          title="Collapse">
                    <i class="fas fa-minus"></i>
                  </button>

                  <button type="button"
                          class="btn btn-info btn-sm"
                          data-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <div class="card-body">
                <div id="world-map" style="height: 250px; width: 100%;"></div>
              </div>
              <!-- /.card-body-->
              <div class="card-footer bg-transparent">
                <div class="row">
                  <div class="col-4 text-center ">
                    <div id="sparkline-1"></div>
                    <div class="text-white">Lorem</div>
                  </div>
                  <!-- ./col -->
                  <div class="col-4 text-center">
                    <div id="sparkline-2"></div>
                    <div class="text-white">Lorem</div>
                  </div>
                  <!-- ./col -->
                  <div class="col-4 text-center">
                    <div id="sparkline-3"></div>
                    <div class="text-white">Lorem</div>
                  </div>
                  <!-- ./col -->
                </div>
                <!-- /.row -->
              </div>
            </div>

            <!-- PRODUCT LIST -->
            <div class="card">
              <div class="card-header bg-info border-info">
                <h3 class="card-title">
                  <i class="ni ni-like-2"></i>
                  Publicaciones Recientes
                </h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <ul class="products-list product-list-in-card pl-2 pr-2">
                  <li class="item">
                    <div class="product-img">
                      <img src="src/img/default-150x150.png" alt="Product Image" class="img-size-50">
                    </div>
                    <div class="product-info">
                      <a href="#" class="product-title">Canaima</a>
                      <span class="product-description">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                      </span>
                    </div>
                  </li>
                  <!-- /.item -->
                  <li class="item">
                    <div class="product-img">
                      <img src="src/img/default-150x150.png" alt="Product Image" class="img-size-50">
                    </div>
                    <div class="product-info">
                      <a href="#" class="product-title">Caracas</a>
                      <span class="product-description">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                      </span>
                    </div>
                  </li>
                  <!-- /.item -->
                  <li class="item">
                    <div class="product-img">
                      <img src="src/img/default-150x150.png" alt="Product Image" class="img-size-50">
                    </div>
                    <div class="product-info">
                      <a href="#" class="product-title">Cubiro</a>
                      <span class="product-description">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                      </span>
                    </div>
                  </li>
                  <!-- /.item -->
                </ul>
              </div>
              <!-- /.card-body -->
              <div class="card-footer text-center">
                <a href="#" class="uppercase">View All Products</a>
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </section>
          <!-- right col -->

        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<!--INCLUDE OF HEAD AND META-->
<?php require_once 'include/footer.php'; ?>
