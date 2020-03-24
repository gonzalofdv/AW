<?php session_start();

require_once('NoticiaTransfer.php');
require_once('NoticiaSA.php');
require_once('UsuarioSA.php');
require_once('UsuarioTransfer.php');

$titular = $_POST['titular'];
$cuerpo = $_POST['cuerpo'];
$condi = $_POST['condi'];
$codLiga = $_POST['liga'];
//$nombreUsu = $_SESSION['nombre']; // ESTO FALLA

if((!empty($titular)) && (!empty($cuerpo)) && (!empty($condi))){
	if($codLiga != 0){ //por defecto el formulario tiene valor 0 así que si no se ha seleccionado ninguna liga, el codLiga sera 0 y dara error, si se ha seleccionado una, codLiga tendrá el valor del ID de la liga correspondiente.
		//$usuarioSA = new UsuarioSA();
		//$codUsuario = $usuarioSA->obtenerId($nombreUsu); // NO FUNCIONA Este método nos devuelve el IdUsuario a partir de un nombre de usuario. Esto se hace para poder llamar al constructor correctamente.
		
		$n = new NoticiaTransfer('1', '1', $titular, $cuerpo);
		
		$noticiaSA = new NoticiaSA();
		$anadido = $noticiaSA->insertNoticia($n);

		if($anadido){
			echo "Nueva noticia insertada a la BBDD correctamente, gracias por colaborar<br> Redireccionando en 3 segundos...";
			header("refresh:3; url=index.php");
		}
		else{
			echo "Algo ha fallado por aqui";
		}
	
	}
	
}
else{
	//Mandar error de que faltan campos por rellenar
	echo "Faltan campos por rellenar! <br>";
	echo "Redireccionando...";
	header("refresh:3; url=formularioNoticia.php");
}

?>