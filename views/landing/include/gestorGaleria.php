<?php
require_once "../../../models/gestorGaleriaModel.php";
require_once "../../../controllers/gestorGaleria.php";
 
class ajax{

  public $nombreImagen;
  public $imagenTemporal;

  public function gestorGaleriaAjax(){

  $datos  = array('nombreImagen' => $this->nombreImagen, 
				  'imagenTemporal' => $this->imagenTemporal);


     $respuesta = gestorGaleriaController::SubirImagenController($datos);

     echo $respuesta;

  }


}


$a = new ajax();
$a-> nombreImagen = $_FILES["imagen"]["name"];
$a-> imagenTemporal = $_FILES["imagen"]["tmp_name"];
$a-> gestorGaleriaAjax();


?>



