<?PHP
	$sql = "SELECT ID_PRTD, PARTIDO FROM PARTIDOS WHERE ID_PRVC = 2 ORDER BY PARTIDO ASC";
	$rs = ejecutar($sql); $opp = '';
	while ($rw=mysqli_fetch_row($rs)){
		$opp.= "<option value=$rw[0]>$rw[1]</option>";
	}
?>
<script>
function chgPartidP(){
	if ($('prtr').value=='X') return false;
	var vrs= "prt="+$('prtr').value;
	loadContent("process.php?axn=UNSTUIHIUS",vrs,"lclr");	
}
function hbdFormul(){
	var inp = document.getElementsByTagName("input");
	for (i=0;i<inp.length;i++){
		if (inp[i].type!='button') inp[i].disabled='true';
	}
	var sel = document.getElementsByTagName("select");
	for (i=0;i<sel.length;i++){
		if (sel[i].type!='button') sel[i].disabled='true';
	}
}
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
}
function chgTpTmbo(){
	$('tpt').value = $('ttm').value;
}
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
}
function frmPropie(){
	$('frgi-lstPropies').style.display="none";
	var msg = "Registración de Propietario";
	loadContent("process.php?axn=IEJJDIEHFS","","creaMensaje('"+msg+"',rsp,200,1020);");
}
function bsqInduek(){
	var bsq = $('ind').value;
	var pox = $('ind').getBoundingClientRect();
	$('frgi-lstIndustr').style.top=(pox.top - 300)+"px";
	$('frgi-lstIndustr').style.left=(pox.left)+"px";
	$('frgi-lstIndustr').style.display="";
	var vrs= "bsq="+bsq;
	loadContent("process.php?axn=OGJOASEIJF",vrs,"frgi-lstIndustr");
}
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
}
function registrar(){
	var patt = new RegExp(/\b\d{2}\-\d{3}\-\d{1}\-\d{5}\/\d{2}\b/);
	var res = patt.test($("rnp").value);
	if (!res){
		alert ("Verifique el Nro de ReNSPA"); 
		return false;
	}
	var vrs= "rnp="+$('rnp').value;
	vrs = vrs + "&ttm="+$('ttm').value;
	
	if ($("idp").value=='X'){
		alert ("Ingrese el propietario"); 
		return false;
	}
	vrs = vrs + "&idp="+$('idp').value;

	vrs = vrs + "&nmb="+$('nmb').value;
	
	if ($("upd").value=='X'){
		alert ("Seleccione el partido"); 
		return false;
	}
	vrs = vrs + "&upd="+$('upd').value;

	if ($("ulc").value=='X'){
		alert ("Seleccione la localidad"); 
		return false;
	}
	vrs = vrs + "&ulc="+$('ulc').value;

	if ($("map").value==''){
		alert ("Ubique el tambo en el mapa"); 
		return false;
	}
	vrs = vrs + "&map="+$('map').value;

	if ($("tpo").value=='X'){
		alert ("Seleccione el tipo de ordeño"); 
		return false;
	}
	vrs = vrs + "&tpo="+$('tpo').value;

	if ($("bjd").value==''){
		alert ("Ingrese nro de bajadas"); 
		return false;
	}
	vrs = vrs + "&bjd="+$('bjd').value;

	if ($("tpr").value=='X'){
		alert ("Seleccione la temperatura de entrega"); 
		return false;
	}
	vrs = vrs + "&tpr="+$('tpr').value;

	if ($("cho").value==''){
		alert ("Ingrese la cantidad de hembras en ordeño"); 
		return false;
	}
	vrs = vrs + "&cho="+$('cho').value;

	if ($("chs").value==''){
		alert ("Ingrese la cantidad de hembras secas"); 
		return false;
	}
	vrs = vrs + "&chs="+$('chs').value;

	if ($("chr").value==''){
		alert ("Ingrese la cantidad de hembras restantes"); 
		return false;
	}
	vrs = vrs + "&chr="+$('chr').value;

	if ($("ltd").value==''){
		alert ("Ingrese la cantidad de litros por dia"); 
		return false;
	}
	vrs = vrs + "&ltd="+$('ltd').value;

	if ($("kpc").value==''){
		alert ("Ingrese los kilometros al pavimento mas cercano"); 
		return false;
	}
	vrs = vrs + "&kpc="+$('kpc').value;

	if ($("scp").value=='' && $("sca").value==''){
		alert ("Ingrese la superficie total del campo propios o alquilados."); 
		return false;
	}
	vrs = vrs + "&scp="+$('scp').value;
	vrs = vrs + "&sca="+$('sca').value;

	if ($("stp").value=='' && $("sta").value==''){
		alert ("Ingrese la superficie total del tambo propios o alquilados."); 
		return false;
	}
	vrs = vrs + "&stp="+$('stp').value;
	vrs = vrs + "&sta="+$('sta').value;

	vrs = vrs + "&pac="+$('pac').checked;
	vrs = vrs + "&nrg="+$('nrg').checked;

	if ($("paf").value==''){
		alert ("Ingrese cantidad de personal afectado"); 
		return false;
	}
	vrs = vrs + "&paf="+$('paf').value;

	if ($("rpo").value==''){
		alert ("Ingrese el responsable del tambo"); 
		return false;
	}
	vrs = vrs + "&rpo="+$('rpo').value;
	
	if ($("edt").value==''){
		alert ("Ingrese la edad del tambero"); 
		return false;
	}
	vrs = vrs + "&edt="+$('edt').value;

	if ($("ind").value=='X'){
		alert ("Ingrese la industria recibidora"); 
		return false;
	}
	vrs = vrs + "&idi="+$('idi').value;
	vrs = vrs + "&ind="+$('ind').value;

	loadContent("process.php?axn=KEOOSIEJDF",vrs,"respu(rsp);");
}
function respu(r){
	if (r=='RNS'){
		alert ('El nro de ReNSPA esta repetido');
		return false;
	} 

	var tbo = '000' + r;
	tbo = tbo.substr(tbo.length-3,3);  
	$('tmb').value = tbo;
	$('brg').disabled = true;
	$('crf').disabled = false;
	hbdFormul();
}
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
}
function respP(r){
	if (r=='FQP'){
		alert ('El profesional no esta disponible.');
		return false;
	}
	selPropie(r);
}
function selPropie(p){
	$('frgi-lstPropies').style.display="none";
	var vrs = "idp="+p;
	loadContent("process.php?axn=SHFUYHFIUY",vrs,"propietario");
	chauMensaje();
}
function selIndus(i,d){
	$('frgi-lstIndustr').style.display="none";
	$('idi').value = i;
	if (i!='N') { $('ind').value = d; }
	chauMensaje();
}
function certificado(){
	var   vrs =  "idp="+$('ptd').value;
	vrs = vrs + "&idt="+$('tmb').value;
	loadContent("process.php?axn=KISEUHUCUS",vrs,"printCrf(rsp);");
}
function printCrf(ct){
	var ventimp=window.open(' ','popimpr');
	ventimp.document.write(ct);
}
function frmtrnp(){
	var rnp = $('rnp').value;
	if (rnp.length==13){
		var rnf = rnp.substr(0,2)+'-'+rnp.substr(2,3)+'-'+rnp.substr(5,1)+'-'+rnp.substr(6,5)+'/'+rnp.substr(11,2);
		$('rnp').value = rnf;
	}
}
function frmMapear(){
	window.open("ubicacion.php", 'popup', 'width=500,height=400'); 
/*	
	var msg = "Ubicación del Tambo";
	var vrs = 'map='+$('map').value;
	loadContent("process.php?axn=KOESOIJFOS",vrs,"creaMensaje('"+msg+"',rsp,300,400);");
	setTimeout('', 5000);
	mapear();
*/
}
function ubicar(crd){
	$('map').value = crd;
	$('imp').source = "imagenes/iconos/mapsChk.png";
}
</script>
<?PHP
	if (!isset($_GET['ids'])){
		for ($i=0; $i<=44; $i++){ $tw[$i]=''; }
		$prt = '---';
	} else {
		$sql = "SELECT T.ID_SOLIC, T.ID_PRVC, T.ID_PRTD, T.TP_GNDO, T.NOMBRE, T.RENSPA, T.ID_PROP, T.PROPIETARIO, 
									 T.CUIT, T.CALLE, T.NUM, T.CPOST, T.PR_PRVC, T.PR_PRTD, R.PARTIDO, T.PR_LCLD, L.LOCALIDAD, 
									 T.TELEFONO, T.EMAIL, T.ID_LCLD, Q.PARTIDO, K.LOCALIDAD, T.UBICMAP, T.TP_ORDN, T.BAJADAS, 
									 T.ID_TMPR, T.HMBRO, T.HMBRS, T.HMBRR, T.LTRDIA, 29
									 T.CPOPRP, T.CPOALQ, T.TMBPRP, T.TMBALQ, T.KMTSTRR, T.ACCESO, T.ELECTR, T.AFECTADOS, T.TP_RSPN, 
									 T.EDAD, T.ID_INDU, T.RECIBIDORA, T.SOL_USER, T.SOL_FECH, T.SOL_ORIG, T.VERIFICOD, T.VRF_FECH, 
									 T.ESTADO
						FROM STAMBOS T
						LEFT JOIN PARTIDOS R ON T.PR_PRTD = R.ID_PRTD
						LEFT JOIN PARTIDOS Q ON T.ID_PRTD = Q.ID_PRTD
						LEFT JOIN LOCALIDADES L ON T.PR_PRTD = L.ID_PRTD AND T.ID_LCLD = L.ID_LCLD
						LEFT JOIN LOCALIDADES K ON T.PR_PRTD = K.ID_PRTD AND T.ID_LCLD = K.ID_LCLD
						WHERE T.ID_SOLIC = ".$_GET['ids'];
		$ts = ejecutar($sql); $tw = mysqli_fetch_row($ts);
		$prt = "000".$tw[2]; $prt = substr($prt, strlen($prt)-3);

	}
