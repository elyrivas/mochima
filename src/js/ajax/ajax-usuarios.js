//PARA EL MODIFICAR USUARIOS DE LA VISTA DE ADMINUSUARIO

function editar(usuario_id){
  var url = "?action=adminusuarios"
  $.ajax({
    url: url,
    type: 'POST', //metodo de la peticion
    dataType: 'json',//tipo de dato de la respuesta
    data: {id_usuario: usuario_id,function:"editar"},
    success: function(respuesta){
      if (respuesta.data) {
        $("input[name=id_editar]").val(respuesta.data.id_usuario);
        $("input[name=nombre_editar]").val(respuesta.data.nombre);
        $("input[name=apellido_editar]").val(respuesta.data.apellido);
        $("input[name=usuario_editar]").val(respuesta.data.usuario);
        $("input[name=email_editar]").val(respuesta.data.correo);
        $("input[name=telefono_editar]").val(respuesta.data.telefono);
        $("input[name=direccion_editar]").val(respuesta.data.direccion);
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
$("#tabla-usuarios").on('click', 'button.btn-eliminar', function() {
  var usuario_id=$(this).parents("tr").attr("id");
  $("input[name=id-eliminar]").val(usuario_id);
  $('#modal-eliminar').modal("show")
});
//FIN DE ELIMINAR USUARIO

