$( document ).ready( function () {
//VALIDACION DEL FORMULARIO PARA CREAR USUARIOS ADMINISTRADOR DESDE LA VISTA ADMINISTRADOR
  $( "#formulario-crear-admin" ).validate( {
    rules: {
      nombre_admin: {
          required: true,
          minlength: 3, 
          maxlength: 10
      },
      apellido_admin: {
          required: true,
          minlength: 3, 
          maxlength: 10
      },
      email_admin: {
          required: true,
          email: true
      },
      direccion_admin: {
          required: true,
          minlength: 4, 
          maxlength: 30
      },
      telefono_admin: {
          required: true,
          minlength: 5, 
          maxlength: 10,
          number: true
      },
      usuario_admin: {
          required: true,
          minlength: 2, 
          maxlength: 10
      },
      password_admin: {
          required: true,
          minlength: 6, 
          maxlength: 15
      },
      password_repeat: {
          required: true,
          minlength: 6, 
          maxlength: 15,
          equalTo: "#password-admin"
      }
    },
    messages: {
      nombre_admin: {
          required: 'Campo  requerido',
          minlength: 'El nombre debe contener mas de 3 Caracteres', 
          maxlength: 'El nombre debe contener menos de 10 caracteres'
      },
      apellido_admin: {
          required: 'Campo  requerido',
          minlength: 'El apellido debe contener mas de 3 caracteres', 
          maxlength: 'El apellido debe contener menos de 10 caracteres'
      },
      email_admin: {
          required: 'Campo  requerido',
          email: 'No es un correo valido'
      },
      direccion_admin: {
          required: 'Campo  requerido',
          minlength: 'Direccion muy Corta', 
          maxlength: 'Debe contener menos de 30 caracteres'
      },
      telefono_admin: {
          required: 'Campo  requerido',
          number: 'Solo caracteres numericos'
      },
      usuario_admin: {
          required: 'Campo  requerido',
          minlength: 'El usuario debe contener mas de 3 Caracteres', 
          maxlength: 'El usuario debe contener menos de 10 caracteres'
      },
      password_admin: {
          required: 'Campo  requerido',
          minlength: 'La contraseña debe contener mas de 6 caracteres', 
          maxlength: 'La contraseña debe contener menos de 15 caracteres'
      },
      password_repeat: {
          required: 'Campo  requerido',
          minlength: 'La contraseña debe contener mas de 6 caracteres', 
          maxlength: 'La contraseña debe contener menos de 15 caracteres',
          equalTo: "Las contraseñas deben coincidir"
      }
      
    },
    errorElement: "span",
    errorPlacement: function ( error, element ) {
      // Add the `help-block` class to the error element
      error.addClass( "text-danger" );
      error.insertAfter( element ); 
    },
    highlight: function ( element, errorClass, validClass ) {
      $( element ).addClass( "is-invalid" );
    },
    unhighlight: function (element, errorClass, validClass) {
      $( element ).removeClass( "is-invalid" );
    }
  });//validacion de formulario de crear usuario administrador




  //VALIDACION DEL FORMULARIO PARA CREAR USUARIOS PROPIETARIOS DESDE LA VISTA ADMINISTRADOR
   $( "#formulario-crear-propietario" ).validate( {
    rules: {
      nombre_propietario: {
          required: true,
          minlength: 3, 
          maxlength: 10
      },
      apellido_propietario: {
          required: true,
          minlength: 3, 
          maxlength: 10
      },
      email_propietario: {
          required: true,
          email: true
      },
      direccion_propietario: {
          required: true,
          minlength: 4, 
          maxlength: 30
      },
      telefono_propietario: {
          required: true,
          minlength: 5, 
          maxlength: 10,
          number: true
      },
      usuario_propietario: {
          required: true,
          minlength: 2, 
          maxlength: 10
      },
      password_propietario: {
          required: true,
          minlength: 6, 
          maxlength: 15
      },
      password_repeat_prop: {
          required: true,
          minlength: 6, 
          maxlength: 15,
          equalTo: "#password-propietario"
      }
    },
    messages: {
      nombre_propietario: {
          required: 'Campo  requerido',
          minlength: 'El nombre debe contener mas de 3 Caracteres', 
          maxlength: 'El nombre debe contener menos de 10 caracteres'
      },
      apellido_propietario: {
          required: 'Campo  requerido',
          minlength: 'El apellido debe contener mas de 3 caracteres', 
          maxlength: 'El apellido debe contener menos de 10 caracteres'
      },
      email_propietario: {
          required: 'Campo  requerido',
          email: 'No es un correo valido'
      },
      direccion_propietario: {
          required: 'Campo  requerido',
          minlength: 'Direccion muy Corta', 
          maxlength: 'Debe contener menos de 30 caracteres'
      },
      telefono_propietario: {
          required: 'Campo  requerido'
      },
      usuario_propietario: {
          required: 'Campo  requerido',
          minlength: 'El usuario debe contener mas de 3 Caracteres', 
          maxlength: 'El usuario debe contener menos de 10 caracteres'
      },
      password_propietario: {
          required: 'Campo  requerido',
          minlength: 'La contraseña debe contener mas de 6 caracteres', 
          maxlength: 'La contraseña debe contener menos de 15 caracteres'
      },
      password_repeat_prop: {
          required: 'Campo  requerido',
          minlength: 'La contraseña debe contener mas de 6 caracteres', 
          maxlength: 'La contraseña debe contener menos de 15 caracteres',
          equalTo: "Las contraseñas deben coincidir"
      }
      
    },
    errorElement: "span",
    errorPlacement: function ( error, element ) {
      // Add the `help-block` class to the error element
      error.addClass( "text-danger" );
      error.insertAfter( element ); 
    },
    highlight: function ( element, errorClass, validClass ) {
      $( element ).addClass( "is-invalid" );
    },
    unhighlight: function (element, errorClass, validClass) {
      $( element ).removeClass( "is-invalid" );
    }
  });//validacion de formulario de crear usuario Propietario



//VALIDACION DEL FORMULARIO PARA EDITAR USUARIOS DESDE LA VISTA ADMINISTRADOR
   $( "#formulario-editar-usuarios" ).validate( {
    rules: {
      nombre_editar: {
          required: true,
          minlength: 3, 
          maxlength: 10
      },
      apellido_editar: {
          required: true,
          minlength: 3, 
          maxlength: 10
      },
      email_editar: {
          required: true,
          email: true
      },
      direccion_editar: {
          required: true,
          minlength: 4, 
          maxlength: 30
      },
      telefono_editar: {
          required: true,
          minlength: 5, 
          maxlength: 10,
          number: true
      },
      usuario_editar: {
          required: true,
          minlength: 2, 
          maxlength: 10
      }
    },
    messages: {
      nombre_editar: {
          required: 'Campo  requerido',
          minlength: 'El nombre debe contener mas de 3 Caracteres', 
          maxlength: 'El nombre debe contener menos de 10 caracteres'
      },
      apellido_editar: {
          required: 'Campo  requerido',
          minlength: 'El apellido debe contener mas de 3 caracteres', 
          maxlength: 'El apellido debe contener menos de 10 caracteres'
      },
      email_editar: {
          required: 'Campo  requerido',
          email: 'No es un correo valido'
      },
      direccion_editar: {
          required: 'Campo  requerido',
          minlength: 'Direccion muy Corta', 
          maxlength: 'Debe contener menos de 30 caracteres'
      },
      telefono_editar: {
          required: 'Campo  requerido',
          minlength: 'Numero de telefono invalido',
          maxlength: 'Numero de telefono invalido'
      },
      usuario_editar: {
          required: 'Campo  requerido',
          minlength: 'El usuario debe contener mas de 3 Caracteres', 
          maxlength: 'El usuario debe contener menos de 10 caracteres'
      }
      
    },
    errorElement: "span",
    errorPlacement: function ( error, element ) {
      // Add the `help-block` class to the error element
      error.addClass( "text-danger" );
      error.insertAfter( element ); 
    },
    highlight: function ( element, errorClass, validClass ) {
      $( element ).addClass( "is-invalid" );
    },
    unhighlight: function (element, errorClass, validClass) {
      $( element ).removeClass( "is-invalid" );
    }
  });//validacion de formulario de crear usuario editar


});