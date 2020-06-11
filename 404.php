<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Error 404</title>
	<link rel="stylesheet" type="text/css" href="src/css/bootstrap.min.css">
	<script src="./plugins/bootstrap/js/bootstrap.min.js"></script>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@900&display=swap" rel="stylesheet">
	<style>
		html, body {
	        height: 100%;
	        width: 100%;
	        padding: 0;
	        margin: 0;
	        background-attachment: fixed;
			background-position: center center;
			background-size: cover;
			background-image: url(./src/img/404-3.jpg);
    	}
 
	    .background-image {
	        z-index: -999;
	        width: 100%;
	        height: auto;
	        position: fixed;
	        top: 0;
	        left: 0;
	    }

	    .fondo{
	    	height: 100vh;
	    	width: 100%;
	    }

	    .content{
	    	width: 50%;
	    	height: 600px;
	    }

	    .error>span{
	    	font-family: 'Roboto', sans-serif;
	    	font-size: 220px;
	    	letter-spacing: 20px;
	    }
	</style>
</head>
<body>
	<div class="fondo d-flex justify-content-center align-self-center ">
		<div class="content d-flex flex-column justify-content-center align-items-center">
			<div class="error">
				<span class="text-light">404</span>
			</div>
			<div class="mensaje mb-5">
				<h4 class="text-light"><b>Lo sentimos! Pagina no encontrada.</b></h4>
			</div>
			<div class="boton mt-5">
				<a href="http://localhost/mochima/?action=inicio">
					<button type="button" class="btn btn-outline-light btn-md btn-block">Inicio</button>
				</a>
			</div>
		</div>
	</div>
</body>
<script src="./src/js/jquery-3.4.1.min.js"></script>
<script src="./src/js/popper.min.js"></script>
</html>