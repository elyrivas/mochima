<?php
   $ingreso = new UsuarioController();
   $ingreso -> ingresoController();

   if (isset($_POST["usuario_crear"])) {
      $usuariocrear=UsuarioController::registroUsuario();
   }
   if (isset($_POST["emailRe"])) {
      $usuariorecuperar=UsuarioController::recuperarContraseña();
   }

   $OSitios=sitiosController::listarController($funcion="listar-sitios");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mochima | Inicio</title>
   <!-- Favicon -->
   <link href="src/img/flav.png" rel="icon" type="image/png">
   <!-- Theme style -->
   <link rel="stylesheet" href="src/css/adminlte.min.css">
   <!--ESTILOS PROPIOS-->
   <link rel="stylesheet" type="text/css" href="src/css/styles.css">
   <link rel="stylesheet" type="text/css" href="src/css/styles-1.css">
   <!--ICONOS-->
   <link href="plugins/nucleo/css/nucleo.css" rel="stylesheet" />
   <link href="plugins/toastr/toastr.min.css" rel="stylesheet">

   <!-- SweetAlert2 -->
   <link rel="stylesheet" href="plugins/sweetalert2/sweetalert2.min.css">
   <!-- Toastr -->
   <link rel="stylesheet" href="plugins/toastr/toastr.min.css">
</head>

