</head>
<body>
	<?php
		require("cabecera.php");
	?>
	<div id="contenido">
	<br>
		<form action="procesarNuevaNoticia.php" method="post">
			<fieldset>
				<legend>Nueva Noticia</legend>
					Titular:<br> <input type="text" name="titular"><br>
					<textarea name="cuerpo" rows="15" cols="50">Escribe aquí el cuerpo de la noticia</textarea>
					<select name="liga">
						<option value="0">Ligas:</option>

						<!-- ESTA PARTE ESTÁ MAL, NO SE PUEDE CONECTAR CON LA BASE DE DATOS AQUI NI REALIZAR CONSULTAS PERO LO HE PUESTO PARA IR PROBANDOLO, LO CORRECTO SERÍA CREAR UN ligasSA Y LLAMAR A UN METODO QUE CON EL DAO HAGA LA CONSULTA QUE SE REFLEJA AQUI Y LA DEVUELVA Y TAL -->
						<?php
							$db=@mysqli_connect('localhost', 'userLocal', 'Ua8smYv6GzqsNnsy', 'varderindecorner');
							$q = mysqli_query($db, "SELECT * FROM ligas");
							while($valores = mysqli_fetch_array($q)){
								echo '<option value="' . $valores[0] . '"> ' . $valores[1] . '</option>';
							}
						?>
					</select>
					<input type="checkbox" name="condi" value="ok">Confirmar enviar noticia.<br>
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