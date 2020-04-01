<?php
 class UsuarioTransfer {
private $nom="";
private $apellido1="";
private $apellido2="";
private $sexo="";
private $equipo="";
private $usu="";
private $contrasena="";
private $mail ="";
private $esAdmin="";
private $esFamilia="";
private $puntos="";

 //constructor

    public function __construct($nom,$apellido1,$apellido2,$sexo,$equipo,$usu,$contrasena,$mail,$esAdmin,$esFamilia,$puntos){
    	 $this->nom = $nom;
    	 $this->apellido1 = $apellido1;
    	 $this->apellido2 = $apellido2;
    	 $this->sexo = $sexo;
    	 $this->equipo = $equipo;
    	 $this->usu= $usu;
    	 $this->contrasena = $contrasena;
    	 $this->mail = $mail;
    	 $this->esAdmin = $esAdmin;
    	 $this->esFamilia = $esFamilia;
    	 $this->puntos = $puntos;
    }
    

	public function getNom(){
		return $this->nom;
	}

	public function setNom($nom){
		$this->nom = $nom;
	}

	public function getApellido1(){
		return $this->apellido1;
	}

	public function setApellido1($apellido1){
		$this->apellidos = $apellido1;
	}
	public function getApellido2(){
		return $this->apellido2;
	}

	public function setApellido2($apellido2){
		$this->apellidos = $apellido2;
	}

	public function getSexo(){
		return $this->sexo;
	}

	public function setSexo($sexo){
		$this->sexo = $sexo;
	}


	public function getEquipo(){
		return $this->equipo;
	}

	public function setEquipo($equipo){
		$this->equipo = $equipo;
	}

	public function getUsu(){
		return $this->usu;
	}

	public function setUsu($usu){
		$this->usu = $usu;
	}

	public function getContrasena(){
		return $this->contrasena;
	}

	public function setContrasena($contrasena){
		$this->contrasena = $contrasena;
	}

	public function getMail(){
		return $this->mail;
	}

	public function setMail($mail){
		$this->mail = $mail;
	}
	public function getEsAdmin(){
		return $this->esAdmin;
	}

	public function setEsAdmin($esAdmin){
		$this->esAdmin = $esAdmin;
	}
	public function getEsFamilia(){
		return $this->esFamilia;
	}

	public function setEsFamilia($esFamilia){
		$this->esFamilia = $esFamilia;
	}
	public function getPuntos(){
		return $this->puntos;
	}

	public function setPuntos($puntos){
		$this->esFamilia = $puntos;
	}

 }
?>
