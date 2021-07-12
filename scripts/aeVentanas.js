// JavaScript Document
// aeBasicos.js
var IDs = 0;
function nuevoID(){
	IDs++;
	return IDs;
}
function creaVentana(id,tt,ct){
	if (id=='NEW') id = nuevoID();
	//crea la ventana
	var V = document.createElement("div");
	V.id = id; V.className = "Ventana"; V.style.position="relative";
	var T = document.createElement("div");
	T.id = id+"T"; T.className = "VTitulo"; T.innerText = tt;
	V.appendChild(T);
	var A = document.createElement("a");
	var H = document.createAttribute("href");
	A.setAttribute("href","javascript: chauVentana('"+id+"')"); A.innerText = "X";
	T.appendChild(A);
	var A = document.createElement("a");
	var H = document.createAttribute("href");
	A.setAttribute("href","javascript: hideVentana('"+id+"')"); A.innerText = "H";
	T.appendChild(A);
	var C = document.createElement("div");
	C.id = id+"C"; C.className="VConten"; C.innerHTML = ct;
	V.appendChild(C);
	document.getElementById("Escritorio").appendChild(V);
	Drag.init(document.getElementById(id+"T"),document.getElementById(id));

	//asigna al menu
	var I = document.createElement("a");
	var H = document.createAttribute("href");
	I.setAttribute("href","javascript: showVentana('"+id+"')"); I.innerText = tt; I.id = "M"+id;
	document.getElementById("MF-Ventanas").appendChild(I);
}

function chauVentana(id){
	//saca del menu
	m = $("M"+id);
	if (m){
		p = m.parentNode;
		p.removeChild(m);
	}	
	// cierra la ventana
	e = $(id);
	if (e){
		p = e.parentNode;
		p.removeChild(e);
	}
}

function hideVentana(id){
 $(id).style.display="none";
}
function showVentana(id){
	$(id).style.display="";
}