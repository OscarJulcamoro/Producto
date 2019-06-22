<?php 
class Localizacion {
	private $id_localizacion; //int(11) MAX 11 Null=NO  auto_increment
	private $id_paciente; //int(11) MAX 11 Null=NO  
	private $fecha_localizacion; //datetime Null=SI  
	private $codigo; //varchar(40) MAX 40 Null=SI  
	private $longitud; //varchar(10) MAX 10 Null=SI  
	private $latitud; //varchar(10) MAX 10 Null=SI  
	private $activo; //int(11) MAX 11 Null=NO  

	function __construct($id_localizacion,$id_paciente,$fecha_localizacion,$codigo,$longitud,$latitud,$activo){
		$this->id_localizacion=$id_localizacion;
		$this->id_paciente=$id_paciente;
		$this->fecha_localizacion=$fecha_localizacion;
		$this->codigo=$codigo;
		$this->longitud=$longitud;
		$this->latitud=$latitud;
		$this->activo=$activo;
	}

	function getId_localizacion(){
		return $this->id_localizacion;
	}

	function getId_paciente(){
		return $this->id_paciente;
	}

	function getFecha_localizacion(){
		return $this->fecha_localizacion;
	}

	function getCodigo(){
		return $this->codigo;
	}

	function getLongitud(){
		return $this->longitud;
	}

	function getLatitud(){
		return $this->latitud;
	}

	function getActivo(){
		return $this->activo;
	}

	function setId_localizacion($id_localizacion){
		$this->id_localizacion=$id_localizacion;
	}

	function setId_paciente($id_paciente){
		$this->id_paciente=$id_paciente;
	}

	function setFecha_localizacion($fecha_localizacion){
		$this->fecha_localizacion=$fecha_localizacion;
	}

	function setCodigo($codigo){
		$this->codigo=$codigo;
	}

	function setLongitud($longitud){
		$this->longitud=$longitud;
	}

	function setLatitud($latitud){
		$this->latitud=$latitud;
	}

	function setActivo($activo){
		$this->activo=$activo;
	}

	function __toString(){
		return print_r($this,true);
	}
}