	<div id="sidebar-right">
	
		<div id="perfil">
			<?php
				if (isset($_SESSION["login"]) && ($_SESSION["login"]==true)) {
					echo "<h2><a href='mostrarPerfil.php'>Mi perfil</a></h2>";
				}
			?>
		</div>
		
		<div id="anuncios">
			<img src="./img/insparya.jpg" alt="clinica capilar cr7" width="350">
			<img src="./img/anuncio2.jpg" alt="anuncio alcohol" width="350">
			<!--<img src="./img/oreo.jpg" alt="galletas oreo" width="350">-->
			
		</div>
		
	</div>