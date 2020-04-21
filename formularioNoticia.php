<?php session_start(); 
require('include/sa/LigaSA.php')?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/estilo.css" />
	<meta charset="utf-8">
	<meta http-equiv="Expires" content="0">
	<meta http-equiv="Last-Modified" content="0">
	<meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
	<meta http-equiv="Pragma" content="no-cache">
	<title>Registro noticia</title>
</head>
<body>
	<?php
		require("include/comun/cabecera.php");
	?>
	<div id="contenido">
	<br>
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
							<br>
							<input type="file" name="foto" /><br>
							<input type="checkbox" name="condi" value="ok">Confirmar enviar noticia.<br>
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