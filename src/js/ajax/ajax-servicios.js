$("#tabla-servicios").on('click', 'button.btn-eliminar', function() {
  var servicio_id=$(this).parents("tr").attr("id");
  $("input[name=id-eliminar]").val(servicio_id);
  $('#modal-eliminar').modal("show")
});





//PARA EL MODIFICAR SERVICIOS DE LA VISTA DE ADMINUSUARIO

function editar(servicio_id){
  var url = "?action=adminservicios"
  $.ajax({
    url: url,
    type: 'POST', //metodo de la peticion
    dataType: 'json',//tipo de dato de la respuesta
    data: {id_servicio: servicio_id,function:"editar"},
    success: function(respuesta){
      if (respuesta.data) {
        $("input[name=id_editar]").val(respuesta.data.id_servicio);
        $("input[name=nombre_editar]").val(respuesta.data.nombre_servicio);
        $("input[name=descripcion_editar]").val(respuesta.data.descripcion);
        $('#modal-editar').modal("show")
      }else{
        alert("error")
      }
    },
    error: function() {
      console.log("No se ha podido obtener la información");
    }
  })
};


$("table").on('click', 'button.btn-editar', function() {
  var usuario_id=$(this).parents("tr").attr("id");
  editar(usuario_id);
});

//FIN DE MODIFICAR USUARIOS

//ELIMINAR USUARIO
$("table").on('click', 'button.btn-eliminar', function() {
  var servicio_id=$(this).parents("tr").attr("id");
  $("input[name=id-eliminar]").val(servicio_id);
  $('#modal-eliminar').modal("show")
});
//FIN DE ELIMINAR USUARIO

