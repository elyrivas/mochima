<?php 
	/**
	 * CONTROLADOR DEL MODULO BITACORA
	 */
	class bitacoraController
	{
	    /**
	     * CONTROLADOR DEL MODULO BITACORA
	     */
	    public static function crearRegistro($accion,$descripcion,$modulo)
	    {	
	    	date_default_timezone_set("America/Caracas");
			$fecha = date("Y-m-d H:i:s");
			$ip = empty($_SERVER["REMOTE_ADDR"]) ? "Desconocida" : $_SERVER["REMOTE_ADDR"];
	    	$Obitacora= new bitacoraModel();
	    	$Obitacora->setUsuario($_SESSION['id_usuario']);
	    	$Obitacora->setIp($ip);
	    	$Obitacora->setFecha($fecha);
	    	$Obitacora->setAccion($accion);
	    	$Obitacora->setModulo($modulo);
	    	$Obitacora->setDescripcion($descripcion);
	    	$Obitacora->crearRegistroModel();
	    	return true;
	    }

	    public static function listarRegistro()
	    {
	    	$Obitacora= new bitacoraModel();
	    	return $Obitacora->listarRegistroModel();

	    }
	}
?>