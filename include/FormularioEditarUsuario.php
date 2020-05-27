<?php
require_once('include/sa/UsuarioSA.php');
require_once('Form.php');

class FormularioEditarUsuario extends Form {

    private $idUsuario;

    public function __construct($idU){
        $this->idUsuario = $idU;
    }

    protected function procesaFormulario($datos){
       $result = array();

        $nombre = isset($datos['nom']) ? htmlspecialchars($datos['nom']) : null;
        if(empty($nombre)){
            $result[] = "El nombre no puede estar vacío";
        }

        $apellido1 = isset($datos['apellido1']) ? htmlspecialchars($datos['apellido1']) : null;
        if(empty($apellido1)){
            $result[] = "El apellido1 no puede estar vacío";
        }

        $apellido2 = isset($datos['apellido2']) ? htmlspecialchars($datos['apellido2']) : null;
        if(empty($apellido2)){
            $result[] = "El apellido2 no puede estar vacío";
        }

        $sexo = isset($datos['sexo']) ? htmlspecialchars($datos['sexo']) : null;
        if(empty($sexo)){
            $result[] = "El sexo no puede estar vacío";
        }

        $contrasena = isset($datos['contrasena']) ? htmlspecialchars($datos['contrasena']) : null;
        if(empty($contrasena)){
            $result[] = "La contrasena no puede estar vacía";
        }

        $contrasenaRep = isset($datos['rContrasena']) ? htmlspecialchars($datos['rContrasena']) : null;
        if(empty($contrasenaRep)){
            $result[] = "La contrasena repetida no puede estar vacía";
        }

        $mail = isset($datos['mail']) ? htmlspecialchars($datos['mail']) : null;
        if(empty($mail)){
            $result[] = "El e-mail no puede estar vacío";
        }

        $condi = isset($datos['condi']) ? htmlspecialchars($datos['condi']) : null;
        if(empty($condi)){
            $result[] = "Hay que marcar la condicion no puede estar vacío";
        }

        if(count($result) === 0){
            if($contrasena==$contrasenaRep){
               $usuarioSA = new UsuarioSA();
                $usuarioSA->updateUsuario($this->idUsuario, $nombre, $apellido1, $apellido2,$sexo,$contrasena,$mail);
                $result = "correcto";
            }
            else{
                $result[] = "Las contraseñas no coinciden";
            }
        }

        return $result;
    }

    protected function generaCamposFormulario($datosIniciales){

        $usuarioSA = new UsuarioSA();
        $nombreUsu = $usuarioSA->obtenerNombreUsu($this->idUsuario);
        $usuario = $usuarioSA->getUsuario($nombreUsu->NombreUsuario);

        $nombre = $usuario->Nombre;
        $apellido1 = $usuario->Apellido1;
        $apellido2 = $usuario->Apellido2;
        $sexo = $usuario->Sexo;
        $mail = $usuario->Email;

		if($datosIniciales) {
			$nombre = isset($datos['nom']) ? htmlspecialchars($datos['nom']) : null;
			$apellido1 = isset($datos['apellido1']) ? nl2br($datos['apellido1']) : null;
			$apellido2 = isset($datos['apellido2']) ? htmlspecialchars($datos['apellido2']) : null;
			$sexo = isset($datos['sexo']) ? htmlspecialchars($datos['sexo']) : null;
            $mail = isset($datos['mail']) ? htmlspecialchars($datos['mail']) : null;
            $contrasena = isset($datos['contrasena']) ? htmlspecialchars($datos['Contrasena']) : null;
            $contrasenaRep = isset($datos['rContrasena']) ? htmlspecialchars($datos['rContrasena']) : null;
		}
	
		$html = <<<EOF
        <legend>Editar Datos</legend>
        <div class="formulario">
        <br>
        <input type="text" name="nom" placeholder="Nombre:" value="$nombre"><br>
        <input type="text" name="apellido1" placeholder="Apellido 1:" value="$apellido1"><br>
        <input type="text" name="apellido2" placeholder="Apellido 2:" value="$apellido2"><br>
        <br>
        <label>Sexo:</label><br>
        <input type="radio" class="radioForm" name="sexo" value="hombre" /><label>Hombre</label>
        <input type="radio" class="radioForm" name="sexo" value="mujer" /><label>Mujer</label><br>
        <br>
        <input type="text" name="mail" placeholder="E-mail:" value="$mail"><br>
        <input type="password" name="contrasena" placeholder="Contraseña:" value="" /><br>
        <input type="password" name="rContrasena" placeholder="Repetir contraseña:" value="" /><br> 
        <input type="checkbox" name="condi" value="ok"><label>Acepto las condiciones del servicio</label><br>
        <button type="submit" class="botonEnviar" name="aceptar" />Enviar</button>
        </div>
        EOF;    
        
        return $html;
    }

}

?>