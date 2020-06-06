$( document ).ready( function () {
//VALIDACION DEL FORMULARIO PARA CREAR SITIOS DESDE LA VISTA ADMINISTRADOR
$.validator.addMethod('caracteres', function (value, element) {
       return this.optional(element)|| /^[a-zA-ZáéíóúàèìòùÀÈÌÒÙÁÉÍÓÚñÑüÜ_\s]+$/.test(value);
         });
$.validator.addMethod('vrif', function (value, element) {
       return this.optional(element)|| /^[JGVEP][-][0-9]{8}[-][0-9]{1}$/.test(value);
         });
$.validator.addMethod('latitud', function (value, element) {
       return this.optional(element)|| /^-?([1-8]?[1-9]|[1-9]0)\.{1}\d{1,15}/g.test(value);
         });
$.validator.addMethod('longitud', function (value, element) {
       return this.optional(element)||/^-?(([-+]?)([\d]{1,3})((\.)(\d+))?)/g.test(value);
         });

  $( "#formulario_sitio_propietario" ).validate( {
    rules: {
      nombre_crear:{
        caracteres:true,
        required: true,
        maxlength: 50
      },
      rtn_crear:
      {
        required: true,
        number:true,
        maxlength:8
      },
      fecha_crear:
      {
        required: true
      },
      rif_crear:
      {
        vrif: true,
        required: true
      },
      telefono_crear:{
          required: true,
          minlength: 11, 
          maxlength: 11,
          number: true
      },
      correo_crear:{
        required: true,
        email: true
      },
      facebook_crear:
      {
        required: true,
        url: true
      },
      instagram_crear:
      {
        required: true,
        url: true
      },
      web_crear:
      {
        required: true,
        url: true
      },
      licencia_crear:
      {
        required: true,
        number:true,
        minlength: 2
      },
      /*latitud es de -90 a +90*/
      latitud_crear:
      {
        latitud:true,
        required: true
      },
      /* longitud es de -180 a +180*/
      longitud_crear:
      {
        longitud:true,
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
        maxlength: 150,
        required: true
      },
      descripcion_crear:
      {
        maxlength: 150,
        required: true
      }

     },
    messages: {
      nombre_crear:
      {
        caracteres: 'El campo no acepta numeros',
        required: 'Campo requerido',
       
      },
      rtn_crear:
      {
        required: 'Campo requerido',
        number: 'solo numeros',
        maxlength: 'El rtn debe tener maximo 8 numeros'
      },
      fecha_crear:
      {
        required: 'Campo requerido'
      },
      rif_crear:
      {
        vrif: 'Formato incorrecto',
        required: 'Campo requerido'
      },
      telefono_crear:{
        required: 'Campo requerido',
          number: 'Solo caracteres numericos',
          minlength: 'numero telefonico no valido',
          maxlength: 'numero telefonico no valido'
      },
      correo_crear:{
        required: 'Campo requerido',
         email: 'formato no valido'
      },
      facebook_crear:
      {
        url: 'Url no valida',
        required: 'Campo requerido'
      },
      instagram_crear:
      {
      url: 'Url no valida',
      required: 'Campo requerido'
      },
      web_crear:
      {
      url: 'Url no valida',
      required: 'Campo requerido'
      },
      licencia_crear:
      {
        minlength: 'La licencia debe contener mas de 2 numeros',
        number: 'Solo caracteres numericos',
        required: 'Campo requerido'
      },
      latitud_crear:
      {
        latitud: 'incorrecta',
        required: 'Campo requerido'
      },
      longitud_crear:
      {
        longitud: 'Longitud incorrecta',
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
        maxlength: 'Dirección muy larga',
        required: 'Campo requerido'
      },
      descripcion_crear:
      {   
           maxlength: 'Descripción muy larga',
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
});