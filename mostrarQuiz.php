<?php session_start(); 

require_once('include/PreguntaSA.php');
require_once('include/RespuestaSA.php');
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
	<title>Registro Pregunta</title>
</head>
<body>
	<?php
		require("cabecera.php");
	?>
	<div id="contenido">
	<br>

		<?php
			if(!isset($_SESSION["login"]) || $_SESSION["login"] == false) {
				header('Location: mostrarAlertas.php?codAlerta=1');
			}
			else {
		?>

			<form action="procesarQuiz.php" method="post">
			<fieldset>
				<legend>Bienvenido al Quiz!</legend>
				<?php
					$preguntaSA=new PreguntaSA();
					$respuestaSA=new RespuestaSA();
					$num=$preguntaSA->getNumPreguntas();
					$valores=array();
					$i=0;
					while($i<10){
						$rand =rand(1,$num);
						if(!in_array($rand,$valores)){
							array_push($valores,$rand);
							$pregunta=$preguntaSA->getPregunta($rand);
							$respuestas=$respuestaSA->getRespuestas($rand);
							echo "<b>".$pregunta->Pregunta . "</b><br><br>";
							while($res=mysqli_fetch_array($respuestas)){
								echo '<input type=radio name=res'.$i.' value='.$res[3].' />'.$res[2]. '<br>';
								echo "<br>";
							}
							$i++;	
						}
					}
				?>
					<input type="submit" name="aceptar">	
			</fieldset>
			</form>
			<?php

				
			}

			?>

	</div>
	<?php
		require("sidebarDer.php");
		require("pie.php");
	?>
</body>
</html>