?>
<h3>REGISTRACIÓN DE TAMBO</h3>
<div id="frm-registro">
	<div id="frg-identif"> 
    <div id="frgi-renspa">
      <label for="rnp">Nro ReNSPA:</label>
      <input type="text" id="rnp" onblur*="frmtrnp()" tabindex="1" value="<?PHP echo $tw[5]; ?>" />
    </div>
    <div id="frgi-tptmbo">
      <label for="ttm">Tipo de Tambo</label>
      <select id="ttm" onchange="chgTpTmbo()" tabindex="2">
        <?PHP
          $sql = "SELECT TP_GNDO, DENOMIN FROM TP_GANADO ORDER BY TP_GNDO ASC";
          $rs = ejecutar($sql);
          while ($rw=mysqli_fetch_row($rs)){
        ?>
        <option value="<?PHP echo $rw[0]; ?>" <?PHP if ($rw[0]==$tw[3]){ ?>selected="selected"<?PHP } ?>><?PHP echo $rw[1]; ?></option>
        <?PHP
          }
        ?>
      </select>	
    </div>
    <div id="frgi-regprv">
      <label for="ptd">Nro Registro Provincial:</label>
      <input type="text" disabled="disabled" id="prv" value="02"  maxlength="2" /> /
      <input type="text" disabled="disabled" id="ptd" value="<?PHP echo $prt; ?>" maxlength="3" /> /
      <input type="text" disabled="disabled" id="tmb" value="---" maxlength="3" /> -
      <input type="text" disabled="disabled" id="tpt" value="<?PHP echo $tw[3]; ?>"   maxlength="1" />	
    </div>
    <div id="propietario">
      <div id="frgi-ncuit">
        <label for="cui">CUIT:</label>
        <input type="text" disabled="disabled" id="cui" value="<?PHP echo $tw[8]; ?>" />	
      </div>
      <div id="frgi-propiet">
        <label for="prp">Propietario del Tambo:</label>
        <input type="hidden" id="idp" value="<?PHP echo $tw[6]; ?>" />
        <input type="text" id="prp" onkeyup="bsqPropie()" value="<?PHP echo $tw[7]; ?>" tabindex="3" />	
      </div>
      <div id="frgi-domicll">
        <label for="cll">Domicilio: <em>Calle</em></label>
        <input type="text" disabled="disabled" id="cll" value="<?PHP echo $tw[9]; ?>" />	
      </div>
      <div id="frgi-domicnr">
        <label for="cnr"><em>Nro</em></label>
        <input type="text" disabled="disabled" id="cnr" value="<?PHP echo $tw[10]; ?>" />	
      </div>
      <div id="frgi-domicpt">
        <label for="cpt"><em>C.Postal</em></label>
        <input type="text" disabled="disabled" id="cpt" value="<?PHP echo $tw[11]; ?>" />	
      </div>
      <div id="frgi-domiprt">
        <label for="prt"><em>Partido</em></label>
        <input type="text" disabled="disabled" id="prt" value="<?PHP echo $tw[14]; ?>" />	
        <select id="prt" onchange="chgPartido();" tabindex="5">
          <option value="X" disabled="disabled" selected="selected">Seleccione el partido</option>
          <?PHP echo $opp; ?>
        </select>	
      </div>
      <div id="frgi-domilcl">
        <label for="lcl"><em>Localidad</em></label>
        <input type="text" disabled="disabled" id="lcl" value="<?PHP echo $tw[16]; ?>" />	
      </div>
      <div id="frgi-domitlf">
        <label for="tlf"><em>Telefax</em></label>
        <input type="text" disabled="disabled" id="tlf" value="<?PHP echo $tw[17]; ?>" />	
      </div>
      <div id="frgi-domieml">
        <label for="eml"><em>Email</em></label>
        <input type="text" disabled="disabled" id="eml" value="<?PHP echo $tw[18]; ?>" />	
      </div>
    </div>
    <div id="frgi-nmbtmbo">
      <label for="nmb">Nombre del Tambo</label>
      <input type="text" id="nmb" tabindex="4" value="<?PHP echo $tw[4]; ?>" />	
    </div>
    <div id="frgi-ubicupd">
      <label for="upd">Ubicación del tambo: <em>Partido</em></label>
      <select id="upd" onchange="chgPartido();" tabindex="5">
        <option value="X" disabled="disabled" selected="selected">Seleccione el partido</option>
        <?PHP echo $opp; ?>
      </select>	
    </div>
    <div id="frgi-ubiculc">
      <label for="ulc"><em>Localidad</em></label>
      <select id="ulc" tabindex="6">
        <option value="X" disabled="disabled" selected="selected">Seleccione el partido</option>
      </select>	
    </div>
    <div id="frgi-ubimaps">
      <input type="hidden" id="map" value="X" tabindex="7" />
      <img id="imp" src="imagenes/iconos/mapsBsq.png" width="22" onclick="frmMapear()" />
    </div>
  </div>

	<div id="frg-ordeñe">
    <div id="frgo-rngl1tpo">
      <label for="tpo">Tipo Ordeño:</label>
      <select id="tpo" tabindex="8">
        <?PHP
          $sql = "SELECT TP_ORDN, DENOMIN FROM TP_ORDENIES";
          $rs = ejecutar($sql);
          while ($rw=mysqli_fetch_row($rs)){
        ?>
        <option value="<?PHP echo $rw[0]; ?>"><?PHP echo $rw[1]; ?></option>
        <?PHP
          }
        ?>
      </select>	
    </div>
    <div id="frgo-rngl1bjd">
      <label for="bjd">Nro Bajadas:</label>
      <input type="number" id="bjd" tabindex="9" />	
    </div>
    <div id="frgo-rngl1tpr">
      <label for="tpr">Temperatura de entrega:</label>
      <select id="tpr" tabindex="10">
        <?PHP
          $sql = "SELECT ID_TMPR, DENOMIN FROM TP_TEMPER";
          $rs = ejecutar($sql);
          while ($rw=mysqli_fetch_row($rs)){
        ?>
        <option value="<?PHP echo $rw[0]; ?>"><?PHP echo $rw[1]; ?></option>
        <?PHP
          }
        ?>
      </select>	
    </div>
    <div id="frgo-rngl2cho">
      <label for="cho">Hembras Ordeño:</label>
      <input type="number" id="cho" tabindex="11" />	
    </div>
    <div id="frgo-rngl2chs">
      <label for="chs">Hembras Secas:</label>
      <input type="number" id="chs" tabindex="12" />	
    </div>
    <div id="frgo-rngl2chr">
      <label for="chr">Hembras Restantes:</label>
      <input type="number" id="chr" tabindex="13" />	
    </div>
    <div id="frgo-rngl2ltd">
      <label for="ltd">Litros x Dia:</label>
      <input type="number" id="ltd" tabindex="14" />	
    </div>
  </div>

	<div id="frg-campotmb">
    <div id="frgc-rngl1a">
      <span id="lba">Alquilado</span>
      <span id="lbp">Propio</span>
    </div>
    <div id="frgc-rngl1b">
      <label for="kpc">Km a Pavimento:</label>
      <input type="number" id="kpc" tabindex="19" />	
    </div>

    <div id="frgc-rngl2a">
    	<label>Sup. total del Campo en hectareas:</label>
      <input type="number" id="sca" tabindex="16" />	
      <input type="number" id="scp" tabindex="15" />
    </div>
    <div id="frgc-rngl2b">
      <label for="pac">Problemas de Acceso:</label>
      <input type="checkbox" id="pac" tabindex="20" />	
    </div>

    <div id="frgc-rngl3a">
    	<label>Sup. total del Tambo en hectareas:</label>
      <input type="number" id="sta" tabindex="18" />	
      <input type="number" id="stp" tabindex="17" />	
    </div>
    <div id="frgc-rngl3b">
      <label for="nrg">Energia Electrica:</label>
      <input type="checkbox" id="nrg" tabindex="21" />	
    </div>
  </div>

	<div id="frg-personal">
    <div id="frgp-rngl1paf">
      <label for="paf">Personas Afectadas:</label>
      <input type="number" id="paf" tabindex="22" />	
    </div>
    <div id="frgp-rngl1rpo">
      <label for="rpo">Responsable Ordeño:</label>
      <select id="rpo" tabindex="23">
        <?PHP
          $sql = "SELECT TP_RSPN, DENOMIN FROM TP_RESPON";
          $rs = ejecutar($sql);
          while ($rw=mysqli_fetch_row($rs)){
        ?>
        <option value="<?PHP echo $rw[0]; ?>"><?PHP echo $rw[1]; ?></option>
        <?PHP
          }
        ?>
      </select>	
    </div>
    <div id="frgp-rngl1edt">
      <label for="edt">Edad Tambero:</label>
      <input type="number" id="edt" tabindex="24" />	
    </div>
    <div id="frgp-rngl2ind">
      <label for="ind">Industria Recibidora:</label>
      <input type="hidden" id="idi" value="X" />
      <input type="text" id="ind" tabindex="25" onclick="bsqInduek()" onkeyup="bsqInduek()" />	<!--   -->
    </div>
  </div>
	<div id="frg-guardar">
    <div>
      <input type="button" id="crf" value="Certificado" onclick="certificado();" disabled="disabled" tabindex="27" />
      <input type="button" id="brg" value="Guardar" onclick="registrar();" tabindex="26" />
    </div>
  </div>  
  <div id="frgi-lstPropies" style="display:none;"></div>
  <div id="frgi-lstIndustr" style="display:none;"></div>
</div>