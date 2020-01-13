/*
  Creación de una función personalizada para jQuery que detecta cuando se detiene el scroll en la página
*/
$.fn.scrollEnd = function(callback, timeout) {
  $(this).scroll(function(){
    var $this = $(this);
    if ($this.data('scrollTimeout')) {
      clearTimeout($this.data('scrollTimeout'));
    }
    $this.data('scrollTimeout', setTimeout(callback,timeout));
  });
};
/*
  Función que inicializa el elemento Slider
*/

function inicializarSlider(){
  $("#rangoPrecio").ionRangeSlider({
    type: "double",
    grid: false,
    min: 0,
    max: 100000,
    from: 200,
    to: 80000,
    prefix: "$"
  });
}
/*
  Función que reproduce el video de fondo al hacer scroll, y deteiene la reproducción al detener el scroll
*/
function playVideoOnScroll(){
  var ultimoScroll = 0,
      intervalRewind;
  var video = document.getElementById('vidFondo');
  $(window)
    .scroll((event)=>{
      var scrollActual = $(window).scrollTop();
      if (scrollActual > ultimoScroll){
     //  video.play();
     } else {
        //this.rewind(1.0, video, intervalRewind);
      //  video.play();
     }
     ultimoScroll = scrollActual;
    })
    .scrollEnd(()=>{
    // video.pause();
    }, 10)
}

inicializarSlider();
playVideoOnScroll();

$("#formulario").submit(function(event){
   event.preventDefault();
   /*var ciudad = $('#selectCiudad').val();
   var tipo = $('#selectTipo').val();
   var precio = $('rangoPrecio').val();*/
   var frm = $(this).serialize();
   console.log(frm);
   var url = "buscador.php";
   $.ajax({
     type: "POST",
     url: url,
     data: frm
   }).done(function (info) {
     alert(info);
    arreglo = JSON.parse(info);
    muestra_datos(arreglo);
   });
});

$("button.todos").click(function (event) {
  event.preventDefault();
  var url = "todos.php";
  $.ajax({
    type: "GET",
    url: url
  }).done(function(info){
    arreglo = JSON.parse(info);
    muestra_datos(arreglo);
  });
});

function muestra_datos(arreglo){
  console.log('estoy en muestra_datos');
  for (x = 0; x < (arreglo.length); x++) {
    var direccion = arreglo[x].Direccion;
    var ciudad = arreglo[x].Ciudad;
    var telefono = arreglo[x].Telefono;
    var cod_post = arreglo[x].Codigo_Postal;
    var tipo = arreglo[x].Tipo;
    var precio = arreglo[x].Precio;
    
    var html = `<div class="itemMostrado">
                  <img class="itemMostrado" src="img/home.jpg" alt="">
                  <p>
                    <span>Direccion:${direccion} </span><br>
                    <span>Ciudad:${ciudad}</span><br>
                    <span>Telefono:${telefono}</span><br>
                    <span>Codigo Postal:${cod_post}</span><br>
                    <span>Tipo:${tipo}</span><br>
                    <span class="precioTexto">Precio:${precio}</span><br>
                  </p>
              </div>`
    $("#mostrarDatos").append(html);
  };
}

$(document).ready(function () {
  $('select').material_select();
});
  