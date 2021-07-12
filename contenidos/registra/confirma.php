<?PHP
if (!isset($_GET['slt']) or !isset($_GET['vrf'])){
	echo "Acceso no permitido";
	exit;
}

$slt = $_GET['slt']; $vrf = $_GET['vrf'];

$sql = "SELECT VERIFICOD, TIMEDIFF(NOW(), SOL_FECH) FROM STAMBOS WHERE ID_SOLIC = $slt";
$rs = ejecutar($sql); 

if (mysqli_num_rows($rs)==0){
	echo "Acceso no permitido";
	exit;
}
	
$rw = mysqli_fetch_row($rs);
$dias = (int) $rw[1];
if ($rw[0]==$vrf and $dias < 48 ){
	$sql = "UPDATE STAMBOS SET ESTADO = 'V' WHERE ID_SOLIC = $slt AND ESTADO = 'S'"; 
	ejecutar($sql);
?>
<div style="margin: auto; width: 700px; text-align: left;">
	<h3>Confirmación de Registro</h3>
  <p>
  	La solicitud se ha enviado correctamente.
  </p>
  <h3 style="float:right;">Muchas Gracias</h3>
</div>
<?PHP
} else {
?>
<div style="margin: auto; width: 700px; text-align: left;">
	<h3>Verificación Incorrecta</h3>
</div>
<?PHP
}
?>