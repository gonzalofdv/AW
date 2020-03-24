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
	<br>
	<form action="procesarNuevaPregRes.php" method="post">
	<fieldset>
		<legend>Nueva Pregunta</legend>
			Pregunta:<br> <input type="text" name="preg"><br>
			Selecciona la liga a la que pertenece:<br>
			<select name="liga">
				<option value="0">Ligas:</option>

				<!-- ESTA PARTE ESTÁ MAL, NO SE PUEDE CONECTAR CON LA BASE DE DATOS AQUI NI REALIZAR CONSULTAS PERO LO HE PUESTO PARA IR PROBANDOLO, LO CORRECTO SERÍA CREAR UN ligasSA Y LLAMAR A UN METODO QUE CON EL DAO HAGA LA CONSULTA QUE SE REFLEJA AQUI Y LA DEVUELVA Y TAL -->
				<?php
					$db=@mysqli_connect('localhost', 'userLocal', 'Ua8smYv6GzqsNnsy', 'varderindecorner');
					$q = mysqli_query($db, "SELECT * FROM ligas");
					while($valores = mysqli_fetch_array($q)){
						echo '<option value="' . $valores[0] . '"> ' . $valores[1] . '</option>';
					}
				?>
			</select>
			<br>

			Respuesta correcta:<br> <input type="text" name="v"><br>
			Respuesta falsa 1:<br> <input type="text" name="f1"><br>
			Respuesta falsa 2: <br> <input type="text" name="f2"><br>
			
			<input type="checkbox" name="condi" value="ok">Confirmar enviar pregunta.<br>
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
