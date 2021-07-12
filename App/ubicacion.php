<?PHP 
//header("Location: contenidos/registra/fltMapear.php"); 
//$ubc = $_GET['ubc'];
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ubicación del tambo</title>
		<style type="text/css">
      html,body{margin:0;padding:0;width:100%;height:100%;font:10pt Verdana, Geneva, sans-serif;}
      #texto{width:25%;float:left;vertical-align:middle;padding: 2%;}
      #mapa{width:70%;height:100%;float:right;}
    </style>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA4fMRMwtZSiXPwix8GKzVlwOlzHEYvG8I&language=es"></script>

    <script>
<!-- //
var map;
var geocoder;
var infoWindow;
var marker;
function mapear() {
  var latLng = new google.maps.LatLng(-36.3657071, -60.04929219999997);
  var opciones = {
    center: latLng,
    zoom: 6,
    //mapTypeId: google.maps.MapTypeId.HYBRID
  };
  var map = new google.maps.Map(document.getElementById('mapa'), opciones);
  geocoder = new google.maps.Geocoder();
  infowindow = new google.maps.InfoWindow();
  google.maps.event.addListener(map, 'click', function (event) {
    geocoder.geocode({
      'latLng': event.latLng
    }, function (results, status) {
      if (status == google.maps.GeocoderStatus.OK) {
        if (results[0]) {
          document.getElementById('direccion').innerHTML = results[0].formatted_address;
          document.getElementById('coordenadas').innerHTML = results[0].geometry.location;
          if (marker) {
            marker.setPosition(event.latLng)
          } else {
            marker = new google.maps.Marker({
              position: event.latLng,
              map: map
            })
          }
          //infowindow.setContent(results[0].formatted_address + '<br/> Coordenadas: ' + results[0].geometry.location);
          //infowindow.open(map, marker)
        } else {
          document.getElementById('mensaje').innerHTML = 'No se encontraron resultados'
        }
      } else {
        document.getElementById('mensaje').innerHTML = 'Geocodificación  ha fallado debido a: ' + status
      }
    });
  });
}
// -->
function ubicar(){
  if (window.opener && !window.opener.closed){
		var crd = document.getElementById('coordenadas').innerHTML;
    window.opener.document.getElementById('map').value = crd;
		window.opener.document.getElementById('imp').src = "imagenes/iconos/mapsChk.png";
		window.opener.document.getElementById('imp').title = crd;
	}
  window.close();
}
</script>
  </head>
  <body>
    <div id="texto">
      <h4>Haga click sobre el mapa para marcar el lugar y luego el boton "Enviar"</h4>
      Dirección: <br/>
			<span id="direccion" style="color: #00FFB3;"></span><br/>
      Coordenadas: <br/>
      <span id="coordenadas" style="color: #00FFB3;"></span><br />
      <span id="mensaje"></span>
      <input type="button" value="Enviar" onClick="ubicar()" />
    </div>
    <div id="mapa"></div>
    
    <script>mapear()</script>
  </body>
</html>​