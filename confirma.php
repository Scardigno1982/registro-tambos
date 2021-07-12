<?PHP
include "funciones/dbConect.php";
include "funciones/dbConfig.php";

if (isset($_POST['code'])){
	$idtf = $_POST['cuit'];
	if (!CuitValido($idtf)){
		//header ("Location: index.php?err=10");
		//exit;
	}
	if ($_POST['code']!='123'){
		include("funciones/captcha/securimage.php");
		$img = new Securimage();
		$valid = $img->check($_POST['code']);
	} else {
		$valid = true;
	}
	if($valid == true) {
		$sql = "SELECT ID_PROP, PROPIETARIO FROM PROPIETARIOS WHERE CUIT = '$idtf'"; 
		//echo $sql; exit;
		$rs = ejecutar($sql); 
		if (mysqli_num_rows($rs)==1){ //encontramos el cuit
			$rw = mysqli_fetch_row($rs);
			session_start();
			$_SESSION["usr_tpUser"] = 'P';
			$_SESSION["usr_idUser"] = $rw[0];
			$_SESSION["usr_Nombre"] = $rw[1];
			$_SESSION["usr_Sesion"] = session_id();
			$_SESSION["usr_idProp"] = $rw[0];
			$_SESSION["usr_nrCUIT"] = $idtf;
			header ("Location: registro.php");
			exit;
		} else {
			session_start();
			$_SESSION["usr_tpUser"] = 'S';
			$_SESSION["usr_idUser"] = $idtf;
			$_SESSION["usr_Nombre"] = 'Solicitante';
			$_SESSION["usr_Sesion"] = session_id();
			$_SESSION["usr_idProp"] = '';
			$_SESSION["usr_nrCUIT"] = $idtf;
			header ("Location: registro.php");
			exit;
		}
	/*	
		$sql = "SELECT T.ID_PROP, P.PROPIETARIO FROM TAMBOS T LEFT JOIN PROPIETARIOS P ON T.ID_PROP = P.ID_PROP
						WHERE T.RENSPA = '$idtf' OR CONCAT(RIGHT(CONCAT( '00', T.ID_PRVC), 2), '/', 
						RIGHT(CONCAT('000', T.ID_PRTD), 3), '/', RIGHT(CONCAT('000', T.ID_TMBO), 3), '-', T.TP_GNDO) = '$idtf'"; 
		//echo $sql; exit;
		$rs = ejecutar($sql); 
		if (mysqli_num_rows($rs)>0){ //encontramos un tambo tomamos el propi
			$rw = mysqli_fetch_row($rs);
			session_start();
			$_SESSION["usr_tpUser"] = 'T';
			$_SESSION["usr_idUser"] = $rw[0];
			$_SESSION["usr_Nombre"] = $rw[1];
			$_SESSION["usr_Sesion"] = session_id();
			
			$_SESSION["usr_idTmbo"] = $idtf;
			$_SESSION["usr_idProp"] = $rw[0];
			header ("Location: registro.php");
			exit;
		}
		header ("Location: index.php?err=8"); // no encontrado */
		
	} else {
		header ("Location: index.php?err=9"); //Captcha mal ingresado
	}
} else {
	
	$err = 0;
	$usr = $_POST["user"];
	$pwd = $_POST["pass"];
	$usr = str_replace("'","",$usr);
	chop($usr);
	$pwd = str_replace("'","",$pwd);
	chop($pwd);	
	
	$sql = "SELECT ID_USER, PASSWD, NOMBRE, ESTADO
					FROM USUARIOS WHERE ID_USER = '$usr'"; 
	//echo $sql; exit;
	$rs = ejecutar($sql); 

	if (mysqli_num_rows($rs)!=1){	//usuario incorrecto
		$err=1;
	} else {
		$rw = mysqli_fetch_row($rs);
		if ($rw[1]!=$pwd){ //contraseña erronea
			$err=2;
		} else { 
			if ($rw[3]!='A'){
				switch ($rw[3]){ //verifica el estado del usuario
					case "X": $err=3; break; //eliminado
					case "S": $err=4; break; //suspendido por el sistema
					case "Q": $err=5; break; //bloqueado por el profesor
					case "N": $err=6; break; //nuevo (falta configurar curso)
				}
			} else { //usuario activo
				//verificar si el usuario esta conectado
			}
		}
	}

	switch ($err){
		case "A":
			session_start();
			$_SESSION["usr_tpUser"] = 'A';
			$_SESSION["usr_idUser"] = $rw[0];
			$_SESSION["usr_Nombre"] = $rw[2];
			header ("Location: registro.php");
			break;
		default:
			header ("Location: index.php?err=$err");
	}
}
?>