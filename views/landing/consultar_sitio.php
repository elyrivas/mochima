<?php

if (!$_SESSION["validar"]) {
   header ("location:index.php?action=inicio");
   exit();
}

  $sitios=sitiosController::listarController($funcion="listar-ultimos");
 



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

<header class="barra ">
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
         <nav class="pt-1 pr-4">
             <ul class="menu d-flex flex-row  justify-content-end">
               <li><a href="index.php" class="text-white">Inicio</a></li>
                <li><a class="text-white" href="?action=explorer">Explorar</a></li>
              <?php if (isset($_SESSION["validar"])): ?>
                <li><a class="text-white" href="?action=perfil">Perfil</a></li>
              <?php endif; ?>
              <?php if (!isset($_SESSION["validar"])&&!isset($_SESSION["validarA"])): ?>
                <li><a class="text-white" href="#" data-toggle="modal" data-target="#modal-2">Ingresar</a></li>
                <li><a class="text-white" href="#" data-toggle="modal" data-target="#modal">Registro</a></li>
              <?php endif; ?>
              <?php if (isset($_SESSION["validarA"])): ?>
                <li><a class="text-white" href="?action=dashboard">Panel</a></li>
              <?php endif; ?>
                <li><a class="text-white" href="?action=contacto">Contactos</a></li>
                <li><a class="text-white" href="?action=salir">Salir</a></li>
             </ul>
         </nav>
      </div>
   </div>
</header>

 <div class="title"></div>

    <div class="container cartas">
       <div class="card-group">
          <div id="card-sitio"  class="card">
            
            <div class="iconos">
          
            <img src="src/img/hot6.jpg">
            <?php foreach($sitios as $item): ?>
            <input type="hidden" id="<?php echo $item["rtn"]; ?>">
            <h5 class="p-3" href="#"><?php echo $item["nombre_sitio"]; ?> <i class="fas fa-home text-primary"></i>
			     </h5>
           <p  href="#"><?php echo $item["descripcion"]; ?></p>
           <?php endforeach ?>
        	 </div>
            
    <a href="#">
          <button type="button" class="btn btn-outline-primary  btn-modificar" title="Modificar"><i class="far fa-edit"></i></button>

			    <button type="button" class="btn btn-outline-primary"><i class="far fa-eye"></i></button>

			    <button type="button" class="btn btn-outline-primary"><i class="far fa-trash-alt"></i></button>
			</a>

        </div>

       </div>
    </div>

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
        <form id="formulario-editar-sitio" class="form-horizontal" method="post" action="?action=consultar_sitio&function=modificar">
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
              <select class="form-control tipo_editar" name="tipo_editar">
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
              <select id="estatus-select" class="form-control estatus_editar" data-placeholder="Selecionar Tipo" name="estatus_editar">      
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

<!-- Llamando a los archivos js, desde la carpeta -->
<script>
 //ESTA VAINA FUNCIONA PARA MODIFICAR SITIOS
function editarsitio(sitio_rtn){
  var url = "?action=consultar_sitio"
  $.ajax({
    url: url,
    type: 'POST', //metodo de la peticion
    dataType: 'json',//tipo de dato de la respuesta
    data: {rtn_sitio: sitio_rtn,function:"consultar"},
    success: function(respuesta){
      if (respuesta.data) {
        $("input[name=id_editar]").val(respuesta.data.id_sitio);
        $("input[name=tipo_editar]").val(respuesta.data.tipo_id);
        $("input[name=nombre_editar]").val(respuesta.data.nombre_sitio);
        $("input[name=rtn_editar]").val(respuesta.data.rtn);
        $("input[name=fecha_editar]").val(respuesta.data.fecha_otorgamiento_rtn);
        $("input[name=rif_editar]").val(respuesta.data.rif);
        $("input[name=telefono_editar]").val(respuesta.data.telefono_sitio);
        $("input[name=correo_editar]").val(respuesta.data.email);
        $("input[name=facebook_editar]").val(respuesta.data.facebook);
        $("input[name=instagram_editar]").val(respuesta.data.instagram);
        $("input[name=web_editar]").val(respuesta.data.sitioweb);
        $("input[name=licencia_editar]").val(respuesta.data.num_licencia);
        $("input[name=latitud_editar]").val(respuesta.data.latitud);
        $("input[name=longitud_editar]").val(respuesta.data.longitud);
        $("select[name=estado_editar]").val(respuesta.data.estado_id);
        $("input[name=habitacion_editar]").val(respuesta.data.num_habitacion);
        $("input[name=licencia_editar]").val(respuesta.data.num_licencia);
        $("input[name=direccion_editar]").val(respuesta.data.direccion_sitio);
        $("textarea[name=descripcion_editar]").val(respuesta.data.descripcion);

        var estado_id=respuesta.data.estado_id
        ciudades(estado_id, $(".ciudades_editar"), respuesta.data.ciudad_id );
        $('#modal-modificar').modal("show")
      }else{
        alert("error")
      }
    },
    error: function() {
      console.log("No se ha podido obtener la información");
    }
  })
};


$("#card-sitio").on('click', 'button.btn-modificar', function() {
  var sitio_rtn=$(this).parents("input").attr("id");
  editarsitio(sitio_rtn)
  
});

$(".estados_editar").change(function() {
  var estado_id=$(this).val()
  var ciudades_element=$(".ciudades_editar")
  ciudades(estado_id,ciudades_element);
});

//AQUI TERMINA ESTA VAINA DE MOFICAR 



</script>
<script src="src/js/jquery-3.4.1.min.js"></script>
<script src="src/js/popper.min.js"></script>
<script src="src/js/bootstrap.min.js"></script>
<script src="src/js/all.min.js"></script>

</body>
</html>
