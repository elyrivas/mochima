<?php 
	require_once "database/conexion.php";

	/**
	MODELO ENCARGADA DE GESTIONAR SITIOS TURISTICOS
	-> CREA
	-> CONSULTA
	-> ELIMINA
	-> MODIFICA
	-> LISTA
	*/

	class  SitiosModel Extends Conexion implements templateCrud
	{
	    
	    private $id;
	    private $rtn;
	    private $usuario;
	    private $fecha_rtn;
	    private $nombre;
	    private $direccion;
	    private $rif;
	    private $telefono;
	    private $email;
	    private $facebook;
	    private $instagram;
	    private $sitio_web;
	    private $licencia;
	    private $num_habitaciones;
	    private $latitud;
	    private $longitud;
	    private $estado;
	    private $ciudad;
	    private $tipo;
	    private $descripcion;
	    private $estatus;
	    public $pdo;

	    public function __construct() //HEREDA DE LA CLASE CONEXION Y EJECUTA EL CONSTRUCTOR.
		{
		    $this->pdo = new Conexion();
		}

		#INICIO DE LOS SET Y GET
		#ID
		public function getId()
		{
		    return $this->id;
		}
		
		public function setId($id)
		{
		    $this->id = $id;
		}

		#RTN
		public function getRtn()
		{
		    return $this->rtn;
		}
		
		public function setRtn($rtn)
		{
		    $this->rtn = $rtn;
		}

		#NOMBRE DEL SITIO

		public function getFecha_rtn()
		{
		    return $this->fecha_rtn;
		}
		
		public function setFecha_rtn($fecha_rtn)
		{
		    $this->fecha_rtn = $fecha_rtn;
		}

		#NOMBRE
		public function getNombre()
		{
		    return $this->nombre;
		}
		
		public function setNombre($nombre)
		{
		    $this->nombre = $nombre;
		}

		#DIRECCION
		public function getDireccion()
		{
		    return $this->direccion;
		}
		
		public function setDireccion($direccion)
		{
		    $this->direccion = $direccion;
		}

		#RIF
		public function getRif()
		{
		    return $this->rif;
		}
		
		public function setRif($rif)
		{
		    $this->rif = $rif;
		}

		#TELEFONO
		public function getTelefono()
		{
		    return $this->telefono;
		}
		
		public function setTelefono($telefono)
		{
		    $this->telefono = $telefono;
		}

		#CORREO
		public function getEmail()
		{
		    return $this->email;
		}
		
		public function setEmail($email)
		{
		    $this->email = $email;
		}

		#FACEBOOK
		public function getFacebook()
		{
		    return $this->facebook;
		}
		
		public function setFacebook($facebook)
		{
		    $this->facebook = $facebook;
		}

		#INSTAGRAM
		public function getInstagram()
		{
		    return $this->instagram;
		}
		
		public function setInstagram($instagram)
		{
		    $this->instagram = $instagram;
		}

		#SITIO WEB
		public function getSitio_web()
		{
		    return $this->sitio_web;
		}
		
		public function setSitio_web($sitio_web)
		{
		    $this->sitio_web = $sitio_web;
		}

		#LICENCIA
		public function getLicencia()
		{
		    return $this->licencia;
		}
		
		public function setLicencia($licencia)
		{
		    $this->licencia = $licencia;
		}

		#NUMERO DE HABITACIONES
		public function getNum_habitaciones()
		{
		    return $this->num_habitaciones;
		}
		
		public function setNum_habitaciones($num_habitaciones)
		{
		    $this->num_habitaciones = $num_habitaciones;
		}

		#LATITUD
		public function getLatitud()
		{
		    return $this->latitud;
		}
		
		public function setLatitud($latitud)
		{
		    $this->latitud = $latitud;
		}

		#LONGITUD
		public function getLongitud()
		{
		    return $this->longitud;
		}
		
		public function setLongitud($longitud)
		{
		    $this->longitud = $longitud;
		}

		#ESTADO
		public function getEstado()
		{
		    return $this->estado;
		}
		
		public function setEstado($estado)
		{
		    $this->estado = $estado;
		}

		#CIUDAD
		public function getCiudad()
		{
		    return $this->ciudad;
		}
		
		public function setCiudad($ciudad)
		{
		    $this->ciudad = $ciudad;
		}

		#TIPO
		public function getTipo()
		{
		    return $this->tipo;
		}
		
		public function setTipo($tipo)
		{
		    $this->tipo = $tipo;
		}

		#DESCRIPCION
		public function getDescripcion()
		{
		    return $this->descripcion;
		}
		
		public function setDescripcion($descripcion)
		{
		    $this->descripcion = $descripcion;
		}

		#ESTATUS
		public function getEstatus()
		{
		    return $this->estatus;
		}
		
		public function setEstatus($estatus)
		{
		    $this->estatus = $estatus;
		}

		#USUARIO
		public function getUsuario()
		{
		    return $this->usuario;
		}
		
		public function setUsuario($usuario)
		{
		    $this->usuario = $usuario;
		}

		


		#FINAL DE LOS METODOS SET Y GET

		#INICIO DE LOS METODOS DEL CRUD

		public function ReportesSitios($funcion)
		{
			try {

				$stmt = $this->pdo->prepare("SELECT * FROM tsitios_turisticos");
				$stmt->execute();
				$respuesta = $stmt->fetchAll();

				$stmt=null;
				return $respuesta;
	     	
	     	} catch (Exception $e) {
	        	return $e->getMessage();
	      	}
   		}

   		public function listarPropietario($id_usuario)
		{
			try {

				$stmt = $this->pdo->prepare("SELECT * FROM tsitios_turisticos WHERE usuario_id=:id");
				$stmt -> bindParam(":id", $id_usuario);
				$stmt->execute();
				$respuesta = $stmt->fetchAll();

				$stmt=null;
				return $respuesta;
	     	
	     	} catch (Exception $e) {
	        	return $e->getMessage();
	      	}
   		}

		public function listar($funcion)
		{
		  	try {
		  		if ($funcion=="listar-total") {
					$stmt = $this->pdo->prepare("SELECT * FROM tsitios_turisticos");
					$stmt->execute();
					$respuesta = $stmt->rowcount();
			        $stmt=null;
			        return $respuesta;
				
				}

				

		  		if ($funcion=="listar-ultimos") {
					$stmt = $this->pdo->prepare("SELECT * FROM tsitios_turisticos ORDER BY id_sitio  DESC LIMIT 1");
					$stmt->execute();
					$respuesta = $stmt->fetchAll();
			        $stmt=null;
			        return $respuesta;
				
				}

		  		if ($funcion=="listar-tipos") {
					$stmt = $this->pdo->prepare("SELECT * FROM ttipos_sitios");
					$stmt->execute();
					$respuesta = $stmt->fetchAll();
			        $stmt=null;
			        return $respuesta;
				}

				if ($funcion=="listar-sitios") {
					$stmt = $this->pdo->prepare("SELECT * FROM tsitios_turisticos s, ttipos_sitios t,tciudades c,testados e, tusuario u
					WHERE s.tipo_id=t.id_tipo AND s.ciudad_id=c.id_ciudad AND s.estado_id=e.id_estado AND s.usuario_id=u.id_usuario ORDER BY s.id_sitio ASC");
					$stmt->execute();
					$respuesta = $stmt->fetchAll();
			        $stmt=null;
			        return $respuesta;

				
				} 

				if ($funcion=="listar-ciudad") {
					
					$stmt=$this->pdo->prepare("SELECT * FROM tciudades WHERE estado_id=:estado_id");
					$stmt -> bindParam(":estado_id", $this->estado, PDO::PARAM_STR);
					$stmt->execute();
					$respuesta = $stmt->fetchAll();
			        $stmt=null;
			        return $respuesta;

				} 

				if ($funcion="listar-estados") {
					
					$stmt=$this->pdo->prepare("SELECT * FROM testados");
					$stmt->execute();
					$respuesta = $stmt->fetchAll();
			        $stmt=null;
			        return $respuesta;
				}
		    } catch (Exception $e) {
		     return $e->getMessage();
		    }

		}

		public function modificar()
		{
			try {
				$stmt = $this->pdo->prepare("UPDATE tsitios_turisticos
	SET rtn=:rtn, fecha_otorgamiento_rtn=:fecha, nombre_sitio=:nombre, rif=:rif, direccion_sitio=:direccion, telefono_sitio=:telefono, email=:correo, facebook=:facebook, instagram=:instagram, sitioweb=:sitio, num_licencia=:licencia, num_habitacion=:habitaciones, latitud=:latitud, longitud=:longitud, estado_id=:estado, ciudad_id=:ciudad, tipo_id=:tipo, descripcion=:descripcion, estatus=:estatus
	WHERE id_sitio=:id");
				$stmt -> bindParam(":id", $this->id);
				$stmt -> bindParam(":rtn", $this->rtn);
				$stmt -> bindParam(":fecha", $this->fecha_rtn);
				$stmt -> bindParam(":nombre", $this->nombre);
				$stmt -> bindParam(":rif", $this->rif);
				$stmt -> bindParam(":direccion", $this->direccion);
				$stmt -> bindParam(":telefono", $this->telefono);
				$stmt -> bindParam(":correo", $this->email);
				$stmt -> bindParam(":facebook", $this->facebook);
				$stmt -> bindParam(":instagram", $this->instagram);
				$stmt -> bindParam(":sitio", $this->sitio_web);
				$stmt -> bindParam(":licencia", $this->licencia);
				$stmt -> bindParam(":habitaciones", $this->num_habitaciones);
				$stmt -> bindParam(":latitud", $this->latitud);
				$stmt -> bindParam(":longitud", $this->longitud);
				$stmt -> bindParam(":estado", $this->estado);
				$stmt -> bindParam(":ciudad", $this->ciudad);
				$stmt -> bindParam(":tipo", $this->tipo);
				$stmt -> bindParam(":descripcion", $this->descripcion);
				$stmt -> bindParam(":estatus", $this->estatus);
				$respuesta=$stmt->execute();
				$stmt=null;
				return $respuesta;
				
			} catch (Exception $e) {
				return $e->getMessage();
			}
		}



		public function Eliminar()
		{
			try {
		        $stmt = $this->pdo->prepare("DELETE FROM tsitios_turisticos WHERE rtn=:rtn");
		        $stmt -> bindParam(":rtn", $this->rtn);
		        $respuesta=$stmt->execute();
	      
	        	$stmt=null;
	        	return $respuesta;
	      	} catch (Exception $e) {
	        	return $e->getMessage();
 			}
		}


		public function listarFoticosModel()
		{


			try {
		        $stmt = $this->pdo->prepare("SELECT * FROM tgaleria ");
				$stmt->execute();
				$respuesta = $stmt->fetchAll();
		        $stmt=null;
		        return $respuesta;
	      	} catch (Exception $e) {
	        	return $e->getMessage();
 			}
		}

		
   		public function listarSitioUnicoModel()
		{
			try {

				$stmt = $this->pdo->prepare("SELECT * FROM tsitios_turisticos s, ttipos_sitios t,tciudades c,testados e, tusuario u
					WHERE s.tipo_id=t.id_tipo AND s.ciudad_id=c.id_ciudad AND s.estado_id=e.id_estado AND s.usuario_id=u.id_usuario AND s.id_sitio=:idid");
				$stmt -> bindParam(":idid", $this->id);
				$stmt->execute();
				$respuesta = $stmt->fetch();

				$stmt=null;
				return $respuesta;
	     	
	     	} catch (Exception $e) {
	        	return $e->getMessage();
	      	}
   		}

		public function crear()
		{
			try {
				$stmt = $this->pdo->prepare("INSERT INTO tsitios_turisticos(rtn, fecha_otorgamiento_rtn, nombre_sitio, rif, direccion_sitio, telefono_sitio, email, facebook, instagram, sitioweb, num_licencia, num_habitacion, latitud, longitud, estado_id, ciudad_id, tipo_id, usuario_id, descripcion) VALUES (:rtn, :fecha, :nombre, :rif, :direccion, :telefono, :email, :facebook, :instagram, :sitioweb, :num_licencia, :num_habitacion, :latitud, :longitud, :estado_id, :ciudad_id, :tipo_id, :usuario_id, :descripcion)");
				$stmt -> bindParam(":rtn", $this->rtn);
				$stmt -> bindParam(":fecha", $this->fecha_rtn);
				$stmt -> bindParam(":nombre", $this->nombre);
				$stmt -> bindParam(":rif", $this->rif);
				$stmt -> bindParam(":direccion", $this->direccion);
				$stmt -> bindParam(":telefono", $this->telefono);
				$stmt -> bindParam(":email", $this->email);
				$stmt -> bindParam(":facebook", $this->facebook);
				$stmt -> bindParam(":instagram", $this->instagram);
				$stmt -> bindParam(":sitioweb", $this->sitio_web);
				$stmt -> bindParam(":num_licencia", $this->licencia);
				$stmt -> bindParam(":num_habitacion", $this->num_habitaciones);
				$stmt -> bindParam(":latitud", $this->latitud);
				$stmt -> bindParam(":longitud", $this->longitud);
				$stmt -> bindParam(":estado_id", $this->estado);
				$stmt -> bindParam(":ciudad_id", $this->ciudad);
				$stmt -> bindParam(":tipo_id", $this->tipo);
				$stmt -> bindParam(":usuario_id", $this->usuario);
				$stmt -> bindParam(":descripcion", $this->descripcion);
				$stmt->execute();
				$respuesta= $this->pdo->lastInsertId();
				$stmt=null;
				return $respuesta;
			} catch (Exception $e) {
				return $e->getMessage();
			}
		}

		public function consultarSitios()
		{
		  try {
		     $stmt = $this->pdo->prepare("SELECT * FROM tsitios_turisticos WHERE rtn=:rtn");
		     $stmt -> bindParam(":rtn", $this->rtn);
		     $stmt->execute();
		     $respuesta = $stmt->fetch();
		     $stmt=null;
		     return $respuesta;
		  } catch (Exception $e) {
		     return $e->getMessage();
		  }
		}

		public function AsignarServicios($servicio_id)
		{
		  try {
		     $stmt = $this->pdo->prepare("INSERT INTO tsitios_servicios (sitio_id, servicio_id) VALUES ( :sitio, :servicio);");
		     $stmt -> bindParam(":sitio", $this->id);
		     $stmt -> bindParam(":servicio", $servicio_id);
		     $stmt->execute();
		     $respuesta = $stmt->fetch();
		     $stmt=null;
		     return $respuesta;
		  } catch (Exception $e) {
		     return $e->getMessage();
		  }
		}

}

/*PARA CONSULATAR
	
	SELECT * FROM tsitios_turisticos s, ttipos_sitios t,tciudades c,testados e
WHERE s.tipo_id=t.id_tipo AND s.ciudad_id=c.id_ciudad AND s.estado_id=e.id_estado AND s.id_sitio=2

*/
?>