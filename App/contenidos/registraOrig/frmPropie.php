<?PHP
	$sql = "SELECT ID_PRTD, PARTIDO FROM PARTIDOS WHERE ID_PRVC = 2 ORDER BY PARTIDO ASC";
	$rs = ejecutar($sql); $opp = '';
	while ($rw=mysqli_fetch_row($rs)){
		$opp.= "<option value=$rw[0]>$rw[1]</option>";
	}
?>
<div id="frm-registro">
	<div id="frg-identifr"> 
      <div id="frgi-ncuit">
        <label for="cuir">CUIT:</label>
        <input type="text" id="cuir" tabindex="2" />	
      </div>
    <div id="frgi-propiet">
      <label for="prpr">Propietario del Tambo:</label>
      <input type="text" id="prpr" tabindex="1" />	
    </div>
    <div id="frgi-domicll">
      <label for="cllr">Domicilio: <em>Calle</em></label>
      <input type="text" id="cllr" tabindex="3" />	
    </div>
    <div id="frgi-domicnr">
      <label for="cnrr"><em>Nro</em></label>
      <input type="text" id="cnrr" tabindex="4" />	
    </div>
    <div id="frgi-domicpt">
      <label for="cptr"><em>C.Postal</em></label>
      <input type="text" id="cptr" tabindex="5" />	
    </div>
    <div id="frgi-domiprt">
      <label for="prtr"><em>Partido</em></label>
			<select id="prtr" onchange="chgPartidP();" tabindex="6">
        <option value="X" disabled="disabled" selected="selected">Seleccione el partido</option>
        <?PHP echo $opp; ?>
      </select>    </div>
    <div id="frgi-domilcl">
      <label for="lclr"><em>Localidad</em></label>
      <select id="lclr" tabindex="7">
        <option value="X" disabled="disabled" selected="selected">Seleccione el partido</option>
      </select>	
    </div>
    <div id="frgi-domitlf">
      <label for="tlfr"><em>Telefax</em></label>
      <input type="text" id="tlfr" tabindex="8" />	
    </div>
    <div id="frgi-domieml">
      <label for="emlr"><em>Email</em></label>
      <input type="text" id="emlr" tabindex="9" />	
    </div>  
	</div>
	<div id="frg-guardar">
    <div>
      <input type="button" id="bgp" value="Guardar" onclick="propietar();" tabindex="10" />
    </div>
  </div>  
  <div id="frgi-lstPropies" style="display:none;"></div>
</div>