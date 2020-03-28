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
	<title>Registro noticia</title>
</head>
<body>
	<?php
		require("cabecera.php");
	?>
	<div id="contenido">
	<br>
		<?php
			if(!isset($_SESSION["login"]) || $_SESSION["login"] == false) {
				header('Location: mostrarAlertas.php?codAlerta=1');
			}
			else {
				if($_SESSION["esAdmin"] == false && $_SESSION["esFamilia"] == false){
					header('Location: mostrarAlertas.php?codAlerta=6');
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