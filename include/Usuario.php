<?php
require_once('DAO.php');

class Usuario{
    private $nom;
    private $apellido1;
    private $apellido2;
    private $sexo;
    private $equipo;
    private $usu;
    private $contrasena;
    private $mail;
    private $esAdmin;
    private $esFamilia;
    private $puntos;

    //constructor

    public function __construct($nom, $apellido1, $apellido2, $sexo, $equipo, $usu, $contrasena, $mail, $esAdmin, $esFamilia, $puntos){
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
        

    public function newUsuario(){
        if(self::comprobarUsuario(this)){
            return self::insertarUsuario(this);
        }
        else{
            return false;
        }
    }

    public function comprobarUsuario($usuario){
        $db=DAO::getDAO();

        $usu = $usuario->getUsu();
        $sql = "SELECT * FROM usuarios WHERE NombreUsuario LIKE '$usu'";
        $consulta = mysqli_query($db, $sql);
        $info = $consulta->fetch_object();

        if(!$info){
            //si no existe usuario con ese nombre ya
            return true;
        }
        else{ //si ya existe ese usuario
            return false;
        }
    }

    public function insertarUsuario($usuario){
        $db=DAO::getDAO();

        $nombre = $usuario->getNom();
        $ap1 = $usuario->getApellido1();
        $ap2 = $usuario->getApellido2();
        $sexo = $usuario->getSexo();
        $equipo = $usuario->getEquipo();
        $usu = $usuario->getUsu();
        $pass = $usuario->getContrasena();
        $email = $usuario->getMail();
        $esAdmin = $usuario->getEsAdmin();
        $familia = $usuario->getEsFamilia();
        $puntos = $usuario->getPuntos();

        $sql = "INSERT INTO usuarios (Nombre, Apellido1, Apellido2, Sexo, EquipoFavorito, NombreUsuario, Contrasena, Email, Administrador, SomosFamilia, Puntos) VALUES ('$nombre', '$ap1', '$ap2', '$sexo', '$equipo', '$usu', '$pass', '$email', '$esAdmin', '$familia', '$puntos')";
        $consulta = mysqli_query($db, $sql);

        if($consulta){
            return true;
        } 
        else{
            return false;
        }
    }

    public function checkUsuario($usuario){
        if(self::comprobarUsuario($usuario)){
            return true;
        }
        else{
            return false;
        }
    }

    public function checkAdmin($usuario){
        if(self::esAdmin($usuario)){
            return true;
        }
        else{
            return false;
        }
    }

    public function esAdmin($usuario){
        $db=DAO::getDAO();

        $sql = "SELECT Administrador FROM usuarios WHERE NombreUsuario LIKE '$usuario'";
        $consulta = mysqli_query($db, $sql);
        $res = mysqli_fetch_array($consulta);

        if($res[0]==0){
            //No es admin
            return false;
        }
        else{ //es admin
            return true;
        }
    }

    public function checkFamilia($usu){
        if(self::esFamilia($usu)){
            return true;
        }
        else{
            return false;
        }
    }

    public function esFamilia($usu){
        $db=DAO::getDAO();

        $sql = "SELECT SomosFamilia FROM usuarios WHERE NombreUsuario LIKE '$usu'";
        $consulta = mysqli_query($db, $sql);
        $res = mysqli_fetch_array($consulta);

        if($res[0]==0){
            //No es familia
            return false;
        }
        else{ //es familia
            return true;
        }
    }

    public function obtenerId($usu){
        $db=DAO::getDAO();

        $sql = "SELECT IdUsuario FROM usuarios WHERE NombreUsuario = '$usu'";
        $consulta = mysqli_query($db, $sql);
        
        return $res=$consulta->fetch_object();
    }

    public function obtenerNombreUsu($idUsu){
        $db=DAO::getDAO();

        $sql = "SELECT NombreUsuario FROM usuarios WHERE IdUsuario = '$idUsu'";
        $consulta = mysqli_query($db, $sql);

        return $obj = $consulta->fetch_object();
    }

    public function getUsuario($nombre) {
        $db=DAO::getDAO();

        $sql = "SELECT * from usuarios where NombreUsuario = '$nombre'";
        $consulta = mysqli_query($db, $sql);
        
        return  $obj = $consulta->fetch_object();
    }

    public function sumarPuntos($idUsu,$puntos){
        $db=DAO::getDAO();

        $sql = "UPDATE usuarios SET Puntos= Puntos +'$puntos' where IdUsuario = '$idUsu'";
        $consulta = mysqli_query($db, $sql);
    }

    public function canjearFamilia($nombreUsu){
        $db=DAO::getDAO();

        $sql = "SELECT Puntos FROM  usuarios WHERE NombreUsuario = '$nombreUsu'";
        $consulta = mysqli_query($db, $sql);
        $obj = $consulta->fetch_object();

        if($obj->Puntos >= 200){            
            $sql2 = "UPDATE usuarios SET SomosFamilia = 1 WHERE NombreUsuario = '$nombreUsu'";
            mysqli_query($db, $sql2);

            return true;
        }
        else{
            return false;
        }
    }

    public function devuelveRanking(){
        $db=DAO::getDAO();
        //ordena por puntos y a igualdad de puntos, en orden alfabético
        //y solo los 10 primeros
        $sql = "SELECT NombreUsuario, Puntos FROM usuarios WHERE Administrador = 0 ORDER BY Puntos DESC, NombreUsuario ASC LIMIT 10";
        $consulta = mysqli_query($db, $sql);
        return $consulta;
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