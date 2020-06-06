$( document ).ready( function () {
//VALIDACION DEL FORMULARIO PARA CREAR SITIOS DESDE LA VISTA ADMINISTRADOR
  $( "#formulario-crear-sitio" ).validate( {
    rules: {
      nombre_crear:{
        required: true
      },
      rtn_crear:
      {
        required: true,
        text: false
      },
      fecha_crear:
      {
        required: true
      },
      rif_crear:
      {
        required: true
      },
      telefono_crear:{
        required: true
      },
      correo_crear:{
        required: true,
        email: true
      },
      facebook_crear:
      {
        required: true
      },
      instagram_crear:
      {
        required: true
      },
      web_crear:
      {
        required: true
      },
      licencia_crear:
      {
        required: true
      },
      latitud_crear:
      {
        required: true
      },
      longitud_crear:
      {
        required: true
      },
      estado_crear:
      {
        required: true
      },
      ciudad_crear:
      {
        required: true
      },
      direccion_crear:
      {
        required: true
      },
      descripcion_crear:
      {
        required: true
      }
    },
    messages: {
      nombre_crear:{
        required: 'Campo requerido'
      },
      rtn_crear:
      {
        required: 'Campo requerido',
        text: 'solo numeros'
      },
      fecha_crear:
      {
        required: 'Campo requerido'
      },
      rif_crear:
      {
        required: 'Campo requerido'
      },
      telefono_crear:{
        required: 'Campo requerido'
      },
      correo_crear:{
        required: 'Campo requerido',
        email: 'Campo requerido'
      },
      facebook_crear:
      {
        required: 'Campo requerido'
      },
      instagram_crear:
      {
        required: 'Campo requerido'
      },
      web_crear:
      {
        required: 'Campo requerido'
      },
      licencia_crear:
      {
        required: 'Campo requerido'
      },
      latitud_crear:
      {
        required: 'Campo requerido'
      },
      longitud_crear:
      {
        required: 'Campo requerido'
      },
      estado_crear:
      {
        required: 'Campo requerido'
      },
      ciudad_crear:
      {
        required: 'Campo requerido'
      },
      direccion_crear:
      {
        required: 'Campo requerido'
      },
      descripcion_crear:
      {
        required: 'Campo requerido'
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
  });//validacion de formulario de crear Sitios


  //VALIDACION DEL FORMULARIO PARA MODIFICAR SITIOS TURISTICOS DESDE LA VISTA ADMINISTRADOR
  $( "#formulario-editar-sitio" ).validate( {
    rules: {
      nombre_editar:{
        required: true
      },
      rtn_editar:
      {
        required: true,
        text: false
      },
      fecha_editar:
      {
        required: true
      },
      rif_editar:
      {
        required: true
      },
      telefono_editar:{
        required: true
      },
      correo_editar:{
        required: true,
        email: true
      },
      facebook_editar:
      {
        required: true
      },
      instagram_editar:
      {
        required: true
      },
      web_editar:
      {
        required: true
      },
      licencia_editar:
      {
        required: true
      },
      latitud_editar:
      {
        required: true
      },
      longitud_editar:
      {
        required: true
      },
      estado_editar:
      {
        required: true
      },
      ciudad_editar:
      {
        required: true
      },
      direccion_editar:
      {
        required: true
      },
      descripcion_editar:
      {
        required: true
      }
    },
    messages: {
      nombre_editar:{
        required: 'Campo requerido'
      },
      rtn_editar:
      {
        required: 'Campo requerido',
        text: 'solo numeros'
      },
      fecha_editar:
      {
        required: 'Campo requerido'
      },
      rif_editar:
      {
        required: 'Campo requerido'
      },
      telefono_editar:{
        required: 'Campo requerido'
      },
      correo_editar:{
        required: 'Campo requerido',
        email: 'Campo requerido'
      },
      facebook_editar:
      {
        required: 'Campo requerido'
      },
      instagram_editar:
      {
        required: 'Campo requerido'
      },
      web_editar:
      {
        required: 'Campo requerido'
      },
      licencia_editar:
      {
        required: 'Campo requerido'
      },
      latitud_editar:
      {
        required: 'Campo requerido'
      },
      longitud_editar:
      {
        required: 'Campo requerido'
      },
      estado_editar:
      {
        required: 'Campo requerido'
      },
      ciudad_editar:
      {
        required: 'Campo requerido'
      },
      direccion_editar:
      {
        required: 'Campo requerido'
      },
      descripcion_editar:
      {
        required: 'Campo requerido'
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
  });//validacion de formulario de modificar Sitios
});