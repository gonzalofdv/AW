<?php
require_once('include/transfer/ComentarioTransfer.php');
require_once('include/sa/ComentarioSA.php');
require_once('include/sa/UsuarioSA.php');
require_once('include/transfer/UsuarioTransfer.php');
require_once __DIR__.'/Form.php';

class FormularioComentario extends Form {
	public function __construct($idN){
		$this->idNoticia=$idN;
	}

	protected function procesaFormulario($datos){
		$result = array();
		$comentario = isset($datos['cuerpo']) ? htmlspecialchars(nl2br($datos['cuerpo'])) : null;
		$condi = isset($datos['condi']) ? htmlspecialchars($datos['condi']) : null;
		$nombreUsu = isset($_SESSION['nombre']) ? $_SESSION['nombre'] : null;

		if((!empty($comentario)) && (!empty($nombreUsu)) && (!empty($condi))){
			$usuarioSA = new UsuarioSA();
			$consulta = $usuarioSA->obtenerId($nombreUsu); 
			$codUsuario=$consulta->IdUsuario;
			$n = new ComentarioTransfer($this->idNoticia, $codUsuario, $comentario);
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
		}

	 	return $result;
	}

	protected function generaCamposFormulario($datosIniciales){

		$comentario = 'Escribe aqui tu comentario';
		if($datosIniciales) {
			$comentario= isset($datosIniciales['cuerpo']) ? $datosIniciales['cuerpo'] : $comentario;
		}

        $html ='';
        $html.='<fieldset>';
		$html.='<legend>Nuevo Comentario</legend>';
		$html.='<textarea name="cuerpo" rows="15" cols="70">'.$comentario.'</textarea>';
		$html.='<input type="checkbox" name="condi" value="ok">Confirmar enviar comentario.<br>';
		$html.='<input type="submit" name="aceptar">';
		$html.='</fieldset>';

		return $html;
	}
}


?>