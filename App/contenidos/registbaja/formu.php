<script>
function hbdFormul(){
	var inp = document.getElementsByTagName("input");
	for (i=0;i<inp.length;i++){
		if (inp[i].type!='button') inp[i].disabled='true';
	}
	var sel = document.getElementsByTagName("select");
	for (i=0;i<sel.length;i++){
		if (sel[i].type!='button') sel[i].disabled='true';
	}
} //deshabilita campos formulario
function chgPartidP(){
	if ($('prt').value=='X') return false;
	var vrs= "prt="+$('prt').value;
	loadContent("process.php?axn=UNSTUIHIUS",vrs,"lcl");	
} //cambia partido propietario
function chgPartido(){
	if ($('upd').value=='X'){
		$('ptd').value = '---';
		return false;
	} else {
		var ptd = '000' + $('upd').value;
		ptd = ptd.substr(ptd.length-3,3);  
		$('ptd').value = ptd;
		var vrs= "prt="+$('upd').value;
		loadContent("process.php?axn=UNSTUIHIUS",vrs,"ulc");	
	}
} //cambia partido tambo
function chgTpTmbo(){
	$('tpt').value = $('ttm').value;
} //cambia tipo tambo
function bsqPropie(){
	var bsq = $('prp').value;
	$('cll').value = ""; $('cnr').value = "";
	$('cpt').value = ""; $('prt').value = "";
	$('lcl').value = ""; $('tlf').value = "";
	$('eml').value = "";
	if (bsq.length>=4){
		var pox = $('prp').getBoundingClientRect();
		$('frgi-lstPropies').style.top=(pox.bottom+2)+"px";
		$('frgi-lstPropies').style.left=(pox.left)+"px";
		$('frgi-lstPropies').style.display="";
		var vrs= "bsq="+bsq;
		loadContent("process.php?axn=WIIRROUDGT",vrs,"frgi-lstPropies");
	} else {
		$('frgi-lstPropies').style.display="none";
	}
} //busca propietario
function frmPropie(){
	$('frgi-lstPropies').style.display="none";
	var msg = "Registración de Propietario";
	loadContent("process.php?axn=IEJJDIEHFS","","creaMensaje('"+msg+"',rsp,200,1020);");
} //form propietario
function bsqInduek(){
	var bsq = $('ind').value;
	var pox = $('ind').getBoundingClientRect();
	$('frgi-lstIndustr').style.top=(pox.top - 300)+"px";
	$('frgi-lstIndustr').style.left=(pox.left)+"px";
	$('frgi-lstIndustr').style.display="";
	var vrs= "bsq="+bsq;
	loadContent("process.php?axn=OGJOASEIJF",vrs,"frgi-lstIndustr");
} //busca industria
function bsqIndues(){
	return false;
	var bsq = $('ind').value;
	if (bsq.length==0) $('idi').value='X';
	if ((bsq.length>=4)){
		if ($('idi').value=='X'){
			var pox = $('ind').getBoundingClientRect();
			$('frgi-lstIndustr').style.top=(pox.top - 270)+"px";
			$('frgi-lstIndustr').style.left=(pox.left)+"px";
			$('frgi-lstIndustr').style.display="";
			var vrs= "bsq="+bsq;
			loadContent("process.php?axn=OGJOASEIJF",vrs,"frgi-lstIndustr");
		}
	} else {
		$('frgi-lstPropies').style.display="none";
	}
} //busca industria
function registrar(){
	var vrs= "ids="+$('ids').value;
	var msg = "Confirma la solicitud de baja del tambo?";
	if (confirm(msg)){
		loadContent("process.php?axn=OIJSOIHISU",vrs,"respu(rsp);");
	}
} //baja tambo
function respu(r){

} // respuesta reg tambo
function rechazar(){
	var msg = "Confirma el rechazo de la solicitud?";
	var vrs = "ids=" + $('ids').value;
	if (confirm (msg)){
		loadContent("process.php?axn=SFUISEURGI",vrs,"recha(rsp);");			
	} 
} //rechaza solicitud
function recha(r){
	alert ('Se rechazó la solicitud nro '+r);
	document.location = "?lnk=SOL";
} // respuesta rechazo
function propietar(){
	if ($("prpr").value==''){
		alert ("Ingrese el nombre o razón social del propietario"); 
		return false;
	}
	var vrs= "prpr="+$('prpr').value;
	
	if ($("cuir").value==''){
		alert ("Ingrese el Nro de CUIT"); 
		return false;
	}
	vrs = vrs + "&cuir="+$('cuir').value;

	if ($("cllr").value==''){
		alert ("Ingrese la calle"); 
		return false;
	}
	vrs = vrs + "&cllr="+$('cllr').value;
	
	if ($("cnrr").value==''){
		alert ("Ingrese el nro"); 
		return false;
	}
	vrs = vrs + "&cnrr="+$('cnrr').value;

	if ($("cptr").value=='X'){
		alert ("Ingrese el Código Postal"); 
		return false;
	}
	vrs = vrs + "&cptr="+$('cptr').value;

	if ($("prtr").value=='X'){
		alert ("Seleccione el partido"); 
		return false;
	}
	vrs = vrs + "&prtr="+$('prtr').value;

	if ($("lclr").value=='X'){
		alert ("Seleccione la localidad"); 
		return false;
	}
	vrs = vrs + "&lclr="+$('lclr').value;

	if ($("tlfr").value=='X'){
		alert ("Ingrese el telefono"); 
		return false;
	}
	vrs = vrs + "&tlfr="+$('tlfr').value;

	if ($("emlr").value==''){
		alert ("Ingrese el email"); 
		return false;
	}
	vrs = vrs + "&emlr="+$('emlr').value;

	loadContent("process.php?axn=JERIOJOJG",vrs,"respP(rsp);");
} //registra propietario
function respP(r){
	if (r=='FQP'){
		alert ('El profesional no esta disponible.');
		return false;
	}
	selPropie(r);
} //respuesta reg propie
function selPropie(p){
	$('frgi-lstPropies').style.display="none";
	var vrs = "idp="+p;
	loadContent("process.php?axn=SHFUYHFIUY",vrs,"propietario");
	chauMensaje();
} //selecciona propie
function selIndus(i,d){
	$('frgi-lstIndustr').style.display="none";
	$('idi').value = i;
	if (i!='N') { $('ind').value = d; }
	chauMensaje();
} //selecciona industria
function certificado(){
	var   vrs =  "idp="+$('ptd').value;
	vrs = vrs + "&idt="+$('tmb').value;
	loadContent("process.php?axn=KISEUHUCUS",vrs,"printCrf(rsp);");
} //emite certificado
function printCrf(ct){
	var ventimp=window.open(' ','popimpr');
	ventimp.document.write(ct);
} //imprime certificado
function frmtrnp(){
	var rnp = $('rnp').value;
	if (rnp.length==13){
		var rnf = rnp.substr(0,2)+'-'+rnp.substr(2,3)+'-'+rnp.substr(5,1)+'-'+rnp.substr(6,5)+'/'+rnp.substr(11,2);
		$('rnp').value = rnf;
	}
} //formatea renspa
function frmMapear(){
	window.open("ubicacion.php", 'popup', 'width=500,height=400'); 
/*	
	var msg = "Ubicación del Tambo";
	var vrs = 'map='+$('map').value;
	loadContent("process.php?axn=KOESOIJFOS",vrs,"creaMensaje('"+msg+"',rsp,300,400);");
	setTimeout('', 5000);
	mapear();
*/
} //abre mapeador
function ubicar(crd){
	$('map').value = crd;
	$('imp').source = "imagenes/iconos/mapsChk.png";
} //ubicador tambo

