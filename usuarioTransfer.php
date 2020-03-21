<?php
 class Usuario {
 private $nom="";
private $apellidos="";
private $sexo="";
private $equipo="";
private $usu="";
private $contrasena="";
private $mail ="";

 //constructor

    public Usuario(){}
    

	public function getNom(){
		return $this->nom;
	}

	public function setNom($nom){
		$this->nom = $nom;
	}

	public function getApellidos(){
		return $this->apellidos;
	}

	public function setApellidos($apellidos){
		$this->apellidos = $apellidos;
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

 }
?>
