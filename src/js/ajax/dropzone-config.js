Dropzone.options.subirImagen = {    
    url: null,//se especifica cuando el form no tiene el aributo action, por de fault toma la url del action en el formulario
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
    autoProcessQueue: true,//True sube las imagenes automaticamente, si es false se tiene que llamar a myDropzone.processQueue(); para subirlas
    autoQueue: true,
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
    dictMaxFilesExceeded: "Se ha excedido el numero de archivos permitidos.",

    removedfile: function(file) {
        
        var name = file.name; 
        var sitio =$("input[name=id_sitio]").val(); 
        
        $.ajax({
            type: 'POST',
            url: '?action=adminsitio',
            data: { name:name,function:'galeriaEliminar', sitio:sitio },
            dataType: 'json'
        })
        .done(function(res){
            if (res) {
                file.previewElement.remove();
                var sitio_id=$("input[name=id_sitio]").val();
                galeria(sitio_id);
            }else{
                alert('error al eliminar')
            }
        })
    }, 

    queuecomplete: function(file) {
        sitio_id=$("input[name=id_sitio]").val();
        galeria(sitio_id);
    },

    init: function() {


        $('#modal-galeria').on('hidden.bs.modal', function (e) {


            $('.dropzone')[0].dropzone.files.forEach(function(file) { 
              file.previewElement.remove(); 
            });

            $('.dropzone').removeClass('dz-started');


        });

    }

};
