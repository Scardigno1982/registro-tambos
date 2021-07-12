<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Certificado de Registro de Tambo</title>
  <link rel="stylesheet" type="text/css" href="styles/certif.css">
</head>
<body>
<?PHP
	$idp = $_POST['idp']; $idt = $_POST['idt']; 
	$sql = "SELECT T.ID_PRVC, T.ID_PRTD, T.ID_TMBO, T.TP_GNDO, T.ID_PROP, P.PROPIETARIO, T.ID_LCLD, L.LOCALIDAD, R.PARTIDO, 
					DATE_FORMAT(T.ALTAFEC, '%d/%m/%Y') FROM TAMBOS T LEFT JOIN PROPIETARIOS P ON T.ID_PROP = P.ID_PROP
					LEFT JOIN PARTIDOS R ON T.ID_PRTD = R.ID_PRTD LEFT JOIN LOCALIDADES L ON T.ID_LCLD = L.ID_LCLD
					WHERE T.ID_PRVC = 2 AND T.ID_PRTD = $idp AND T.ID_TMBO = $idt";
	$rs = ejecutar($sql); $rw = mysqli_fetch_row($rs);
	$prt = '000'.$rw[1]; $prt = substr($prt, strlen($prt)-3);
	$tmb = '000'.$rw[2]; $tmb = substr($tmb, strlen($tmb)-3);
	
?>
<div id="reporte">
	<div id="encabeza">
		<img width="275" height="90" src="imagenes/iconos/marcaprn.png" />
	</div>
	<div id="recuadro">
    <div id="titulo1">Certificado del Registro de Tambo</div>
    <div id="leyesrg">(Ley 7.265 - Decreto 4.342/67 y Ley 6.703 – Decreto 66/63)</div>
    <div id="idtambo">
    	Por la presente se deja constancia que la Razón Social <span id="rznsocl"><?PHP echo $rw[5]; ?></span> 
    	con establecimiento agropecuario dedicado a la actividad de tambo, sito en la localidad de 
      <span id="rznsocl"><?PHP echo $rw[7]; ?></span> partido de <span id="rznsocl"><?PHP echo $rw[8]; ?></span>
      se haya registrado ante este Organismo bajo el  Nº 
      <span id="rznsocl"><?PHP echo "2-".$prt."-".$tmb."-".$rw[3]; ?></span>
    </div>
    <div id="minister">
    	Ministerio de Agroindustria<br />
      Subsecretaria de Agricultura, Ganadería y Pesca<br />
      Dirección Provincial de Lechería<br />
      Dirección de Leche Productos Lácteos y Derivados
    </div>
    <div id="fechado">La Plata, <?PHP echo $rw[9]; ?></div>
	</div>
</div>
</body>
</html>