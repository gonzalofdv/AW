<div id="cabecera">
		<?php
			if (isset($_SESSION["login"]) && ($_SESSION["login"]===true)) {
				echo "Hola {$_SESSION['nombre']} <a href='logout.php'>(Cerrar sesión)</a>";
			}
			else {
				echo "<a href='registro.php'>Registrate! </a>" . "<a class=boton_personalizado href=login.php>Accede</a>";
			}
		?>
		
</div>
<div id="menu">

		<button onclick="location.href='index.php'">Inicio</button>
		<button onclick="location.href='quiz.php'">Quiz</button>
		<button onclick="location.href='clasificacion.php'">Clasificacion</button>
</div>