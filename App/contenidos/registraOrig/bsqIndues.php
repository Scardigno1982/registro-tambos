<?PHP
	$bsq = strtoupper($_POST["bsq"]);
	$sql = "SELECT ID_INDU, INDUSTRIA FROM INDUSTRIAS WHERE UPPER(INDUSTRIA) LIKE '%$bsq%'";
	$sql = "SELECT ID_INDU, INDUSTRIA FROM INDUSTRIAS ORDER BY INDUSTRIA ASC";
	$rs = ejecutar($sql);
	while ($rw = mysqli_fetch_row($rs)){ 
?>
	<a href="javascript: selIndus('<?PHP echo $rw[0]; ?>','<?PHP echo $rw[1]; ?>')"><?PHP echo $rw[1]; ?></a><br> 
<?PHP	} ?>
  <a href="javascript: selIndus(0,'Otra')">Otra</a><br> 

<?PHP if (false){ ?>
  <a href="javascript: selIndus('N','<?PHP echo $bsq; ?>')">Nueva Industria</a><br> 
<?PHP	} ?>