<!DOCTYPE html>
<html>
<head>
	<!--<link rel="stylesheet" type="text/css" href="estilo.css" />-->
	<meta charset="utf-8">
	<meta http-equiv="Expires" content="0">
	<meta http-equiv="Last-Modified" content="0">
	<meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
	<meta http-equiv="Pragma" content="no-cache">
	<title>Alert</title>
</head>

<body>
	<?php

		$id = isset($_GET['id']) ? $_GET['id'] : null;

		if($id == "puntos"){
	?>
		
		<h3>Sistema de puntos:</h3>
			<table>
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
					<table>
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

		<h3>Ventajas</h3>
		<p>
			Convertirte en un usuario Somos Familia te permitirá acceder a numerosas ventajas en El VARderín de córner, con las que disfrutarás mucho más la
			experiencia de navegar por todo nuestro contenido y empaparte de conocimientos futbolísticos de toda Europa.
			
			<ul style="list-style-type:circle;">
				<li>
					En primer lugar, podrás añadir nuevas noticias a nuestra sección de noticias de la página principal. De esta manera, queremos que nuestros usuarios
					participen a la hora de informar a todo el mundo que visite nuestra web con noticias totalmente nuevas, de su propia cosecha y que añadan
					contenido nuevo acerca de la actualidad futbolísitica que nos abarca en el día a día.
				</li>
				<li>
					Además, un usuario familia podrá añadir preguntas con sus respectivas respuestas a nuestra sección estrella y con más éxito: el Quiz. Así, contaremos
					con el ingenio y la experiencia futbolera de nuestros usuarios Somos Familia para extender nuestro gran repertorio de preguntas de las 6 principales
					ligas de Europa y que pongan su propio granito de arena para ayudar a los demás usuarios a conseguir puntos y alcanzar la meta de obtener el usuario
					Somos Familia.
				</li>
				<li>
					También contarán con otras ventajas que añadiremos próximamente sugerir nuevas propuestas que amplíen
					nuestro contenido de ligas, o participar en la creación de un nuevo juego que se pondrá en marcha en unas semanas.
				</li><!-- En proceso, proximamente en la entrega 3 -->
				<li>
					Por último, si un usuario Somos Familia continúa obteniendo puntos hasta llegar a los 1000 puntos, será considerado como un usuario VIP de El VARderín
					de córner y tendrá la oportunidad de conocer a los administradores en persona y una visita guiada de las instalaciones de nuestra web.
				</li>
			</ul>
		</p>
		
	<?php
		}
		else{
			echo "no funsiona";
		}
	?>

</body>
</html>