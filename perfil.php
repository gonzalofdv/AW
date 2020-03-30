<?php session_start(); ?>

<html>
<head>
	<link rel="stylesheet" type="text/css" href="estilo.css" />
	<meta charset="utf-8">

	<meta http-equiv="Expires" content="0">
  	<meta http-equiv="Last-Modified" content="0">
  	<meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
	<meta http-equiv="Pragma" content="no-cache">
	  
	<title>Perfil</title>
</head>

<body>
<div id="contenedor">
	<?php 
		require ("cabecera.php");
		require ("sidebarIzq.php");
	?>

	<div id="perfil">
	<?php
			
			echo '<h1><img src="C:\xampp\htdocs\imagenperfil.jpg"></h1>';
            echo 'Nombre: '.$_SESSION['nombre'] ."<br />";
            echo '<p>Fecha de nacimiento:  </p>';
            echo '<p>Correo electrónico: </p>';
            echo '<p>Equipo: </p>';
            echo '<p>Sexo: </p>';
	?>
	</div>
	<?php 
		require ("sidebarDer.php");
		require ("pie.php");
	?>
	
	
</div> <!-- Fin del contenedor -->

</body>
</html>