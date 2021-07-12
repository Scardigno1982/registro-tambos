<?PHP
include "funciones/dbConect.php";
include "funciones/dbConfig.php";

$idtf = str_replace("'","", $_POST['cuit']); chop($idtf);
$code = str_replace("'","", $_POST['code']); chop($code);

$sql = "UPDATE STAMBOS SET ESTADO = 'W' WHERE ESTADO = 'S' AND SOL_FECH < DATE_SUB(NOW(), INTERVAL 48 HOUR)";
$rs = ejecutar($sql); 

//VERIFICA USUARIO
$err = 0;	
$sql = "SELECT ID_USER, PASSWD, NOMBRE, ESTADO FROM USUARIOS WHERE ID_USER = '$idtf'"; 
//echo $sql; exit;
$rs = ejecutar($sql); 

if (mysqli_num_rows($rs)==1){	//usuario del sistema
	$rw = mysqli_fetch_row($rs);
	if ($rw[1]!=$code){ 
		$err=2; //contraseña erronea
	} else { 
		if ($rw[3]!='A'){
			$err=3; //no autorizado
		} else { //usuario activo
			session_start();
			$_SESSION["usr_tpUser"] = 'A';
			$_SESSION["usr_idUser"] = $rw[0];
			$_SESSION["usr_Nombre"] = $rw[2];
			header ("Location: App/registro.php");
			exit;
		}
	}
} else { //no usuario del sistema
	
	if (!CuitValido($idtf)){
		$err=4; //cuit no valido
	} else {
		$sql = "SELECT ID_PROP, PROPIETARIO, PASSWRD FROM PROPIETARIOS WHERE CUIT = '$idtf'"; 
		$rs = ejecutar($sql); 
		if (mysqli_num_rows($rs)==1){ //encontramos el cuit
			$rw = mysqli_fetch_row($rs);
			if ($rw[2]!=$code){
				$err=2; //contraseña incorrecta
			} else {
				session_start();
				$_SESSION["usr_tpUser"] = 'P';
				$_SESSION["usr_idUser"] = $rw[0];
				$_SESSION["usr_Nombre"] = $rw[1];
				$_SESSION["usr_Sesion"] = session_id();
				$_SESSION["usr_idProp"] = $rw[0];
				$_SESSION["usr_nrCUIT"] = $idtf;
				header ("Location: registro.php");
				exit;
			}
		} else {
			// tambero nuevo
			include("funciones/captcha/securimage.php");
			$img = new Securimage();
			$valid = $img->check($_POST['code']);
			//$valid = true;
			if ($valid == true) {
				
				$sql = "SELECT * FROM STAMBOS WHERE CUIT = '$idtf' AND ESTADO = 'S' AND SOL_FECH > DATE_SUB(NOW(), INTERVAL 48 HOUR)";
				$rs = ejecutar($sql); 
				if (mysqli_num_rows($rs)>0){ //solicitud sin validar
					$rw = mysqli_fetch_row($rs);
					$lnk = "Location: registro.php?lnk=VRF&slt=".$rw[0];
				} else {
					$lnk = "Location: registro.php?lnk=RGT";
				}
				session_start();
				$_SESSION["usr_tpUser"] = 'S';
				$_SESSION["usr_idUser"] = $idtf;
				$_SESSION["usr_Nombre"] = 'Solicitante';
				$_SESSION["usr_Sesion"] = session_id();
				$_SESSION["usr_idProp"] = '';
				$_SESSION["usr_nrCUIT"] = $idtf;
				header ($lnk);
				exit;
			} else {
				$err=5; //Captcha mal ingresado
			}
		}
	}
}

header ("Location: index.php?err=$err");

?>