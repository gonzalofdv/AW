<?php session_start();

require_once ('include/FormularioBorrarComentario.php');

$idNoticia = $_GET['idN'];
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="estilo.css" />
	<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
	<meta charset="utf-8">
	<meta http-equiv="Expires" content="0">
	<meta http-equiv="Last-Modified" content="0">
	<meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
	<meta http-equiv="Pragma" content="no-cache">
    <title>Borrar comentario</title>
</head>

<body>

	<?php
		require("include/comun/cabecera.php");
	?>

	<div class="contenido">

		<h1>Acceso al sistema</h1>

		<?php
			$form = new FormularioBorrarComentario($idNoticia);
			$form->gestiona();
		?>
		
	</div>

	<?php
		require("include/comun/sidebarDer.php");
		require("include/comun/pie.php");
	?>
<!-- Fin del contenedor -->

</body>
</html>