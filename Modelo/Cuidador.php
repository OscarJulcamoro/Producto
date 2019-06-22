<?php 
class Cuidador {
	private $id_cuidador; //int(11) MAX 11 Null=NO  auto_increment
	private $id_persona; //int(11) MAX 11 Null=NO  

	function __construct($id_cuidador,$id_persona){
		$this->id_cuidador=$id_cuidador;
		$this->id_persona=$id_persona;
	}

	function getId_cuidador(){
		return $this->id_cuidador;
	}

	function getId_persona(){
		return $this->id_persona;
	}

	function setId_cuidador($id_cuidador){
		$this->id_cuidador=$id_cuidador;
	}

	function setId_persona($id_persona){
		$this->id_persona=$id_persona;
	}

	function __toString(){
		return print_r($this,true);
	}
}