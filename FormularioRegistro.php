<?php
require_once('sa/UsuarioSA.php');
require_once('transfer/UsuarioTransfer.php');
require_once ('Form.php');

class FormularioRegistro extends Form {

	public function __construct(){}

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

		//$equipo = isset($datos['equipo']) ? htmlspecialchars($datos['equipo']) : null;
		//if(empty($equipo)){
		//	$result[] = "El equipo no puede estar vacío";
		//}

		$nombreUsuario = isset($datos['usu']) ? htmlspecialchars($datos['usu']) : null;
		if(empty($nombreUsuario)){
			$result[] = "El nombre de usuario no puede estar vacío";
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
				$p = new UsuarioTransfer($nombre, $apellido1, $apellido2, $sexo, 0, $nombreUsuario, $contrasena, $mail, 0, 0, 0);
				$usuarioSA = new UsuarioSA();
				$anadido = $usuarioSA ->newUsuario($p);
				if($anadido){

					$_SESSION['login'] = true;
					$_SESSION['nombre'] = $nombreUsuario;
					$_SESSION['votos'] = 0;
					$_SESSION['esAdmin']=false;
					$_SESSION['esFamilia']=false;

					$consulta = $usuarioSA->obtenerId($nombreUsuario);
					$idUsuario = $consulta->IdUsuario;
					$usuarioSA->sumarPuntos($idUsuario,1);

					$result = 'mostrarAlertas.php?codAlerta=8';
				}
				else{
					//$result = 'mostrarAlertas.php?codAlerta=9';
					$result=0;
				}
			}
			else{
				//$result = 'mostrarAlertas.php?codAlerta=10';
				$result[] = "Las contraseñas no coinciden";
			}
		}

		return $result;
	}

	protected function generaCamposFormulario($datosIniciales){

		
		$nombre = '';
		$apellido1 = '';
		$apellido2 = '';
		$sexo = '';
		//$equipo = '';
		$usu = '';
		$mail = '';
		$condi = '';

		if($datosIniciales) {
			$nombre = isset($datosIniciales['nom']) ? $datosIniciales['nom'] : $usuario;
			$apellido1 = isset($datosIniciales['apellido1']) ? $datosIniciales['apellido1'] : $apellido1;
			$apellido2 = isset($datosIniciales['apellido2']) ? $datosIniciales['apellido2'] : $apellido2;
			$sexo = isset($datosIniciales['sexo']) ? $datosIniciales['sexo'] : $sexo;
			//$equipo = isset($datosIniciales['equipo']) ? $datosIniciales['equipo'] : $equipo;
			$usu = isset($datosIniciales['usu']) ? $datosIniciales['usu'] : $usu;
			$mail = isset($datosIniciales['mail']) ? $datosIniciales['mail'] : $mail;
			$condi = isset($datosIniciales['condi']) ? $datosIniciales['condi'] : $condi;
		}

		$html = <<<EOF
		<legend>Registro Usuario</legend>
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
		<input type="text" name="usu" placeholder="Nombre de usuario:" value="$usu"><br>
		<input type="checkbox" name="condi" value="ok"><label>Acepto las condiciones del servicio</label><br>
		<button type="submit" class="botonEnviar" name="aceptar" />Enviar</button>
		</div>
		EOF;	
		
		return $html;
	}

}


?>