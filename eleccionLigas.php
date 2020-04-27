<?php session_start();
require('include/sa/NoticiaSA.php');
$codLiga = $_GET['codLiga'];
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
	<title>Liga</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"> </script>
	<script type="text/javascript">
		
		$(document).ready(function() {
			$("#content").load('mostrarNoticiasEleccion.php',{
					<?php
					echo "'codLiga':'".$codLiga."',";
					?>
				});  
			$("#clasificacion").click(function(event) {
				$("#content").load('clasificacionEleccion.php',{
					<?php
					echo "'codLiga':'".$codLiga."',";
					?>
				});  
			});
			$("#noticias").click(function(event) {
				$("#content").load('mostrarNoticiasEleccion.php',{
					<?php
					echo "'codLiga':'".$codLiga."',";
					?>
				});  
			});
			$("#quiz").click(function(event) {
				$("#content").load('quizEleccion.php',{
					<?php
					echo "'codLiga':'".$codLiga."',";
					?>
				});  
			});
			$("#valora").click(function(event) {
				$("#content").load('valoraJugadores.php',{
					<?php
					echo "'codLiga':'".$codLiga."',";
					?>
				});  
			});
		});
		
	</script>
</head>

<body>

	<?php
		require("include/comun/cabecera.php");
	?>
	
	<div id="contenido">
		
		
		
		<input type="button" id="noticias" value="Noticias" />
		<input type="button" id="clasificacion" value="Clasificacion" />
		<input type="button" id="quiz" value="Quiz" />
		<input type="button" id="valora" value="Valorar jugadores" />
		<div id="content">
			
		</div>
		
	
	</div>
	
	<?php
		require("include/comun/sidebarDer.php");
		require("include/comun/pie.php");
	?>
	
	
</body>
</html>