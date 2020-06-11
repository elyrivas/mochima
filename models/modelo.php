<?php

  /**
ESTE MODELO SE ENCARGA DE CONTROLAR TODOS LOS ENLACES
QUE SE ENVIAN POR GET
**/
  class EnlacesPaginas
  {

    public static function enlacesPaginasModel($enlacesModels)
    {

      if ($enlacesModels=="explorer"||
          $enlacesModels=="misitio"||
          $enlacesModels=="perfil"||
          $enlacesModels=="servicios"||
          $enlacesModels=="contacto"||
          $enlacesModels=="sitio"||
          $enlacesModels=="ofertas"||
          $enlacesModels=="formulario_sitio"||
          $enlacesModels=="consultar_sitio"||
          $enlacesModels=="reset_password"||
          $enlacesModels=="new_password"||
          $enlacesModels=="salir")
          {
            $module = "views/landing/".$enlacesModels.".php";
          }

      else if ($enlacesModels=="dashboard"||
               $enlacesModels=="adminsitio"||
               $enlacesModels=="adminofertas"||
               $enlacesModels=="adminservicios"||
               $enlacesModels=="adminusuarios"||
               $enlacesModels=="adminreportes")
      {
         $module = "views/admin/".$enlacesModels.".php";
      }

      else if ($enlacesModels=="inicio")
      {
        $module = "views/template.php";
      }

      else if ($enlacesModels!="inicio")
      {
       $module="./404.php";
      }

      else {
        $module = "views/template.php";
      }

      return $module;
    }

  }


?>
