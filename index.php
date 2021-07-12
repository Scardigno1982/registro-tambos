<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Registro Provincial de Tambos</title>

  <link rel="stylesheet" type="text/css" href="funciones/bootstrap/css/bootstrap.css">
  <script src="funciones/jquery.min.js"></script>
  <script src="funciones/bootstrap/js/bootstrap.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="styles/logger.css">
</head>

<body>
	<div class="container">
  	<div style="width:1200px; background: #FFF; margin:auto; padding:20px; text-align: left;">
      <img src="imagenes/iconos/marca.jpg" height="100" style="vertical-align: bottom;" />
      <span style="float:right; font: 30px Verdana, Geneva, sans-serif;">
      	Registro Provincial de Tambos</span>
    </div>
    <div>
      <form id="flogin" role="form" method="post" action="validate.php">
        <h4>Acceso</h4>
        <div class="form-group"> 
          <label for="cuit">Identificación <sup title="Nro de Cuit o Nro ReNSPA">(?)</sup></label>
          <input type="text" name="cuit" id="cuit" class="form-control" placeholder="Identificación" />
        </div>
        <div class="form-group"> 
          <label for="code">Captcha</label>
          <div style="width: 500px; float: left; height: 72px">
            <img id="siimage" align="left" style="padding-right: 5px; border: 0; width: 242px; border-radius: 50;" 
            		 src="funciones/captcha/securimage_show.php?sid=<?php echo md5(time()) ?>" 
                 onClick="document.getElementById('siimage').src = 'funciones/captcha/securimage_show.php?sid=' + Math.random(); return false" />
          </div>
          <input type="text" name="code" id="code" class="form-control"  
                 placeholder="Captcha">
        </div>
        <button type="submit" class="btn btn-default">Enviar</button>
      </form>
    </div>
  </div>
</body>
</html>