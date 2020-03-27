<?php session_start(); 
require('LigaSA.php')?>

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
		<?php
			if(!isset($_SESSION["login"]) || $_SESSION["login"] == false) {
				echo "<h1>Acceso denegado!</h1>";
				echo "<p>Para entrar a esta página es necesario que hayas iniciado sesión, si no tienes cuenta, ¡regístrate!.</p>";
				echo "<p>Te redireccionamos a la página de inicio.</p>";
				header("refresh:5; url=index.php");
			}
			else {
				if($_SESSION["esAdmin"] == false && $_SESSION["esFamilia"] == false){
					echo "<h1>Permisos insuficientes</h1>";
					echo "<p>Para poder escribir una noticia en nuestra web, necesitas ser un Administrador o tener los privilegios de usuario Somos Familia que podrás conseguir colaborando en nuestra página. Infórmate más en la sección Somos Familia.</p>";
					echo "<p>Te redireccionamos a la página de inicio.</p>";
					header("refresh:5; url=index.php");
				}
				else{
		?>
				<form action="procesarNuevaNoticia.php" method="post">
					<fieldset>
						<legend>Nueva Noticia</legend>
							Titular:<br> <input type="text" name="titular"><br>
							<textarea name="cuerpo" rows="10" cols="40">Escribe aquí el cuerpo de la noticia</textarea>
							<select name="liga">
								<option value="0">Ligas:</option>			
								<?php
									$ligasa=new LigaSA();
		                            $res=$ligasa->devuelveLigaSA();
									while($valores = mysqli_fetch_array($res)){
										echo '<option value="' . $valores[0] . '"> ' . $valores[1] . '</option>';
									}
								?>
							</select>
							<input type="checkbox" name="condi" value="ok">Confirmar enviar noticia.<br>
							<input type="submit" name="aceptar">	
					</fieldset>
				</form>

		<?php

				}
			}

		?>

	</div>
	<?php
		require("sidebarDer.php");
		require("pie.php");
	?>
</body>
</html>