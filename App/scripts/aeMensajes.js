// JavaScript Document
var chauFnc = "";
var ms = 0;

function alerta(tt,ct){
	creaMensaje(tt,ct,100,420);
}

function creaMensaje(tt,ct,hg,wd,fn){
	chauFnc = fn || "";
	hg = hg || 70; wd = wd || 450;
	ms++; sh = window.innerHeight; tp = (sh-hg)/2
	//crea el bloqueador
	var B = document.createElement("div");
	B.id = "MJ-Bloqueo"+ms; B.className = "Opacado";
	//crea la ventana
	var V = document.createElement("div");
	V.id = "MJ-Mensaje"+ms; V.className = "Mensaje"; V.style.marginTop = tp+"px";
	V.style.height = hg+"px"; V.style.width = wd+"px";
	B.appendChild(V);
	var T = document.createElement("div");
	T.id = "MJ-Titulo"; T.className = "MTitulo"; T.innerHTML = tt;
	V.appendChild(T);
	var A = document.createElement("a");
	var H = document.createAttribute("href");
	A.setAttribute("href","javascript: chauMensaje("+ms+")"); A.innerHTML = "X";
	T.appendChild(A);
	var C = document.createElement("div");
	C.id = "MJ-Content"; C.className="MConten"; C.innerHTML = ct;
	var S = document.createAttribute("style"); var G = hg-22;
	C.setAttribute("style","height:"+G+"px;");
	
	V.appendChild(C);
	$("container").appendChild(B);
}

function chauMensaje(m){
	m || (m=ms);
		// cierra el mensaje
		e = $('MJ-Mensaje'+m);
		if (e){
			p = e.parentNode;
			p.removeChild(e);
		}
		// cierra el bloqueo
		e = $('MJ-Bloqueo'+m);
		if (e){
			p = e.parentNode;
			p.removeChild(e);
		}
		ms--;
	if (chauFnc!='') eval(chauFnc);
}

function hideMensaje(id){
 $(id).style.display="none";
}
function showMensaje(id){
	$(id).style.display="";
}