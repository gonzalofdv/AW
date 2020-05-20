<div id="cabecera">
	<input type="image" onclick="location.href='index.php'" src="./img/ElVARderinDeCornerr.jpg" class="imagenPrincipal">
	<div id="ligas">
		<div id="ligasSeparadas">
			<input type="image" onclick="location.href='eleccionLigas.php?codLiga=1'" value="Liga Santander" src="img/ligas/LaLigaSantander3.png" class="botonLiga" />
			<input type="image" onclick="location.href='eleccionLigas.php?codLiga=2'" value="Liga Smartbank" src="img/ligas/LaLigaSmartbank3.png" class="botonLiga" />
			<input type="image" onclick="location.href='eleccionLigas.php?codLiga=3'" value="Premier League" src="img/ligas/PremierLeague3.png" class="botonLiga" />
			<input type="image" onclick="location.href='eleccionLigas.php?codLiga=4'" value="Bundesliga" src="img/ligas/Bundesliga3.png" class="botonLiga" />
			<input type="image" onclick="location.href='eleccionLigas.php?codLiga=5'" value="Ligue 1" src="img/ligas/Ligue13.png" class="botonLiga" />
			<input type="image" onclick="location.href='eleccionLigas.php?codLiga=6'" value="Serie A" src="img/ligas/SerieA3.png" class="botonLiga" />
		</div>
		<div id="menu">
			<button onclick="location.href='index.php'" class="botonMenu"><span>Inicio</span></button>
			<button onclick="location.href='mostrarInicioQuiz.php'" class="botonMenu"><span>Quiz</span></button>
			<button onclick="location.href='somosFamilia.php'" class="botonMenu"><span>Somos Familia</span></button>
		</div>

	</div>
	
	<div id="registroYlogin">
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
				echo "<a class=boton_registro href='registro.php'>¡Registrate! </a><br><a class=boton_accede href=login.php>Accede</a>";
			}
		?>
	</div>
		
</div>