<?php 
	class sitiosController
	{
	    public static function listarController($funcion)
		{
			$OSitio=new sitiosModel();
			return $OSitio->listar($funcion);
		}

		public static function listargaleriaController($funcion)
		{
			$OSitio=new sitiosModel();	
			return $OSitio->listar($funcion);
		}

		public static function coordenadas()
		{
			$OSitio=new sitiosModel();
			$sitios = $OSitio->listar('listar-sitios');
			$coordenadas=[];
			foreach ($sitios as $s) {
				$coor=(object)[
					'nombre'=>$s['nombre_sitio'],
					'latitud'=>$s['latitud'],
					'longitud'=>$s['longitud']
				];
			$coordenadas[]=$coor;
			}

			return $coordenadas;
		}

		public function listarFoticosController()
		{
			$OSitio=new sitiosModel();
			$sitios = $OSitio->listar('listar-sitios');
			$records = [];
			foreach ($sitios as $s) {
				
				$g = new GestorGaleriaModel();
				$g->setId_sitio($s['id_sitio']);
				$imagenes_sitio = $g->listarImagenModel();

				$obj_sitio = (object)[
					'id_sitio' => $s['id_sitio'],
					'rtn' => $s['rtn'],
					'imagenes' => $imagenes_sitio,
					'nombre_sitio' => $s['nombre_sitio'],
					'direccion_sitio' => $s['direccion_sitio'],
					'tipo_id' => $s['tipo_id'],
					'descripcion' => $s['descripcion'],
					'id_estado' => $s['id_estado'],
					'nombre_estado' => $s['nombre_estado'],
					'id_ciudad' => $s['id_ciudad'],
					'nombre_ciudad' => $s['nombre_ciudad'],
					'nombre_tipo' => $s['nombre_tipo']
				];
				$records[] = $obj_sitio;
			}
			return $records;
		}



		public function listarFotosUnicoController($id)
		{
			$OSitio=new sitiosModel();
			$sitios = $OSitio->listarPropietario($id);
			$records = [];
			foreach ($sitios as $s) {
				
				$g = new GestorGaleriaModel();
				$g->setId_sitio($s['id_sitio']);
				$imagenes_sitio = $g->listarImagenModel();

				$obj_sitio = (object)[
					'id_sitio' => $s['id_sitio'],
					'rtn' => $s['rtn'],
					'imagenes' => $imagenes_sitio,
					'nombre_sitio' => $s['nombre_sitio'],
					'direccion_sitio' => $s['direccion_sitio'],
					'tipo_id' => $s['tipo_id'],
					'descripcion' => $s['descripcion'],
					'id_estado' => $s['id_estado'],
					'nombre_estado' => $s['nombre_estado'],
					'id_ciudad' => $s['id_ciudad'],
					'nombre_ciudad' => $s['nombre_ciudad'],
					'nombre_tipo' => $s['nombre_tipo']
				];
				$records[] = $obj_sitio;
			}
			return $records;
		}


		public static function listarSitioPropietario($id_usuario)
		{
			$OSitio=new sitiosModel();	
			return $OSitio->listarPropietario($id_usuario);
		}

		public static function listarCiudades($funcion)
		{
			$OSitio=new sitiosModel();	
			$OSitio->setEstado($_POST["id_estado"]);
			$respuesta = array("data"=>$OSitio->listar($funcion));
			echo json_encode($respuesta);
		}

		public static function crearController()
		{
			
			$OSitio= new sitiosModel();
		    $OSitio->setUsuario($_POST["usuario_crear"]);
		    $OSitio->setRtn($_POST["rtn_crear"]);
		    $OSitio->setFecha_rtn($_POST["fecha_crear"]);
		    $OSitio->setNombre($_POST["nombre_crear"]);
		    $OSitio->setDireccion($_POST["direccion_crear"]);
		    $OSitio->setRif($_POST["rif_crear"]);
		    $OSitio->setTelefono($_POST["telefono_crear"]);
		    $OSitio->setEmail($_POST["correo_crear"]);
		    $OSitio->setFacebook($_POST["facebook_crear"]);
		    $OSitio->setInstagram($_POST["instagram_crear"]);
		    $OSitio->setSitio_web($_POST["web_crear"]);
		    $OSitio->setLicencia($_POST["licencia_crear"]);
		    $OSitio->setLatitud($_POST["latitud_crear"]);
		    $OSitio->setLongitud($_POST["longitud_crear"]);
		    $OSitio->setEstado($_POST["estado_crear"]);
		    $OSitio->setCiudad($_POST["ciudad_crear"]);
		    $OSitio->setTipo($_POST["tipo_crear"]);
		    $OSitio->setDescripcion($_POST["descripcion_crear"]);
			$OSitio->setEstatus($_POST["estatus_crear"]);
		    $OSitio->setNum_habitaciones(null);			
			$ultimoSitio=$OSitio->crear();
			$OSitio->setId($ultimoSitio);
			$servicios=$_POST["servicio_crear"];
			foreach ($servicios as $value) {
				$OSitio->AsignarServicios($value);
			};
			$modulo="Sitios Turisticos";
			$accion="crear sitios";
			$descripcion="el ".$_SESSION["nombre_usuario"]." creo sitios turisticos";
			$Obitacora= bitacoraController::crearRegistro($accion,$descripcion,$modulo);
			header("location:index.php?action=adminsitio");
			exit();
		}


		public static function crearLandingController()
		{
			$OSitio= new sitiosModel();
		    $OSitio->setUsuario($_POST["usuario_crear"]);
		    $OSitio->setRtn($_POST["rtn_crear"]);
		    $OSitio->setFecha_rtn($_POST["fecha_crear"]);
		    $OSitio->setNombre($_POST["nombre_crear"]);
		    $OSitio->setDireccion($_POST["direccion_crear"]);
		    $OSitio->setRif($_POST["rif_crear"]);
		    $OSitio->setTelefono($_POST["telefono_crear"]);
		    $OSitio->setEmail($_POST["correo_crear"]);
		    $OSitio->setFacebook($_POST["facebook_crear"]);
		    $OSitio->setInstagram($_POST["instagram_crear"]);
		    $OSitio->setSitio_web($_POST["web_crear"]);
		    $OSitio->setLicencia($_POST["licencia_crear"]);
		    $OSitio->setLatitud($_POST["latitud_crear"]);
		    $OSitio->setLongitud($_POST["longitud_crear"]);
		    $OSitio->setEstado($_POST["estado_crear"]);
		    $OSitio->setCiudad($_POST["ciudad_crear"]);
		    $OSitio->setTipo($_POST["tipo_crear"]);
		    $OSitio->setDescripcion($_POST["descripcion_crear"]);
			$OSitio->setEstatus($_POST["estatus_crear"]);
		    $OSitio->setNum_habitaciones(null);			
			$ultimoSitio=$OSitio->crear();
			echo json_encode([ 
				'sitio' => $ultimoSitio,
				'operation' => true
			]);

			$modulo="Sitios Turisticos";
			$accion="crear sitios";
			$descripcion="el ".$_SESSION["nombre_usuario"]." creo sitio turistico";
			$Obitacora= bitacoraController::crearRegistro($accion,$descripcion,$modulo);
			
			exit();
		}

		public static function eliminarController()
		{
			$OSitio=new sitiosModel();
			$OSitio->setRtn($_POST["rtn-eliminar"]);
     		$OSitio->eliminar();

     		$modulo="Sitios Turisticos";
			$accion="eliminar sitios";
			$descripcion="el ".$_SESSION["nombre_usuario"]." elimino sitio turistico";
			$Obitacora= bitacoraController::crearRegistro($accion,$descripcion,$modulo);
			
     		if (isset($_POST["misitio"])) {
     			header("location:index.php?action=misitio");
     		} else {
     			header("location:index.php?action=adminsitio");
     		}
     		exit();
		}

		public static function listarSitioUnico($id_sitio)
		{
			$OSitio=new sitiosModel();	
			$OSitio->setId($id_sitio);
			return $OSitio->listarSitioUnicoModel(); 
		}

		public static function consultarController()
	   {
	     	$OSitios=new SitiosModel();
	     	$OSitios->setRtn($_POST["rtn_sitio"]);
	     	$respuesta = array("data"=>$OSitios->consultarSitios());
	     	echo json_encode($respuesta);
			exit();		      
	   }

		public static function modificarController()
		{
	    	$OSitio=new SitiosModel();
	    	$OSitio->setId($_POST["id_editar"]);
	    	$OSitio->setRtn($_POST["rtn_editar"]);
		    $OSitio->setFecha_rtn($_POST["fecha_editar"]);
		    $OSitio->setNombre($_POST["nombre_editar"]);
		    $OSitio->setDireccion($_POST["direccion_editar"]);
		    $OSitio->setRif($_POST["rif_editar"]);
		    $OSitio->setTelefono($_POST["telefono_editar"]);
		    $OSitio->setEmail($_POST["correo_editar"]);
		    $OSitio->setFacebook($_POST["facebook_editar"]);
		    $OSitio->setInstagram($_POST["instagram_editar"]);
		    $OSitio->setSitio_web($_POST["web_editar"]);
		    $OSitio->setLicencia($_POST["licencia_editar"]);
		    $OSitio->setLatitud($_POST["latitud_editar"]);
		    $OSitio->setLongitud($_POST["longitud_editar"]);
		    $OSitio->setEstado($_POST["estado_editar"]);
		    $OSitio->setCiudad($_POST["ciudad_editar"]);
		    $OSitio->setTipo($_POST["tipos_editar"]);
		    if ($_POST["habitacion_editar"]=="") {
		    	$habitacion="0";
		    } else {
		    	$habitacion=$_POST["habitacion_editar"];
		    }
		    $OSitio->setNum_habitaciones($habitacion);
		    $OSitio->setDescripcion($_POST["descripcion_editar"]);
			$OSitio->setEstatus($_POST["estatus_editar"]);
	   		$OSitio->modificar();
	   		$modulo="Sitios Turisticos";
			$accion="Modificar sitios";
			$descripcion="el ".$_SESSION["nombre_usuario"]." modifico sitio turistico";
			$Obitacora= bitacoraController::crearRegistro($accion,$descripcion,$modulo);
			
	   		if (isset($_POST["misitio"])) {
	   			header("location:index.php?action=misitio");
	   		} else {
	   			header("location:index.php?action=adminsitio");
	   		}
 			exit();  		
		}	


	public static function generarReporteSitios() 
   		{
      $ObjSitios= new SitiosModel();
      $sitios = $ObjSitios->ReportesSitios('tsitios_turisticos');

      require_once "src/dompdf/libreria/vendor/autoload.php"; 
      // instantiate and use the dompdf class
      $dompdf = new Dompdf\Dompdf();
      ob_start();
         require_once "views/admin/pdf/reporte_sitios.php";
      $html = ob_get_clean();
      $dompdf->loadHtml( $html );
      // Render the HTML as PDF
      $dompdf->render();
      // Output the generated PDF to Browser
      $dompdf->stream('reporte_sitios.pdf',['Attachment' => 0]);

   		}
	}
 ?>