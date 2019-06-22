<?php 
class Detalle_paciente_cuidador {
	private $id_detalle_pa_cu; //int(11) MAX 11 Null=NO  auto_increment
	private $id_cuidador; //int(11) MAX 11 Null=NO  
	private $id_paciente; //int(11) MAX 11 Null=NO  
	private $id_parentezco; //int(11) MAX 11 Null=NO  
	private $fecha; //datetime Null=NO  
	private $activo; //int(11) MAX 11 Null=NO  

	function __construct($id_detalle_pa_cu,$id_cuidador,$id_paciente,$id_parentezco,$fecha,$activo){
		$this->id_detalle_pa_cu=$id_detalle_pa_cu;
		$this->id_cuidador=$id_cuidador;
		$this->id_paciente=$id_paciente;
		$this->id_parentezco=$id_parentezco;
		$this->fecha=$fecha;
		$this->activo=$activo;
	}

	function getId_detalle_pa_cu(){
		return $this->id_detalle_pa_cu;
	}

	function getId_cuidador(){
		return $this->id_cuidador;
	}

	function getId_paciente(){
		return $this->id_paciente;
	}

	function getId_parentezco(){
		return $this->id_parentezco;
	}

	function getFecha(){
		return $this->fecha;
	}

	function getActivo(){
		return $this->activo;
	}

	function setId_detalle_pa_cu($id_detalle_pa_cu){
		$this->id_detalle_pa_cu=$id_detalle_pa_cu;
	}

	function setId_cuidador($id_cuidador){
		$this->id_cuidador=$id_cuidador;
	}

	function setId_paciente($id_paciente){
		$this->id_paciente=$id_paciente;
	}

	function setId_parentezco($id_parentezco){
		$this->id_parentezco=$id_parentezco;
	}

	function setFecha($fecha){
		$this->fecha=$fecha;
	}

	function setActivo($activo){
		$this->activo=$activo;
	}

	function __toString(){
		return print_r($this,true);
	}
}