$("#tabla-ofertas").on('click', 'button.btn-eliminar', function() {
  var oferta_id=$(this).parents("tr").attr("id");
  $("input[name=id-eliminar]").val(oferta_id);
  $('#modal-eliminar').modal("show")
});


$("#tabla-ofertas").on('click', 'button.btn-modificar', function() {
  var oferta_id=$(this).parents("tr").attr("id");
  editarOferta(oferta_id);
});


function editarOferta(oferta_id){
  var url = "?action=ofertas"
  $.ajax({
    url: url,
    type: 'POST', //metodo de la peticion
    dataType: 'json',//tipo de dato de la respuesta
    data: {id_oferta: oferta_id,function:"consultar"},
    success: function(respuesta){
      if (respuesta.data) {
        $("input[name=id_editar]").val(respuesta.data.id_oferta);
        $("input[name=titulo_editar]").val(respuesta.data.nombre_oferta);
        $("input[name=precio_editar]").val(respuesta.data.precio);
        $("textarea[name=contenido_editar]").val(respuesta.data.descripcion);
        $('#modal-editar').modal("show");
      }else{
        alert("error")
      }
    },
    error: function() {
      console.log("No se ha podido obtener la información");
    }
  })
};