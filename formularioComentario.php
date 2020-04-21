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
		require("include/comun/cabecera.php");
	?>
	<div id="contenido">
	<br>
		<?php echo'<form action="procesarNuevoComentario.php?idN='.$idNoticia.'" method=post>';?>
			<fieldset>
				<legend>Nuevo Comentario</legend>
					<textarea name="cuerpo" rows="15" cols="70">Escribe aquí el comentario</textarea>
					<input type="checkbox" name="condi" value="ok">Confirmar enviar comentario.<br>
					<input type="submit" name="aceptar">	
			</fieldset>
		</form>
	</div>
	<?php
		require("include/comun/sidebarDer.php");
		require("include/comun/pie.php");
	?>
</body>
</html>