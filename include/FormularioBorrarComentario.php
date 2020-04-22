<?php
require_once('include/sa/ComentarioSA.php');
require_once('include/sa/UsuarioSA.php');
require_once('Form.php');

class FormularioBorrarComentario extends Form{
	
	public function __construct($idN){
		$this->idNoticia = $idN;
	}
	
	protected function generaCamposFormulario($datosIniciales){
		
		$html = '';
		$html .= '<fieldset>';
		$html .= '<legend>¿Qué comentario quieres borrar?</legend>';
	
		$comentarioSA=new ComentarioSA();
		$usuarioSA=new UsuarioSA();
		$comentarios=$comentarioSA->devuelveComentarios($this->idNoticia);
		$i=0;
		
		while($res=mysqli_fetch_array($comentarios)){
			$usu=$usuarioSA->obtenerNombreUsu($res[2]);
			$usuario= $usu->NombreUsuario;
			$html .= '<input type=radio name=comentario value='.$res[0].' />'.$usuario.' - '.$res[3].'<br>';
			$html .= '<br>';
		}
	
		$html .= '<input type="submit" name="aceptar">	';
		$html .= '</fieldset>';
		
		return $html;
	}
	
	protected function procesaFormulario($datos){
		$result = array();
		
		$idComentario = isset($datos['comentario']) ? $datos['comentario'] : null;
		
		if(!empty($idComentario)){

			$comentarioSA = new ComentarioSA();
			$res = $comentarioSA->borrarComentarioConcreto($idComentario);
			
			$result = 'mostrarAlertas.php?codAlerta=27';
			
		}
		else{
			$result[] = "Debes seleccionar un comentario";
		}
		
		return $result;
	}
	
}

?>