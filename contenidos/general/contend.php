<?PHP
		if (!isset($_GET["lnk"])){ 
			include "contenidos/tambos/listados.php";
		} else {
			switch ($_GET["lnk"]){
				//CONFIGURACION
				case "CPW": include "contenidos/passwrd/formulario.php"; break;
							
				//LISTADO
				case "TMB": include "contenidos/tambos/listados.php"; break;

				//REGISTRACIÓN
				case "RGT": include "contenidos/registra/formu.php"; break;
				
				//VALIDACION
				case "EML": include "contenidos/registra/respuSol.php"; break;
				case "VRF": include "contenidos/registra/respuSol.php"; break;
				case "CRF": include "contenidos/registra/confirma.php"; break;
				
			}
		}
?>