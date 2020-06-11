$(function(){
  /*getSitiosFiltered();*/
})


/*$('select.ciudades-filtro').change(function(e){
  e.preventDefault();
})
*/
$('select.tipos').change(function(e){
  e.preventDefault();
    //alert("dasd")
})

$('form.filtro-name').submit(function(e){
  e.preventDefault();
  var input_filtro = $('.filtro-name input[name=filtro]').val();
  var select_tipo = $(".tipos").val();
  var select_estado = $(".estados").val();
  var select_ciudad = $(".ciudades").val();

  if( input_filtro != ""){
      $("#sitios-container div.item-sitio").hide()
      $("#sitios-container .nombre_sitio:buscar('" + input_filtro + "')").parent("div.item-sitio").show()
      $("#sitios-container .descripcion_sitio:buscar('" + input_filtro + "')").parent("div.item-sitio").show()
      
  }else if(select_tipo != "*"){
      $("#sitios-container div.item-sitio").hide()
      $("#sitios-container .tipo_sitio:buscar('" + select_tipo + "')").parent("div.item-sitio").show()
  }else if(select_estado != "*"){
      $("#sitios-container div.item-sitio").hide()
      $("#sitios-container .estado_sitio:buscar('" + select_estado + "')").parent("div.item-sitio").show()
  }else{
      $("#sitios-container div.item-sitio").show()
  }
})

$.extend($.expr[":"], 
{
  "buscar": function(elem, i, match, array) 
  {
    return (elem.textContent || elem.innerText || $(elem).text() || "").toLowerCase().indexOf((match[3] || "").toLowerCase()) >= 0;
  }
})

// CONSULTAR CIUDADES
function ciudades(estado_id, ciudades_element, ciudad=null){
  var url = "?action=explorer"
  
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
function getSitiosFiltered(){
  
}

