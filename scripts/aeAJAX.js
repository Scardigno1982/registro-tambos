// JavaScript Document
// Funciones AJAX

// Variables de estado
var READY_STATE_UNINITIALIZED=0;
var READY_STATE_LOADING=1;
var READY_STATE_LOADED=2;
var READY_STATE_INTERACTIVE=3;
var READY_STATE_COMPLETE=4;

// Variable de Conexion
function nuevoAjax() {
	if (window.XMLHttpRequest) {
		return new XMLHttpRequest();
	}
	else if (window.ActiveXObject) {
		return new ActiveXObject("Microsoft.XMLHTTP");
	}
}

//Funcion de Peticion
function loadContent(url, vrs, dst) {
	if (dst=="conteiner")	bloqueo();
	
	if (vrs == "") vrs = "null";
	var ajax=nuevoAjax();
  ajax.onreadystatechange = function() {
		if (ajax.readyState == 4) {
			if (ajax.status == 200) {
				var xml = ajax.responseXML;
				var rsp = ajax.responseText;
				//alert (dst+"\n\n"+vrs+"\n\n"+rsp);
				//alert (rsp);
				var swr = rsp.substr(0,4);
				var rsp = rsp.substr(4);
				switch (swr){
					case '[@R]': //resultado
						eval(dst); break;
					case '[@V]': //ventana flotante
						
					case '[@M]': //mensaje
						alert(rsp); break;
					case '[@F]': //confirmacion
						if (confirm(rsp)) eval(dst); break;
					case '[@C]': //comando o funcion JS
						eval(rsp); break;
					case '[@P]': //archivo de script para linkear
						break;
					case '[@Y]': //archivo de estilo para linkear
						break;
					case '[@X]': //contenido xml
						break;
					case '[@L]': //redireccionamiento
						document.location = rsp;
						break;
					case '[@H]': //contenido html
						if (rsp == "Acceso NO Autorizado"){document.location = "../index.php";} 
						else {$(dst).innerHTML = rsp;}
						break;
					case '<?xm': //contenido xml
						eval (dst);
						break;
				}

				if (dst=="Principal"){
					desbloqueo();
				}
			}
		}         
	}
	
	vrs = vrs + "&rnd=" + (Math.random(8)*1000000000);
  ajax.open("POST", url, true);
  ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  ajax.send(vrs);
}

function bloqueo() {
	var B = document.createElement("div");
	B.id = "Bloqueo"; B.className = "Opacado";
	var C = document.createElement("div");
	var ct = '<img src="imagenes/procesos/cargando.gif" width="45" /><br />Espere...';
	C.id = "C"; C.className="MBloqueo"; C.innerHTML = ct;
	B.appendChild(C);
	$("Escritorio").appendChild(B);	
}
function desbloqueo(){
	p = $('Bloqueo').parentNode;
	p.removeChild($('Bloqueo'));
}

var uaxn = ""; var uvrs = ""; var uid = "";
function cargar(axn,vrs,id){
	if (id==''){
		uaxn = axn; uvrs = vrs; uid = id;
		id = 'Principal'; 
	}
	ocultarMenues();
	loadContent("process.php?axn="+axn, vrs, id);
}
function reCargar(){
	cargar(uaxn, uvrs, uid);
}
