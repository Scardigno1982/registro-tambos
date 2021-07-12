<script>
	function ocultarMFs(){
		if ($('mfConfig')) $('mfConfig').style.visibility = "hidden";
		if ($('mfExport')) $('mfExport').style.visibility = "hidden";
	}
	function vmConfig(){
		ocultarMFs();
		$('mfConfig').style.visibility = "";
	}
	function vmExport(){
		ocultarMFs();
		$('mfExport').style.visibility = "";
	}
</script>
  	<div id="encabezado">
    	<div id="logotipo"><img src="imagenes/iconos/marca.jpg" height="60" /></div>
      <div id="botonera">
      	<div class="boton">
        	<a href="cierrasess.php"><img src="imagenes/iconos/salir.png" height="45" /><br />Salir</a>
        </div>
        <?PHP include "menues/mnu.php"; ?>
    
