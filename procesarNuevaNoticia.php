<?php session_start();

require_once('NoticiaTransfer.php');
require_once('NoticiaSA.php');
require_once('UsuarioSA.php');
require_once('UsuarioTransfer.php');

$titular = $_POST['titular'];
$cuerpo = nl2br($_POST['cuerpo']);
$condi = $_POST['condi'];
$codLiga = $_POST['liga'];
$nombreUsu = $_SESSION['nombre']; 

if((!empty($titular)) && (!empty($cuerpo)) && (!empty($condi))){
	if($codLiga != 0){ //por defecto el formulario tiene valor 0 así que si no se ha seleccionado ninguna liga, el codLiga sera 0 y dara error, si se ha seleccionado una, codLiga tendrá el valor del ID de la liga correspondiente.
		$usuarioSA = new UsuarioSA();
		$consulta = $usuarioSA->obtenerId($nombreUsu); 	
		$codUsuario = $consulta->IdUsuario;
		$n = new NoticiaTransfer($codUsuario, $codLiga, $cuerpo, $titular);
		
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