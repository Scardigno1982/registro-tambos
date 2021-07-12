function loadModels(){
	var mrc = document.getElementById('mrc').value;
	if(mrc=='N'){
		nvmrc();
	} else {
		$('#mdl').load('modelos.php?mrc='+mrc);
	}
}
function loadResult(p){
	var   vrs =  "mrc=" + document.getElementById('mrc').value;
	vrs = vrs + "&mdl=" + document.getElementById('mdl').value;
	vrs = vrs + "&tpv=" + document.getElementById('tpv').value;
	vrs = vrs + "&cmb=" + document.getElementById('cmb').value;
	vrs = vrs + "&pdd=" + document.getElementById('pdd').value;
	vrs = vrs + "&pht=" + document.getElementById('pht').value;
	vrs = vrs + "&add=" + document.getElementById('add').value;
	vrs = vrs + "&aht=" + document.getElementById('aht').value;
	vrs = vrs + "&pgn=" + p;
	$('#resultados').load('resultados.php?'+vrs);
}
function guardar(){
	if (document.getElementById("mrc").value=='X'){
		alert ("Falta la Marca"); return false;
	}
	if (document.getElementById("mdl").value=='X'){
		alert ("Falta el Modelo"); return false;
	}
	if (document.getElementById("ano").value=='X'){
		alert ("Falta el Año"); return false;
	}
	if (document.getElementById("tpo").value=='X'){
		alert ("Falta el Tipo de Vehículo"); return false;
	}
	if (document.getElementById("cmb").value=='X'){
		alert ("Falta el Combustible"); return false;
	}
	if (document.getElementById("dsc").value==''){
		alert ("Falta la descripción"); return false;
	}
	document.getElementById("crts").submit();
}
function elimina(){
	var id = document.getElementById("idu").value;
	if (confirm("Esta seguro que desea eliminar este usado?")){
		lnk = 'eliminau.php?idu='+id;
		location.href = lnk;
	}
}
function eliminar(i){
	var u = document.getElementById("us"+i).innerHTML;
	if (confirm("Esta seguro que desea eliminar el auto?\n\n"+u)){
		lnk = 'eliminaru.php?idu='+i;
		location.href = lnk;
	}
}
function subir(){
	if (document.getElementById("img").value==''){
		alert ("Debe seleccionar una imagen"); return false;
	}
	document.getElementById("loader").submit();
}
function borraft(id,ft){
	msg = "Confirma que desea borrar la foto?";
	if (confirm(msg)){
		lnk = 'borraft.php?idu='+id+'&idf='+ft;
		location.href = lnk;
	}
}
function nvmrc(){
	var idu = document.getElementById("idu").value;
	var mr = prompt("Ingrese la nueva marca");
	lnk = 'nvmrc.php?idu='+idu+'&mrc='+mr;
	location.href = lnk;	
}
function nvmdl(){
	if (document.getElementById("mdl").value=='N'){
		var idu = document.getElementById("idu").value;
		var mr = document.getElementById("mrc").value;
		var md = prompt("Ingrese el nuevo modelo");
		$('#mdl').load('modelos.php?mrc='+mr+'&mdl='+md);
	}
}
function nvtpo(){
	if (document.getElementById("tpo").value=='N'){
		var idu = document.getElementById("idu").value;
		var tp = prompt("Ingrese el nuevo tipo");
		$('#tpo').load('nvtpo.php?tpo='+tp);
	}
}
function nvcmb(){
	if (document.getElementById("cmb").value=='N'){
		var idu = document.getElementById("idu").value;
		var cb = prompt("Ingrese el nueva combustible");
		$('#cmb').load('nvcmb.php?cmb='+cb);
	}
}
function oculta(){
	document.getElementById("respuesta").style.display = 'none';
}