<?PHP
		if (!isset($_GET["lnk"])){ 
			include "home.html";
		} else {
			switch ($_GET["lnk"]){
				//CONFIGURACION
				case "CPW": include "contenidos/passwrd/formulario.php"; break;
							
				//LISTADO
				case "TMB": include "contenidos/tambos/listados.php"; break;

				//REGISTRACIÓN
				case "RGT": include "contenidos/registra/formu.php"; break;
				
				//SOLICITUDES
				case "SOL": include "contenidos/solicit/listados.php"; break;
				case "BAJ": include "contenidos/solBajas/listados.php"; break;
				case "BJT": include "contenidos/registbaja/formu.php"; break;

			}
		}
?>