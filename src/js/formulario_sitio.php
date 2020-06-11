<?php

if (!isset($_REQUEST["function"])) {
  $estados=sitiosController::listarController($funcion="listar-estados");
  $tipos=sitiosController::listarController($funcion="listar-tipos");
} else {
 
  if ($_REQUEST["function"]=="crear") {
      sitiosController::crearController(); 
  }

  if ($_REQUEST["function"]=="get-ciudades") {
    sitiosController::listarCiudades($funcion="listar-ciudad");
    exit();
  }

  if ($_REQUEST["function"]=="guardar-imagen") {

 $datos  = array('nombre_archivo' => $_FILES["file"]["name"], 
                'imagenTemporal' => $_FILES["file"]["tmp_name"]);


  $respuesta = gestorGaleriaController::SubirImagenController($datos); 

  exit();

  }

  /*if ($_REQUEST["function"]=="galeria") {
    gestorGaleriaController::subirGaleria();
    exit();
  }

  if ($_REQUEST["function"]=="galeriaEliminar") {
    gestorGaleriaController::eliminarGaleria();
    exit();
  }*/

}
 

  
?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>FORMULARIO SITIO</title>
  <!-- Para poder usar acentos , Ñ, entre otros -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <?php require_once 'include/css.php'; ?>

  <link rel="stylesheet" href="src/css/style_sitio.css">
  <link rel="stylesheet" type="text/css" href="src/css/buscar.css">
  <link rel="stylesheet" type="text/css" href="src/css/bootstrap.sitio.min.css">

  <link rel="stylesheet" href="src/css/dropzone.min.css">

  <link rel="stylesheet" type="text/css" href="src/css/bootstrap.wizard.min.css">

  <script src="src/js/all.min.wizard.js"></script>
  <!-- CSS archivos -->
  <!-- Bootstrap -->
</head>
<body>

  <header class="barra ">
    <div class="container-fluid">
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
          </div>     </div>
          <div class="col-4 offset-1">
            <nav class="pt-1">
              <ul class="menu d-flex flex-row  justify-content-end">
                <li><a href="?action=inicio" class="text-white">Inicio</a></li>
                <li><a href="#"  class="text-white">Ingresar</a></li>
                <li><a href="?action=Salir" class="text-white">Salir</a></li>
                <button type="button" class="boton-nav"> Tu Sitio</button>
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </header>

    <div class="container">
      <section>
        <div class="wizard">
          <div class="wizard-inner">
            <div class="connecting-line"></div>
            <ul class="nav nav-tabs justify-content-center" role="tablist">

              <li role="presentation" class="active">
                <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Datos del Sitio">
                  <span class="round-tab">
                    <i class="fas fa-folder-open"></i>
                  </span>
                </a>
              </li>

              <li role="presentation" class="disabled">
                <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="Servicios">
                  <span class="round-tab">
                    <i class="fas fa-pencil-alt"></i>
                  </span>
                </a>
              </li>
              <li role="presentation" class="disabled">
                <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab" title="Imagen">
                  <span class="round-tab">
                    <i class="fas fa-image"></i>
                  </span>
                </a>
              </li>

              <li role="presentation" class="disabled">
                <a href="#complete" data-toggle="tab" aria-controls="complete" role="tab" title="Complete">
                  <span class="round-tab">
                    <i class="fas fa-check"></i>
                  </span>
                </a>
              </li>
            </ul>
          </div>
        </div>
        <br>
      </section>
    </div>



    <form class="formulario_sitio" action="?action=formulario_sitio&function=crear" method="post" id="formulario_sitio">
      <div class="tab-content">
        <div class="tab-pane active" role="tabpanel" id="step1">
          <div class="form-group">
            <div class="container">
              <span><strong>Seleccione su tipo de sítio</strong></span>
              <select class="form-control tipo_editar" name="tipo_editar">
                <?php foreach($tipos as $item): ?>
                  <option value="<?php echo $item["id_tipo"]; ?>"><?php echo $item["nombre_tipo"]; ?></option>
                <?php endforeach ?>
              </select>
            </div>
          </div>
          <div class="container">
            <div class="row">
              <div class="col-md-4">
                <span class="text-primary"><strong>RTN</strong></span>
              </div>
              <div class="col-md-4">
                <span class="text-primary"><strong>Fecha Otorgamiento del RTN</strong></span>
              </div>
              <div class="col-md-4">
                <span class="text-primary"><strong>Rif</strong></span>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <input type="number" class="form-control" name="rtn_crear" id="rtn" placeholder="Codigo otorgado por MINTUR" required="">
              </div>
              <div class="col">
                <input type="date" class="form-control" name="fecha_crear" id="fecha_otorgamiento" placeholder="Fecha Otorgamiento del RTN" required="">
              </div>
              <div class="col">
                <input type="text" class="form-control" name="rif_crear" id="rif" placeholder="ejemplo: j-123456">
              </div>
            </div>
            <!--Fin Container-->
          </div></br>
          <!--Inicia Container-->
          <div class="container">
            <div class="row">
              <div class="col-md-4">
                <span class="text-primary"><strong>Nombre del Sitio</strong></span>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <input type="text" class="form-control" name="nombre_crear" id="nombre_sitio" placeholder="ejemplo:     POSADA CANTO DE LA BALLENA, C.A">
              </div>
            </div>
            <!--Fin Container-->
          </div><br>
          <!--Inicia Container-->
          <div class="container">

          <h4 class="text-primary"><strong>Ubicacion</strong></h4>
            <hr>
              <div class="row">

              <div class="col">
              <span class="text-primary"><strong>Estado</strong></span>
              </div>

              <div class="col">
                <span class="text-primary"><strong>Ciudad</strong></span>
              </div>

              <div class="col">
                <span class="text-primary"><strong>Latitud</strong></span>
              </div>

              <div class="col">
                <span class="text-primary"><strong>Longitud</strong></span>
              </div>

              <div class="col">
                <span class="text-primary"><strong>Licencia</strong></span>
              </div>

            </div>
           
            <div class="row">
              <div class="col">
                <select id="estados-select" class="form-control estados" name="estado_crear">
                  <?php foreach($estados as $item): ?>
                    <option value="<?php echo $item["id_estado"]; ?>"><?php echo $item["nombre_estado"]; ?></option>
                  <?php endforeach ?>
                </select>
              </div>
              <div class="col">
                <!-- select ciudades -->
                <select class="form-control ciudades" data-placeholder="Selecionar Tipo" name="ciudad_crear">
                </select>
              </div>
              <div class="col">
                <input type="text" class="form-control" name="latitud_crear" id="latitud" placeholder="Latitud">
              </div>
              <div class="col">
                <input type="text" class="form-control" name="longitud_crear" id="longitud" placeholder="Longitud">
              </div>
              <div class="col">
                <input type="text" class="form-control" name="licencia_crear" id="licencia" placeholder="Licencia">
              </div>
            </div>
            <br>

            <div class="row">
            <div class="col">
            <span class="text-primary"><strong>Direccion</strong></span>
            </div>
            </div> 
            <div class="form-group">
            
            <input class="form-control" rows="1" name="direccion_crear" id="direccion" placeholder="Direccion">
            </div>
          <!--Fin Container-->
        </div>


    <ul class="list-inline pull-right">
      <li><button type="button" class="btn btn-primary next-step">Siguiente</button></li>
    </ul>
  </div>
  <div class="tab-pane" role="tabpanel" id="step2">
        <!--Inicia Container-->
        <div class="container">
          <h4 class="text-primary"><strong>Contacto</strong></h4>
            <hr>
              <div class="row">

              <div class="col">
              <span class="text-primary"><strong>Numero de Telefono</strong></span>
              </div>

              <div class="col">
                <span class="text-primary"><strong>Correo</strong></span>
              </div>

              <div class="col">
                <span class="text-primary"><strong>Sitio Web</strong></span>
              </div>
            </div>


          <div class="row">

            <div class="col">
              <input type="text" class="form-control" name="telefono_crear" id="telefono" placeholder="Numero de Telefono">
            </div>
            <div class="col">
              <input type="email" class="form-control" name="correo_crear" id="correo" placeholder="Correo">
            </div>
            <div class="col">
              <input type="url" class="form-control" name="web_crear" id="sitio_web" placeholder="Sitio Web">
            </div>
          </div>
          <br>

          <div class="row">
               <div class="col">
                <span class="text-primary"><strong>Instagram</strong></span>
              </div>

              <div class="col">
                <span class="text-primary"><strong>Facebook</strong></span>
              </div>
          </div>

           <div class="row">

            <div class="col">
           
            <input class="form-control" rows="1" name="instagram_crear" id="instagram" placeholder="Instagram">
            </div>

          <div class="col">
       
          <input class="form-control" rows="1" name="facebook_crear" id="facebook" placeholder="Facebook">
          </div>
          </div>

      <!--Fin Container-->
    </div>
    <br>
    <!--Inicia Container-->
    <div class="container">

      <span class="text-primary"><strong>Descripcion</strong></span>
      <div class="row">
        <div class="col">
          <div class="form-group">
            <textarea type="comment" class="form-control" rows="4" id="comment" name="descripcion_crear" placeholder="Describe tu Sitio Turistico..."></textarea>
          </div>
        </div>

      </div>
      <!--Fin Container-->
    </div>



