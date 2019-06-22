<?php 
class Parentezco {
	private $id_parentezco; //int(11) MAX 11 Null=NO  auto_increment
	private $nombre_parentezco; //varchar(50) MAX 50 Null=NO  

	function __construct($id_parentezco,$nombre_parentezco){
		$this->id_parentezco=$id_parentezco;
		$this->nombre_parentezco=$nombre_parentezco;
	}

	function getId_parentezco(){
		return $this->id_parentezco;
	}

	function getNombre_parentezco(){
		return $this->nombre_parentezco;
	}

	function setId_parentezco($id_parentezco){
		$this->id_parentezco=$id_parentezco;
	}

	function setNombre_parentezco($nombre_parentezco){
		$this->nombre_parentezco=$nombre_parentezco;
	}

	function __toString(){
		return print_r($this,true);
	}
}