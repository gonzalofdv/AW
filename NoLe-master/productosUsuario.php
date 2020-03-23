<?php
	require_once("include/productoOfreSA.php");
	$sa = new productoOfreSA();
	
	if(isset($_GET["idProd"])){
		$prod = $sa->getProducto($_GET["idProd"]);
		$prod->setEnPuja(0);
		$sa->editProducto($prod);
	}

	$prod = $sa->getProductoUsuarioInventario($_SESSION["nombre"]);
?>
	<h1>Tus productos</h1>

	<?php
	if($prod != NULL){
		for ($i=0; $i < sizeof($prod); $i++) {
		?>
		<div class="card">
		<?php echo '<div class="thumbnail"><img class="leftImg" src="img/prods/'.$prod[$i]->getId().'.png"/></div>'; ?>
		<div class="details">
			<?php
				$path = 'product.php?id='.$prod[$i]->getId();
				$pathEnPuja = 'procesarPonerEnPuja.php?idProducto='.$prod[$i]->getId();
				$perfil = 'perfilVisitante.php?nickname='.$prod[$i]->getOwner().'';
				echo"<h1>".$prod[$i]->getNombre()."</h1>"; ?>
				<div class="author">
					<?php echo '<a class ="seemore" href='. $perfil . '></i><img onerror=this.src="img/error/no-image.png" src="img/'.$prod[$i]->getOwner().'.png"/>
				    <h2>'. $prod[$i]->getOwner() .'</h2></a>' ?>
				</div>
				<div class="category">
					<?php
				      		switch ($prod[$i]->getCategoria()) {
				      		 	case '0':
			                      echo "<a class='catLink' href='numismatica.php'> Numismática</a>";
			                      break;
			                    case '1':
			                      echo "<a class='catLink' href='rinconAbuela.php'>Rincón de la Abuela</a>";
			                      break;
			                    case '2':
			                      echo "<a class='catLink' href='figuras.php'>Figuras</a>";
			                      break;
			                    case '3':
			                      echo "<a class='catLink' href='filatelia.php'>Filatelia</a>";
			                      break;
			                    case '4':
			                      echo "<a class='catLink' href='vinilosDiscos.php'>Vinilos/Discos</a>";
			                      break;
			                    case '5':
			                      echo "<a class='catLink' href='cromos.php'>Cromos</a>";
			                      break;
			                    case '6':
			                      echo "<a class='catLink' href='librosComics.php'>Libros/Comics</a>";
			                      break;
			                    case '7':
			                      echo "<a class='catLink' href='trastero.php'>Trastero</a>";
			                      break;
				      		 }?>
				</div>
				<div class="separator"></div>
				<p><?php echo $prod[$i]->getDescripcionCorta() ?></p>
				<?php echo '<a class="seemore" href='.$path.'><p>Ir al producto</p></a>'?>
				<?php echo '<a class="seemore" href='.$pathEnPuja.'><p>Poner en puja</p></a>'?>

		</div>
		</div>
	<?php
		}
	}
	else echo "El usuario no tiene productos."
	    ?>
