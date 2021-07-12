<?PHP 
	session_start();
	if (!isset($_SESSION["usr_idUser"]) or $_SESSION["usr_idUser"]==''){
	echo "ERROR: Recurso Incorrecto.";
	}
	include "funciones/dbConect.php";

	$rec = $_GET["lnk"];
	
	$sql = "SELECT CODIGO, DESTINO, ARCHIVO, EXTENS, ESTADO
					FROM CTD_CONTENIDOS WHERE CODIGO = '$rec'";

	$rs = ejecutar($sql); $rw = mysqli_fetch_row($rs);
	
	if ($rw[4]=='A'){ //recurso activo
		if ($rw[1]=='@download'){ //descargable
		
			$nombre = $rw[2].'.'.$rw[3];
			$filename = "../archivos/contenido/".$rw[0].'.'.$rw[3];  
			$size = filesize($filename);  
	
			$sql = "SELECT IFNULL(MAX(ID_DSCRG), 0) FROM CTD_DESCARGAS";
			$rs = ejecutar($sql); $rw = mysqli_fetch_row($rs); $idd = $rw[0]+1;
			
			$sql = "INSERT INTO CTD_DESCARGAS VALUES ($idd, '".$_SESSION["usr_idUser"]."', '$rec', NOW())";
			ejecutar($sql);
	
			header("Content-Transfer-Encoding: binary");  
			header("Content-type: application/force-download");  
			header("Content-Disposition: attachment; filename=$nombre");  
			header("Content-Length: $size");  
	
			readfile("$filename"); 
			exit;
		}
	} 

	echo "ERROR: Recurso Incorrecto.";

	
?>