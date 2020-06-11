<?php
/*REGISTRO DE USUARIO*/

/**
CONTROLADOR ENCARGADO DE LAS FUNCIONES DEL USUARIOS
 */
class UsuarioController
{
   

   public static function ingresoController()
   {
      if (isset($_POST["usuarioIngreso"]))
      {

         $OUsuario=new UsuarioModel();
         $OUsuario->setUsuario($_POST["usuarioIngreso"]);
         $OUsuario->setPassword($_POST["passwordIngreso"]);

         $respuesta=$OUsuario->ingresoUsuarioModel();

         if ($respuesta==true) {

            if ($respuesta["rol"]=="1") {

               $_SESSION["validarA"]=true;
               $_SESSION["id_usuario"]=$respuesta["id_usuario"];
               $_SESSION["nombre_usuario"]=$respuesta["nombre"];
               $modulo="usuario";
               $accion="inicio de sesion";
               $descripcion="el usuario ".$_SESSION["nombre_usuario"]." ingreso al sistema";
               $Obitacora= bitacoraController::crearRegistro($accion,$descripcion,$modulo);
               header("location:index.php?action=dashboard");

            } elseif ($respuesta["rol"]=="2") {
               $_SESSION["validar"]=true;
               $_SESSION["id_usuario"]=$respuesta["id_usuario"];
               $_SESSION["nombre_usuario"]=$respuesta["nombre"];
               $modulo="usuario";
               $accion="inicio de sesion";
               $descripcion="el usuario ".$_SESSION["nombre_usuario"]." ingreso al sistema";
               $Obitacora= bitacoraController::crearRegistro($accion,$descripcion,$modulo);
               header("location:index.php?action=misitio");
            }
         } else {
               header("location:index.php?action=inicio");
         }
      }
   }

   public function recuperarContraseña()
   {
      $codigoSecreto=rand(111111,999999);
      
      if (isset($_POST["emailRe"])) {
         $correo=$_POST["emailRe"];
         $OUsuario= new UsuarioModel();
         $OUsuario->setEmail($_POST["emailRe"]);
         $respuesta=$OUsuario->consultarEmail();


         if ($respuesta==true) {

            $valores=str_split($codigoSecreto);

            $body = file_get_contents("./src/phpMailer/index.html");
            $sustituir_nombre = "%nombre_usuario%";
            $por_nombre = trim(utf8_decode($respuesta["usuario"]));
            $body = str_replace($sustituir_nombre, $por_nombre, $body);



            for($i=0;$i<strlen($codigoSecreto);$i++)
            {
               $numero_sustituir= "%".$i."%";
               $numero_ingresar = $valores[$i];
               $body = str_replace($numero_sustituir, $numero_ingresar, $body);
            }


            //----------------------------------------------------------
            require("./plugins/PHPMailer-master/src/PHPMailer.php");
            require("./plugins/PHPMailer-master/src/SMTP.php");
            $mail = new PHPMailer\PHPMailer\PHPMailer();
            $mail->IsSMTP(); // enable SMTP
            $mail->SMTPDebug = 0; // debugging: 1 = errors and messages, 2 = messages only
            $mail->SMTPAuth = true; // authentication enabled
            $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
            $mail->Host = "smtp.gmail.com";
            $mail->Port = 465; // or 587
            $mail->IsHTML(true);
            $mail->Username = "mochimamintur@gmail.com";
            $mail->Password = "123456789mochima";
            $mail->SetFrom("mochimamintur@gmail.com");
            $mail->Subject = "Codigo de Verificacion";
            $mail->MsgHTML($body);
            $mail->AddAddress($correo);
            if($mail->Send()) {
               $_SESSION["reset"]=$codigoSecreto;
               header("location:index.php?action=reset_password");
            } else {
               echo "Mailer Error: " . $mail->ErrorInfo;
            }
         } else {
            echo 'Tu cuenta de correo no esta registrada';
         }
      }
   }

   public static function modificarPassword()
   {
      $OUsuario=new UsuarioModel();
      $OUsuario->setId($_SESSION["id_usuario"]);
      $OUsuario->setPassword($_POST["new-password"]);
      $respuesta=$OUsuario->modificarPassword();
      if ($respuesta) {
         $datos="Modificar Password";
         $descripcion="el usuario ".$_SESSION["nombre_usuario"]." modifico su contraseña";
         $Obitacora= bitacoraController::crearRegistro($datos,$descripcion,"usuario");
         header("location:index.php?action=inicio");

      }
   }

   public static function listarUsuarios()
   {
      $OUsuario=new UsuarioModel();
      return $OUsuario->listar($funcion="");
   }

   public static function listarUltimosUsuarios()//prueba para listar en el dashboard los ultimos 16 usuarios
   {
      $OUsuario=new UsuarioModel();
      return $OUsuario->listarUltimosUsuarios();
   }

   public static function editarUsuario()
   {
      $OUsuario=new UsuarioModel();
      $OUsuario->setId($_POST["id_usuario"]);
      $respuesta = array("data"=>$OUsuario->consultarUsuario());
      echo json_encode($respuesta);

   }

