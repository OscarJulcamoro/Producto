<?php 
if (!isset($rootDir)){
	$rootDir = $_SERVER['DOCUMENT_ROOT'];
}
require_once ($rootDir ."/DB/DB.php");
require_once ($rootDir ."/Modelo/Parentezco.php");
class ParentezcoDAO {
	public static function agregar($nuevo) {
		$cc=DB::getInstancia();
		$stSql = "INSERT INTO parentezco (id_parentezco,nombre_parentezco) VALUES(:id_parentezco,:nombre_parentezco)";
		$rs = $cc->db->prepare($stSql);
		$params = self::getParams($nuevo);
		return $rs->execute($params);
	}
	public static function agregarAuto($nuevo) {
		$cc=DB::getInstancia();
		$stSql = "INSERT INTO parentezco (nombre_parentezco) VALUES(:nombre_parentezco)";
		$rs = $cc->db->prepare($stSql);
		$params=self::getParamsAuto($nuevo);
		return $rs->execute($params);
	}
	public static function buscar($id) {
		$cc=DB::getInstancia();
		$stSql = "SELECT * FROM parentezco WHERE id_parentezco=:id_parentezco";
		$rs = $cc->db->prepare($stSql);
		$rs->execute(array('id_parentezco' => $id));
		$ba = $rs->fetch();
		$nuevo = new Parentezco($ba['id_parentezco'],$ba['nombre_parentezco']);
		return $nuevo; 
	}
	public static function actualizar($nuevo) {
		$cc=DB::getInstancia();
		$stSql = "UPDATE parentezco SET nombre_parentezco=:nombre_parentezco WHERE id_parentezco=:id_parentezco";
		$rs = $cc->db->prepare($stSql);
		$params = self::getParams($nuevo);
		return $rs->execute($params);
	}
	public static function eliminar($nuevo){
		$cc=DB::getInstancia();
		$stSql = "DELETE FROM parentezco WHERE id_parentezco=:id_parentezco";
		$rs = $cc->db->prepare($stSql);
		return $rs->execute(array('id_parentezco'=>$nuevo->getId_parentezco()));
	}
	public static function buscarAll() {
		$cc=DB::getInstancia();
		$stSql = "SELECT * FROM parentezco ";
		$rs = $cc->db->prepare($stSql);
		$rs->execute();
		$c = $rs->fetchAll();
		$pila = array();
		foreach ($c as $ba) {
			$nuevo = new Parentezco($ba['id_parentezco'],$ba['nombre_parentezco']);
			array_push($pila, $nuevo);
		}
		return $pila; 
	}
	public static function contador() {
		$cc=DB::getInstancia();
		$stSql = "SELECT * FROM parentezco";
		$rs = $cc->db->prepare($stSql);
		$rs->execute();
		$cont = count($rs->fetchAll());
		return $cont; 
	}
	public static function getParams($nuevo){
		$params = array();
		$params['id_parentezco'] = $nuevo->getId_parentezco();
		$params['nombre_parentezco'] = $nuevo->getNombre_parentezco();
		return $params;
	}
	public static function getParamsAuto($nuevo){
		$params = array();
		$params['nombre_parentezco'] = $nuevo->getNombre_parentezco();
		return $params;
	}
}