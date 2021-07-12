<?PHP
	$idp = $_POST['idp'];
	$sql = "SELECT P.ID_PROP, P.PROPIETARIO, P.CUIT, P.CALLE, P.NUM, P.CPOST, P.ID_PRTD, T.PARTIDO, P.ID_LCLD, L.LOCALIDAD, 
					P.TELEFONO, P.EMAIL FROM PROPIETARIOS P LEFT JOIN PARTIDOS T ON P.ID_PRTD = T.ID_PRTD
					LEFT JOIN LOCALIDADES L ON P.ID_PRTD = L.ID_PRTD AND P.ID_LCLD = L.ID_LCLD WHERE P.ID_PROP = $idp";
	$rs = ejecutar($sql); $rw = mysqli_fetch_row($rs);
?>
    <div id="frgi-ncuit">
      <label for="cui">CUIT:</label>
      <input type="text" disabled="disabled" value="<?PHP echo $rw[2]; ?>" id="cui" />	
    </div>
    <div id="frgi-propiet">
      <label for="prp">Propietario del Tambo:</label>
      <input type="hidden" id="idp" value="<?PHP echo $rw[0]; ?>" />
      <input type="text" id="prp" value="<?PHP echo $rw[1]; ?>" onkeyup="bsqPropie()" tabindex="3" />	
    </div>
    <div id="frgi-domicll">
      <label for="cll">Domicilio: <em>Calle</em></label>
      <input type="text" disabled="disabled" value="<?PHP echo $rw[3]; ?>" id="cll" />	
    </div>
    <div id="frgi-domicnr">
      <label for="cnr"><em>Nro</em></label>
      <input type="text" disabled="disabled" value="<?PHP echo $rw[4]; ?>" id="cnr" />	
    </div>
    <div id="frgi-domicpt">
      <label for="cpt"><em>C.Postal</em></label>
      <input type="text" disabled="disabled" value="<?PHP echo $rw[5]; ?>" id="cpt" />	
    </div>
    <div id="frgi-domiprt">
      <label for="prt"><em>Partido</em></label>
      <input type="text" disabled="disabled" value="<?PHP echo $rw[7]; ?>" id="prt" />	
    </div>
    <div id="frgi-domilcl">
      <label for="lcl"><em>Localidad</em></label>
      <input type="text" disabled="disabled" value="<?PHP echo $rw[9]; ?>" id="lcl" />	
    </div>
    <div id="frgi-domitlf">
      <label for="tlf"><em>Telefax</em></label>
      <input type="text" disabled="disabled" value="<?PHP echo $rw[10]; ?>" id="tlf" />	
    </div>
    <div id="frgi-domieml">
      <label for="eml"><em>Email</em></label>
      <input type="text" disabled="disabled" value="<?PHP echo $rw[11]; ?>" id="eml" />	
    </div>
    
