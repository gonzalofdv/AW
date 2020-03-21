<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="estilo.css" />
	<meta charset="utf-8">
	<meta http-equiv="Expires" content="0">
	<meta http-equiv="Last-Modified" content="0">
	<meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
	<meta http-equiv="Pragma" content="no-cache">
	<title>Registro</title>
</head>
<body>
	<?php
		require("cabecera.php");
	?>
	<div id="contenido">
	<form action="procesoRegistro.php" method="post">
	<fieldset>
		<legend>Registro Usuario</legend>
			Nombre:<br> <input type="text" name="nom"><br>
			Apellido1:<br> <input type="text" name="apellido1"><br>
			Apellido2:<br> <input type="text" name="apellido2"><br>
			Sexo:<br/>
			<input type="radio" name="sexo" value="hombre" checked/> Hombre
			<input type="radio" name="sexo" value="mujer" /> Mujer<br>
			Equipo favorito: <br> <input type="text" name="equipo"><br>
			Nombre de usuario:<br> <input type="text" name="usu"><br>	
			Contraseña:<br/>
			<input type="password" name="contrasena" value="" /><br>
			Repetir contraseña:<br>
			<input type="password" name="rContrasena" value="" /><br>
			E-mail:<br> <input type="text" name="mail"><br>
			<input type="checkbox" name="condi" value="ok">Acepto las condiciones del servicio<br>
			<input type="submit" name="aceptar">	
	</fieldset>
	</form>
	</div>
	<?php
		require("sidebarDer.php");
		require("pie.php");
	?>
</body>
</html>
