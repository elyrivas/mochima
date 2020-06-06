<?php

require_once "database/conexion.php";

class GestorGaleriaModel Extends Conexion{

		private $id;
    private $url;
    public $ruta;
    public $id_sitio;

 
   public function __construct() //HEREDA DE LA CLASE CONEXION Y EJECUTA EL CONSTRUCTOR.
   {
      $this->pdo = new Conexion();
   }  
 
      #SETTERS
      #METE ID
   public function setId()
   {
      $this->id=$value;
   }

      #METE TITULO
   public function setRuta()
   {
      $this->url=$url;
   }

      #METE ID SITIO
   public function setId_sitio($id)
   {
      $this->id_sitio=$id;
   }

     #METE UBICACION
   public function setUbicacion($ubicacion)
   {
      $this->ruta=$ubicacion;
   }


 
      #GET

      #DEVUELVE ID
   public function getId(){
     return $this->id;
   }

      #DEVUELVE TITULO
   public function getRuta(){
      return $this->url;
   }


  public function subirImagenModel($datos){



         $stmt = $this->pdo->prepare("INSERT INTO tgaleria (url) VALUES (:url)");
         $stmt->bindparam(":url" , $datos , PDO::PARAM_STR);
         if($stmt->execute()){
           return "ok";
         }else{
          return "error";
         }
        
         $stmt->close();
         
    
  }

    public function ingresarImagenModel()
    {
      try { 
        $stmt = $this->pdo->prepare("INSERT INTO tgaleria (url, sitio_turistico_id) VALUES (:rut, :id)");
        $stmt -> bindParam(":rut", $this->ruta);
        $stmt -> bindParam(":id", $this->id_sitio);
        $respuesta=$stmt->execute();
        $stmt=null;
        return $respuesta;
      } catch (Exception $e) {
        return $e->getMessage();
      }
    }

    public function eliminarImagenModel()
    {
      try {
        $stmt = $this->pdo->prepare("DELETE FROM tgaleria WHERE url=:rut AND sitio_turistico_id=:id");
        $stmt -> bindParam(":rut", $this->ruta);
        $stmt -> bindParam(":id", $this->id_sitio);
        $respuesta=$stmt->execute();
        $stmt=null;
        return $respuesta;
      } catch (Exception $e) {
        return $e->getMessage();
      }
    }


    public function listarImagenModel()
    {
       try {
       
          $stmt = $this->pdo->prepare("SELECT url FROM tgaleria WHERE sitio_turistico_id=:id ORDER BY id_galeria DESC");
          $stmt -> bindParam(":id", $this->id_sitio);
          $stmt->execute();
          $respuesta = $stmt->fetchAll(PDO::FETCH_OBJ);  
          $stmt=null;
          return $respuesta;
       } catch (Exception $e) {
          return $e->getMessage();
       }
    }

 
}

?>