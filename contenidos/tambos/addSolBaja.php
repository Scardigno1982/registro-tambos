<?PHP
	include ('funciones/dbConfig.php');

	$idp = $_POST["idp"]; 
	$idt = $_POST["idt"]; 

	$org = $_SERVER['REMOTE_ADDR']; 
	
	$usr = $_SESSION["usr_idUser"];
	$prp = $_SESSION["usr_idProp"];
	
	$sql = "SELECT MAX(IFNULL(ID_SOLIC, 0)) FROM STBAJAS";
	$rs = ejecutar($sql); $rw = mysqli_fetch_row($rs); $ids = $rw[0]+1;
	
	$sql = "INSERT INTO STBAJAS VALUES ($ids, 2, $idp, $idt, '$prp', '$usr', NOW(), '$org', NULL, NULL, 'S')";
	//echo $sql;
	
	$rs = ejecutar($sql);
	
	echo "Se ingreso la Solicitud de Baja Nro ".$ids;
?>