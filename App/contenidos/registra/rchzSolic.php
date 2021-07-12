<?PHP
	
	$ids = $_POST["ids"];

	$sql = "UPDATE STAMBOS SET ESTADO = 'H' WHERE ID_SOLIC = $ids";
	$rs = ejecutar($sql);
	
	echo "$ids";
?>