<body>
	<!--MENU-->
	<header style="z-index: 111;">
		 <img  class="logo-1" src="src/img/Logo.png" alt="logo" width="80" height="70">		<div >
			<nav class="">
	            <li><a href="?action=explorer">Explorar</a></li>
	            <?php if (isset($_SESSION["validar"])): ?>
	               <li><a class="text-white" href="?action=misitio">Mis Sitios</a></li>
	            <?php endif; ?>
	            <?php if (!isset($_SESSION["validar"])&&!isset($_SESSION["validarA"])): ?>
	               <li><a class="text-white inicio-ocultar" href="#" data-toggle="modal" data-target="#modal-2">Ingresar</a></li>
	               <li><a class="text-white" href="#" data-toggle="modal" data-target="#modal">Registro</a></li>
	            <?php endif; ?>
	            <?php if (isset($_SESSION["validarA"])): ?>
	               <li><a class="text-white" href="?action=dashboard">Panel</a></li>
	            <?php endif; ?>
	            <li><a class="text-white" href="?action=salir">Salir</a></li>
			</nav>
		</div>
	</header>
	<!--FIN MENU-->

	<!--HERO-->
	<section class="hero section-1" style="z-index: 100;">
		<div class="background-image" style="background-image: url(src/img/fondo.png);"></div>
		<div class=" mt-5 mb-5" style="z-index: 100;">
			<h1 style="font-size: 80px;">VENEZUELA</h1>
			<h3>Descubrela con nosotros</h3>
		</div>
		<div class="input-group input-group col-6">
          <input type="text" class="form-control" placeholder="Mochima">
          <span class="input-group-append">
            <button type="button" class="btn btn-info btn-flat ">Buscar</button>
          </span>
        </div>
	</section>
	<div class="container-fluid">
		<div class="row ">
			<div class="col-2 offset-3 d-flex justify-content-center align-items-center flex-column mt-5 mb-5 " style="border-right: 3px solid #169fb5;">
				<div>
					<h1><i class="ni ni-square-pin text-info"></i></h1>
				</div>
				<div>
					<a href=""><span class="text-category">Alojamientos</span></a>
				</div>
			</div>
			<div class="col-2 d-flex justify-content-center align-items-center flex-column mt-5 mb-5 " style="border-right: 3px solid #169fb5;">
				<div>
					<h1><i class="ni ni-shop text-info"></i></h1>
				</div>
				<div>
					<a href="#"><span class="text-category">Alimentos y Bebidas</span></a>
				</div>
			</div>
			<div class="col-2 d-flex justify-content-center align-items-center flex-column mt-5 mb-5 ">
				<div>
					<h1><i class="ni ni-pin-3 text-info"></i></h1>
				</div>
				<div>
					<a href="#"><span class="text-category">Recreacion</span></a>
				</div>
			</div>
		</div>
	</div>
	<!--FIN CATEGORIAS-->

	<!-- GALERIA -->
	<section class="section-2 our-work">
		<div class="grid">
			<div class="small contenedor-info" style="background-image: url(src/img/coast.jpg);">
				<span class="info-local">
					<h4><?php echo $OSitios ["0"]["nombre_sitio"]; ?></h4>
					<span class="direccion"><?php echo $OSitios ["0"]["nombre_ciudad"]; ?>, <?php echo $OSitios ["0"]["nombre_estado"]; ?></span>
				</span>
				<span class="precio">100$</span>
			</div>
			<div class="small">
				<div class="contenedor" style="background-color: #1AB6DF;">
					<span class="text-center centrar">Los sitios mas <br>visitados en Lara</span>
					<button class="boton"><a href="#">Ver sitios</a></button>
				</div>
			</div>
			<div class="medium contenedor-info" style="background-image: url(src/img/hero.jpg);">
				<span class="info-local">
					<h4><?php echo $OSitios ["1"]["nombre_sitio"]; ?></h4>
					<span class="direccion"><?php echo $OSitios ["1"]["nombre_ciudad"]; ?>, <?php echo $OSitios ["1"]["nombre_estado"]; ?></span>
				</span>
				</span>
				<span class="precio">100$</span>
			</div>

			<div class="medium contenedor-info" style="background-image: url(src/img/mountain.jpg);">
				<span class="info-local">
					<h4><?php echo $OSitios ["2"]["nombre_sitio"]; ?></h4>
					<span class="direccion"><?php echo $OSitios ["2"]["nombre_ciudad"]; ?>, <?php echo $OSitios ["2"]["nombre_estado"]; ?></span>
				</span>
				</span>
				<span class="precio">100$</span>
			</div>
			<div class="small contenedor-info" style="background-image: url(src/img/palmera.jpg);">
				<span class="info-local">
					<h4><?php echo $OSitios ["3"]["nombre_sitio"]; ?></h4>
					<span class="direccion"><?php echo $OSitios ["3"]["nombre_ciudad"]; ?>, <?php echo $OSitios ["3"]["nombre_estado"]; ?></span>
				</span>
				</span>
				<span class="precio">100$</span>
			</div>
			<div class="small contenedor-info" style="background-image: url(src/img/balloon.jpg);">
				<span class="info-local">
					<h4><?php echo $OSitios ["4"]["nombre_sitio"]; ?></h4>
					<span class="direccion"><?php echo $OSitios ["4"]["nombre_ciudad"]; ?>, <?php echo $OSitios ["4"]["nombre_estado"]; ?></span>
				</span>
				</span>
				<span class="precio">100$</span>
			</div>

			<div class="small contenedor-info" style="background-image: url(src/img/surf.jpg);">
				<span class="info-local">
					<h4><?php echo $OSitios ["5"]["nombre_sitio"]; ?></h4>
					<span class="direccion"><?php echo $OSitios ["5"]["nombre_ciudad"]; ?>, <?php echo $OSitios ["5"]["nombre_estado"]; ?></span>
				</span>
				</span>
				<span class="precio">100$</span>
			</div>
			<div class="medium " style="background-image: url(src/img/relleno.jpg);"></div>

			<div class="small contenedor-info" style="background-image: url(src/img/hero.jpg);">
				<span class="info-local">
					<h4><?php echo $OSitios ["6"]["nombre_sitio"]; ?></h4>
					<span class="direccion"><?php echo $OSitios ["6"]["nombre_ciudad"]; ?>, <?php echo $OSitios ["6"]["nombre_estado"]; ?></span>
				</span>
				</span>
				<span class="precio">100$</span>
			</div>

			<div class="small contenedor-info" style="background-image: url(src/img/coast.jpg);">
				<span class="info-local">
					<h4>El Chague</h4>
					<span class="direccion">Duaca, Lara</span>
				</span>
				<span class="precio">100$</span>
			</div>
			<div class="large contenedor-info" style="background-image: url(src/img/mountain.jpg);">
				<span class="info-local">
					<h4>El Chague</h4>
					<span class="direccion">Duaca, Lara</span>
				</span>
				<span class="precio">100$</span>
			</div>
		</div>
	</section>
	<!-- FIN GALERIA -->

	<!-- COMO USAR -->
	<!--
	Esta parte es para explicar como funciona el sistema algo corto

		- Encuentra y publica de forma rapida y segura tus sitios turisticos.
		- Publica tus sitios turisticos sin pagar comisiones.
		- Valora tu experiencia en algun siio turisticos.
		- Reserva en tus sitios preferidos.
		- Encuentra el mejor sitio turistico para ti y tu famila.
	-->
	<section class="section-3">
		<div class="container-fluid">
			<div class="row">

				<div class="col-4 offset-1 alto">

					<div>
						<h3 class="">Qué es <span class="este">Mochima.com.ve</span></h3>
						<span class="secundario">Encuentra y publica de forma rapida y segura tus sitios turisticos.</span>
					</div>

					<div class="info-content">
						<div class="info-1 mt-5">

							<span>
								<i class="ni ni-favourite-28 text-info" style="font-size: 30px;"></i>
							</span>
							<span class="info">Publica tus sitios turisticos sin pagar comisiones.</span>
							

						</div>
						<div class="info-1 mt-3">

							<span>
								<i class="ni ni-like-2 text-info" style="font-size: 30px;"></i>
							</span>
							<span class="info">Valora tu experiencia en algun sitio turisticos.</span>

						</div>
						<div class="info-1 mt-3">

							<span>
								<i class="ni ni-square-pin text-info" style="font-size: 30px;"></i>
							</span>
							<span class="info">Encuentra el mejor sitio turistico para ti y tu famila.</span>

						</div>
					</div>

				</div>

				<div class="col-7 " >
					<figure class="pr-5">
					    <img src="src/img/Macbook-mochima.png" alt="macbook" width="700">
					</figure>
				</div>

			</div>
		</div>
	</section>
	<!-- FIN COMO USAR -->

	<!--CINTILLO-->
	<section class="cinta" style="color: #21b6df; font-size: 30px; font-weight: bold;">
		Conoce Venezuela
	</section>
	<!--FIN CINTILLO-->

	<!--TOP LOS MAS VISITADOS-->
	<section>
		<div class="cinta-2">
			<span>DESTINOS VACACIONALES</span>
		</div>

		<div class="top-sitios">
			<div class="top-item">
				<div class="top-content" style="background-image: url(src/img/more-2.png);">
					<span>
						Caracas
					</span>
				</div>
				<div class="top-content" style="background-image: url(src/img/more-1.png);">
					<span>
						Barquisimeto
					</span>
				</div>
				<div class="top-content" style="background-image: url(src/img/more-3.png);">
					<span>
						Coro
					</span>
				</div>
				<div class="top-content" style="background-image: url(src/img/more-4.png);">
					<span>
						Vargas
					</span>
				</div>
				<div class="top-content" style="background-image: url(src/img/more-2.png);">
					<span>
						Bolivar
					</span>
				</div>
			</div>
		</div>
		<div class="mapa">

		</div>
	</section>
	<!--FIN TOP LOS MAS VISITADOS-->
	<footer style="background-color: #3a4849; height: 100px;" >
		<div class="container-fluid">
			<div class="row pt-3" style="height: 100px;">
				<div class="col-3 offset-1 pt-2 text-white">
					<h3>LOGO</h3>
				</div>
				<div class="col-3 text-white">
					<ul>
					    <li>Inicio</li>
					    <li>Buscar</li>
					    <li>Mis Sitios</li>
					</ul>
				</div>
				<div class="col-3 text-white">
					<ul>
					    <li>Ingresar</li>
					    <li>Registro</li>
					    <li>Contacto</li>
					</ul>
				</div>
				<div class="col-2 pt-2 text-white">
					<h3>REDES</h3>
				</div>
			</div>
		</div>

	</footer>

