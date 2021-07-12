<?PHP
	include ('funciones/dbConfig.php');
	
	$ids = $_POST["ids"]; $nct = $_POST["nct"];
	$rnp = $_POST["rnp"]; $nmb = $_POST["nmb"];
	$ttm = $_POST["ttm"]; $tmb = $_POST["tmb"];
	
	$idp = $_POST["idp"]; $prp = $_POST["prp"]; 
	$cll = $_POST["cll"]; $cnr = $_POST["cnr"]; 
	$cpt = $_POST["cpt"]; $prt = $_POST["prt"]; 
	$lcl = $_POST["lcl"]; $tlf = $_POST["tlf"]; 
	$eml = $_POST["eml"];	$cui = $_POST["cui"]; 
	$pwd = nuevaClave();
	
	$upd = $_POST["upd"]; $ulc = $_POST["ulc"]; $map = $_POST["map"];
	$tpo = $_POST["tpo"]; $bjd = $_POST["bjd"]; 
	$tpr = $_POST["tpr"]; $cho = $_POST["cho"]; 
	$chs = $_POST["chs"]; $chr = $_POST["chr"]; 
	$ltd = $_POST["ltd"]; $kpc = $_POST["kpc"]; 
	$usr = $_SESSION["usr_idUser"];
	
	$scp = $_POST["scp"]; if ($scp=='') $scp = 'NULL';
	$sca = $_POST["sca"]; if ($sca=='') $sca = 'NULL';
	$stp = $_POST["stp"]; if ($stp=='') $stp = 'NULL';
	$sta = $_POST["sta"]; if ($sta=='') $sta = 'NULL';
	
	$paf = $_POST["paf"]; $rpo = $_POST["rpo"]; 
	$edt = $_POST["edt"];	
	$idi = $_POST["idi"]; $ind = $_POST["ind"];
	
	$pac = "N"; if ($_POST["pac"]) $pac = "S"; 
	$nrg = "N"; if ($_POST["nrg"]) $nrg = "S"; 


	if ($idp==0){
		$sql = "SELECT COUNT(*) FROM PROPIETARIOS WHERE CUIT = '$cui'";
		$rs = ejecutar($sql); $rw = mysqli_fetch_row($rs);
		if ($rw[0]>0){
			echo "RPC"; exit;
		}
		
		$sql = "SELECT MAX(IFNULL(ID_PROP, 0)) FROM PROPIETARIOS";
		$rs = ejecutar($sql); $rw = mysqli_fetch_row($rs); $idp = $rw[0]+1;
	
		$sql = "INSERT INTO PROPIETARIOS VALUES ($idp, '$prp', '$cui', '$cll', '$cnr', '$cpt', '2', '$prt', '$lcl', 
																						 '$tlf', '', '$eml', '$pwd')";
		$nwp = true;
	} else {
		$sql = "UPDATE PROPIETARIOS SET PROPIETARIO = '$prp', CUIT = '$cui', CALLE = '$cll', NUM = '$cnr', CPOST = '$cpt', 
																		ID_PRTD = '$prt', ID_LCLD = '$lcl', TELEFONO = '$tlf', EMAIL = '$eml'
																		WHERE ID_PROP = $idp";
		$nwp = false;
	}
	$rs = ejecutar($sql);
	//echo $sql;
	
	if ($tmb=='---'){
		$sql = "SELECT MAX(IFNULL(ID_TMBO, 0)) FROM TAMBOS WHERE ID_PRVC = 2 AND ID_PRTD = $upd";
		$rs = ejecutar($sql); $rw = mysqli_fetch_row($rs); $idt = $rw[0]+1;
	} else {
		$idt = $tmb;
		$sql = "DELETE FROM TAMBOS WHERE ID_PRVC = AND ID_PRTD = $upd AND ID_TMBO = $idt";
		$rs = ejecutar($sql);
	}
	
	$sql = "INSERT INTO TAMBOS VALUES (2, $upd, $idt, '$ttm', '$nmb', '$rnp', $idp, $ulc, '$map', '$tpo', $bjd, $tpr, 
					$cho, $chs, $chr, $ltd,	$scp, $sca, $stp, $sta, $kpc, '$pac', '$nrg', $paf, '$rpo', $edt, '$idi', '$ind', 
					'$nct', NOW(), '$usr', NULL, NULL)";
	//echo $sql;
	
	$rs = ejecutar($sql);
	
	$sql = "UPDATE STAMBOS SET ESTADO = 'A' WHERE ID_SOLIC = $ids";
	$rs = ejecutar($sql);

	if ($nwp){
		$asunto = "Confirmación de Registro";
		
		$mensaje = "
		<html>
		<head>
		</head>
		<body>
		<h3>Confirmación de Registro</h3>
		<p>El tramite de registración se ha completado correctamente.</p>
		<h3>".$vrf."</h3>
		<p>Puede acceder a su información desde el siguiente link.</p>
		<h3><a href='zonabranding.com/regtambo/web/index.php'>Registro Provincial de Tambos</a></h3>
		<p>Usuario: ".$cui."</p>
		<p>Contraseña: ".$pwd."</p>
		</body>
		</html>
		";
		
		// Always set content-type when sending HTML email
		$headers  = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
		
		// More headers
		$headers .= 'From: <no-reply@zonabranding.com>' . "\r\n";
		$headers .= 'Cc: ' . "\r\n";
		
		
		mail($eml,$asunto,$mensaje,$headers);
	}
	
	echo $idt;
?>