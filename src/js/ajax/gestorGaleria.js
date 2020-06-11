
/*=========================================================
Area de arrastre
===========================*/ 
if($("#lightbox").html() == 0){

  $("#lightbox").css({"height":"200px"});

}

else{

  $("#lightbox").css({"height":"auto"});

}

/*=========================================================*/
 

/*=========================================================
Area de arrastre
===========================*/

$("body").on("dragover", function(e){

  e.preventDefault();
  e.stopPropagation();

})


$("#lightbox").on("dragover", function(e){

  e.preventDefault();
  e.stopPropagation();

  $("#lightbox").css({"background":"url(src/img/pattern.jpg)"})

});

/*=============================================
Soltar las Imágenes
=============================================*/
/*=============================================
Soltar las Imágenes
=============================================*/

$("body").on("drop", function(e){

  e.preventDefault();
  e.stopPropagation();

});

var imagenSize = [];
var imagenType = [];

$("#lightbox").on("drop", function(e){

  e.preventDefault();
  e.stopPropagation();

  $("#lightbox").css({"background":"white"})

  archivo = e.originalEvent.dataTransfer.files;
  
  for(var i = 0; i < archivo.length; i++){

    imagen = archivo[i];
    imagenSize.push(imagen.size);
    imagenType.push(imagen.type);

    if(Number(imagenSize[i]) > 2000000){

      $("#lightbox").before('<div class="alert alert-warning alerta text-center">El archivo excede el peso permitido, 2mb</div>')

    }

    else{

      $(".alerta").remove();
    
    }

    if(imagenType[i] == "image/jpeg" || imagenType[i] == "image/png"){

      $(".alerta").remove();    

    }
    else{

      $("#lightbox").before('<div class="alert alert-warning alerta text-center">El archivo debe ser formato JPG o PNG</div>')

    }

    if(Number(imagenSize[i]) < 2000000 && imagenType[i] == "image/jpeg" || imagenType[i] == "image/png"){

      var datos = new FormData();

      datos.append("imagen", imagen);

      $.ajax({
        url:"?action=formulario_sitio&function=guardar-imagen",
        method: "POST",
        data: datos,
        cache: false,
        dataType: 'json',
        contentType: false,
        processData: false,
        beforeSend: function(){
         

          $("#lightbox").append('<div class="col-sm-6 col-md-4 col-lg-4 item pt-3"><a href="src/img/status.gif" data-lightbox="photos"><img class="img-fluid" src="src/img/status.gif"></a></div>'); 
        },
        success: function(respuesta){

         if (respuesta.operation) {
          alert('lito');
         }
          
        }

      })

    }
  
  }

})

