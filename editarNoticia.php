<?php 
session_start(); 
require_once('include/FormularioEditarNoticia.php');

$idN= $_GET['idN'];

?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="estilo.css" />
	<link rel="stylesheet" type="text/css" href="formularios.css" />
	<meta charset="utf-8">
	<meta http-equiv="Expires" content="0">
	<meta http-equiv="Last-Modified" content="0">
	<meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
	<meta http-equiv="Pragma" content="no-cache">
	<title>Editar noticia</title>
</head>
<body>
	<?php
		require("include/comun/cabecera.php");
	?>
	<div class="contenido">
	<?php
		$form = new FormularioEditarNoticia($idN);
		$form->gestiona();
	?>
	</div>
	<?php
		require("include/comun/sidebarDer.php");
		require("include/comun/pie.php");
	?>
</body>
</html>