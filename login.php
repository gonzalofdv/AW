<?php session_start();

require_once __DIR__.'/include/FormularioLogin.php';
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
    <title>Login</title>
</head>

<body>

	<?php
		require("cabecera.php");
	?>

	<div id="contenido">

		<h1>Acceso al sistema</h1>

		<?php
			$form = new FormularioLogin();
			$form->gestiona();
		?>
		
	</div>

	<?php
		require("sidebarDer.php");
		require("pie.php");
	?>
<!-- Fin del contenedor -->

</body>
</html>