<?PHP
	session_start();
	if (!isset($_SESSION["usr_idUser"]) or $_SESSION["usr_idUser"]==""){
		echo "Acceso Restringido!!"; exit;
	}
	include "funciones/dbConect.php";
	
	if (isset($_GET["axn"]) and $_GET["axn"]!=''){
		//if ($_SESSION["axn"] == $_GET["axn"]){
			//echo "[@S]";
		//} else {
			$_SESSION["axn"] = $_GET["axn"];
			$sql = "SELECT PROCESO, REPE, RESP FROM ZYZ_PROCESOS WHERE AXION = '".$_GET["axn"]."'";
			$rs = ejecutar($sql);
			if (mysqli_num_rows($rs)!=1){
				header ('Content-Type: text/html; charset=utf-8');
				echo "[@E]No se encuentra el proceso";
			} else {
				$rw = mysqli_fetch_row($rs);
				if ($rw[1]=='S') $_SESSION["axn"] = "";
				if ($rw[2]=='X') {
					header ('Content-Type: text/xml; charset=utf-8');
				} else {
					header ('Content-Type: text/html; charset=utf-8');
				}
				if ($rw[2]=='H') echo "[@H]";
				if ($rw[2]=='R') echo "[@R]";
				include $rw[0];
			}
		//}
	}
?>