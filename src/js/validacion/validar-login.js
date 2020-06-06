$( document ).ready( function () {
//VALIDACION DEL FORMULARIO PARA INICIO
  $( "#formulario-inicio" ).validate( { /*AGREGAS El ID DEL FORMULARIO QUE VAS A VALIDAR*/
    /*ESTO FUNCIONA EN DOS PARTES UNA SON LAS REGLAS Y LA OTRA LOS MENSAJES, lOS MENSAJES SON LOS QUE SALEN CUANDO EXISTE UN ERROR
    SI TE DAS CUENTA POR CADA REGLA HAY UN MENSAJE.

      TIENES QUE AGARRAR CADA NAME DEL IMPUT A VALIDAR, SI TE DAS CUENTA (USUARIOINGRESO) ES UN INPUT, ENTONCES SE ABREN LAS LLAVES 
      Y SE PONEN LAS REGLAS, EJEMPLO QUE REQUIRED:TRUE, O EMAIL: TRUE SI ES UN CORREO Y ASI.

      LUEGO EN MESSAGES ES LO MISMO PERO LO QUE SE PONE ES EL MENSAJE DE ERROR QUE SALDRA SI NO SE CUMPLE LA REGLA:
      EJEMPLO CON EL USUARIOINGRESO: REQUIRED :'MENSAJE'.
    */
    rules: {/* REGLAS*/
      usuarioIngreso: { /*NAME DE CADA IMPUT*/
          required: true /*AQUI SE COLOCAN LAS REGLAS, REQUIRED, EMAIL, TEXT, NUMBER. LOS SEPARAS POR COMAS*/
      },
      passwordIngreso: {
          required: true
      }
    },
    messages: { /*MENSAJES DE ERROR*/
      usuarioIngreso: {  /* TOMAS EL MISMO NAME DE INPUT*/
          required: 'Usuario requerido' /* AQUI LE PONES EL MENSAJE OSEA SI EL USUARIO NO ESCRIBIO NADA, LE SALDRA ESE MENSAJE EN EL 
                                        INPUT*/
      },
      passwordIngreso: {
          required: 'Contraseña requerida'
      },
    },
    errorElement: "small",
    errorPlacement: function ( error, element ) {
      // Add the `help-block` class to the error element
      error.addClass( "text-white" );
      error.insertAfter(element); 
    }
  } );//Fin validacion de formulario incio

  /*TODO LO DEMAS ES IGUAL, PORQUE YA EL SISTEMA ESTA CONFIGURADO PARA TRABAJAR CON ESTA MAQUETA DE ARCHIVO*/
} );