   public static function modificarUsuarios()
   {
      $OUsuario=new UsuarioModel();
      $OUsuario->setId($_POST["id_editar"]);
      $OUsuario->setNombre($_POST["nombre_editar"]);
      $OUsuario->setApellido($_POST["apellido_editar"]);
      $OUsuario->setUsuario($_POST["usuario_editar"]);
      $OUsuario->setDireccion($_POST["direccion_editar"]);
      $OUsuario->setTelefono($_POST["telefono_editar"]);
      $OUsuario->setEmail($_POST["email_editar"]);
      $respuesta=$OUsuario->modificar();
      if ($respuesta) {
         $modulo="usuario";
         $accion="modificar usuario";
         $descripcion="el ".$_SESSION["nombre_usuario"]." modifico datos de perfil";
         $Obitacora= bitacoraController::crearRegistro($accion,$descripcion,$modulo);
         return $respuesta;
      }
   }

   public static function eliminarUsuarios()
   {
      $OUsuario=new UsuarioModel();
      $OUsuario->setId($_POST["id-eliminar"]);
      if ($OUsuario->eliminar()) {
         $modulo="usuario";
         $accion="Eliminar usuario";
         $descripcion="el ".$_SESSION["nombre_usuario"]." elimino un usuario";
         $Obitacora= bitacoraController::crearRegistro($accion,$descripcion,$modulo);
      }
      header("location:index.php?action=adminusuarios");
   }

   public static function registroUsuario() //ESTE METODO FUNCIONA PARA EL USUARIO PROPIETARIO SOLAMENTE, EL REGISTRO DE TAL USUARIO
   {
      $OUsuario=new UsuarioModel();
      $OUsuario->setNombre($_POST["nombre_crear"]);
      $OUsuario->setApellido($_POST["apellido_crear"]);
      $OUsuario->setEmail($_POST["email_crear"]);
      $OUsuario->setDireccion($_POST["direccion_crear"]);
      $OUsuario->setTelefono($_POST["telefono_crear"]);
      $OUsuario->setUsuario($_POST["usuario_crear"]);
      $OUsuario->setPassword($_POST["password_crear"]);
      $OUsuario->setRol("2");
      $estatus=$OUsuario->crear();
//SI EL REGISTRO SE COMPLETA EL MODELO RETORNA UNA TRUE Y AQUI VALIDO SI ES IGUAL A TRUE LE CREO UNA SESION
      if ($estatus==true) {
         session_start();
         $_SESSION["validar"]=true;
         $_SESSION["id_usuario"]=$estatus;
         $modulo="usuario";
         $accion="registro de usuario";
         $descripcion="el ".$_SESSION["nombre_usuario"]." se registro en el sistema";
         $Obitacora= bitacoraController::crearRegistro($accion,$descripcion,$modulo);
         header("location:index.php?action=misitio");

      }

      return $estatus;
   }

   public static function crearUsuarios()
   {

      if ($_POST["rol_user"]=="1") {
         $rol="admin";
      } elseif ($_POST["rol_user"]=="2") {
         $rol="propietario";
      }


      $OUsuario=new UsuarioModel();
      $OUsuario->setNombre($_POST["nombre_".$rol]);
      $OUsuario->setApellido($_POST["apellido_".$rol]);
      $OUsuario->setEmail($_POST["email_".$rol]);
      $OUsuario->setDireccion($_POST["direccion_".$rol]);
      $OUsuario->setTelefono($_POST["telefono_".$rol]);
      $OUsuario->setUsuario($_POST["usuario_".$rol]);
      $OUsuario->setPassword($_POST["password_".$rol]);
      $OUsuario->setRol($_POST["rol_user"]);
      if ($estatus=$OUsuario->crear()) {
         $modulo="usuario";
         $accion="Registro de usuario";
         $descripcion="el ".$_SESSION["nombre_usuario"]." registro un usuario";
         $Obitacora= bitacoraController::crearRegistro($accion,$descripcion,$modulo);
      }
      return $estatus;
   }

   public static function contarUsuarios() //ESTE METODO ES PARA CONTAR LOS USUARIOS PROPIETARIOS
   {
      $OUsuario=new UsuarioModel();
      $OUsuario->setRol("2");
      return $OUsuario->contarUsuarios();
   }

     public static function generarReporteUsuarios() //ESTE METODO ES PARA CONTAR LOS USUARIOS PROPIETARIOS
   {
      $OUsuario=new UsuarioModel();
      $usuarios = $OUsuario->listar('tusuario');

      require_once "src/dompdf/libreria/vendor/autoload.php";
      // instantiate and use the dompdf class

      $dompdf = new Dompdf\Dompdf();
      ob_start();
         require_once "views/admin/pdf/reporte_usuarios.php";
      $html = ob_get_clean();
      $dompdf->loadHtml( $html );
      // Render the HTML as PDF
      $dompdf->render();
      // Output the generated PDF to Browser

      $dompdf->stream('reporte_usuarios.pdf');


   }


} //FIN DE LA CLASE
?>
