// JavaScript Document
// aeBasicos.js

function sisPwdOldEdt(){
	$("ovf").value = "N";
	$("iov").src = "images/transp.gif";	
}
function sisPwdOldChk(){
	vrs = "old="+$('old').value;
	loadContent("process.php?axn=WDUHEYBFUH",vrs,"sisPwdOldRsp(rsp);");
}
function sisPwdOldRsp(rsp){
	if (rsp=="N"){
		$("ovf").value = "N";
		$("iov").src = "images/no.jpg";
	} else if (rsp=="Y") {
		$("ovf").value = "Y";
		$("iov").src = "images/ok.jpg";
	}
}

function sisPwdNewEdt(){
	$("nvf").value = "N";
	$("inv").src = "images/transp.gif";	
}
function sisPwdNewChk(){
	vrs = "new="+$('new').value;
	loadContent("process.php?axn=SIURJUBZXC",vrs,"sisPwdNewRsp(rsp);");
}
function sisPwdNewRsp(rsp){
	if (rsp=="N"){
		$("nvf").value = "N";
		$("inv").src = "images/no.jpg";
	} else if (rsp=="Y") {
		$("nvf").value = "Y";
		$("inv").src = "images/ok.jpg";
	}
}

function sisPwdRptEdt(){
	$("rvf").value = "N";
	$("irv").src = "images/transp.gif";	
}
function sisPwdRptChk(){
	if ($('new').value != $('rpt').value){
		$("rvf").value = "N";
		$("irv").src = "images/no.jpg";
	} else {
		$("rvf").value = "Y";
		$("irv").src = "images/ok.jpg";
	}
}

function sisPwdCambiar(){
	if ($('ovf').value=='Y' && $('nvf').value=='Y' && $('rvf').value=='Y'){
		var vrs = "pwd="+$('new').value;
		loadContent("process.php?axn=MIUSNIEFUH",vrs,"sisPwdCmbRsp(rsp);");
	}
}
function sisPwdCmbRsp(rsp){
	if (rsp=="N"){
		alert ("La contraseña no se pudo actualizar.");
	} else if (rsp=="Y") {
		alert ("La contraseña se actualizó correctamente.");
		cargar('JHBXDUHDUH','','');
	}
}