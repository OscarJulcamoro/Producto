<?php 
if (!isset($rootDir)){
	$rootDir = $_SERVER['DOCUMENT_ROOT'];
}
require_once ($rootDir ."/DB/DB.php");
require_once ($rootDir ."/Modelo/Detalle_paciente_cuidador.php");
class Detalle_paciente_cuidadorDAO {
	public static function agregar($nuevo) {
		$cc=DB::getInstancia();
		$stSql = "INSERT INTO detalle_paciente_cuidador (id_detalle_pa_cu,id_cuidador,id_paciente,id_parentezco,fecha,activo) VALUES(:id_detalle_pa_cu,:id_cuidador,:id_paciente,:id_parentezco,:fecha,:activo)";
		$rs = $cc->db->prepare($stSql);
		$params = self::getParams($nuevo);
		return $rs->execute($params);
	}
	public static function agregarAuto($nuevo) {
		$cc=DB::getInstancia();
		$stSql = "INSERT INTO detalle_paciente_cuidador (id_cuidador,id_paciente,id_parentezco,fecha,activo) VALUES(:id_cuidador,:id_paciente,:id_parentezco,:fecha,:activo)";
		$rs = $cc->db->prepare($stSql);
		$params=self::getParamsAuto($nuevo);
		return $rs->execute($params);
	}
	public static function buscar($id) {
		$cc=DB::getInstancia();
		$stSql = "SELECT * FROM detalle_paciente_cuidador WHERE id_detalle_pa_cu=:id_detalle_pa_cu";
		$rs = $cc->db->prepare($stSql);
		$rs->execute(array('id_detalle_pa_cu' => $id));
		$ba = $rs->fetch();
		$nuevo = new Detalle_paciente_cuidador($ba['id_detalle_pa_cu'],$ba['id_cuidador'],$ba['id_paciente'],$ba['id_parentezco'],$ba['fecha'],$ba['activo']);
		return $nuevo; 
	}
	public static function actualizar($nuevo) {
		$cc=DB::getInstancia();
		$stSql = "UPDATE detalle_paciente_cuidador SET id_cuidador=:id_cuidador,id_paciente=:id_paciente,id_parentezco=:id_parentezco,fecha=:fecha,activo=:activo WHERE id_detalle_pa_cu=:id_detalle_pa_cu";
		$rs = $cc->db->prepare($stSql);
		$params = self::getParams($nuevo);
		return $rs->execute($params);
	}
	public static function eliminar($nuevo){
		$cc=DB::getInstancia();
		$stSql = "DELETE FROM detalle_paciente_cuidador WHERE id_detalle_pa_cu=:id_detalle_pa_cu";
		$rs = $cc->db->prepare($stSql);
		return $rs->execute(array('id_detalle_pa_cu'=>$nuevo->getId_detalle_pa_cu()));
	}
	public static function buscarAll() {
		$cc=DB::getInstancia();
		$stSql = "SELECT * FROM detalle_paciente_cuidador ";
		$rs = $cc->db->prepare($stSql);
		$rs->execute();
		$c = $rs->fetchAll();
		$pila = array();
		foreach ($c as $ba) {
			$nuevo = new Detalle_paciente_cuidador($ba['id_detalle_pa_cu'],$ba['id_cuidador'],$ba['id_paciente'],$ba['id_parentezco'],$ba['fecha'],$ba['activo']);
			array_push($pila, $nuevo);
		}
		return $pila; 
	}
	public static function contador() {
		$cc=DB::getInstancia();
		$stSql = "SELECT * FROM detalle_paciente_cuidador";
		$rs = $cc->db->prepare($stSql);
		$rs->execute();
		$cont = count($rs->fetchAll());
		return $cont; 
	}
	public static function getParams($nuevo){
		$params = array();
		$params['id_detalle_pa_cu'] = $nuevo->getId_detalle_pa_cu();
		$params['id_cuidador'] = $nuevo->getId_cuidador();
		$params['id_paciente'] = $nuevo->getId_paciente();
		$params['id_parentezco'] = $nuevo->getId_parentezco();
		$params['fecha'] = $nuevo->getFecha();
		$params['activo'] = $nuevo->getActivo();
		return $params;
	}
	public static function getParamsAuto($nuevo){
		$params = array();
		$params['id_cuidador'] = $nuevo->getId_cuidador();
		$params['id_paciente'] = $nuevo->getId_paciente();
		$params['id_parentezco'] = $nuevo->getId_parentezco();
		$params['fecha'] = $nuevo->getFecha();
		$params['activo'] = $nuevo->getActivo();
		return $params;
	}
}