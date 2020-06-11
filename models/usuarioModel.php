<?php
require_once "database/conexion.php";

/**
MODELO ENCARGADA DE GESTIONAR USUARIOS
 -> CREA
 -> CONSULTA
 -> ELIMINA
 -> MODIFICA
 -> LISTA
*/

class UsuarioModel extends Conexion implements templateCrud
{

   private $id;
   private $nombre;
   private $apellido;
   private $email;
   private $direccion;
   private $telefono;
   private $usuario;
   private $password;
   private $rol;
   public $pdo;


   public function __construct() //HEREDA DE LA CLASE CONEXION Y EJECUTA EL CONSTRUCTOR.
   {
      $this->pdo = new Conexion();
   }

//INICIO DE LOS METODOS SET Y GET

      #INICIO DE LOS SET
      #METE ID
   public function setId($value)
   {
      $this->id=$value;
   }

      #METE NOMBRE
   public function setNombre($value)
   {
      $this->nombre=$value;
   }

      #METE APELLIDO
   public function setApellido($value)
   {
      $this->apellido=$value;
   }

      #METE EMAIL
   public function setEmail($value)
   {
      $this->email=$value;
   }

      #METE DIRECCION
   public function setDireccion($value)
   {
      $this->direccion=$value;
   }

      #METE TELEFONO
   public function setTelefono($value)
   {
      $this->telefono=$value;
   }

      #METE USUARIO
   public function setUsuario($value)
   {
      $this->usuario=$value;
   }

      #METE PASSWORD
   public function setPassword($value)
   {
      $this->password=$value;
   }

      #METE PASSWORD
   public function setRol($value)
   {
      $this->rol=$value;
   }

      #INICIO DE LOS GET

            #SACA ID
   public function getId()
   {
     return $this->id;
   }

      #SACA NOMBRE
   public function getNombre(){
      return $this->nombre;
   }

      #SACA APELLIDO
   public function getApellido(){
      return $this->apellido;
   }

      #SACA EMAIL
   public function getEmail(){
      return $this->email;
   }

      #SACA DIRECCION
   public function getDireccion(){
      return $this->direccion;
   }

      #SACA TELEFONO
   public function getTelefono(){
      return $this->telefono;
   }

      #SACA USUARIO
   public function getUsuario()
   {
     return $this->usuario;
   }

      #SACA PASSWORD
   public function getPassword()
   {
     return $this->password;
   }

      #SACA PASSWORD
   public function getRol()
   {
     return $this->rol;
   }
//FIN DE LOS METODOS SET Y GET


//----------------------------------------------------
      #METODO PARA ENCRIPTAR TODAS LAS CONTRASEÑAS
   protected function encriptPassword($password)
    {
      define("MAX_LENGTH", 6);

      $initSalt = md5($password);
      $salt = substr($initSalt, 0, MAX_LENGTH);
      $passwordHash=hash("sha256", $password . $salt);
      $this->password=$passwordHash;
    }
//----------------------------------------------------


//INICIO DE LOS METODOS DE CRUD
      #Ingreso de usuarios
   public function ingresoUsuarioModel()
   {
      try {
         UsuarioModel::encriptPassword($this->password);
         $stmt = $this->pdo->prepare("SELECT id_usuario, nombre, usuario, password, rol FROM tusuario WHERE usuario=:usuario AND password=:password");
         $stmt->bindParam(":usuario", $this->usuario, PDO::PARAM_STR);
         $stmt->bindParam(":password", $this->password, PDO::PARAM_STR);
         $stmt->execute();
         $respuesta = $stmt->fetch();
         $stmt=null;
         return $respuesta;
      } catch (Exception $e) {
         return $e->getMessage();
      }
   }

   public function listar($funcion)
   {
      try {

         $stmt = $this->pdo->prepare("SELECT * FROM tusuario");
         $stmt->execute();
         $respuesta = $stmt->fetchAll();

         $stmt=null;
         return $respuesta;
      } catch (Exception $e) {
         return $e->getMessage();
      }
   }

   public function listarUltimosUsuarios()//Prueba para listar los ultimos 16 usuarios, lo uso en la vista del dashboard
   {
      try {
         $stmt = $this->pdo->prepare("SELECT * FROM tusuario ORDER BY id_usuario  DESC LIMIT 16");
         $stmt->execute();
         $respuesta = $stmt->fetchAll();

         $stmt=null;
         return $respuesta;
      } catch (Exception $e) {
         return $e->getMessage();
      }
   }

