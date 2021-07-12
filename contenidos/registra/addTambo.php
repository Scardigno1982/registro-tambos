<?PHP
	
	$rnp = $_POST["rnp"]; $nmb = $_POST["nmb"];
	$ttm = $_POST["ttm"]; 
	$idp = $_POST["idp"]; $upd = $_POST["upd"];
	$ulc = $_POST["ulc"]; $map = $_POST["map"];
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
	
	if ($idi=='N'){
		$sql = "SELECT IFNULL(MAX(ID_INDU), 0) FROM INDUSTRIAS";
		$rs = ejecutar($sql); $rw = mysqli_fetch_row($rs); $idi = $rw[0] + 1;
			
		$sql = "INSERT INTO INDUSTRIAS VALUES ($idi, '$ind')";
		ejecutar($sql);
	}

	$sql = "SELECT MAX(IFNULL(ID_TMBO, 0)) FROM TAMBOS WHERE ID_PRVC = 2 AND ID_PRTD = $upd";
	$rs = ejecutar($sql); $rw = mysqli_fetch_row($rs); $idt = $rw[0]+1;
	
	$sql = "INSERT INTO TAMBOS VALUES (2, $upd, $idt, '$ttm', '$nmb', '$rnp', $idp, $ulc, '$map', '$tpo', $bjd, $tpr, 
					$cho, $chs, $chr, $ltd,	$scp, $sca, $stp, $sta, $kpc, '$pac', '$nrg', $paf, '$rpo', $edt, '$idi', '$ind', 
					NOW(), '$usr', NULL, NULL)";
	$rs = ejecutar($sql);
	
	echo $idt;
?>