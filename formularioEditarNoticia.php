<?php session_start(); 
require_once('LigaSA.php');
require_once('NoticiaSA.php');


$idNoticia = $_GET['idN'];

$noticiaSA = new noticiaSA();
$noticia = $noticiaSA->getNoticia($idNoticia);

$titular = $noticia->getTitular();
$cuerpo = $noticia->getTexto();
$codLiga = $noticia->getCodLiga();

$ligasa = new LigaSA();
$nombreLiga = $ligasa->getNombreLiga($codLiga)->Nombre;

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
	<title>Editar noticia</title>
</head>
<body>
	<?php
		require("cabecera.php");
	?>
	<div id="contenido">
	<br>
		<?php echo '<form action="procesarEditarNoticia.php?idN='.$idNoticia.'" method="post">'; ?>
			<fieldset>
						<legend>Nueva Noticia</legend>
							Titular:<br> <input type="text" name="titular" value=<?php echo $titular; ?> ><br>
							<textarea name="cuerpo" rows="10" cols="40"><?php echo $cuerpo; ?></textarea>
							<select name="liga">
								<?php
									echo '<option value="'.$codLiga.'">'.$nombreLiga.'</option>';			
		                            $res=$ligasa->devuelveLigaSA();
									while($valores = mysqli_fetch_array($res)){
										echo '<option value="' . $valores[0] . '"> ' . $valores[1] . '</option>';
									}
								?>
							</select>
							<br>
							<input type="checkbox" name="condi" value="ok">Confirmar cambios de noticia.<br>
							<input type="submit" name="aceptar">	
			</fieldset>
		</form>


	</div>
	<?php
		require("sidebarDer.php");
		require("pie.php");
	?>
</body>
</html>