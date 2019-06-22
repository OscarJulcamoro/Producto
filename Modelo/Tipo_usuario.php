<?php 
class Tipo_usuario {
	private $id_tipo_usuario; //int(11) MAX 11 Null=NO  auto_increment
	private $nombre_tipo; //varchar(50) MAX 50 Null=NO  

	function __construct($id_tipo_usuario,$nombre_tipo){
		$this->id_tipo_usuario=$id_tipo_usuario;
		$this->nombre_tipo=$nombre_tipo;
	}

	function getId_tipo_usuario(){
		return $this->id_tipo_usuario;
	}

	function getNombre_tipo(){
		return $this->nombre_tipo;
	}

	function setId_tipo_usuario($id_tipo_usuario){
		$this->id_tipo_usuario=$id_tipo_usuario;
	}

	function setNombre_tipo($nombre_tipo){
		$this->nombre_tipo=$nombre_tipo;
	}

	function __toString(){
		return print_r($this,true);
	}
}