   public function consultarUsuario()
   {
      try {
         $stmt = $this->pdo->prepare("SELECT * FROM tusuario WHERE id_usuario=:id");
         $stmt -> bindParam(":id", $this->id, PDO::PARAM_STR);
         $stmt->execute();
         $respuesta = $stmt->fetch();
         $stmt=null;
         return $respuesta;
      } catch (Exception $e) {
         return $e->getMessage();
      }
   }

   public function consultarEmail()
   {
      try {
         $stmt = $this->pdo->prepare("SELECT * FROM tusuario WHERE correo=:correo");
         $stmt -> bindParam(":correo", $this->email, PDO::PARAM_STR);
         $stmt->execute();
         $respuesta = $stmt->fetch();
         $stmt=null;
         return $respuesta;
      } catch (Exception $e) {
         return $e->getMessage();
      }
   }

   public function modificar()
   {
      try {
         $stmt = $this->pdo->prepare("UPDATE tusuario
                                      SET nombre=:nombre, apellido=:apellido, usuario=:usuario, telefono=:telefono, direccion=:direccion, correo=:correo
                                      WHERE id_usuario=:id");
         $stmt -> bindParam(":id", $this->id, PDO::PARAM_STR);
         $stmt -> bindParam(":nombre", $this->nombre, PDO::PARAM_STR);
         $stmt -> bindParam(":apellido", $this->apellido, PDO::PARAM_STR);
         $stmt -> bindParam(":usuario", $this->usuario, PDO::PARAM_STR);
         $stmt -> bindParam(":telefono", $this->telefono, PDO::PARAM_STR);
         $stmt -> bindParam(":direccion", $this->direccion, PDO::PARAM_STR);
         $stmt -> bindParam(":correo", $this->email, PDO::PARAM_STR);
         $respuesta=$stmt->execute();

         $stmt=null;
         return $respuesta;
      } catch (Exception $e) {
         return $e->getMessage();
      }
   }

   public function eliminar()
   {
      try {
         $stmt = $this->pdo->prepare("DELETE FROM tusuario WHERE id_usuario=:id");
         $stmt -> bindParam(":id", $this->id, PDO::PARAM_STR);
         $respuesta=$stmt->execute();

         $stmt=null;
         return $respuesta;
      } catch (Exception $e) {
         return $e->getMessage();
      }
   }

   public function crear()
   {
      try {
         UsuarioModel::encriptPassword($this->password);
         $stmt = $this->pdo->prepare("INSERT INTO tusuario(nombre, apellido, correo, direccion, telefono, usuario, password, rol) VALUES (:nombre, :apellido, :correo, :direccion, :telefono, :usuario, :password, :rol)");
         $stmt -> bindParam(":nombre", $this->nombre, PDO::PARAM_STR);
         $stmt -> bindParam(":apellido", $this->apellido, PDO::PARAM_STR);
         $stmt -> bindParam(":correo", $this->email, PDO::PARAM_STR);
         $stmt -> bindParam(":direccion", $this->direccion, PDO::PARAM_STR);
         $stmt -> bindParam(":telefono", $this->telefono);
         $stmt -> bindParam(":usuario", $this->usuario, PDO::PARAM_STR);
         $stmt -> bindParam(":password", $this->password, PDO::PARAM_STR);
         $stmt -> bindParam(":rol", $this->rol, PDO::PARAM_STR);
         $respuesta=$stmt->execute();

         $stmt=null;
         return $respuesta;
      } catch (Exception $e) {
         return $e->getMessage();
      }
   }

   public function contarUsuarios()
   {
      try {
         $stmt = $this->pdo->prepare("SELECT * FROM tusuario WHERE rol=:rol");
         $stmt -> bindParam(":rol", $this->rol, PDO::PARAM_STR);
         $stmt->execute();
         $respuesta = $stmt->rowcount();

         $stmt=null;
         return $respuesta;
      } catch (Exception $e) {
         return $e->getMessage();
      }
   }

   public function modificarPassword()
   {
      try {
         UsuarioModel::encriptPassword($this->password);
         $stmt = $this->pdo->prepare("UPDATE tusuario SET password=:password WHERE id_usuario=:id");
         $stmt -> bindParam(":id", $this->id);
         $stmt -> bindParam(":password", $this->password);
         $respuesta=$stmt->execute();
         $stmt=null;
         return $respuesta;
      } catch (Exception $e) {
         return $e->getMessage();
      }
   }

//FIN DE LOS METODOS DE CRUD

} //FIN DE LA CLASE
?>
