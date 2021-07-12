<?PHP
	include ('funciones/dbConfig.php');

	$rnp = $_POST["rnp"]; $nmb = $_POST["nmb"];
	$nct = $_POST["nct"]; $ttm = $_POST["ttm"]; 
	
	$idp = $_POST["idp"]; if ($idp=='') $idp = '0';
	$prp = $_POST["prp"]; $cll = $_POST["cll"]; 
	$cnr = $_POST["cnr"]; $cpt = $_POST["cpt"];
	$prt = $_POST["prt"]; $lcl = $_POST["lcl"];
	$tlf = $_POST["tlf"]; $eml = $_POST["eml"];
	$cui = $_POST["cui"]; $vrf = nuevaClave();
	$org = $_SERVER['REMOTE_ADDR']; 
	
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


	$sql = "SELECT MAX(IFNULL(ID_SOLIC, 0)) FROM STAMBOS";
	$rs = ejecutar($sql); $rw = mysqli_fetch_row($rs); $ids = $rw[0]+1;
	
	$sql = "UPDATE STAMBOS SET ESTADO = 'Q' WHERE CUIT = '$cui'";
	$rs = ejecutar($sql);
	
	$sql = "INSERT INTO STAMBOS VALUES ($ids, 2, $upd, '$ttm', '$nmb', '$rnp', '$idp', '$prp', '$cui', '$cll', '$cnr', 
					'$cpt', '2', '$prt', '$lcl', '$tlf', '', '$eml', $ulc, '$map', '$tpo', $bjd, $tpr, $cho, $chs, $chr, $ltd,	
					$scp, $sca, $stp, $sta, $kpc, '$pac', '$nrg', $paf, '$rpo', $edt, '$idi', '$ind', '$nct','$usr',  NOW(), 
					'$org', '$vrf', NULL, 'S')";
	//echo $sql;
	
	$rs = ejecutar($sql);
	
	$asunto = "Verificación de Registro";
	
	$mensaje = "
	<html>
	<head>
	</head>
	<body>
	<h3>Verificación de Registro</h3>
	<p>Para completar el registro debe ingresar el siguiente código en la página de verificación.</p>
	<h3>".$vrf."</h3>
	<p>O haga click en el siguiente enlace.</p>
	<h3><a href='zonabranding.com/regtambo/web/registro.php?lnk=CRF&slt=".$ids."&vrf=".$vrf."'>Confirmar Registro</a></h3>
	<p>O ingrese pegue lo siguiente en la barra de direcciones de su navegador.</p>
	<p>zonabranding.com/regtambo/web/registro.php?lnk=CRF&slt=".$ids."&vrf=".$vrf."</p>
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

	echo $ids;
?>