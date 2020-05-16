<?php session_start(); 
$usuario=$_SESSION['nombre'];
require_once('include/sa/UsuarioSA.php');
require_once('include/sa/LigaSA.php');

?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/estilo.css" />
	<link rel="stylesheet" type="text/css" href="css/cabecera.css" />
	<link rel="stylesheet" type="text/css" href="css/sidebarDer.css" />
	<meta charset="utf-8">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"> </script>
	<title>Perfil</title>
</head>

<body>

	<?php
		require("include/comun/cabecera.php");
	?>

	<div class="contenido">
		<div id="miPerfil">
		<h1>Elección de equipo</h1>
		</div>

<form action="procesarCambioEquipo.php" method="post">

		<select id="lista1" name="liga">';
        <option value="0">Ligas:</option>
        <?php
            $ligasa = new LigaSA();
            $res = $ligasa->devuelveLigaSA();
            while($valores = mysqli_fetch_array($res)){
        		echo '<option value=' . $valores[0] . '> ' . $valores[1] . '</option>';
            }
         ?>
        </select>

        <div id="dependiente"></div>

	<input type="submit" value="Guardar">
</form>

	</div>

	<?php
		require("include/comun/sidebarDer.php");
		require("include/comun/pie.php");
	?>


</body>
</html>
<script type="text/javascript">
	$(document).ready(function(){
		recargarLista();

		$('#lista1').change(function(){
			recargarLista();
		});

	})
</script>
<script type="text/javascript">
	function recargarLista(){
		$.ajax({
			type:"POST",
			url:"selectEquipos.php",
			data:"liga=" + $('#lista1').val(),
			success:function(r){
				$('#dependiente').html(r);
			}
		});
	}
</script>