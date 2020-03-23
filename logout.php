<?php 
	session_start();
	unset($_SESSION); 
	session_destroy(); 
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
	<title>Logout</title>
</head>

<body>

<div id="contenedor">

	<?php 
		require("cabecera.php"); 
	?>

	<div id="contenido">

		<p>Usuario correcto</p><br> 
		<p>Redireccionando en 3 segundos..</p>
		<?php
		header("refresh:3; url=index.php");
		<?


	</div>

	<?php 
		include("sidebarDer.php"); 
		include("pie.php"); 
	?>

</div> 

</body>
</html>