<?php
require_once('include/transfer/ComentarioTransfer.php');
require_once('include/sa/ComentarioSA.php');
require_once('include/sa/UsuarioSA.php');
require_once('include/transfer/UsuarioTransfer.php');
require_once __DIR__.'/Form.php';

class FormularioNoticia extends Form {

	public function __construct($idNoticia){
		$idNoticia=$idNoticia;
	}

	protected function procesaFormulario($datos){
		$result = array();

		/*$idNoticia = $_GET['idN'];*/
		$comentario = isset($datos['cuerpo']) ? nl2br($datos['cuerpo'] : null;
		$condi = isset($datos['condi']) ? $datos['condi'] : null;
		$nombreUsu = isset($_SESSION['nombre']) ? $$_SESSION['nombre']) : null;

		if((!empty($comentario)) && (!empty($nombreUsu)) && (!empty($condi))){
			$usuarioSA = new UsuarioSA();
			$consulta = $usuarioSA->obtenerId($nombreUsu); 
			$codUsuario=$consulta->IdUsuario;
			$n = new ComentarioTransfer($idNoticia, $codUsuario, $comentario);
			$comentarioSA = new ComentarioSA();
			$anadido = $comentarioSA->insertComentario($n);

			if($anadido){
				$usuarioSA->sumarPuntos($codUsuario,3);
				$result = 'mostrarAlertas.php?codAlerta=16';
			}
			else{
				$result = 'mostrarAlertas.php?codAlerta=13';
			}
		}
		else{
			//Mandar error de que faltan campos por rellenar
			$result[] = "Faltan campos por rellenar";
			header('Location: mostrarAlertas.php?codAlerta=14');
		}

	 	return $result;
	}

	protected function generaCamposFormulario($datosIniciales){

		$comentario = '';
		if($datosIniciales) {
			$comentario= isset($datosIniciales['comentario']) ? $datosIniciales['comentario'] : $comentario;
		}

        $html = <<<EOF
        <fieldset>
		<legend>Nuevo Comentario</legend>
		<textarea name="cuerpo" rows="15" cols="70">Escribe aquí el comentario</textarea>
		<input type="checkbox" name="condi" value="ok">Confirmar enviar comentario.<br>
		<input type="submit" name="aceptar">	
		</fieldset>
        EOF;

		return $html;
	}
}


?>