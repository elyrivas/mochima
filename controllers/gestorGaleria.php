<?php

class gestorGaleriaController{

	public static function SubirImagenController($datos){
			$aleatorio = mt_rand(100,999);

			$ruta = "views/landing/img/galeria".$aleatorio.".jpg";
			
			$origen = imagecreatefromjpeg($datos["imagenTemporal"]);

			imagejpeg($origen,$ruta);
			$OGaleria = new GestorGaleriaModel();
			$OGaleria->subirImagenModel($ruta);

			echo json_encode(['operation'=> true]);

		}


	
	 /* public static function InsertarImagen(){
      $OSitio= new GestorGaleriaModel();
      $OSitio->setRuta($_POST["ruta"]);
      $respuesta = $OSitio->subirImagenModel($ruta , "tgaleria");

  
   		}*/

   	public static function subirGaleria()
   	{
   		
			
			//datos del arhivo
   			$id_sitio = $_POST['id_sitio'];
			$nombre_archivo = $_FILES['file']['name'];
			$tipo_archivo = $_FILES['file']['type'];
			$tamano_archivo = $_FILES['file']['size'];
			$ruta="src/img/server/$nombre_archivo";

			//compruebo si las características del archivo son las que deseo
			if (!((strpos($tipo_archivo, "jpeg") || strpos($tipo_archivo, "png")) && ($tamano_archivo < 10000000))) {
			   	$respuesta="fallo la subida";
			}else{
				$galeria=new GestorGaleriaModel();
				$galeria->setUbicacion($ruta);
				$galeria->setId_sitio($id_sitio);
				if ($galeria->ingresarImagenModel()) {
					move_uploaded_file($_FILES['file']['tmp_name'], "src/img/server/$nombre_archivo");
					$respuesta="exitoso";
				}
			}	

			return $respuesta;
	}

   	public static function eliminarGaleria()
   	{
   		
   		$id_sitio = $_POST['sitio'];

   		if (isset($_POST['name_2'])) {
   			
   			$ruta=$_POST['name_2'];

   		} elseif (isset($_POST['name'])) {
   			
   			$nombre= $_POST['name'];
   			$ruta="src/img/server/$nombre";
   		
   		}


   		
   		$galeria = new GestorGaleriaModel();
   		$galeria->setUbicacion($ruta);
		$galeria->setId_sitio($id_sitio); 

		$galeria->eliminarImagenModel();

		unlink($ruta);
		echo json_encode([ 'res' => true ]);
		exit();
		
		
		
   	}

   	public static function listarGaleria()
	{
		$galeria=new GestorGaleriaModel();
		$id_sitio = $_POST['id_sitio'];
		$galeria->setId_sitio($id_sitio);
		$respuesta = array("data"=>$galeria->listarImagenModel());
	 	echo json_encode($respuesta);
		exit();		      

	}

}

?>