<script>
	function grdPswrd(){
		$('btn').disabled = true;
		var   vrs =  "pwd="+$('pwd').value;
		vrs = vrs + "&new="+$('new').value;
		vrs = vrs + "&rpt="+$('rpt').value;
		loadContent("process.php?axn=HCSEFHUKSU",vrs,"rspPswrd(rsp);");
	}
	function rspPswrd(r){
		alert (r);
		if (r!='La contraseña se actualizó correctamente'){
			$('btn').disabled = true;
		} else {
			document.location = "?lnk=CPF";
		}
	}
</script>
<h2>Cambiar Contraseña</h2>

<div style="width: 350px; margin:auto;">
  <div style="text-align:right; padding: 4px;">
    <label for="pwd">Actual:</label>
    <input type="password" id="pwd" class="M-Nombre" maxlength="15" style="width:200px;" /><br />
    <label for="new">Nueva:</label>
    <input type="password" id="new" class="M-Nombre" maxlength="15" style="width:200px;" /><br />
    <label for="rpt">Confirmación:</label>
    <input type="password" id="rpt" class="M-Nombre" maxlength="15" style="width:200px;" /><br />
  </div>
  <input type="button" id="btn" class="M-Boton" value="Guardar" onclick="grdPswrd();" />
</div>