function rechajar(){
	var msg = "Confirma el rechazo de la solicitud de baja?";
	var vrs = "ids=" + $('ids').value;
	if (confirm (msg)){
		loadContent("process.php?axn=SFUISEURGI",vrs,"recha(rsp);");			
	} 
} //rechaza solicitud
function recha(r){
	alert ('Se rechazó la solicitud nro '+r);
	document.location = "?lnk=SOL";
} // respuesta rechazo

</script>
<?PHP
	if (!isset($_GET['ids'])){
		for ($i=0; $i<=44; $i++){ $sw[$i]=''; }
		$prt = '---';
	} else {
		$sql = "SELECT B.ID_SOLIC, B.ID_PRVC, B.ID_PRTD, T.TP_GNDO, T.NOMBRE, T.RENSPA, T.ID_PROP, P.PROPIETARIO, 
									 P.CUIT, P.CALLE, P.NUM, P.CPOST, P.ID_PRVC, P.ID_PRTD, R.PARTIDO, P.ID_LCLD, L.LOCALIDAD,
									 P.TELEFONO, P.EMAIL, T.ID_LCLD, Q.PARTIDO, K.LOCALIDAD, T.UBICMAP, T.TP_ORDN, T.BAJADAS, 
									 T.ID_TMPR, T.HMBRO, T.HMBRS, T.HMBRR, T.LTRDIA, T.CPOPRP, T.CPOALQ, T.TMBPRP, T.TMBALQ, 
									 T.KMTSTRR, T.ACCESO, T.ELECTR, T.AFECTADOS, T.TP_RSPN, T.EDAD, T.ID_INDU, T.RECIBIDORA, 
									 T.CATASTRAL, G.DENOMIN, T.ALTAFEC, T.ALTAUSR, T.BAJAFEC, T.BAJAUSR,
									 T.ID_TMBO, B.SOL_USER, B.SOL_FECH, B.SOL_ORIG, B.PRC_FECH, B.PRC_USER, B.ESTADO
						FROM STBAJAS B
						LEFT JOIN TAMBOS T ON B.ID_PRVC = T.ID_PRVC AND B.ID_PRTD = T.ID_PRTD AND B.ID_TMBO = T.ID_TMBO
						LEFT JOIN PROPIETARIOS P ON T.ID_PROP = P.ID_PROP
						LEFT JOIN PARTIDOS R ON P.ID_PRTD = R.ID_PRTD
						LEFT JOIN PARTIDOS Q ON T.ID_PRTD = Q.ID_PRTD
						LEFT JOIN LOCALIDADES L ON P.ID_PRTD = L.ID_PRTD AND P.ID_LCLD = L.ID_LCLD
						LEFT JOIN LOCALIDADES K ON T.ID_PRTD = K.ID_PRTD AND T.ID_LCLD = K.ID_LCLD
						LEFT JOIN TP_GANADO G ON T.TP_GNDO = G.TP_GNDO
						WHERE B.ID_SOLIC = ".$_GET['ids'];
		$ss = ejecutar($sql); $sw = mysqli_fetch_row($ss);
		$prt = "000".$sw[2]; $prt = substr($prt, strlen($prt)-3);

	}
