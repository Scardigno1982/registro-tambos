<?PHP
	$prt = $_POST["prt"];
  $sql = "SELECT ID_LCLD, LOCALIDAD FROM LOCALIDADES WHERE ID_PRTD = $prt ORDER BY LOCALIDAD ASC";
	$rs = ejecutar($sql);
	if ($_SESSION["usr_tpUser"]=='A'){
?>
<option value="X" selected="selected" disabled="disabled">Seleccione la Localidad</option>
<?PHP 
	}
	while ($rw = mysqli_fetch_row($rs)){ 
?>
<option value="<?PHP echo $rw[0]; ?>"><?PHP echo $rw[1]; ?></option>
<?PHP } ?>
