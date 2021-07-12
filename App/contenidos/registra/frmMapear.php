<?PHP
	$map = $_POST["map"];
?>
<style type="text/css">
	#texto{width:25%;float:left;vertical-align:middle;padding: 2%;}
	#mapa{width:70%;height:100%;float:right;}
</style>
<div id="texto">
  <h3> Haga click sobre el mapa y verá su dirección</h3>
  Dirección del click: <span id="direccion" style="color: #00FFB3;"></span>
  <br/>
  Coordenadas: <span id="coordenadas" style="color: #00FFB3;"></span>
  <br />
  <span id="mensaje"></span>
</div>
<div id="mapa"></div>
</div>
