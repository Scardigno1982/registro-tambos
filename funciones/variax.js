// JavaScript Document



// Grab as much info as possible 
// outside the scroll handler for performace reasons.
function stickyScroll(e) {
  if( window.pageYOffset > (300) ) {
    document.getElementById("mnuprncpl").className = "mnu-nivel0";
  } else {
    document.getElementById("mnuprncpl").className = "mnu-nivel1";
  }
}
// Scroll handler to toggle classes.
window.addEventListener('scroll', stickyScroll, false);
function encDespliegue(){
	if (document.getElementById('enc-flch-btn').innerHTML.indexOf('ico-up.png')!==-1){
		document.getElementById('enc-flch-btn').innerHTML='<img src="images/icos/ico-dw.png" width="20" />';
		document.getElementById('enc-contt').style.display = "none";
		document.getElementById('hdr').style.height = "120px";
	} else {
		document.getElementById('enc-flch-btn').innerHTML='<img src="images/icos/ico-up.png" width="20" />';
		document.getElementById('enc-contt').style.display = "";
		document.getElementById('hdr').style.height = "500px";
	}
}

