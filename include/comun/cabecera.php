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
		<input type="image" onclick="location.href='eleccionLigas.php?codLiga=1'" value="Liga Santander" src="img/ligas/LaLigaSantander.png" />
		<input type="image" onclick="location.href='eleccionLigas.php?codLiga=2'" value="Liga Smartbank" src="img/ligas/LaLigaSmartbank.png" />
		<input type="image" onclick="location.href='eleccionLigas.php?codLiga=3'" value="Premier League" src="img/ligas/PremierLeague.png" />
		<input type="image" onclick="location.href='eleccionLigas.php?codLiga=4'" value="Bundesliga" src="img/ligas/Bundesliga.png" />
		<input type="image" onclick="location.href='eleccionLigas.php?codLiga=5'" value="Ligue 1" src="img/ligas/Ligue1.png" />
		<input type="image" onclick="location.href='eleccionLigas.php?codLiga=6'" value="Serie A" src="img/ligas/SerieA.png" />
</div>