<!--MODAL DE REGISTRO-->
<div class="modal fade bg-transparent" id="modal">
  <div class="modal-dialog modal-sm mt-5">
    <div class="modal-content bg-info">
      <div class="container-principal">
	      <div class="logo d-flex justify-content-center mt-5">
	         <img  class="logo-1" src="src/img/Logo.png" alt="logo" width="80" height="70">
	      </div>
	      <div class="title">
	         <span class="subtitle">Registro</span>
	         <span class="subtitle-2">Ingresa tus datos</span>
	      </div>
	      <div class="">
	         <form class="formulario" method="post" id="formulario-registro">
	         	<label class="entrada title-input">NOMBRE</label>
	            <input name="nombre_crear" id="nombreI" class="entrada enter-input" type="text" style="text-align:center" required>
	            
	            <label class="entrada title-input">APELLIDO</label>
	            <input name="apellido_crear" id="apellidoI" class="entrada enter-input" type="text" style="text-align:center" required>
	            
	            <label class="entrada title-input">CORREO <br><span class="text-lowercase text-warning"></span></label>
	            <input name="email_crear" id="correoR" class="entrada enter-input" type="email" style="text-align:center" required>
               	
               	<label class="entrada title-input">TELEFONO</label>
	            <input name="telefono_crear" id="telefonoI" class="entrada enter-input" type="tel" style="text-align:center" required>
               	
               	<label class="entrada title-input">DIRECCION</label>
	            <input name="direccion_crear" id="direccionI" class="entrada enter-input" type="text" style="text-align:center" required>
               	
               	<label class="entrada title-input text-center">USUARIO <br><span class="text-lowercase text-warning"></span></label>
               	<input name="usuario_crear" id="usuarioR" class="entrada enter-input" type="text" style="text-align:center" required>
	            
	            <label class="entrada title-input">CONTRASEÑA</label>
	            <input name="password_crear" id="passwordI" class="entrada enter-input" type="password" style="text-align:center" required>
	            
	            <label class="entrada title-input">CONFIRMAR CONTRASEÑA</label>
	            <input name="password_crear_2" id="passwordRI" class="entrada enter-input" type="password" style="text-align:center" required>
	            
	            <input class="boton-2 mt-3 mb-4 bg-info" type="submit" value="Enviar">
	         </form>
	         </div>
	      </div>
	   </div>
    </div>
    <!-- /.modal-content -->
 </div>

