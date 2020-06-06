//ELIMINAR SITIO
$(".cuadro_mostrar").on('click', 'button.abrir_eliminar', function() {
 var sitio_rtn = $(this).parent('.botones_mostrar').attr("rtn");
 $("input[name=rtn-eliminar]").val(sitio_rtn);
  $('#modal-eliminar').modal("show")
});


$(".cuadro_mostrar").on('click', 'button.abrir_editar', function() {
  var sitio_rtn = $(this).parent('.botones_mostrar').attr("rtn");
 $("input[name=rtn-editar]").val(sitio_rtn);
  editarsitio(sitio_rtn);
});

//ESTA VAINA FUNCIONA PARA MODIFICAR SITIOS
function editarsitio(sitio_rtn){
  var url = "?action=misitio"
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

        var estado_id=respuesta.data.estado_id;
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



// CONSULTAR CIUDADES
function ciudades(estado_id, ciudades_element, ciudad=null){
  var url = "?action=explorer"

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

$(".estados_editar").change(function() {
  var estado_id=$(".estados_editar").val()
  var ciudades_element=$(".ciudades_editar")
  ciudades(estado_id,ciudades_element);
});
//FIN CONCULTAR CIUDADES
