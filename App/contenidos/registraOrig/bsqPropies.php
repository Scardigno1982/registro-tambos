<?PHP
	$bsq = strtoupper($_POST["bsq"]);
	$sql = "SELECT P.ID_PROP, P.PROPIETARIO, P.CALLE, P.NUM, R.PARTIDO, L.LOCALIDAD
					FROM PROPIETARIOS P LEFT JOIN PARTIDOS R ON P.ID_PRTD = R.ID_PRTD
					LEFT JOIN LOCALIDADES L ON P.ID_LCLD = L.ID_LCLD
					WHERE UPPER(P.PROPIETARIO) LIKE '%$bsq%'";
	$rs = ejecutar($sql);
	while ($rw = mysqli_fetch_row($rs)){ 
?>
	<a href="javascript: selPropie(<?PHP echo $rw[0]; ?>)"><?PHP echo $rw[1].' ['.$rw[2].' '.$rw[3].' - '.$rw[4].' - '.$rw[5].']'; ?></a><br> 
<?PHP	} ?>
  <a href="javascript: frmPropie()">Nuevo Propietario</a><br> 
