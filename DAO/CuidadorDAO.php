<?php 
if (!isset($rootDir)){
	$rootDir = $_SERVER['DOCUMENT_ROOT'];
}
require_once ($rootDir ."/DB/DB.php");
require_once ($rootDir ."/Modelo/Cuidador.php");
class CuidadorDAO {
	public static function agregar($nuevo) {
		$cc=DB::getInstancia();
		$stSql = "INSERT INTO cuidador (id_cuidador,id_persona) VALUES(:id_cuidador,:id_persona)";
		$rs = $cc->db->prepare($stSql);
		$params = self::getParams($nuevo);
		return $rs->execute($params);
	}
	public static function agregarAuto($nuevo) {
		$cc=DB::getInstancia();
		$stSql = "INSERT INTO cuidador (id_persona) VALUES(:id_persona)";
		$rs = $cc->db->prepare($stSql);
		$params=self::getParamsAuto($nuevo);
		return $rs->execute($params);
	}
	public static function buscar($id) {
		$cc=DB::getInstancia();
		$stSql = "SELECT * FROM cuidador WHERE id_cuidador=:id_cuidador";
		$rs = $cc->db->prepare($stSql);
		$rs->execute(array('id_cuidador' => $id));
		$ba = $rs->fetch();
		$nuevo = new Cuidador($ba['id_cuidador'],$ba['id_persona']);
		return $nuevo; 
	}
	public static function actualizar($nuevo) {
		$cc=DB::getInstancia();
		$stSql = "UPDATE cuidador SET id_persona=:id_persona WHERE id_cuidador=:id_cuidador";
		$rs = $cc->db->prepare($stSql);
		$params = self::getParams($nuevo);
		return $rs->execute($params);
	}
	public static function eliminar($nuevo){
		$cc=DB::getInstancia();
		$stSql = "DELETE FROM cuidador WHERE id_cuidador=:id_cuidador";
		$rs = $cc->db->prepare($stSql);
		return $rs->execute(array('id_cuidador'=>$nuevo->getId_cuidador()));
	}
	public static function buscarAll() {
		$cc=DB::getInstancia();
		$stSql = "SELECT * FROM cuidador ";
		$rs = $cc->db->prepare($stSql);
		$rs->execute();
		$c = $rs->fetchAll();
		$pila = array();
		foreach ($c as $ba) {
			$nuevo = new Cuidador($ba['id_cuidador'],$ba['id_persona']);
			array_push($pila, $nuevo);
		}
		return $pila; 
	}
	public static function contador() {
		$cc=DB::getInstancia();
		$stSql = "SELECT * FROM cuidador";
		$rs = $cc->db->prepare($stSql);
		$rs->execute();
		$cont = count($rs->fetchAll());
		return $cont; 
	}
	public static function getParams($nuevo){
		$params = array();
		$params['id_cuidador'] = $nuevo->getId_cuidador();
		$params['id_persona'] = $nuevo->getId_persona();
		return $params;
	}
	public static function getParamsAuto($nuevo){
		$params = array();
		$params['id_persona'] = $nuevo->getId_persona();
		return $params;
	}
}