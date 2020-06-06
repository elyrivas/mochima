// CONSULTAR CIUDADES
function ciudades(estado_id, ciudades_element, ciudad=null){
  var url = "?action=formulario_sitio"
  ciudades_element.html("")
  ciudades_element.attr("disabled",true)
  $.ajax({
    url: url,
    type: 'POST', //metodo de la peticion
    dataType: 'json',//tipo de dato de la respuesta
    data: {id_estado: estado_id,function:"get-ciudades"},
    success: function(respuesta){
      var contenidoHTML = $("")
      $.each( respuesta.data, function(i,item){

        contenidoHTML += `<option value="${item.id_ciudad}">
        ${item.nombre_ciudad}
        </option>`
      })
      ciudades_element.html(contenidoHTML)
      console.log(ciudad)
      if (ciudad!==null) {

        ciudades_element.val(ciudad);
      }
      ciudades_element.attr("disabled",false)
    },
    error: function() {
      console.log("No se ha podido obtener la información");
    }
  })
};

$(".estados").change(function() {
  var estado_id=$(".estados").val()
  var ciudades_element=$(".ciudades")
  ciudades(estado_id,ciudades_element);
});

Dropzone.autoDiscover = false;
const myDropzone = new Dropzone(".dropzone", {  
  url: '?action=formulario_sitio',//se especifica cuando el form no tiene el aributo action, por de fault toma la url del action en el formulario
  method: "post", //por defecto es post se puede poner get, put, etc.....
  withCredentials: false,
  parallelUploads: 10, //Cuanto archivos subir al mismo tiempo
  uploadMultiple: false,
  maxFilesize: 15, //Maximo Tamaño del archivo expresado en mg
  paramName: "file",//Nombre con el que se envia el archivo a nivel de parametro
  createImageThumbnails: true,
  maxThumbnailFilesize: 10, //Limite para generar imagenes (Previsualizacion)
  thumbnailWidth: 154, //Medida de largo de la Previsualizacion
  thumbnailHeight: 154,//Medida alto Previsualizacion
  filesizeBase: 1000,
  maxFiles: 6,//si no es nulo, define cuántos archivos se cargaRAN. Si se excede, se llamará el EVENTO maxfilesexceeded.
  params: { 'jose':'asdasd' }, //Parametros adicionales al formulario de envio ejemplo {tipo:"imagen"}
  clickable: true,
  ignoreHiddenFiles: true,
  acceptedFiles: "image/*", //EJEMPLO PARA PDF WORD ETC ,application/pdf,.psd,.DOCX",
  acceptedMimeTypes: null,//Ya no se utiliza paso a ser AceptedFiles
  autoProcessQueue: false,//True sube las imagenes automaticamente, si es false se tiene que llamar a myDropzone.processQueue(); para subirlas
  autoQueue: false,
  addRemoveLinks: true,//Habilita la posibilidad de eliminar/cancelar un archivo. Las opciones dictCancelUpload, dictCancelUploadConfirmation y dictRemoveFile se utilizan para la redacción.
  previewsContainer: null,//define dónde mostrar las previsualizaciones de archivos. Puede ser un HTMLElement liso o un selector de CSS. El elemento debe tener la estructura correcta para que las vistas previas se muestran correctamente.
  capture: null,
  dictDefaultMessage: "Arrastra los archivos aqui para subirlos",
  dictFallbackMessage: "Su navegador no soporta arrastrar y soltar para subir archivos.",
  dictFallbackText: "Por favor utilize el formuario de reserva de abajo como en los viejos timepos.",
  dictFileTooBig: "La imagen revasa el tamaño permitido ({{filesize}}MiB). Tam. Max : {{maxFilesize}}MiB.",
  dictInvalidFileType: "No se puede subir este tipo de archivos.",
  dictResponseError: "Server responded with {{statusCode}} code.",
  dictCancelUpload: "Cancel subida",
  dictCancelUploadConfirmation: "¿Seguro que desea cancelar esta subida?",
  dictRemoveFile: "Eliminar",
  dictRemoveFileConfirmation: null,
  dictMaxFilesExceeded: "Se ha excedido el numero de archivos permitidos."
});

/*$('#uploadfiles').click(function(){
    myDropzone.processQueue();
});*/

/*$("#submitbutton").click(function() {
  
});*/
$('.btn-final').click(function(e){
  //paralizo el evento submit para que no envie nada.
  e.preventDefault()
  $.ajax({
    url: '?action=formulario_sitio',
    type: 'POST', //metodo de la peticion
    dataType: 'json',//tipo de dato de la respuesta
    data: {
      function:'crear',
      tipo_crear:$('form#formulario_sitio select[name=tipo_crear]').val(),
      usuario_crear:$('form#formulario_sitio input[name=usuario_crear]').val(),
      estatus_crear:$('form#formulario_sitio input[name=estatus_crear]').val(),
      rtn_crear:$('form#formulario_sitio input[name=rtn_crear]').val(),
      fecha_crear:$('form#formulario_sitio input[name=fecha_crear]').val(),
      rif_crear:$('form#formulario_sitio input[name=rif_crear]').val(),
      nombre_crear:$('form#formulario_sitio input[name=nombre_crear]').val(),
      estado_crear:$('form#formulario_sitio select[name=estado_crear]').val(),
      ciudad_crear:$('form#formulario_sitio select[name=ciudad_crear]').val(),
      latitud_crear:$('form#formulario_sitio input[name=latitud_crear]').val(),
      longitud_crear:$('form#formulario_sitio input[name=longitud_crear]').val(),
      licencia_crear:$('form#formulario_sitio input[name=licencia_crear]').val(),
      direccion_crear:$('form#formulario_sitio input[name=direccion_crear]').val(),
      telefono_crear:$('form#formulario_sitio input[name=telefono_crear]').val(),
      correo_crear:$('form#formulario_sitio input[name=correo_crear]').val(),
      web_crear:$('form#formulario_sitio input[name=web_crear]').val(),
      instagram_crear:$('form#formulario_sitio input[name=instagram_crear]').val(),
      facebook_crear:$('form#formulario_sitio input[name=facebook_crear]').val(),
      descripcion_crear:$('form#formulario_sitio textarea[name=descripcion_crear]').val()
    },
    success: function(respuesta){
      
      if (respuesta.operation==true) {
        myDropzone.options.params = { "id_sitio" : respuesta.sitio, "function" : 'agregar-fotos' }; 
        const acceptedFiles = myDropzone.getAcceptedFiles()
        for (let i = 0; i < acceptedFiles.length; i++) {
          setTimeout(function () {
            myDropzone.processFile(acceptedFiles[i])
          }, i * 2000)
        }
      }else{
        alert("error")
      }
    },
    error: function() {
      console.log("No se ha podido obtener la información");
    }
  })
})