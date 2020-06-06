<?php

require_once "database/conexion.php";

class GestorOfertaModel Extends Conexion{

		private $id;
		private $titulo;
		private $precio;
	  private $contenido;
    private $sitio;

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

   public function setSitio($value)
   {
      $this->sitio=$value;
   }

      #METE TITULO
   public function setTitulo($value)
   {
      $this->titulo=$value;
   }

      #METE PRECIO
   public function setPrecio($value)
   {
      $this->precio=$value;
   }


      #METE CONTENIDO
   public function setContenido($value)
   {
      $this->contenido=$value;
   }

      #GET

      #DEVUELVE ID
   public function getId(){
     return $this->id;
   }

      #DEVUELVE TITULO
   public function getTitulo(){
      return $this->titulo;
   }
  

      #DEVUELVE PRECIO
   public function getPrecio(){
      return $this->precio;
   }

      #DEVUELVE CONTENIDO
   public function getContenido(){
      return $this->contenido;
   }


	#GUARDAR OFERTA
	#------------------------------------------------------------

	public function crearOfertaModel(){

		try {
         $stmt = $this->pdo->prepare("INSERT INTO tofertas (nombre_oferta, precio, descripcion_ofertas, sitio_turistico_id) VALUES (:titulo, :precio, :contenido, :id)");
// bindParam Vincula una variable de PHP a un parámetro de sustitución 
//PDO::PARAM_STR Representa el tipo de dato CHAR, VARCHAR de SQL, u otro tipo de datos de caden
		$stmt -> bindParam(":titulo", $this->titulo, PDO::PARAM_STR );
		$stmt -> bindParam(":precio",$this->precio);
		$stmt -> bindParam(":contenido", $this->contenido, PDO::PARAM_STR);
    $stmt -> bindParam(":id", $this->id);
 		$respuesta=$stmt->execute();
      
         $stmt=null;
         return $respuesta;
      } catch (Exception $e) {
         return $e->getMessage();
      }
	}


  #LISTAR OFERTAS
  #------------------------------------------------------------


  public function listarOfertaModel()
  {
     try {
     
        $stmt = $this->pdo->prepare("SELECT * FROM tofertas o, tsitios_turisticos s WHERE o.sitio_turistico_id=s.id_sitio");
        $stmt->execute();
        $respuesta = $stmt->fetchAll();
     
        $stmt=null;
        return $respuesta;
     } catch (Exception $e) {
        return $e->getMessage();
     }
  }

  public function listarOfertaUnicas()
  {
     try {
        $stmt = $this->pdo->prepare("SELECT * FROM tofertas WHERE sitio_turistico_id=:id");
        $stmt -> bindParam(":id", $this->id);
        $stmt->execute();
        $respuesta = $stmt->fetchAll();
     
        $stmt=null;
        return $respuesta;
     } catch (Exception $e) {
        return $e->getMessage();
     }
  }

  public function listarOfertaPropietarioModel()
  {
     try {
     
        $stmt = $this->pdo->prepare("SELECT * FROM tofertas o, tsitios_turisticos s WHERE o.sitio_turistico_id=s.id_sitio AND s.usuario_id=:id");
        $stmt -> bindParam(":id", $this->id);
        $stmt->execute();
        $respuesta = $stmt->fetchAll();
     
        $stmt=null;
        return $respuesta;
     } catch (Exception $e) {
        return $e->getMessage();
     }
  }

  #ELIMINAR OFERTAS
  #------------------------------------------------------------


   public function eliminarOfertaModel()
   {
      try {
         $stmt = $this->pdo->prepare("DELETE FROM tofertas WHERE id_oferta=:id");
         $stmt -> bindParam(":id", $this->id, PDO::PARAM_STR);
         $respuesta=$stmt->execute();
      
         $stmt=null;
         return $respuesta;
      } catch (Exception $e) {
         return $e->getMessage();
      }
   }



  #MODIFICAR OFERTAS
  #------------------------------------------------------------


   public function modificarOfertas()
   {
      try {
         $stmt = $this->pdo->prepare("UPDATE tofertas SET nombre_oferta=:titulo, precio=:precio, descripcion_ofertas=:contenido, sitio_turistico_id=:sitio WHERE id_oferta=:id");
         $stmt -> bindParam(":id", $this->id);
         $stmt -> bindParam(":titulo", $this->titulo);
         $stmt -> bindParam(":precio",$this->precio);
         $stmt -> bindParam(":contenido", $this->contenido);
         $stmt -> bindParam(":sitio", $this->sitio);
         $respuesta=$stmt->execute();
         $stmt=null;
         return $respuesta;
      } catch (Exception $e) {
         return $e->getMessage();
      }
   }


  #CONTAR OFERTAS
  #------------------------------------------------------------


    public function contarOfertas($funcion)
   {
     try {
          $stmt = $this->pdo->prepare("SELECT * FROM tofertas");
          $stmt->execute();
          $respuesta = $stmt->rowcount();
              $stmt=null;
              return $respuesta;
        
        } catch (Exception $e) {
         return $e->getMessage();
        }
      }
 
  #CONSULTAR OFERTAS
  #------------------------------------------------------------


   public function consultarOfertas()
      {
        try {
           $stmt = $this->pdo->prepare("SELECT * FROM tofertas WHERE id_oferta=:id");
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