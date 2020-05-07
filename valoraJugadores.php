<?php
session_start();
require_once('include/sa/VotacionSA.php');
require_once('include/sa/OpcionesSA.php');
require_once('include/sa/JugadoresSA.php');
$codLiga = $_POST['codLiga'];
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="estilo.css" />
	<link rel="stylesheet" type="text/css" href="valoracionesYquiz.css" />
	<meta charset="utf-8">
	<meta http-equiv="Expires" content="0">
	<meta http-equiv="Last-Modified" content="0">
	<meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
	<meta http-equiv="Pragma" content="no-cache">
	<title>Valoracion Jugadores</title>
</head>

<body>
	<h1>¡Vota y participa!</h1>
	<h2>Cada vez que inicies sesión tendrás 6 votos a repartir entre todas las ligas disponibles</h2>
	<?php 
		if(isset($_SESSION["login"]) && $_SESSION["login"] == true){
			echo '<h3>Votos restantes: ';
			$votos = 6 - $_SESSION['votos'];
			echo $votos;
			echo '</h3>';
		}	
		$votacionSA= new VotacionSA();
		$opcionesSA = new OpcionesSA();
		$jugadoresSA = new JugadoresSA();
		$votacion = $votacionSA->getVotacion($codLiga);
		$i=0;
		$j=0;

		echo '<div class="divValoracion">';
			while($res=mysqli_fetch_array($votacion)){
				echo '<form action="procesarValoracion.php?i='.$i.'" method="post">';
					echo '<fieldset class="fieldValoracion">';
						echo "<legend class='legValoracion'>".$res[2]."</legend>";
						echo '<div class="opcionesVal">';
							$opciones=$opcionesSA->getOpciones($res[0]);
							echo '<ul>';
							while($res2=mysqli_fetch_array($opciones)){
								$jugador=$jugadoresSA->getApodo($res2[2]);
								echo '<li>';
								echo '<input type=radio id=vot'.$j.' name=vot'.$i.' value='.$res2[0].' >';
								echo '<label class="labelVal" for=vot'.$j.'>' .$jugador->Apodo.'  -  '.$res2[3].' votos <br>';
								echo '</li>';
								$j++;
							}
							echo '</ul>';
							$i++;
							if(!isset($_SESSION["login"]) || $_SESSION["login"] == false){
								echo '<input type="submit" class="botonEnviar" name="aceptar" disabled><br>';
							}
							else{
								echo '<input type="submit" class="botonEnviar" name="aceptar"><br>';
							}
						echo '</div>';
					echo '</fieldset>';
				echo '</form>';
				
			}
		echo '</div>';
	?>
		
		
		
		<?php
		if(!isset($_SESSION["login"]) || $_SESSION["login"] == false){
			echo 'Para participar en la valoracion, ';
			echo  '<button class="botGen" onclick=location.href="registro.php">¡Registrate!</button>';
			echo ' o ';
			echo '<button class="botGen" onclick=location.href="login.php">Inicia sesión</button>';
		}
		?>
	
<!-- Fin del contenedor -->

</body>
</html>