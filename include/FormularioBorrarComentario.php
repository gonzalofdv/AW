<?php
require_once('include/sa/ComentarioSA.php');
require_once('include/sa/RespuestaComentarioSA.php');
require_once('include/sa/UsuarioSA.php');
require_once('Form.php');

class FormularioBorrarComentario extends Form{
	
	public function __construct($idN){
		$this->idNoticia = $idN;
	}
	
	protected function procesaFormulario($datos){
		$result = array();
		
		$idComentario = isset($datos['comentario']) ? htmlspecialchars($datos['comentario']) : null;
		
		if(!empty($idComentario)){

			$respcomentSA = new RespuestaComentarioSA();
			$respcomentSA->borrarRespuestas($idComentario);

			$comentarioSA = new ComentarioSA();
			$res = $comentarioSA->borrarComentarioConcreto($idComentario);
			
			$result = 'correcto';
			
		}
		else{
			$result[] = "Debes seleccionar un comentario";
		}
		
		return $result;
	}
	
	protected function generaCamposFormulario($datosIniciales){
		
		$html = '';
		$html .= '<legend>¿Qué comentario quieres borrar?</legend>';
		$html .= '<div class="formulario">';
	
		$comentarioSA=new ComentarioSA();
		$usuarioSA=new UsuarioSA();
		$comentarios=$comentarioSA->devuelveComentarios($this->idNoticia);
		$i=0;
		
		while($res=mysqli_fetch_array($comentarios)){
			$usu=$usuarioSA->obtenerNombreUsu($res[2]);
			$usuario= $usu->NombreUsuario;
			$html .= '<input type=radio name=comentario value='.$res[0].' /><label>'.$usuario.' - '.$res[3].'</label><br>';
			$html .= '<br>';
		}
	
		$html .= '<button type="submit" class="botonEnviar" name="aceptar">Enviar</button>	';
		$html .= '</div>';
		
		return $html;
	}
	
}

?>