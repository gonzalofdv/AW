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
	
		<input type="image" id="noticias" value="Noticias" src="img/iconos/news.png"/>
		<input type="image" id="clasificacion" value="Clasificacion" src="img/iconos/clasificacion2.png"/>
		<input type="image" id="quiz" value="Quiz" src="img/iconos/quizIcon.png"/>
		<input type="image" id="valora" value="Valorar jugadores" src="img/iconos/votarJug.png"/>
		
		<div id="content">
			
		</div>
	
	</div>
	
	<?php
		require("include/comun/sidebarDer.php");
		require("include/comun/pie.php");
	?>
	
	
</body>
</html>