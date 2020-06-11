
//ELIMINAR SITIO
$("#tabla-sitios").on('click', 'button.btn-eliminar', function() {
  var sitio_rtn=$(this).parents("tr").attr("id");
  $("input[name=rtn-eliminar]").val(sitio_rtn);
  $('#modal-eliminar').modal("show")
});
//FIN DE ELIMINAR USUARIO

// CONSULTAR CIUDADES
function ciudades(estado_id, ciudades_element, ciudad=null){
  var url = "?action=adminsitio"
  
  console.log(estado_id)

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
//FIN CONCULTAR CIUDADES

//ESTA VAINA FUNCIONA PARA MODIFICAR SITIOS
function editarsitio(sitio_rtn){
  var url = "?action=adminsitio"
  $.ajax({
    url: url,
    type: 'POST', //metodo de la peticion
    dataType: 'json',//tipo de dato de la respuesta
    data: {rtn_sitio: sitio_rtn,function:"consultar"},
    success: function(respuesta){
      if (respuesta.data) {
        $("input[name=id_editar]").val(respuesta.data.id_sitio);
        $("input[name=nombre_editar]").val(respuesta.data.nombre_sitio);
        $("input[name=rtn_editar]").val(respuesta.data.rtn);
        $("select[name=tipos_editar]").val(respuesta.data.tipo_id);
        $("input[name=fecha_editar]").val(respuesta.data.fecha_otorgamiento_rtn);
        $("input[name=rif_editar]").val(respuesta.data.rif);
        $("input[name=telefono_editar]").val(respuesta.data.telefono_sitio);
        $("input[name=correo_editar]").val(respuesta.data.email);
        $("input[name=facebook_editar]").val(respuesta.data.facebook);
        $("input[name=instagram_editar]").val(respuesta.data.instagram);
        $("input[name=web_editar]").val(respuesta.data.sitioweb);
        $("input[name=licencia_editar]").val(respuesta.data.num_licencia);
        $("input[name=latitud_editar]").val(respuesta.data.latitud);
        $("input[name=longitud_editar]").val(respuesta.data.longitud);
        $("select[name=estado_editar]").val(respuesta.data.estado_id);
        $("select[name=estatus_editar]").val(respuesta.data.estatus);
        $("input[name=habitacion_editar]").val(respuesta.data.num_habitacion);
        $("input[name=licencia_editar]").val(respuesta.data.num_licencia);
        $("input[name=direccion_editar]").val(respuesta.data.direccion_sitio);
        $("textarea[name=descripcion_editar]").val(respuesta.data.descripcion);

        var estado_id=respuesta.data.estado_id
        ciudades(estado_id, $(".ciudades_editar"), respuesta.data.ciudad_id );
        $('#modal-modificar').modal("show")
      }else{
        alert("error")
      }
    },
    error: function() {
      console.log("No se ha podido obtener la información");
    }
  })
};


$("#tabla-sitios").on('click', 'button.btn-modificar', function() {
  var sitio_rtn=$(this).parents("tr").attr("id");
  editarsitio(sitio_rtn)
  
});

$(".estados_editar").change(function() {
  var estado_id=$(this).val()
  var ciudades_element=$(".ciudades_editar")
  ciudades(estado_id,ciudades_element);
});

//AQUI TERMINA MOFICAR+}


//GALERIA

$("#tabla-sitios").on('click', 'button.btn-galeria', function() {
  var sitio_id=$(this).parents("tr").attr("numero");
  $("input[name=id_sitio]").val(sitio_id);
  galeria(sitio_id);
  $('#modal-galeria').modal("show");
});


//ESTA FUNCION ES PARA LISTAR LA GALERIA
function galeria(sitio_id){
  var galeria_element=$("#galeria_listar") 
  galeria_element.html("")
  var url = "?action=adminsitio"
  

  $.ajax({
    url: url,
    type: 'POST', //metodo de la peticion
    dataType: 'json',//tipo de dato de la respuesta
    data: {id_sitio: sitio_id,function:"listar_galeria"},
    success: function(respuesta){
      if (respuesta.data) {
        var contenidoHTML = $("");       
        $.each( respuesta.data, function(i,item){
          
          
        galeria_element.append(`<div class="col-sm-6 col-md-4 col-lg-4 item pt-3 marco_galeria" >
                              <a href="${item.url}" data-lightbox="photos">
                                <img class="img-thumbnail" src="${item.url}" height="100">
                              </a>
                              <input type="hidden" value="${sitio_id}" name="id_sitio_eliminar">
                              <input type="hidden" value="${item.url}" name="ruta_sitio_eliminar">
                              <button id="boton_eliminar" class="boton_eliminar">Eliminar</button>
                            </div>`)
        })

      }else{
        alert("error")
      }
    },
    error: function() {
      console.log("No se ha podido obtener la información");
    }
  })
};

$("#modal-galeria").on('click', 'button.boton_eliminar', function() {

  var sitio_id=$("input[name=id_sitio]").val();
  var ruta=$(this).parent("div.marco_galeria").children('input[name=ruta_sitio_eliminar]').val();

  eliminar_galeria(sitio_id, ruta);

  
});


function eliminar_galeria(sitio_id, ruta) {
    
    $.ajax({
        type: 'POST',
        url: '?action=adminsitio',
        data: { function:'galeriaEliminar', sitio:sitio_id, name_2:ruta},
        dataType: 'json'
    })
    .done(function(res){
        if (res) { 
            galeria(sitio_id);
        }else{
            alert('error al eliminar')
        }
    })
};