<div id="cabecera">
	<div id="start">
			<?php
				if (isset($_SESSION["login"]) && ($_SESSION["login"]==true)) {
					echo '<div id="infoStart">';
						echo "¡Hola {$_SESSION['nombre']}! ";
						if($_SESSION['esAdmin']){
							echo "Eres administrador";
						}
						else if($_SESSION['esFamilia']){
							echo "Eres SomosFamilia";
						}
						else{
							echo "Eres usuario normal";
						}
					echo "</div>";
					echo "<div id=logout>";
						echo "<a href='logout.php'>Cerrar sesión</a><br>";
					echo "</div>";
				}
				else {
					echo "<a class=boton_registro href='registro.php'>¡Registrate! </a>" . "<a class=boton_accede href=login.php>Accede</a>";
				}
			?>
	</div>
	<div id="elVarderin">
		<input type="image" onclick="location.href='index.php'" src="./img/ElVARderinDeCornerr.jpg" class="imagenPrincipal">
		<!--<img src="./img/ElVARderinDeCorner.jpg" position = center>-->
	</div>
	<div id="menu">
			<button onclick="location.href='index.php'" class="botonMenu"><span>Inicio</span></button>
			<button onclick="location.href='mostrarInicioQuiz.php'" class="botonMenu"><span>Quiz</span></button>
			<button onclick="location.href='somosFamilia.php'" class="botonMenu"><span>Somos Familia</span></button>
	</div>

	<div id="ligas">
			<input type="image" onclick="location.href='eleccionLigas.php?codLiga=1'" value="Liga Santander" src="img/ligas/LaLigaSantander2.png" class="botonLiga" />
			<input type="image" onclick="location.href='eleccionLigas.php?codLiga=2'" value="Liga Smartbank" src="img/ligas/LaLigaSmartbank2.png" class="botonLiga" />
			<input type="image" onclick="location.href='eleccionLigas.php?codLiga=3'" value="Premier League" src="img/ligas/PremierLeague2.png" class="botonLiga" />
			<input type="image" onclick="location.href='eleccionLigas.php?codLiga=4'" value="Bundesliga" src="img/ligas/Bundesliga2.png" class="botonLiga" />
			<input type="image" onclick="location.href='eleccionLigas.php?codLiga=5'" value="Ligue 1" src="img/ligas/Ligue12.png" class="botonLiga" />
			<input type="image" onclick="location.href='eleccionLigas.php?codLiga=6'" value="Serie A" src="img/ligas/SerieA2.png" class="botonLiga" />
	</div>
</div>