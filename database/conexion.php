<?php
class Conexion extends PDO{

   private $base = 'mysql';
   private $host='localhost';
   private $bd= 'mochima';
   private $password='';
   private $user='root';
   private $port=5432;
   protected $conexion;
   public $repconexion;
   public $errorconexion;


   public function __construct()
   {
      try{

         //PARA POSTGRESQL
         /*$this->conexion= parent:: __construct("pgsql:host=". self::$host.";port=".self::$port .";dbname=".self::$bd .";user=".self::$user .";password=".self::$password);*/
         

         //PARA MYSQL
         $this->conexion=parent::__construct("{$this->base}:dbname={$this->bd};host={$this->host};charset=utf8", $this->user, $this->password);
         $this->repconexion=true;
         $this->errorconexion=false;
         Conexion::desconectar();

      }catch(PDOException $e){
         $this->errorconexion = '1';
         $this->repconexion=false;
         return $e;
      }
   }

   public function getRepConexion(){
      return $this->repconexion;
   }

   public function getErrorConexion(){
      return $this->errorconexion;
   }

   protected function desconectar()
   {
      $this->conexion=null;
      $this->errorconexion=null;
   }
}
?>
