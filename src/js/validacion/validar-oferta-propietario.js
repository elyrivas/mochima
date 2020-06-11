$( document ).ready( function () {
//VALIDACION DEL FORMULARIO PARA CREAR OFERTAS DESDE LA VISTA DEL PROPIETARIO

  $( "#ofertas-propietario" ).validate( {
    rules: {
      tituloOferta:{
        required: true,
        maxlength: 15
      },
      precioOferta:
      {
        required: true,
        number:true
       
      },
      contenidoOferta:
      {
        maxlength: 150,
        required: true
      }

     },
    messages: {
      tituloOferta:
      {
        caracteres: 'El campo no acepta numeros',
        required: 'Campo requerido',
        maxlength:'Titulo muy largo'
       
      },
      precioOferta:
      {
        required: 'Campo requerido',
        number: 'solo numeros',
       
      },
      contenidoOferta:
      {
        required: 'Campo requerido',
        maxlength: 'Descripción muy larga'
      },
      
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