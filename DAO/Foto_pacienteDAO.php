<?php 
if (!isset($rootDir)){
	$rootDir = $_SERVER['DOCUMENT_ROOT'];
}
require_once ($rootDir ."/DB/DB.php");
require_once ($rootDir ."/Modelo/Foto_paciente.php");
class Foto_pacienteDAO {
	public static function agregar($nuevo) {
		$cc=DB::getInstancia();
		$stSql = "INSERT INTO foto_paciente (id_foto_paciente,id_paciente,nombre_foto) VALUES(:id_foto_paciente,:id_paciente,:nombre_foto)";
		$rs = $cc->db->prepare($stSql);
		$params = self::getParams($nuevo);
		return $rs->execute($params);
	}
	public static function agregarAuto($nuevo) {
		$cc=DB::getInstancia();
		$stSql = "INSERT INTO foto_paciente (id_paciente,nombre_foto) VALUES(:id_paciente,:nombre_foto)";
		$rs = $cc->db->prepare($stSql);
		$params=self::getParamsAuto($nuevo);
		return $rs->execute($params);
	}
	public static function buscar($id) {
		$cc=DB::getInstancia();
		$stSql = "SELECT * FROM foto_paciente WHERE id_foto_paciente=:id_foto_paciente";
		$rs = $cc->db->prepare($stSql);
		$rs->execute(array('id_foto_paciente' => $id));
		$ba = $rs->fetch();
		$nuevo = new Foto_paciente($ba['id_foto_paciente'],$ba['id_paciente'],$ba['nombre_foto']);
		return $nuevo; 
	}
	public static function actualizar($nuevo) {
		$cc=DB::getInstancia();
		$stSql = "UPDATE foto_paciente SET id_paciente=:id_paciente,nombre_foto=:nombre_foto WHERE id_foto_paciente=:id_foto_paciente";
		$rs = $cc->db->prepare($stSql);
		$params = self::getParams($nuevo);
		return $rs->execute($params);
	}
	public static function eliminar($nuevo){
		$cc=DB::getInstancia();
		$stSql = "DELETE FROM foto_paciente WHERE id_foto_paciente=:id_foto_paciente";
		$rs = $cc->db->prepare($stSql);
		return $rs->execute(array('id_foto_paciente'=>$nuevo->getId_foto_paciente()));
	}
	public static function buscarAll() {
		$cc=DB::getInstancia();
		$stSql = "SELECT * FROM foto_paciente ";
		$rs = $cc->db->prepare($stSql);
		$rs->execute();
		$c = $rs->fetchAll();
		$pila = array();
		foreach ($c as $ba) {
			$nuevo = new Foto_paciente($ba['id_foto_paciente'],$ba['id_paciente'],$ba['nombre_foto']);
			array_push($pila, $nuevo);
		}
		return $pila; 
	}
	public static function contador() {
		$cc=DB::getInstancia();
		$stSql = "SELECT * FROM foto_paciente";
		$rs = $cc->db->prepare($stSql);
		$rs->execute();
		$cont = count($rs->fetchAll());
		return $cont; 
	}
	public static function getParams($nuevo){
		$params = array();
		$params['id_foto_paciente'] = $nuevo->getId_foto_paciente();
		$params['id_paciente'] = $nuevo->getId_paciente();
		$params['nombre_foto'] = $nuevo->getNombre_foto();
		return $params;
	}
	public static function getParamsAuto($nuevo){
		$params = array();
		$params['id_paciente'] = $nuevo->getId_paciente();
		$params['nombre_foto'] = $nuevo->getNombre_foto();
		return $params;
	}
}