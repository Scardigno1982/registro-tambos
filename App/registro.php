<?PHP 
	session_start();
	if (!isset($_SESSION["usr_idUser"]) or $_SESSION["usr_idUser"]=="") header ("Location: index.php");
	include "funciones/dbConect.php";
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Registro Provincial de Tambos</title>
  <link rel="stylesheet" type="text/css" href="styles/mensajes.css"/>
  <link rel="stylesheet" type="text/css" href="styles/ventanas.css"/>
  <link rel="stylesheet" type="text/css" href="styles/registro.css"/>
  <link rel="stylesheet" type="text/css" href="styles/turner.css">
  <link rel="stylesheet" type="text/css" href="styles/tambereg.css">
  <script type="text/javascript" src="scripts/aeAJAX.js"></script>
  <script type="text/javascript" src="scripts/aeBasics.js"></script>
  <script type="text/javascript" src="scripts/aeMensajes.js"></script>
</head>

<body>
	<?PHP include "contenidos/general/encabez.php"; ?>
	<div id="container">
	<?PHP include "contenidos/general/contend.php"; ?>
  </div>
</body>
</html>