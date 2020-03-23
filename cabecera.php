<div id="cabecera">
		<?php
			if (isset($_SESSION["login"]) && ($_SESSION["login"]===true)) {
				echo "Hola {$_SESSION['nombre']} <a href='logout.php'>(Cerrar sesión)</a>";
			}
			else {
				echo "<a href='registro.php'>Registrate! </a>" . "<a href='login.php'>Login</a>";
			}
		?>
		<a class="boton_personalizado" href="login.php">Accede</a>
</div>
<div id="menu">
		<button type="button" href="index.php">Inicio</button>
		<button type="button">Quiz</button>
		<button type="button" href="clasificacion.php">Clasificación</button>
</div>