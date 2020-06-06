<?php
class ServiciosController
{
  public static function crearServicioController() 
   {
      $Oservicio=new GestorServicioModel();
      $Oservicio->setNombre($_POST["nombre_servicio"]);
      $Oservicio->setDescripcion($_POST["descripcion_servicio"]);
      $Oservicio->crearServicioModel();
      header("location:index.php?action=adminservicios");
      
   }

   public static function relaServicioController() 
   {
      $Oservicio=new GestorServicioModel();
      $Oservicio->setNombre($_POST["servicio_rela"]);
      $Oservicio->setId($_POST["sitio_rela"]);
      $Oservicio->relaServicioModel();
      header("location:index.php?action=servicios");
      
   }

   public static function listarServicios()
   {
      $Oservicio=new GestorServicioModel();
      return $Oservicio->listarServicioModel();
   }

   public static function listarServiciosPropietario($id_usuario)
   {
      $Oservicio=new GestorServicioModel();
      $Oservicio->setId($id_usuario);
      return $Oservicio->listarServicioPropietarioModel();
   }


   public static function eliminarServicios()
   {
      $Oservicio=new GestorServicioModel();
      $Oservicio->setId($_POST["id-eliminar"]);
      $Oservicio->eliminarServicioModel();
      header("location:index.php?action=adminservicios");
           
   }

   public static function eliminarServiciosPropietario()
   {
      $Oservicio=new GestorServicioModel();
      $Oservicio->setId($_POST["id-eliminar"]);
      $Oservicio->eliminarPropietarioModel();
      header("location:index.php?action=servicios");
           
   }

   public static function consultarServicios()
   {
      $Oservicio=new GestorServicioModel();
      $Oservicio->setId($_POST["id_servicio"]);
      $respuesta = array("data"=>$Oservicio->consultarServicioModel());
      echo json_encode($respuesta);
      exit();
   }

   public static function modificarServicios()
   {
      $Oservicio=new GestorServicioModel();
      $Oservicio->setId($_POST["id_editar"]);
      $Oservicio->setNombre($_POST["nombre_editar"]);
      $Oservicio->setDescripcion($_POST["descripcion_editar"]);
      $Oservicio->modificarServicioModel();
          
   }

}
?>