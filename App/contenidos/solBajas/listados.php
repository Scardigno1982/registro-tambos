<script>
function registrar(s){
	var   vrs =  "ids="+s;
	loadContent("process.php?axn=FSUHISHUHI",vrs,"printCrf(rsp);");
}
</script>
<div id="listambos">
	<h3>SOLICITUDES DE BAJA</h3>
  <div id="listado" style="text-align:center;">
  	<table width="1000" style="margin: auto;">
    	<tr>
      	<th align="center">Nro Solic</th>
      	<th align="center">Nro ReNSPA</th>
      	<th align="left">Propietario</th>
      	<th align="left">Ubicación</th>
      	<th align="left">Ganado</th>
      	<th align="center">Fec. Solic</th>
      </tr>
			<?PHP
				$sql = "SELECT T.ID_PRVC, T.ID_PRTD, R.PARTIDO, T.ID_TMBO, T.TP_GNDO, G.DENOMIN, T.RENSPA, T.ID_PROP, 
											 P.PROPIETARIO, T.ID_LCLD, L.LOCALIDAD, T.RECIBIDORA, DATE_FORMAT(T.ALTAFEC, '%d/%m/%Y'), 
											 DATE_FORMAT(T.BAJAFEC, '%d/%m/%Y'), T.UBICMAP, B.ID_SOLIC, B.SOL_USER, 
											 DATE_FORMAT(B.SOL_FECH, '%d/%m/%Y'), DATE_FORMAT(B.PRC_FECH, '%d/%m/%Y'), B.PRC_USER, B.ESTADO 
								FROM TAMBOS T 
								LEFT JOIN PARTIDOS R ON T.ID_PRTD = R.ID_PRTD 
								LEFT JOIN TP_GANADO G ON T.TP_GNDO = G.TP_GNDO 
								LEFT JOIN PROPIETARIOS P ON T.ID_PROP = P.ID_PROP 
								LEFT JOIN LOCALIDADES L ON T.ID_LCLD = L.ID_LCLD 
								LEFT JOIN STBAJAS B ON T.ID_PRVC = B.ID_PRVC AND T.ID_PRTD = B.ID_PRTD AND T.ID_TMBO = B.ID_TMBO
								WHERE B.ESTADO <> 'B' ORDER BY 1,2,4,3";
				$rs = ejecutar($sql);
				while ($rw=mysqli_fetch_row($rs)){
			?>
    	<tr>
      	<td align="center">
        	<a href="?lnk=BJT&ids=<?PHP echo $rw[15]; ?>">
					<?PHP echo $rw[15]; ?>
          </a>
        </td>
      	<td align="center"><?PHP echo $rw[6]; ?></td>
      	<td align="left">
					<?PHP 
						echo $rw[8]; 
					?>
        </td>
      	<td align="left">
					<?PHP 
						echo $rw[13].' - '.$rw[2]; 
					?>
        </td>
      	<td align="left"><?PHP echo $rw[5]; ?></td>
      	<td align="center"><?PHP echo $rw[17]; ?></td>
      </tr>
      <?PHP
				}
			?>
    </table>
  </div>
</div>