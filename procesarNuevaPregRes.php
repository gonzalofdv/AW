<?php

require_once('include/transfer/PreguntaTransfer.php');
require_once('include/sa/PreguntaSA.php');
require_once('include/transfer/RespuestaTransfer.php');
require_once('include/sa/RespuestaSA.php');

$preg = $_POST['preg'];
$codLiga = $_POST['liga'];
$v = $_POST['v'];
$f1 = $_POST['f1'];
$f2 = $_POST['f2'];
$condi = $_POST['condi'];

if((!empty($preg)) && (!empty($codLiga)) && (!empty($v)) && (!empty($f1)) && (!empty($f2)) && (!empty($condi))){
	if($codLiga != 0){

		$p = new PreguntaTransfer($preg, $codLiga);
		$preguntaSA = new PreguntaSA();

		$anadido = $preguntaSA->insertPregunta($p);

		if($anadido){

			$aux = $preguntaSA->getIdPregunta($p);
			$idP = $aux->IdPregunta;

			$r1 = new RespuestaTransfer($idP, $v, '1');
			$r2 = new RespuestaTransfer($idP, $f1, '0');
			$r3 = new RespuestaTransfer($idP, $f2, '0');

			$respuestaSA = new RespuestaSA();

			$i = 0;
			$valores = array();
			while($i < 3){
				$rand = rand(1, 3);
				if(!in_array($rand, $valores)){
					array_push($valores, $rand);
					$respuestaSA->insertRespuesta(${"r".$rand});
					$i++;
				}
			}

			//ya hemos insertado todo, ahora mostramos mensaje y volvemos al a pagina
			header('Location: mostrarAlertas.php?codAlerta=19');
		}
		else{
			//Error de algun fallo introduciendo la pregunta
			header('Location: mostrarAlertas.php?codAlerta=20');
		}
	}
	else{
		//Mandar error de que hay que seleccionar una liga
		header('Location: mostrarAlertas.php?codAlerta=21');
	}
}
else{
	//Mandar error de que faltan campos por rellenar
	header('Location: mostrarAlertas.php?codAlerta=22');
}

?>