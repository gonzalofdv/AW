<div id="cabecera">
		<?php
			if (isset($_SESSION["login"]) && ($_SESSION["login"]==true)) {
				echo "Hola {$_SESSION['nombre']} <a href='logout.php'>(Cerrar sesión)</a><br>";
				if($_SESSION['esAdmin']){
					echo "Eres administrador";
				}
				else if($_SESSION['esFamilia']){
					echo "Eres SomosFamilia";
				}
				else{
					echo "Eres usuario normal";
				}
				
			}
			else {
				echo "<a href='registro.php'>Registrate! </a>" . "<a class=boton_personalizado href=login.php>Accede</a>";
			}
		?>
		
</div>
<div id="menu">

		<button onclick="location.href='index.php'">Inicio</button>
		<button onclick="location.href='mostrarInicioQuiz.php'">Quiz</button>
		<button onclick="location.href='somosFamilia.php'">Somos Familia</button>
</div>

<div id="ligas">
        <button onclick="location.href='eleccionLigas.php?codLiga=1'">Liga Santander</button>
        <button onclick="location.href='eleccionLigas.php?codLiga=2'">Liga Smartbank</button>
        <button onclick="location.href='eleccionLigas.php?codLiga=3'">Premier League</button>
        <button onclick="location.href='eleccionLigas.php?codLiga=6'">Serie A</button>
        <button onclick="location.href='eleccionLigas.php?codLiga=5'">Ligue 1</button>
        <button onclick="location.href='eleccionLigas.php?codLiga=4'">Bundesliga</button>
</div>