<?php session_start(); 
require_once('include/sa/ComentarioSA.php');
require_once('include/sa/UsuarioSA.php');


$idNoticia = $_GET['idN'];
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/estilo.css" />
	<meta charset="utf-8">
	<meta http-equiv="Expires" content="0">
	<meta http-equiv="Last-Modified" content="0">
	<meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
	<meta http-equiv="Pragma" content="no-cache">
	<title>Borrar Comentario</title>
</head>
<body>
	<?php
		require("include/comun/cabecera.php");
	?>
	<div id="contenido">
	<br>
		<?php echo '<form action="procesarBorrarComentario.php" method="post">'; ?>
			<fieldset>
						<legend>¿Qué comentario quieres borrar?</legend>
						<?php
							 $comentarioSA=new ComentarioSA();
							 $usuarioSA=new UsuarioSA();
		   					 $comentarios=$comentarioSA->devuelveComentarios($idNoticia);
		   					 $i=0;
							while($res=mysqli_fetch_array($comentarios)){
								$usu=$usuarioSA->obtenerNombreUsu($res[2]);
								$usuario= $usu->NombreUsuario;
								echo '<input type=radio name=comentario value='.$res[0].' />'.$usuario.' - '.$res[3].'<br>';
								echo "<br>";
							}
						?>
							
							<input type="submit" name="aceptar">	
			</fieldset>
		</form>


	</div>
	<?php
		require("include/comun/sidebarDer.php");
		require("include/comun/pie.php");
	?>
</body>
</html>