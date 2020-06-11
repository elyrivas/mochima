<?php

require_once "database/conexion.php";

class BitacoraModel Extends Conexion{

		private $id;
		private $usuario;
    private $ip;
    private $feacha;
    private $accion;
    private $modulo;
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

      #METE USUARIO
   public function setUsuario($value)
   {
      $this->usuario=$value;
   }

      #METE DESCRIPCION
   public function setDescripcion($value)
   {
      $this->descripcion=$value;
   }

      #METE IP
   public function setIp($value)
   {
      $this->ip=$value;
   }

      #METE ACCION
   public function setAccion($value)
   {
      $this->accion=$value;
   }

       #METE ACCION
   public function setModulo($value)
   {
      $this->modulo=$value;
   }

      #METE FECHA
   public function setFecha($value)
   {
      $this->fecha=$value;
   }

      #GET

      #DEVUELVE ID
   public function getId(){
     return $this->id;
   }

      #DEVUELVE IP
   public function getIp(){
      return $this->ip;
   }

   #DEVUELVE USUARIO
   public function getUsuario(){
      return $this->usuario;
   }

      #DEVUELVE ACCION
   public function getAccion(){
      return $this->accion;
   }

      #DEVUELVE ACCION
   public function getModulo(){
      return $this->modulo;
   }

      #DEVUELVE FECHA
   public function getFecha(){
      return $this->fecha;
   }

      #DEVUELVE DESCRIPCION
   public function getDescripcion(){
      return $this->descripcion;
   }


	#CREAR ACCIONES EN BITACORA
	#------------------------------------------------------------

	public function crearRegistroModel(){

		try {
        $stmt = $this->pdo->prepare("INSERT INTO tbitacora( ip, fecha, accion, descripcion, usuario_id, modulo) 
                                          VALUES (:ip, :fecha, :accion, :descripcion, :usuario_id, :modulo)");
    		$stmt -> bindParam(":ip", $this->ip, PDO::PARAM_STR );
    		$stmt -> bindParam(":fecha", $this->fecha, PDO::PARAM_STR);
        $stmt -> bindParam(":accion", $this->accion, PDO::PARAM_STR);
        $stmt -> bindParam(":descripcion", $this->descripcion, PDO::PARAM_STR);
        $stmt -> bindParam(":descripcion", $this->descripcion, PDO::PARAM_STR);
        $stmt -> bindParam(":usuario_id", $this->usuario, PDO::PARAM_STR);
        $stmt -> bindParam(":modulo", $this->modulo, PDO::PARAM_STR);
     		$respuesta=$stmt->execute();
      
        $stmt=null;
        return $respuesta;
      } catch (Exception $e) {
         return $e->getMessage();
      }
	}


  #LISTAR ACCIONES DE BITACORA
  #------------------------------------------------------------

  public function listarRegistroModel()
  {
     try {
     
        $stmt = $this->pdo->prepare("SELECT * FROM tbitacora, tusuario WHERE tbitacora.usuario_id=tusuario.id_usuario");
        $stmt->execute();
        $respuesta = $stmt->fetchAll();
        $stmt=null;
        return $respuesta;
     } catch (Exception $e) {
        return $e->getMessage();
     }
  }


}
?>