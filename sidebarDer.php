	<div id="sidebar-right">
		<?php
			if (isset($_SESSION["login"]) && ($_SESSION["login"]==true)) {
				echo "<h2><a href='mostrarPerfil.php'>Mi perfil</a></h2>";
			}
		?>
	</div>