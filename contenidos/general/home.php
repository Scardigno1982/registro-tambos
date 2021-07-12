<script>
function chgPartidP(){
	if ($('prtr').value=='X') return false;
	var vrs= "prt="+$('prtr').value;
	loadContent("process.php?axn=UNSTUIHIUS",vrs,"lclr");	
}
</script>
<h2>Bienvenido al Registro Provincial de Tambos</h2>

<?PHP 
	if ($_SESSION["usr_tpUser"]=='P'){
?>
<h3>Actualización de Datos del Propietario</h3>
<?PHP
		include 'contenidos/registra/frmPropie.php';
?>
<h3>Tambos del Propietario</h3>
<table width="1000" style="margin:auto;">
	<tr>
  	<th align="right">&nbsp;</th>
  	<th align="left">Reg.Provincial</th>
    <th align="left">ReNSPA</th>
    <th align="left">Tambo</th>
    <th align="left">Localidad</th>
  </tr>
<?PHP
	$sql = "SELECT T.REGPROV, T.NOMBRE, T.RENSPA, T.ID_LCLD, L.LOCALIDAD
					FROM REGPROVIN T	LEFT JOIN LOCALIDADES L ON T.ID_LCLD = L.ID_LCLD 
					WHERE BAJAFEC IS NULL AND ID_PROP = ".$_SESSION['usr_idProp'];
	$rs = ejecutar($sql);
	while ($rw=mysqli_fetch_row($rs)){
?>
	<tr>
  	<td align="right">
    	<img src="imagenes/iconos/lapiz.png" width="20" />
    </td>
  	<td align="left"><?PHP echo $rw[0]; ?></td>
    <td align="left"><?PHP echo $rw[2]; ?></td>
    <td align="left"><?PHP echo $rw[1]; ?></td>
    <td align="left"><?PHP echo $rw[4]; ?></td>
  </tr>
<?PHP } ?>
	<tr>
  	<td align="right">
    	<img src="imagenes/iconos/lapiz.png" width="20" />
    </td>
  	<td colspan="4" align="left">Registrar nuevo tambo</td>
  </tr>
</table>
<?PHP } ?>
