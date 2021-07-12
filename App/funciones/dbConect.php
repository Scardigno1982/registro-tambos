<?PHP 
//CONEXION A LA BASE DE DATOS//////////////////////////////////////////////////////////////
function ejecutar($sql){
	$cx = mysqli_connect('localhost', 'c0550189_tambos', 'tu14vifeZU', 'c0550189_tambos');
	$rs = mysqli_query($cx, $sql);
	if (substr($sql,0,6)=="SELECT"){ return $rs; } else { return $cx; }
}
///////////////////////////////////////////////////////////////////////////////////////////
?>