<ul class="list-inline pull-right">
  <li><button type="button" class="btn btn-default prev-step">Anterior</button></li>
  <li><button type="button" class="btn btn-primary next-step btn-final">Continuar</button></li>
</ul>
</div>
<div class="tab-pane" role="tabpanel" id="step3">

<div class="container">
<label><strong><span class="fa fa-arrow-down"></span>Arrastra aquí tu imagen (Peso recomendado: 2MB)</strong></label>
</div>


  <div action="?action=formulario_sitio&function=guardar-imagen"  class="dropzone needsclick dz-clickable" id="subirImagen">
    <div class="dz-message needsclick">
      ¡Haz Click aqui!
    </div>
    <!--<input type="hidden" value="" name="id_sitio">-->
  </div>
  <br>



  <ul class="list-inline pull-right">
    <li><button type="button" class="btn btn-default prev-step">Anterior</button></li>
    <li><button type="button" class="btn btn-default next-step">Omitir</button></li>
    <li><button type="button" name="BtnEnviar" value="Enviar" class="btn btn-primary btn-info-full next-step" form="formulario_sitio" >Guardar y Continuar</button></li>
  </ul>
</div>
</form>
<div class="tab-pane" role="tabpanel" id="complete">
  <div class="container">
    <h3>Publicacion Exitosa</h3>
    <p>Su sitio turistico ha sido publicado exitosamente.</p>
  </div>
</div>
<div class="clearfix"></div>
</div>
</div>
</section>
</div>
</div>
<!-- partial -->
<script src='src/js/jquery.wizard.min.js'></script>
<script src='src/js/bootstrap.wizard.min.js'></script>
<script src="src/js/script_sitio.js"></script>
<script src="src/js/ajax/ajax_p.js"></script>
<!--<script src="src/js/ajax/gestorGaleria.js"></script>-->
<script src="src/js/dropzone.min.js"></script>
<script src="src/js/dropzone-config.js"></script>

</body>
</html> 

