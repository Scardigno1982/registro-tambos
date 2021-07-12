<?PHP
	include ('funciones/dbConfig.php');
	
	$prpr = $_POST["prpr"]; $cllr = $_POST["cllr"]; 
	$cnrr = $_POST["cnrr"]; $cptr = $_POST["cptr"];
	$prtr = $_POST["prtr"]; $lclr = $_POST["lclr"];
	$tlfr = $_POST["tlfr"]; $emlr = $_POST["emlr"];
	$cuir = $_POST["cuir"]; $pswd = nuevaClave();

	$sql = "SELECT ID_PROP FROM PROPIETARIOS WHERE CUIT = '$cuir'";
	$rs = ejecutar($sql);
	if (mysqli_num_rows($rs)==0){ 

		$sql = "SELECT MAX(IFNULL(ID_PROP, 0)) FROM PROPIETARIOS";
		$rs = ejecutar($sql); $rw = mysqli_fetch_row($rs); $idp = $rw[0]+1;
		
		$sql = "INSERT INTO PROPIETARIOS VALUES ($idp, '$prpr', '$cuir', '$cllr', '$cnrr', '$cptr', '2', '$prtr', '$lclr', '$tlfr', '', '$emlr', '$pswd')";
		$rs = ejecutar($sql);

	} else {
		echo "El Nro de CUIT ya esta registrado.";
	}
	
	echo $idp;
?>