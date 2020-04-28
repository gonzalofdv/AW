<?php
session_start();
require_once('include/sa/VotacionSA.php');
$codLiga = $_POST['codLiga'];
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="estilo.css" />
	<meta charset="utf-8">
	<meta http-equiv="Expires" content="0">
	<meta http-equiv="Last-Modified" content="0">
	<meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
	<meta http-equiv="Pragma" content="no-cache">
	<title>Valoracion Jugadores</title>
</head>

<body>

	

	<div id="contenido">
		<form id="formularioQuiz" action="procesarQuiz.php" method="post">
				<fieldset>
					<?php
					$votacionSA= new VotacionSA();
					$votacion = $votacionSA->getNombre($codLiga);
					
					echo "<legend>".$votacion->Titulo."</legend>";
					$opcionesSA =new OpcionesVotacionSA();
					while($)

					?>
					<input type="submit" name="aceptar">	
				</fieldset>
		</form>
		
			
			
	</div>

	
<!-- Fin del contenedor -->

</body>
</html>