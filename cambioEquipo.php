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
	<link rel="stylesheet" type="text/css" href="css/formularios.css" />
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

        <select id="lista2" name="lista2"></select>

        <div id="dependiente2"></div>

	<button class="botGen" type="submit" value="Guardar">Guardar elección</button>
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

		$('#lista2').change(function(){
			recargarEscudo();	
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
				$('#lista2').html(r);
			}
		});
	}

	function recargarEscudo(){
		$.ajax({
			type:"POST",
			url:"muestraEscudo.php",
			data:"escudo="+$('#lista2').val(),
			success:function(r){
				$('#dependiente2').html(r);
			}
		});
	}
</script>