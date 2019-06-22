<?php 
if (!isset($rootDir)){
	$rootDir = $_SERVER['DOCUMENT_ROOT'];
}
require_once ($rootDir ."/DB/DB.php");
require_once ($rootDir ."/Modelo/Paciente.php");
class PacienteDAO {
	public static function agregar($nuevo) {
		$cc=DB::getInstancia();
		$stSql = "INSERT INTO paciente (id_paciente,id_persona,condicion_medica) VALUES(:id_paciente,:id_persona,:condicion_medica)";
		$rs = $cc->db->prepare($stSql);
		$params = self::getParams($nuevo);
		return $rs->execute($params);
	}
	public static function agregarAuto($nuevo) {
		$cc=DB::getInstancia();
		$stSql = "INSERT INTO paciente (id_persona,condicion_medica) VALUES(:id_persona,:condicion_medica)";
		$rs = $cc->db->prepare($stSql);
		$params=self::getParamsAuto($nuevo);
		return $rs->execute($params);
	}
	public static function buscar($id) {
		$cc=DB::getInstancia();
		$stSql = "SELECT * FROM paciente WHERE id_paciente=:id_paciente";
		$rs = $cc->db->prepare($stSql);
		$rs->execute(array('id_paciente' => $id));
		$ba = $rs->fetch();
		$nuevo = new Paciente($ba['id_paciente'],$ba['id_persona'],$ba['condicion_medica']);
		return $nuevo; 
	}
	public static function actualizar($nuevo) {
		$cc=DB::getInstancia();
		$stSql = "UPDATE paciente SET id_persona=:id_persona,condicion_medica=:condicion_medica WHERE id_paciente=:id_paciente";
		$rs = $cc->db->prepare($stSql);
		$params = self::getParams($nuevo);
		return $rs->execute($params);
	}
	public static function eliminar($nuevo){
		$cc=DB::getInstancia();
		$stSql = "DELETE FROM paciente WHERE id_paciente=:id_paciente";
		$rs = $cc->db->prepare($stSql);
		return $rs->execute(array('id_paciente'=>$nuevo->getId_paciente()));
	}
	public static function buscarAll() {
		$cc=DB::getInstancia();
		$stSql = "SELECT * FROM paciente ";
		$rs = $cc->db->prepare($stSql);
		$rs->execute();
		$c = $rs->fetchAll();
		$pila = array();
		foreach ($c as $ba) {
			$nuevo = new Paciente($ba['id_paciente'],$ba['id_persona'],$ba['condicion_medica']);
			array_push($pila, $nuevo);
		}
		return $pila; 
	}
	public static function contador() {
		$cc=DB::getInstancia();
		$stSql = "SELECT * FROM paciente";
		$rs = $cc->db->prepare($stSql);
		$rs->execute();
		$cont = count($rs->fetchAll());
		return $cont; 
	}
	public static function getParams($nuevo){
		$params = array();
		$params['id_paciente'] = $nuevo->getId_paciente();
		$params['id_persona'] = $nuevo->getId_persona();
		$params['condicion_medica'] = $nuevo->getCondicion_medica();
		return $params;
	}
	public static function getParamsAuto($nuevo){
		$params = array();
		$params['id_persona'] = $nuevo->getId_persona();
		$params['condicion_medica'] = $nuevo->getCondicion_medica();
		return $params;
	}
}