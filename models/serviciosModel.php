<?php

require_once "database/conexion.php";

class GestorServicioModel Extends Conexion{

		private $id;
		private $nombre;
    private $descripcion;

	       public function __construct() //HEREDA DE LA CLASE CONEXION Y EJECUTA EL CONSTRUCTOR.
			   {
			      $this->pdo = new Conexion();
			   }  



      #SETTERS
      #METE ID
   public function setId($value)
   {
      $this->id=$value;
   }

      #METE TITULO
   public function setNombre($value)
   {
      $this->nombre=$value;
   }

      #METE CONTENIDO
   public function setDescripcion($value)
   {
      $this->descripcion=$value;
   }

      #GET

      #DEVUELVE ID
   public function getId(){
     return $this->id;
   }

      #DEVUELVE TITULO
   public function getNombre(){
      return $this->nombre;
   }

      #DEVUELVE CONTENIDO
   public function getDescripcion(){
      return $this->descripcion;
   }


	#CREAR SERVICIO
	#------------------------------------------------------------

	public function crearServicioModel(){

		try {
        $stmt = $this->pdo->prepare("INSERT INTO tservicios( nombre_servicio, descripcion) VALUES (:nombre, :descripcion)");

    		$stmt -> bindParam(":nombre", $this->nombre, PDO::PARAM_STR );
    		$stmt -> bindParam(":descripcion", $this->descripcion, PDO::PARAM_STR);
     		$respuesta=$stmt->execute();
      
        $stmt=null;
        return $respuesta;
      } catch (Exception $e) {
         return $e->getMessage();
      }
	}


  public function relaServicioModel(){

    try {
        $stmt = $this->pdo->prepare("INSERT INTO tsitios_servicios( sitio_id, servicio_id) VALUES (:sitio, :servicio)");
        $stmt -> bindParam(":servicio", $this->nombre);
        $stmt -> bindParam(":sitio", $this->id);
        $respuesta=$stmt->execute();
      
        $stmt=null;
        return $respuesta;
      } catch (Exception $e) {
         return $e->getMessage();
      }
  }


  #LISTAR SERVICIOS
  #------------------------------------------------------------


   public function listarServicioModel()
      {
         try {
         
            $stmt = $this->pdo->prepare("SELECT * FROM tservicios");
            $stmt->execute();
            $respuesta = $stmt->fetchAll();
         
            $stmt=null;
            return $respuesta;
         } catch (Exception $e) {
            return $e->getMessage();
         }
      }


      public function listarServicioPropietarioModel()
      {
         try {
         
            $stmt = $this->pdo->prepare("SELECT * FROM tsitios_servicios p, tsitios_turisticos s, tservicios m WHERE s.usuario_id=:idUsuario AND p.sitio_id=s.id_sitio AND p.servicio_id=m.id_servicio");
            $stmt -> bindParam(":idUsuario", $this->id);
            $stmt->execute();
            $respuesta = $stmt->fetchAll();
         
            $stmt=null;
            return $respuesta;
         } catch (Exception $e) {
            return $e->getMessage();
         }
      }



  #ELIMINAR SERVICIO
  #------------------------------------------------------------


   public function eliminarServicioModel()
   {
      try {
         $stmt = $this->pdo->prepare("DELETE FROM tservicios WHERE id_servicio=:id");
         $stmt -> bindParam(":id", $this->id);
         $respuesta=$stmt->execute();
      
         $stmt=null;
         return $respuesta;
      } catch (Exception $e) {
         return $e->getMessage();
      }
   }


   public function eliminarPropietarioModel()
   {
      try {
         $stmt = $this->pdo->prepare("DELETE FROM tsitios_servicios WHERE id_sitios_servicios=:id");
         $stmt -> bindParam(":id", $this->id);
         $respuesta=$stmt->execute();
      
         $stmt=null;
         return $respuesta;
      } catch (Exception $e) {
         return $e->getMessage();
      }
   }



  #MODIFICAR SERVICIOS
  #------------------------------------------------------------


   public function modificarServicioModel()
   {
      try {
         $stmt = $this->pdo->prepare("UPDATE tservicios SET nombre_servicio=:nombre, descripcion=:descripcion WHERE id_servicio=:id");
         $stmt -> bindParam(":id", $this->id);
         $stmt -> bindParam(":nombre", $this->nombre);
         $stmt -> bindParam(":descripcion", $this->descripcion);
         $respuesta=$stmt->execute();
         $stmt=null;
         return $respuesta;
      } catch (Exception $e) {
         return $e->getMessage();
      }
   }
 
  #CONSULTAR SERVICIOS
  #------------------------------------------------------------


   public function consultarServicioModel()
      {
        try {
           $stmt = $this->pdo->prepare("SELECT * FROM tservicios WHERE id_servicio=:id");
           $stmt -> bindParam(":id", $this->id);
           $stmt->execute();
           $respuesta = $stmt->fetch();
           $stmt=null;
           return $respuesta;
        } catch (Exception $e) {
           return $e->getMessage();
        }
      }



}
?>