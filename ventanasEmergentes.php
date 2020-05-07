<!DOCTYPE html>
<html>
<head>
	<!--<link rel="stylesheet" type="text/css" href="estilo.css" />-->
	<meta charset="utf-8">
	<meta http-equiv="Expires" content="0">
	<meta http-equiv="Last-Modified" content="0">
	<meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
	<meta http-equiv="Pragma" content="no-cache">
	<link rel="stylesheet" type="text/css" href="emergentes.css" />
	<title>Alert</title>
</head>

<body>
	<?php

		$id = isset($_GET['id']) ? $_GET['id'] : null;

		if($id == "puntos"){
	?>
		
		<h3 class="hTabla">Sistema de puntos:</h3>
			<table class="tabla">
			  <tr>
				<td>- Cada vez que inicies sesión:</td>
				<td>1 Punto</td>
			  </tr>
			  <tr>
				<td>- Al añadir una nueva noticia:</td>
				<td>5 Puntos</td>
			  </tr>
			  <tr>
				<td>- Al comentar una noticia:</td>
				<td>3 Puntos</td>
			  </tr>
			  <tr>
				<td>- Al participar en nuestro Quiz de 10 preguntas:</td>
				<td>
					<table class="tabla">
						<tr>
							<td>- Cada pregunta que aciertes:</td>
							<td>1 Punto</td> 
						</tr>
						<tr>
							<td>- Si aciertas las 10 preguntas:</td>
							<td>10 Puntos extra</td>
						</tr>
					</table>	
				</td>
			  </tr>
			  <tr>
				<td>- Al participar en una valoracion:</td>
				<td>3 Puntos</td>
			  </tr>
			</table>
			
	<?php
		}
		else if($id == "ventajas"){
	?>

		<h3 class="hTabla">Ventajas</h3>
		<p>
			Convertirte en un usuario Somos Familia te permitirá acceder a numerosas ventajas en El VARderín de córner, con las que disfrutarás mucho más la
			experiencia de navegar por todo nuestro contenido y empaparte de conocimientos futbolísticos de toda Europa.
			Contarás con exclusivas ventajas como:
			<table class="tabla">
				<tr>
					<td>- Añadir nuevas noticias a nuestra sección de noticias de la página principal. </td>
				</tr>
				<tr>
					<td>- Añadir preguntas con sus respectivas respuestas a nuestra sección estrella y con más éxito: el Quiz.</td> 
				</tr>
				<tr>
					<td>- Añadir nuevas valoraciones donde podrán participar todos los usuarios (en desarrollo).</td>
				</tr>
				<tr>
					<td>- Siempre contamos con la opinión de nuestros usuarios Somos Familia, ¡próximamente podrás contar con muchas ventajas más!</td> 
				</tr>
			</table>
		</p>
		
	<?php
		}
		else{
			echo "no funsiona";
		}
	?>

</body>
</html>