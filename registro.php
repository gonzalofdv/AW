<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Registro</title>
</head>
<body>
	<form action="procesoRegistro.php" method="post">
	<fieldset>
		<legend>Registro Usuario</legend>
			Nombre:<br> <input type="text" name="nom"><br>
			Apellido1:<br> <input type="text" name="apellidos"><br>
			Apellido2:<br> <input type="text" name="apellidos"><br>
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
</body>
</html>