<!--MODAL DE INICIO-->
<div class="modal fade bg-transparent" id="modal-2">
  <div class="modal-dialog modal-sm mt-5">
    <div class="modal-content bg-info">
      <div class="container-principal">
	      <div class="logo d-flex justify-content-center mt-5">
	         <img  class="logo-1" src="src/img/Logo.png" alt="logo" width="80" height="70">
	      </div>
	      <div class="inicio-caja"> 
	      	<div class="title">
	         <span class="subtitle">Inicio</span>
	         <span class="subtitle-2">Ingresa tus datos</span>
		      </div>
		      <div class="">
						<form class="formulario"  method="post" id="formulario-recuperar">
						  <label class="entrada title-input">USUARIO</label>
						  <input id="usuarioIN" name="usuarioIngreso" class="enter-input" type="text" style="text-align:center" >
						  <label class="entrada title-input">CONTRASEÑA</label>
						  <input id="contraseñaIN" name="passwordIngreso" class="enter-input" type="password" style="text-align:center" >
		      		<span class="subtitle-2 ocultar mt-2"><a href="#">¿Recuperar Contraseña?</a></span>
						  <input class="boton-2 mt-3 mb-4 bg-info" type="submit" value="Enviar">
						</form>
		      </div>
	      </div>
	      <div class="inicio-recuperar">
	      	<div class="title">
						<span class="subtitle">Recuperar Contraseña</span>
						<span class="subtitle-2">Ingresa tus datos de usuario</span>
		      </div>
		      <div class="">
						<form class="formulario"  method="post" id="formulario-inicio">
						  <label class="entrada title-input">Correo</label>
						  <input id="correoRe" name="emailRe" class="enter-input" type="email" style="text-align:center" >
		      		<span class="subtitle-3 ocultar mt-3 ml-4 mr-4 text-center">Se Enviara un Codigo de verificacion al correo.</span>
						  <input class="boton-2 mt-3 mb-4 bg-info" type="submit" value="Enviar">
						</form>
		      </div>
	      </div>
	    </div>
	  </div>
  </div>
    <!-- /.modal-content -->
</div>


<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
   $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- jQuery  Validate-->
<script src="plugins/jquery-validate/jquery.validate.min.js"></script>
<!--ESTE ES PARA VALIDAR-->
<script src="src/js/validacion/validar-login.js"></script>
<!-- Toastr -->
<script src="plugins/toastr/toastr.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>

<script src="plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="plugins/toastr/toastr.min.js"></script>
<!-- AdminLTE App -->
<script src="src/js/adminlte.min.js"></script>

<script type="text/javascript">
  $(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });

    $('.succesinicio').click(function() {
      Toast.fire({
        type: 'info',
        title: 'Sitio registrado con exito.'
      })
    });
  });

		$(".inicio-ocultar").click(function() {
			$(".inicio-recuperar").hide();
			$(".inicio-caja").show();
		})

		$(".ocultar").click(function() {
			$(".inicio-caja").hide(500);
			$(".inicio-recuperar").show();
		});





</script>



</body>

</html>
