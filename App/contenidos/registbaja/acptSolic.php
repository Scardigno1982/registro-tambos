<?PHP
	include ('funciones/dbConfig.php');
	
	$ids = $_POST["ids"]; 
	$usr = $_SESSION["usr_idUser"];
	
	$sql = "B.ID_PRVC, B.ID_PRTD, B.ID_TMBO FROM STBAJAS B WHERE B.ID_SOLIC = $ids";
	$rs = ejecutar($sql); $rw = mysqli_fetch_row($rs);
	
	$sql = "UPDATE TAMBOS SET BAJAFEC = NOW(), BAJAUSR = '$usr' 
					WHERE ID_PRVC = ".$rw[0]." AND ID_PRTD = ".$rw[1]." AND ID_TMBO = ".$rw[2];
	$rs = ejecutar($sql);
	
	$sql = "UPDATE STBAJAS SET PRC_FECH = NOW(), PRC_USER = '$usr', ESTADO = 'B' WHERE ID_SOLIC = $ids";
	$rs = ejecutar($sql);
	
	//echo $sql;
	
	echo $ids;
?>