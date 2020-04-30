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
	<meta charset="utf-8">
	<meta http-equiv="Expires" content="0">
	<meta http-equiv="Last-Modified" content="0">
	<meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
	<meta http-equiv="Pragma" content="no-cache">
	<title>Valoracion Jugadores</title>
</head>

<body>

	<?php
	$votacionSA= new VotacionSA();
	$opcionesSA = new OpcionesSA();
	$jugadoresSA = new JugadoresSA();
	$votacion = $votacionSA->getVotacion($codLiga);
	$i=0;
	while($res=mysqli_fetch_array($votacion)){
		echo '<form id="valoraJugadores" action="procesarValoracion.php?i='.$i.'" method="post">';
		echo '<fieldset>';
		echo "<legend>".$res[2]."</legend>";
		$opciones=$opcionesSA->getOpciones($res[0]);
		while($res2=mysqli_fetch_array($opciones)){
			$jugador=$jugadoresSA->getApodo($res2[2]);
			echo '<input type=radio name=vot'.$i.' value='.$res2[0].' />'.$jugador->Apodo.'  -  '.$res2[3].' votos <br>';
		}
		$i++;
		if(!isset($_SESSION["login"]) || $_SESSION["login"] == false){
			echo '<input type="submit" name="aceptar" disabled><br>';
		}
		else{
			echo '<input type="submit" name="aceptar"><br>';
		}
		
	}
	?>
		
		</fieldset>
		</form>
		<?php
		if(!isset($_SESSION["login"]) || $_SESSION["login"] == false){
			echo 'Para participar en la valoracion, ¡Regístrate! <button onclick="location.href="registro.php"></button>';
		}
		?>
	
<!-- Fin del contenedor -->

</body>
</html>