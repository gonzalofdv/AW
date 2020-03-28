<?php session_start();
$idNoticia = $_GET['idN'];
?>


<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="estilo.css" />
	<meta charset="utf-8">
	<meta http-equiv="Expires" content="0">
	<meta http-equiv="Last-Modified" content="0">
	<meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
	<meta http-equiv="Pragma" content="no-cache">
	<title>Registro comentario</title>
</head>
<body>
	<?php
		require("cabecera.php");
	?>
	<div id="contenido">
	<?php if (isset($_SESSION["login"]) && ($_SESSION["login"]==true)) {?>
	<br>
		<?php echo'<form action="procesarNuevoComentario.php?idN='.$idNoticia.'" method=post>';?>
			<fieldset>
				<legend>Nuevo Comentario</legend>
					<textarea name="cuerpo" rows="5" cols="10">Escribe aquí el comentario</textarea>
					<input type="checkbox" name="condi" value="ok">Confirmar enviar comentario.<br>
					<input type="submit" name="aceptar">	
			</fieldset>
		</form>
	<?php }
		else{
			header('Location: mostrarAlertas.php?codAlerta=7');

	}?>
	</div>
	<?php
		require("sidebarDer.php");
		require("pie.php");
	?>
</body>
</html>