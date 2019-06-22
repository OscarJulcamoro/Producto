<?php 
class Persona {
	private $id_persona; //int(11) MAX 11 Null=NO  auto_increment
	private $rut; //varchar(14) MAX 14 Null=NO  
	private $nombres; //varchar(50) MAX 50 Null=NO  
	private $apellidos; //varchar(50) MAX 50 Null=NO  
	private $username; //varchar(50) MAX 50 Null=NO  
	private $password; //varchar(64) MAX 64 Null=NO  
	private $telefono; //varchar(15) MAX 15 Null=SI  
	private $correo; //varchar(60) MAX 60 Null=SI  
	private $id_tipo_usuario; //int(11) MAX 11 Null=NO  
	private $activo; //int(11) MAX 11 Null=NO  

	function __construct($id_persona,$rut,$nombres,$apellidos,$username,$password,$telefono,$correo,$id_tipo_usuario,$activo){
		$this->id_persona=$id_persona;
		$this->rut=$rut;
		$this->nombres=$nombres;
		$this->apellidos=$apellidos;
		$this->username=$username;
		$this->password=$password;
		$this->telefono=$telefono;
		$this->correo=$correo;
		$this->id_tipo_usuario=$id_tipo_usuario;
		$this->activo=$activo;
	}

	function getId_persona(){
		return $this->id_persona;
	}

	function getRut(){
		return $this->rut;
	}

	function getNombres(){
		return $this->nombres;
	}

	function getApellidos(){
		return $this->apellidos;
	}

	function getUsername(){
		return $this->username;
	}

	function getPassword(){
		return $this->password;
	}

	function getTelefono(){
		return $this->telefono;
	}

	function getCorreo(){
		return $this->correo;
	}

	function getId_tipo_usuario(){
		return $this->id_tipo_usuario;
	}

	function getActivo(){
		return $this->activo;
	}

	function setId_persona($id_persona){
		$this->id_persona=$id_persona;
	}

	function setRut($rut){
		$this->rut=$rut;
	}

	function setNombres($nombres){
		$this->nombres=$nombres;
	}

	function setApellidos($apellidos){
		$this->apellidos=$apellidos;
	}

	function setUsername($username){
		$this->username=$username;
	}

	function setPassword($password){
		$this->password=$password;
	}

	function setTelefono($telefono){
		$this->telefono=$telefono;
	}

	function setCorreo($correo){
		$this->correo=$correo;
	}

	function setId_tipo_usuario($id_tipo_usuario){
		$this->id_tipo_usuario=$id_tipo_usuario;
	}

	function setActivo($activo){
		$this->activo=$activo;
	}

	function __toString(){
		return print_r($this,true);
	}
}