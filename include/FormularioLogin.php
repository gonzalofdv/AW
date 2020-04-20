<?php
require_once('include/UsuarioSA.php');
require_once('include/UsuarioTransfer.php');
require_once __DIR__.'/Form.php';

class FormularioLogin extends Form {

	public function __construct(){}

	protected function procesaFormulario($datos){
		$result = array();
		$usuario = isset($datos['usuario']) ? $datos['usuario'] : null;
		if(empty($usuario)){
			$result[] = "El nombre de usuario no puede estar vacío";
		}

		$password = isset($datos['password']) ? $datos['password'] : null;
		if(empty($password)){
			$result[] = "El password no puede estar vacío.";
		}

		if(count($result) === 0){
			$p = new UsuarioTransfer("", "", "", "", "", $usuario,$password,"", 0, 0, 0);
			$usuarioSA = new UsuarioSA();
			$check= $usuarioSA->checkUsuario($p);

			if(!$check) {
				$result[] = "El usuario o el password no coinciden";
			}
			else{
				$_SESSION['login'] = true;
				$_SESSION['nombre'] = $usuario;
				$checkAd=$usuarioSA->checkAdmin($usuario);
				if($checkAd){
					$_SESSION['esAdmin']=true;
				}
				else{
					$_SESSION['esAdmin']=false;
				}

				$checkFam=$usuarioSA->checkFamilia($usuario);

				if($checkFam){
					$_SESSION['esFamilia']=true;
				}
				else{
					$_SESSION['esFamilia']=false;
				}			

				$consulta = $usuarioSA->obtenerId($usuario);
				$idUsuario = $consulta->IdUsuario;
				$usuarioSA->sumarPuntos($idUsuario,1);		

				$result = 'index.php';
			}
		}
		return $result;
	}

	protected function generaCamposFormulario($datosIniciales){

		$usuario = '';
		if($datosIniciales) {
			$usuario = isset($datosIniciales['usuario']) ? $datosIniciales['usuario'] : $usuario;
		}

        $html = <<<EOF
        <input type="text" name="usuario" placeholder="Introduzca su usuario: " value="$usuario">
        <input type="password" name="password" placeholder="Contraseña: ">
        <input type="submit" value="Enviar">
        EOF;

		return $html;
	}

}


?>