// JavaScript Document
function ocultarMenues(){
	if ($("MF-Herrams")) $("MF-Herrams").style.display="none";
	if ($("MF-Persona")) $("MF-Persona").style.display="none";
	if ($("MF-Empresa")) $("MF-Empresa").style.display="none";
	if ($("MF-Proyect")) $("MF-Proyect").style.display="none";
	if ($("MF-Academic")) $("MF-Academic").style.display="none";		
	if ($("MF-Ventanas")) $("MF-Ventanas").style.display="none";
	if ($("MF-Gobierno")) $("MF-Gobierno").style.display="none";
	if ($("MF-Banco")) $("MF-Banco").style.display="none";
	if ($("MF-AddContac")) $("MF-AddContac").style.display="none";
}
function mostrarMenu(mn){
	if ($(mn).style.display==""){
		$(mn).style.display="none";
	} else {
		ocultarMenues();
		$(mn).style.display="";
	}
}
