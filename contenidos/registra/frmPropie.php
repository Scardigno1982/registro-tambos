<?PHP

	for ($i=0;$i<=14;$i++){ $rw[$i]=''; }
	if ($_SESSION['usr_tpUser']=='P'){
		$prp = $_SESSION['usr_idProp'];
		$sql = "SELECT P.ID_PROP, P.PROPIETARIO, P.CUIT, P.CALLE, P.NUM, P.CPOST, P.ID_PRVC, V.PROVINCIA, 
									 P.ID_PRTD, T.PARTIDO, P.ID_LCLD, L.LOCALIDAD, P.TELEFONO, P.FAX, P.EMAIL
						FROM PROPIETARIOS P	LEFT JOIN PROVINCIAS V ON P.ID_PRVC = V.ID_PRVC
						LEFT JOIN PARTIDOS T ON P.ID_PRTD = T.ID_PRTD	LEFT JOIN LOCALIDADES L ON P.ID_LCLD = L.ID_LCLD
						WHERE P.ID_PROP = $prp";
		$rs = ejecutar($sql); $rw=mysqli_fetch_row($rs);
	}

?>
<div id="frm-registro">
	<input type="hidden" id="iprp" value="<?PHP echo $rw[0]; ?>" />
	<div id="frg-identifr"> 
      <div id="frgi-ncuit">
        <label for="cuir">CUIT:</label>
        <input type="text" id="cuir" tabindex="2" value="<?PHP echo $rw[2]; ?>" />	
      </div>
    <div id="frgi-propiet">
      <label for="prpr">Propietario del Tambo:</label>
      <input type="text" id="prpr" tabindex="1" value="<?PHP echo $rw[1]; ?>" />	
    </div>
    <div id="frgi-domicll">
      <label for="cllr">Domicilio: <em>Calle</em></label>
      <input type="text" id="cllr" tabindex="3" value="<?PHP echo $rw[3]; ?>" />	
    </div>
    <div id="frgi-domicnr">
      <label for="cnrr"><em>Nro</em></label>
      <input type="text" id="cnrr" tabindex="4"value=" <?PHP echo $rw[4]; ?>" />	
    </div>
    <div id="frgi-domicpt">
      <label for="cptr"><em>C.Postal</em></label>
      <input type="text" id="cptr" tabindex="5" value="<?PHP echo $rw[5]; ?>" />	
    </div>
    <div id="frgi-domiprt">
      <label for="prtr"><em>Partido</em></label>
			<select id="prtr" onchange="chgPartidP();" tabindex="6">
        <?PHP if ($_SESSION['usr_tpUser']=='A'){ ?>
        <option value="X" disabled="disabled" selected="selected">Seleccione el partido</option>
        <?PHP 
					}
					$sql = "SELECT ID_PRTD, PARTIDO FROM PARTIDOS WHERE ID_PRVC = 2 ORDER BY PARTIDO ASC";
					$ss = ejecutar($sql); $opp = '';
					while ($sw=mysqli_fetch_row($ss)){
				?>
				<option value="<?PHP echo $sw[0]; ?>"<?PHP if ($sw[0]==$rw[8]){ ?> selected="selected"<?PHP } ?>><?PHP echo $sw[1]; ?></option>
				<?PHP		
					}
				?>
      </select>    
    </div>
    <div id="frgi-domilcl">
      <label for="lclr"><em>Localidad</em></label>
      <select id="lclr" tabindex="7">
        <?PHP if ($_SESSION['usr_tpUser']=='A'){ ?>
        <option value="X" disabled="disabled" selected="selected">Seleccione el partido</option>
        <?PHP 
					}
				  $sql = "SELECT ID_LCLD, LOCALIDAD FROM LOCALIDADES WHERE ID_PRTD = $rw[8] ORDER BY LOCALIDAD ASC";
					$ss = ejecutar($sql); $opp = '';
					while ($sw=mysqli_fetch_row($ss)){
				?>
				<option value="<?PHP echo $sw[0]; ?>"<?PHP if ($sw[0]==$rw[10]){ ?> selected="selected"<?PHP } ?>><?PHP echo $sw[1]; ?></option>
				<?PHP		
					}
				?>
      </select>	
    </div>
    <div id="frgi-domitlf">
      <label for="tlfr"><em>Telefax</em></label>
      <input type="text" id="tlfr" tabindex="8" value="<?PHP echo $rw[12]; ?>" />	
    </div>
    <div id="frgi-domieml">
      <label for="emlr"><em>Email</em></label>
      <input type="text" id="emlr" tabindex="9" value="<?PHP echo $rw[14]; ?>" />	
    </div>  
	</div>
	<div id="frg-guardar">
    <div>
      <input type="button" id="bgp" value="Guardar" onclick="propietar();" tabindex="10" />
    </div>
  </div>  
  <div id="frgi-lstPropies" style="display:none;"></div>
</div>