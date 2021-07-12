<script>
function certificado(p,t){
	var   vrs =  "idp="+p;
	vrs = vrs + "&idt="+t;
	loadContent("process.php?axn=KISEUHUCUS",vrs,"printCrf(rsp);");
}
function printCrf(ct){
	var ventimp=window.open(' ','popimpr');
	ventimp.document.write(ct);
}
</script>
<div id="listambos">
	<h3>LISTADO DE TAMBOS REGISTRADOS</h3>
  <div id="listado" style="text-align:center;">
  	<table width="1000" style="margin: auto;">
    	<tr>
      	<th align="center">Nro Registro</th>
      	<th align="center">Nro ReNSPA</th>
      	<th align="left">Propietario</th>
      	<th align="left">Ubicación</th>
      	<th align="left">Ganado</th>
      	<th align="left">Industria</th>
      	<th align="center">Fec. Alta</th>
      </tr>
			<?PHP
				$sql = "SELECT T.ID_PRVC, T.ID_PRTD, R.PARTIDO, T.ID_TMBO, T.TP_GNDO, G.DENOMIN, T.RENSPA, T.ID_PROP, P.PROPIETARIO, 
											 T.ID_LCLD, L.LOCALIDAD, T.RECIBIDORA, DATE_FORMAT(T.ALTAFEC, '%d/%m/%Y'), UBICMAP
								FROM TAMBOS T
								LEFT JOIN PARTIDOS R ON T.ID_PRTD = R.ID_PRTD
								LEFT JOIN TP_GANADO G ON T.TP_GNDO = G.TP_GNDO
								LEFT JOIN PROPIETARIOS P ON T.ID_PROP = P.ID_PROP
								LEFT JOIN LOCALIDADES L ON T.ID_LCLD = L.ID_LCLD
								ORDER BY 1,2,4,3"; 
				$rs = ejecutar($sql);
				while ($rw=mysqli_fetch_row($rs)){
					$prv =  "00".$rw[0]; $prv = substr($prv, strlen($prv)-2);
					$prt = "000".$rw[1]; $prt = substr($prt, strlen($prt)-3);
					$tmb = "000".$rw[3]; $tmb = substr($tmb, strlen($tmb)-3);
					
			?>
    	<tr>
      	<td align="center">
        	<a href="javascript: certificado(<?PHP echo $rw[1].",".$rw[3]; ?>)">
					<?PHP echo $prv."/".$prt."/".$tmb."-".$rw[4]; ?>
          </a>
        </td>
      	<td align="center"><?PHP echo $rw[6]; ?></td>
      	<td align="left"><?PHP echo $rw[8]; ?></td>
      	<td align="left">
					<?PHP 
						echo $rw[10]; 
						if ($rw[13]!=''){ 
					?>
          	<img src="imagenes/iconos/mapsChk.png" width="15" title="<?PHP echo $rw[13]; ?>" />
          <?PHP } ?>
        </td>
      	<td align="left"><?PHP echo $rw[5]; ?></td>
      	<td align="left"><?PHP echo $rw[11]; ?></td>
      	<td align="center"><?PHP echo $rw[12]; ?></td>
      </tr>
      <?PHP
				}
			?>
    </table>
  </div>
</div>