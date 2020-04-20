<?php session_start(); 
require_once('include/UsuarioSA.php');
require_once('include/UsuarioTransfer.php');


$usu=$_POST['usuario'];
$pass=$_POST['password'];



if((!empty($usu)) && (!empty($pass))){
	$p = new UsuarioTransfer("", "", "", "", "", $usu,$pass,"", 0, 0, 0);
	$usuarioSA = new UsuarioSA();
	$check= $usuarioSA ->checkUsuario($p);
		if(!$check){
			$_SESSION['login']=True;
			$_SESSION['nombre'] = $usu;
			$checkAd=$usuarioSA -> checkAdmin($usu);
			if($checkAd){
				$_SESSION['esAdmin']=true;
			}
			else{
				$_SESSION['esAdmin']=false;
			}
			$checkFam=$usuarioSA->checkFamilia($usu);
			if($checkFam){
				$_SESSION['esFamilia']=true;
			}
			else{
				$_SESSION['esFamilia']=false;
			}
			$consulta = $usuarioSA->obtenerId($usu);
			$idUsuario = $consulta->IdUsuario;
			$usuarioSA->sumarPuntos($idUsuario,1);
			
			header('Location: mostrarAlertas.php?codAlerta=17');

		}
		else{
			header('Location: mostrarAlertas.php?codAlerta=23');
		}
}
else{
	header('Location: mostrarAlertas.php?codAlerta=7');
}

?>