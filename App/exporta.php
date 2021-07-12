<?php
	session_start();
	if (!isset($_SESSION["usr_idUser"]) or $_SESSION["usr_idUser"]==''){
	echo "ERROR: Recurso Incorrecto.";
	}
	include "funciones/dbConect.php";

	$rpt = $_GET["rpt"];
	
	$sql = "SELECT TITULO, CONSULTA FROM ZYZ_REPORTES WHERE ID_RPRT = $rpt";
	$rs = ejecutar($sql); $rw = mysqli_fetch_row($rs);

	$ttl = $rw[0];
	$nfl = $rw[0].' ['.date('d-m-Y H:i').']';
	$sql = $rw[1];

	$rs = ejecutar($sql);
	
	if(mysqli_num_rows($rs) > 0 ){
		
		$tcl = mysqli_fetch_fields($rs);
		$ncl = count($tcl);

		$xcl = '<table><tr><th colspan="'.$ncl.'">'.$ttl.'</th></tr>';

		// Se agregan titulos de columna
		$xcl.= '<tr>';
		foreach ($tcl as $col) {
			$xcl.= '<th align=';
			if ($col->type==253){ $xcl.= '"left">'; } else { $xcl.= '"right">'; }
			$xcl.= $col->name.'</th>'; 
		}
		$xcl.= '</tr>';


		//Se agregan los datos de los alumnos
		while ($rw = mysqli_fetch_row($rs)) {
			$xcl.= '<tr>';
			for ($i=0;$i<=$ncl-1;$i++){	$xcl.= '<td align="left">'.$rw[$i].'</td>'; }
			$xcl.= '</tr>';
		}
		$xcl.= '</table>';
		
		/*
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="'.$ttl.'.xlsx"');
		header('Cache-Control: max-age=0');
		*/

		header('Content-Type: application/vnd.ms-excel');
		header('Expires: 0');
		header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
		header('content-disposition: attachment;filename='.$nfl.'.xls');

		print_r($xcl);
		
	}	else{
		print_r('No hay resultados para mostrar');
	}
?>
