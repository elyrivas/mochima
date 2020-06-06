<?php

if (!$_SESSION["validarA"]) {
   header ("location:index.php?action=inicio");
   exit();
}


if (isset($_GET['function'])) {
  if ($_GET['function'] == 'reporte_usuarios') {
    UsuarioController::generarReporteUsuarios();
    exit();
  }
}

if (isset($_GET['function'])) {
  if ($_GET['function'] == 'reporte_sitios') {
    sitiosController::generarReporteSitios();
    }
  }

  if (isset($_GET['function'])) {
  if ($_GET['function'] == 'reporte_ofertas') {
    OfertaController::generarReporteOfertas();
    }
  }


?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Mochima | Reportes</title>
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
            <h1 class="m-0 text-dark">Reportes</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php?action=dashboard">Inicio</a></li>
              <li class="breadcrumb-item active">Reportes</li>
            </ol>
          </div><!-- /.col -->

          
        </div><!-- /.row -->

         <!-- Usuarios -->
        <div class="row">

          <div class="col-3">
            <div class="card">
              <div class="card-header bg-info">
                <h2 class="card-title">Usuarios</h2>
              </div>
                  
                  
                     <img src="src/img/pdf.png"> 
                 
    
          
                  <div class="card-footer clearfix">
                  <a href="?action=adminreportes&function=reporte_usuarios" target="_blank" class="btn btn-sm btn-secondary float-right">Imprimir</a>
                    </div>
                  

                
              </div><!-- /.card-body -->
            </div><!-- /.card -->


            <div class="col-3">
            <div class="card">
              <div class="card-header bg-info">
                <h2 class="card-title">Sitios Turísticos</h2>
              </div>
                  
                  
                     <img src="src/img/pdf.png"> 
                 
    
          
               <div class="card-footer clearfix">
                <a href="?action=adminreportes&function=reporte_sitios" target="_blank"  class="btn btn-sm btn-secondary float-right">Imprimir</a>
                 </div>
              </div> 
           </div>
            
            <div class="col-3">
            <div class="card">
              <div class="card-header bg-info">
                <h2 class="card-title">Ofertas</h2>
              </div>
                  
                  
                     <img src="src/img/pdf.png"> 
                 
    
          
                  <div class="card-footer clearfix">
                  <a href="?action=adminreportes&function=reporte_ofertas" target="_blank"  class="btn btn-sm btn-secondary float-right">Imprimir</a>
                    </div>
                 

                
              </div><!-- /.card-body -->
            </div><!-- /.card -->
          </div> <!-- Fin row -->


      </div>
    </div>
  </div><!-- /.container-fluid -->

 </div>


<!--INCLUDE THE FOOTER-->
<?php require_once 'include/footer.php'; ?>
<?php require_once 'include/tabla.php' ?>

<style>
    img {
      width: 60px;
      margin:10px auto;
      display:block;
      
    }
   </style>
   