<?php 
class Foto_paciente {
	private $id_foto_paciente; //int(11) MAX 11 Null=NO  auto_increment
	private $id_paciente; //int(11) MAX 11 Null=NO  
	private $nombre_foto; //varchar(300) MAX 300 Null=NO  

	function __construct($id_foto_paciente,$id_paciente,$nombre_foto){
		$this->id_foto_paciente=$id_foto_paciente;
		$this->id_paciente=$id_paciente;
		$this->nombre_foto=$nombre_foto;
	}

	function getId_foto_paciente(){
		return $this->id_foto_paciente;
	}

	function getId_paciente(){
		return $this->id_paciente;
	}

	function getNombre_foto(){
		return $this->nombre_foto;
	}

	function setId_foto_paciente($id_foto_paciente){
		$this->id_foto_paciente=$id_foto_paciente;
	}

	function setId_paciente($id_paciente){
		$this->id_paciente=$id_paciente;
	}

	function setNombre_foto($nombre_foto){
		$this->nombre_foto=$nombre_foto;
	}

	function __toString(){
		return print_r($this,true);
	}
}