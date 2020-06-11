<?php
	if (!$_SESSION["reset"]) {
		header ("location:401.php");
		exit();
	}

	if (isset($_POST["code-reset"])) {


	  $codigo=$_POST["code-reset"];


	  echo $codigo;
		if ($codigo==$_SESSION["reset"]) {
			header("location:index.php?action=new_password");
			$_SESSION["reset"]="pass";
		}
		
	}

  
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mochima | Recuperar Contraseña</title>
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
   <style>
   	.input-code{
   	   letter-spacing: 0.5rem;
			font-size: 30px;
			height: 45px;
			width: 70%;

			display: block;
			padding: .375rem .75rem;
			font-weight: 400;
			line-height: 1.5;
			background-clip: padding-box;
			border: 1px solid #ced4da;
			border-radius: .25rem;
			box-shadow: inset 0 0 0 transparent;
   	}
   	.input-code:focus{
		border: none !important;
		outline: 0px !important;
		text-decoration: none;
   	}

   	.input-code:hover{
		color: white;
   	}
   	.box{
   		width: 22%;
   		height: 250px;
   		display: flex;
   		flex-direction: column;
   		justify-content: space-around;
   		align-content: center;

   	}

	.prueba{
		position: relative;
		width: 100%;
		height: 100vh;
		
		display: flex;
		justify-content: center;
		align-items: center;
		background-image: url(src/img/fondo.png);
		background-size: cover;
		background-repeat: no-repeat;
	}

	.glass{
		width: 25%;
		height: 370px;
		backdrop-filter: blur(8px);
		border-radius: 10px;
	}

	.prueba-1{
		position: absolute;
		width: 100%;
		height: 100vh;
		z-index: 10;
	}
   </style>
</head>

<body>
	<!--HERO-->
<div class="prueba-1 d-flex justify-content-center align-items-center">
	<div class="box" style="z-index: 100;">
		<div class="mb-3 mt-3">
			<div class="d-flex justify-content-center mb-4 text-center">
				<img  class="logo-1" src="src/img/Logo.png" alt="logo" width="80" height="75">
			</div>
			<h1 class="text-white text-center mb-4" style="font: bold 30px 'roboto' , roboto;">Codigo de Validacion</h1>
			<h3 class="text-white text-center mb-3" style="font: normal 15px 'roboto' , roboto;">Ingresar codigo de 6 digitos enviado a la cuenta de correo.</h3>
		</div>
		<form action="?action=reset_password" method="post">
        	<div class="d-flex  justify-content-center">
        		<input type="text" name="code-reset" class=" text-center bg-transparent text-white input-code" data-inputmask="'mask': ['999999', '999999']" data-mask>
        	</div>
        	<div class="d-flex  justify-content-center mt-4">
				<input class="boton-2 mt-3 mb-4 bg-transparent text-white" type="submit" value="Enviar">
        	</div>

		</form>
              
	</div>
</div>
<div class="prueba">
	<div class="glass">
	</div>
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


<!-- InputMask -->
<script src="plugins/inputmask/jquery.inputmask.bundle.js"></script>
<script>
  $(function () {
    
    //Money Euro
    $('[data-mask]').inputmask()

    
  })
</script>


</body>

</html>
