<script>
function registrar(s){
	var   vrs =  "ids="+s;
	loadContent("process.php?axn=FSUHISHUHI",vrs,"printCrf(rsp);");
}
</script>
<div id="listambos">
	<h3>SOLICITUDES DE REGISTRACIÓN</h3>
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
				$sql = "SELECT T.ID_SOLIC, T.ID_PRVC, T.ID_PRTD, T.TP_GNDO, G.DENOMIN, T.NOMBRE, T.RENSPA, T.ID_PROP, 
                       T.PROPIETARIO, P.PROPIETARIO, T.EMAIL, T.ID_LCLD, R.PARTIDO, L.LOCALIDAD, T.UBICMAP, 
                       T.RECIBIDORA, DATE_FORMAT(T.SOL_FECH, '%d/%m/%Y'), T.VRF_FECH, T.ESTADO 
                FROM STAMBOS T
                LEFT JOIN PARTIDOS R ON T.ID_PRTD = R.ID_PRTD
								LEFT JOIN TP_GANADO G ON T.TP_GNDO = G.TP_GNDO
								LEFT JOIN PROPIETARIOS P ON T.ID_PROP = P.ID_PROP
								LEFT JOIN LOCALIDADES L ON T.ID_LCLD = L.ID_LCLD
                WHERE T.ESTADO = 'V'
								ORDER BY 1,2,4,3"; 
				$rs = ejecutar($sql);
				while ($rw=mysqli_fetch_row($rs)){
			?>
    	<tr>
      	<td align="center">
        	<a href="?lnk=RGT&ids=<?PHP echo $rw[0]; ?>">
					<?PHP echo $rw[0]; ?>
          </a>
        </td>
      	<td align="center"><?PHP echo $rw[6]; ?></td>
      	<td align="left">
					<?PHP 
						echo $rw[8]; 
						if ($rw[9]!=''){
					?>
          	<span title="<?PHP echo $rw[9]; ?>">[*]</span>
          <?PHP
						}
					?>
        </td>
      	<td align="left">
					<?PHP 
						echo $rw[13].' - '.$rw[12]; 
						if ($rw[14]!=''){ 
					?>
          	<img src="imagenes/iconos/mapsChk.png" width="15" title="<?PHP echo $rw[13]; ?>" />
          <?PHP } ?>
        </td>
      	<td align="left"><?PHP echo $rw[4]; ?></td>
      	<td align="center"><?PHP echo $rw[16]; ?></td>
      </tr>
      <?PHP
				}
			?>
    </table>
  </div>
</div>