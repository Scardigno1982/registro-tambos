<?PHP
	include "funciones/dbConect.php";
	
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
			$_SESSION["usr_idUser"] = $rw[0];
			$_SESSION["usr_Nombre"] = $rw[2];
			header ("Location: registro.php");
			break;
		default:
			header ("Location: index.php?err=$err");
	}
	
?>