?>
<h3>BAJA DE TAMBO</h3>
<div id="frm-registro">
	<div id="frg-identif" style="padding-bottom: 8px;"> 
    <div id="frgi-renspa">
    	<input type="hidden" id="ids" value="<?PHP echo $sw[0]; ?>" />
      <label for="rnp">Nro ReNSPA:</label>
      <input type="text" id="rnp" tabindex="1" value="<?PHP echo $sw[5]; ?>" disabled="disabled" />
    </div>
    <div id="frgi-tptmbo">
      <label for="ttm">Tipo de Tambo</label>
      <input type="text" id="ttm" disabled="disabled" value="<?PHP echo $sw[43]; ?>" />
    </div>
    <div id="frgi-regprv">
      <label for="ptd">Nro Registro Provincial:</label>
      <input type="text" disabled="disabled" id="prv" value="02"  maxlength="2" /> /
      <input type="text" disabled="disabled" id="ptd" value="<?PHP echo $prt; ?>" maxlength="3" /> /
      <input type="text" disabled="disabled" id="tmb" value="<?PHP echo $sw[48]; ?>" maxlength="3" /> -
      <input type="text" disabled="disabled" id="tpt" value="<?PHP echo $sw[3]; ?>"   maxlength="1" />	
    </div>
    <div id="propietario">
      <div id="frgi-ncuit">
        <label for="cui">CUIT:</label>
        <input type="text"  id="cui" value="<?PHP echo $sw[8]; ?>" disabled="disabled"/>	
      </div>
      <div id="frgi-propiet">
        <label for="prp">Propietario del Tambo:</label>
        <input type="hidden" id="idp" value="<?PHP echo $sw[6]; ?>" />
        <input type="text" id="prp" Xonkeyup="bsqPropie()" value="<?PHP echo $sw[7]; ?>" disabled="disabled" tabindex="3" />	
      </div>
      <div id="frgi-domicll">
        <label for="cll">Domicilio: <em>Calle</em></label>
        <input type="text" id="cll" tabindex="4" value="<?PHP echo $sw[9]; ?>" disabled="disabled" />	
      </div>
      <div id="frgi-domicnr">
        <label for="cnr"><em>Nro</em></label>
        <input type="text" id="cnr" tabindex="5" value="<?PHP echo $sw[10]; ?>" disabled="disabled" />	
      </div>
      <div id="frgi-domicpt">
        <label for="cpt"><em>C.Postal</em></label>
        <input type="text" id="cpt" tabindex="6" disabled="disabled" value="<?PHP echo $sw[11]; ?>" />	
      </div>
      <div id="frgi-domiprt">
        <label for="prt"><em>Partido</em></label>
	      <input type="text" id="prt" disabled="disabled" value="<?PHP echo $sw[14]; ?>" />
      </div>
      <div id="frgi-domilcl">
        <label for="lcl"><em>Localidad</em></label>
	      <input type="text" id="lcl" disabled="disabled" value="<?PHP echo $sw[16]; ?>" />
      </div>
      <div id="frgi-domitlf">
        <label for="tlf"><em>Telefono</em></label>
        <input type="text" id="tlf" disabled="disabled" tabindex="9" value="<?PHP echo $sw[17]; ?>" />	
      </div>
      <div id="frgi-domieml">
        <label for="eml"><em>Email</em></label>
        <input type="email" id="eml" disabled="disabled" tabindex="10" value="<?PHP echo $sw[18]; ?>" />
      </div>  
      <div id="frgi-lstPropies" style="display:none;"></div>
    </div>
    <div id="frgi-nmbtmbo">
      <label for="nmb">Nombre del Tambo</label>
      <input type="text" id="nmb" disabled="disabled" tabindex="11" value="<?PHP echo $sw[4]; ?>" />	
    </div>
    <div id="frgi-nomcats">
      <label for="nct">N.Catastral</label>
      <input type="text" id="nct" disabled="disabled" tabindex="11" value="<?PHP echo $sw[41]; ?>" />	    
    </div>
    <div id="frgi-ubicupd">
      <label for="upd">Ubicación del tambo: <em>Partido</em></label>
      <input type="text" id="upd" disabled="disabled" value="<?PHP echo $sw[21]; ?>" />
    </div>
    <div id="frgi-ubiculc">
      <label for="ulc"><em>Localidad</em></label>
      <input type="text" id="ulc" disabled="disabled" value="<?PHP echo $sw[22]; ?>" />
    </div>
    <div id="frgi-ubimaps">
      <input type="hidden" id="map" value="<?PHP echo $sw[22]; ?>" />
      <img id="imp" src="imagenes/iconos/mapsBsq.png" width="22" />
    </div>
  </div>

	<div id="frg-guardar">
    <input type="button" id="brh" value="Rechazar" onclick="rechazar();" tabindex="32" />
    <input type="button" id="brg" value="Aceptar" onclick="registrar();" tabindex="32" />
  </div>  
  <div id="frgi-lstPropies" style="display:none;"></div>
  <div id="frgi-lstIndustr" style="display:none;"></div>
</div>