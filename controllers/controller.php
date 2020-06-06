<?php
/**
ESTE CONTROLADOR SE OCUPA CAPTAR LO QUE VIAJA POR $_GET
Y LOS ENVIA AL CONTROLADOR
*/
class MvcController {

    /*Este llama la plantilla*/
/*-----------------------------------*/
    public function inicio() {

      include "views/template.php";

    }
/*-----------------------------------*/

/*Interaccion del usuario*/
/*-----------------------------------*/

    public function enlacesPaginasController(){

      if (isset($_GET["action"])) {
        $enlacesController = $_GET["action"];

      }

      else {
        $enlacesController ="inicio";
      }

      $respuesta = EnlacesPaginas::enlacesPaginasModel($enlacesController);
      include $respuesta;


    }
}

?>