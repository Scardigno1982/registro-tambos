<?PHP 

	$usr = $_SESSION["usr_idUser"];
	$pwd = $_POST["pwd"];
	$new = $_POST["new"];
	$rpt = $_POST["rpt"];
	
	if ($new!=$rpt){
		echo "[@R]Las contraseñas nuevas no coinciden.";
	} else {
		$sql = "SELECT PASSWD FROM USUARIOS WHERE ID_USER = '$usr'";
		$rs = ejecutar($sql); $rw = mysqli_fetch_row($rs);
	
		if ($rw[0]!=$pwd){
			echo "[@R]ATENCION: La contraseña es incorrecta.";
		} else {
			$sql = "UPDATE USUARIOS SET PASSWD = '$new' WHERE ID_USER = '$usr'";
			ejecutar($sql);
			echo "[@R]La contraseña se actualizó correctamente";
		}
	}
?>