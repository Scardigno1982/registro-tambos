<?PHP
	if (isset($_POST["slt"])) $slt = $_POST["slt"];
	if (isset($_GET["slt"])) $slt = $_GET["slt"];
	$sql = "SELECT EMAIL FROM STAMBOS WHERE ID_SOLIC = $slt";
	$rs = ejecutar($sql); $rw = mysqli_fetch_row($rs); $eml = $rw[0];
?>

<script>
function validaR(){
	var slt = $('slt').value;
	if ($("cod").value==''){
		alert ("Ingrese el Código de Validación"); 
		return false;
	}
	var cod = $('cod').value;

	location.href="registro.php?lnk=CRF&slt="+slt+"&vrf="+cod+"";
}
</script>
<div style="margin: auto; width: 700px; text-align: left;">
	<h3>Verificación de Registro</h3>
  <p>
  	Se ha enviado un email a la dirección: <strong><?PHP echo $eml; ?></strong> con un código para
    verificar el registro.
  </p>
  <p style="text-align:center;">
		<label for="cod">Código de Verificación</label>
    <input type="hidden" id="slt" value="<?PHP echo $slt; ?>" />
    <input type="text" id="cod" />
    <input type="button" value="Verificar" onclick="validaR()" />
  </p>
  <h3 style="float:right;">Muchas Gracias</h3>
</div>
