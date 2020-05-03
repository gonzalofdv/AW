<div id="sidebar-right">

	<div id="perfil">
		<?php
			if (isset($_SESSION["login"]) && ($_SESSION["login"]==true)) {
		?>
			<button class="perfil rounded" onclick="location.href='mostrarPerfil.php'"><span class="text-green">Mi perfil</button>
		<?php
			}
		?>
	</div>

	<div id="ranking">

		<?php

			require_once './include/sa/UsuarioSA.php';


			$usuarioSA = new UsuarioSA();
			$lista = $usuarioSA->devuelveRanking();

		?>

		<table class="tablas" border="2">
			<caption><b>⭐TOP 10 USUARIOS⭐</b></caption>
			<tr>
				<td><b>Puesto</b></td>	
				<td><b>Usuario</b></td>
				<td><b>Puntos</b></td>
			</tr>

		<?php
			$i = 1;
			while($mostrar=mysqli_fetch_object($lista)){
				echo "<tr>";
					echo "<td>".$i."º</td>";
					echo "<td>".$mostrar->NombreUsuario."</td>";
					echo "<td>".$mostrar->Puntos."</td>";
				echo "</tr>";

				$i++;
			}

		?>		
		</table>
		<br>

	</div>
	
	<div id="anuncios">
		<img class="imagenes" src="./img/insparya.jpg" alt="clinica capilar cr7">
		<img class="imagenes" src="./img/kaliseParaTodos.png" alt="kalise para todos">			
	</div>
	
</div>