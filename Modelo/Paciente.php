<?php 
class Paciente {
	private $id_paciente; //int(11) MAX 11 Null=NO  auto_increment
	private $id_persona; //int(11) MAX 11 Null=NO  
	private $condicion_medica; //varchar(100) MAX 100 Null=NO  

	function __construct($id_paciente,$id_persona,$condicion_medica){
		$this->id_paciente=$id_paciente;
		$this->id_persona=$id_persona;
		$this->condicion_medica=$condicion_medica;
	}

	function getId_paciente(){
		return $this->id_paciente;
	}

	function getId_persona(){
		return $this->id_persona;
	}

	function getCondicion_medica(){
		return $this->condicion_medica;
	}

	function setId_paciente($id_paciente){
		$this->id_paciente=$id_paciente;
	}

	function setId_persona($id_persona){
		$this->id_persona=$id_persona;
	}

	function setCondicion_medica($condicion_medica){
		$this->condicion_medica=$condicion_medica;
	}

	function __toString(){
		return print_r($this,true);
	}
}