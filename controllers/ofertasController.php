<?php
class OfertaController
{
  public static function guardarOfertaController() 
   {
      $Oferta=new GestorOfertaModel();
      $Oferta->setTitulo($_POST["tituloOferta"]);
      $Oferta->setPrecio($_POST["precioOferta"]);
      $Oferta->setId($_POST["sitio_crear"]);
      $Oferta->setContenido($_POST["contenidoOferta"]);
      $Oferta->crearOfertaModel();
      header("location:index.php?action=ofertas");
      
   }

   public static function listarOfertas()
   {
      $Oferta=new GestorOfertaModel();
      return $Oferta->listarOfertaModel();
   }

    public static function listarPorpietarioOfertas($id)
    {
      $Oferta=new GestorOfertaModel();
      $Oferta->setId($id);
      return $Oferta->listarOfertaPropietarioModel();
    }

    public static function listarOfertasUnicas($id)
    {
      $Oferta=new GestorOfertaModel();
      $Oferta->setId($id);
      return $Oferta->listarOfertaUnicas();
    }


   public static function eliminarOfertas()
   {
      $Oferta=new GestorOfertaModel();
      $Oferta->setId($_POST["id-eliminar"]);
      $Oferta->eliminarOfertaModel();

        if ($_GET["action"]=="ofertas")
        {
             header("location:index.php?action=ofertas");
         }
         else if ($_GET["action"]=="adminofertas") {
            header("location:index.php?action=adminofertas");
            exit();
         }
   }

   public static function consultarOfertas()
   {
      $Oferta=new GestorOfertaModel();
      $Oferta->setId($_POST["id_oferta"]);
      $respuesta = array("data"=>$Oferta->consultarOfertas());
      echo json_encode($respuesta);
      exit();
   }

   public static function modificarController()
   {
      $Oferta=new GestorOfertaModel();
      $Oferta->setId($_POST["id_editar"]);
      $Oferta->setTitulo($_POST["titulo_editar"]);
      $Oferta->setPrecio($_POST["precio_editar"]);
      $Oferta->setSitio($_POST["sitio_editar"]);
      $Oferta->setContenido($_POST["contenido_editar"]);
      $Oferta->modificarOfertas();
          
   }


  public static function contarOfertas($funcion)
  {
      $Oferta=new GestorOfertaModel();
      return $Oferta->contarOfertas($funcion);

   }


    public static function generarReporteOfertas() 
   {
      $ObjOfertas= new GestorOfertaModel();
      $oferta = $ObjOfertas-> listarOfertaModel('tofertas');

      require_once "src/dompdf/libreria/vendor/autoload.php"; 
      // instantiate and use the dompdf class
      $dompdf = new Dompdf\Dompdf();
      ob_start();
         require_once "views/admin/pdf/reporte_ofertas.php";
      $html = ob_get_clean();
      $dompdf->loadHtml( $html );
      // Render the HTML as PDF
      $dompdf->render();
      // Output the generated PDF to Browser
      $dompdf->stream('reporte_ofertas.pdf',['Attachment' => 0]);

   }

}
?>