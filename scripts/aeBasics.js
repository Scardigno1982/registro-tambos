// JavaScript Document
// aeBasicos.js

function $(id){
	return document.getElementById(id);
}
function ocultable(e){
	var evento = "click";
	if(document.all) {
		$(e).attachEvent("on" + evento, ocultarMenues);
	} else {
		$(e).addEventListener(evento, ocultarMenues, false);
	}
}


//FUNCIONES BASICAS DE SEEM

function soloNumeros(e) {
	tecla = (document.all)?e.keyCode:e.which;
	if (tecla==8) return true;
	if (tecla==9) return true;
	if (tecla==13) return true;
	patron = /[0-9-]/;
	te = String.fromCharCode(tecla);
	return patron.test(te); 
}
function soloImportes(e) {
  tecla = (document.all)?e.keyCode:e.which;
  if (tecla==8) return true;
	if (tecla==9) return true;
	if (tecla==13) return true;
  patron = /[0-9,.-]/;
  te = String.fromCharCode(tecla);
  return patron.test(te); 
}
function soloCuit(e) {
	tecla = (document.all)?e.keyCode:e.which;
	if (tecla==8) return true;
	if (tecla==9) return true;
	if (tecla==13) return true;
	patron = /[0-9-]/;
	te = String.fromCharCode(tecla);
	return patron.test(te); 
}
function soloDominio(e) {
	tecla = (document.all)?e.keyCode:e.which;
	if (tecla==8) return true;
	patron = /[0-9a-z-_]/;
	te = String.fromCharCode(tecla);
	return patron.test(te); 
}
function soloFechas(e) {
	tecla = (document.all)?e.keyCode:e.which;
	if (tecla==8) return true;
	if (tecla==9) return true;
	if (tecla==13) return true;
	patron = /[0-9/]/;
	te = String.fromCharCode(tecla);
	return patron.test(te); 
}
function corregir(cmp){
	//var pos = posicionCursor(cmp);
	var vlr = cmp.value;
	if (vlr == "") return false;
	vlr = vlr.replace(",",".");
	vlr = parseFloat(vlr);
	if (isNaN(vlr)) vlr = 0;
	vlr = String(vlr.toFixed(2));
	vlr = vlr.replace(".",",");
	if (cmp.value!=vlr) cmp.value = vlr;
	//if (vlr.length<pos) pos=vlr.length;
	//colocarCursor(cmp,pos);
}
function posicionCursor(cmp) {
 var iCaretPos = 0;
 if (document.selection) { // IE
	 cmp.focus ();
	 var oSel = document.selection.createRange ();
	 oSel.moveStart ('character', -cmp.value.length);
	 iCaretPos = oSel.text.length;
 } else if (cmp.selectionStart || cmp.selectionStart == '0') // Firefox
	 iCaretPos = cmp.selectionStart;
 return (iCaretPos);
}
function colocarCursor(cmp,pos){
	if (document.selection) { // IE
		cmp.focus ();
		var oSel = document.selection.createRange ();
		oSel.moveStart ('character', -cmp.value.length);
		oSel.moveStart ('character', pos);
		oSel.moveEnd ('character', 0);
		oSel.select ();
	} else if (cmp.selectionStart || cmp.selectionStart == '0') { // Firefox
		cmp.selectionStart = pos;
		cmp.selectionEnd = pos;
		cmp.focus ();
	}
}
function esEmail(email){
	var b=/\w{1,}[@][\w\-]{1,}([.]([\w\-]{1,})){1,3}$/;
	return b.test(email);
}
function esFecha(fecha){
	if (fecha==''){
		return false;
	} else {
		cmps = fecha.split("/");
		if (cmps[2].lenght==2){
			if (cmps[2]<40){ 
				cmps[2] = "20"+cmps[2];
			} else {
				cmps[2] = "19"+cmps[2];
			}
		}
		fecha = cmps[0]+"/"+cmps[1]+"/"+cmps[2];
		var b=/^\d{2}\/\d{2}\/\d{4}$/;
		return b.test(fecha);	
	}
}
function esFechaG(fecha){
	var b=/^\d{2}\/\d{2}\/\d{4}$/;
	return b.test(fecha);
}
function esFechax(value) {
  try {
    //Change the below values to determine which format of date you wish to check. 
		//It is set to dd/mm/yyyy by default.
    var DayIndex = 0; var MonthIndex = 1; var YearIndex = 2;
 
    value = value.replace(/-/g, "/").replace(/\./g, "/"); 
    var SplitValue = value.split("/");
    var OK = true;
    if (!(SplitValue[DayIndex].length == 1 || SplitValue[DayIndex].length == 2)) {
      OK = false;
    }
    if (OK && !(SplitValue[MonthIndex].length == 1 || SplitValue[MonthIndex].length == 2)) {
      OK = false;
    }
		if (OK && SplitValue[YearIndex].length != 4) {
			OK = false;
		}
		if (OK) {
			var Day = parseInt(SplitValue[DayIndex], 10);
			var Month = parseInt(SplitValue[MonthIndex], 10);
			var Year = parseInt(SplitValue[YearIndex], 10);

			if (OK = ((Year > 1900) && (Year < new Date().getFullYear()))) {
				if (OK = (Month <= 12 && Month > 0)) {
					var LeapYear = (((Year % 4) == 0) && ((Year % 100) != 0) || ((Year % 400) == 0));

					if (Month == 2) {
						OK = LeapYear ? Day <= 29 : Day <= 28;
					}	else {
						if ((Month == 4) || (Month == 6) || (Month == 9) || (Month == 11)) {
							OK = (Day > 0 && Day <= 30);
						}	else {
							OK = (Day > 0 && Day <= 31);
						}
					}
				}
			}
		}
		return OK;
  }
	catch (e) {
		return false;
	}
}

function lPad(cdn, crt, lrg) {
    cdn = cdn.toString();
    while(cdn.length < lrg)
        cdn = crt+cdn;
    return cdn;
}


