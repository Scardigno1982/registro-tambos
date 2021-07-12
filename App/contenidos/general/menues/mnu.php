        
        <div class="boton">
        	<a href="javascript: vmConfig();"><img src="imagenes/iconos/config.png" height="45" /><br />Configuración</a>
        </div>
        <div class="boton">
        	<a href="javascript: vmExport();"><img src="imagenes/iconos/excel.png" height="45" /><br />Exportar</a>
        </div>
<!--
        <div class="boton">
        	<a href="?lnk=TMB"><img src="imagenes/iconos/listado.png" height="45" /><br />Listado</a>
        </div>
        <div class="boton">
        	<a href="?lnk=RGT"><img src="imagenes/iconos/registro.png" height="45" /><br />Registro</a>
        </div>
-->
        <div class="boton">
        	<a href="?lnk=SOL"><img src="imagenes/iconos/listado.png" height="45" /><br />Solicitudes</a>
        </div>
        <div class="boton">
        	<a href="?lnk=BAJ"><img src="imagenes/iconos/listado.png" height="45" /><br />Sol. Bajas</a>
        </div>

      </div>
    </div>

      <div id="mfConfig" class="menuflotan" style="visibility: hidden;">
        <div class="mfboton">
          <a href="?lnk=LCL">Localidades</a>
        </div>
        <div class="mfboton">
          <a href="?lnk=CPW">Contraseña</a>
        </div>
      </div>        

      <div id="mfExport" class="menuflotan" style="visibility: hidden;">
				<?PHP 
					$sql = "SELECT ID_RPRT, MENU FROM ZYZ_REPORTES WHERE ESTADO = 'A'";
					$rs = ejecutar($sql);
					while ($rw = mysqli_fetch_row($rs)){
				?>
        <div class="mfboton">
          <a href="exporta.php?lnk=XLS&rpt=<?PHP echo $rw[0]; ?>"><?PHP echo $rw[1]; ?></a>
        </div>
        <?PHP } ?>
      </div>        
