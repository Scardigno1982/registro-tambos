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
        <h4>Acceso al Sistema</h4>
        <div class="form-group"> 
          <label for="user">Usuario</label>
          <input type="text" name="user" id="user" class="form-control"
                 placeholder="Nombre de usuario" />
        </div>
        <div class="form-group"> 
          <label for="pass">Contraseña</label>
          <input type="password" name="pass" id="pass" class="form-control"  
                 placeholder="Contraseña">
        </div>
        <button type="submit" class="btn btn-default">Enviar</button>
      </form>
    </div>
  </div>
</body>
</html>