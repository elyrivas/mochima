

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed sidebar-collapse">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light border-bottom bg-info">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index.php?action=inicio" class="nav-link">Inicio</a>
      </li>
    </ul>


    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">



    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link bg-info">
      <img src="src/img/Logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Mochima</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="src/img/user3-128x128.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $_SESSION["nombre_usuario"]; ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview ">
            <a href="index.php?action=dashboard" class="nav-link <?php if ($_GET["action"]=="dashboard") {echo "bg-info active";} ?>">
              <i class="nav-icon ni ni-tv-2 text-white "></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="index.php?action=adminsitio" class="nav-link <?php if ($_GET["action"]=="adminsitio") {echo "bg-info active";} ?>">
              <i class="nav-icon ni ni-map-big"></i>
              <p>
                Sitios Turisticos
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="index.php?action=adminofertas" class="nav-link <?php if ($_GET["action"]=="adminofertas") {echo "bg-info active";} ?>">
              <i class="nav-icon ni ni-diamond"></i>
              <p>
                Ofertas
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="index.php?action=adminservicios" class="nav-link <?php if ($_GET["action"]=="adminservicios") {echo "bg-info active";} ?>">
              <i class="nav-icon ni ni-controller"></i>
              <p>
                Servicios
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="index.php?action=adminusuarios" class="nav-link <?php if ($_GET["action"]=="adminusuarios") {echo "bg-info active";} ?>">
              <i class="nav-icon ni ni-single-02"></i>
              <p>
                Usuarios
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="index.php?action=adminbitacora" class="nav-link <?php if ($_GET["action"]=="adminbitacora") {echo "bg-info active";} ?>">
              <i class="nav-icon ni ni-archive-2"></i>
              <p>
                Bitacora
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="index.php?action=adminreportes" class="nav-link <?php if ($_GET["action"]=="adminreportes") {echo "bg-info active";} ?>">
              <i class="nav-icon ni ni-book-bookmark"></i>
              <p>
                Reportes
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="?action=salir" class="nav-link">
              <i class="nav-icon ni ni-button-power"></i>
              <p>
                Salir
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
