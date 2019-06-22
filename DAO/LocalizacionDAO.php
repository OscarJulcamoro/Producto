<?php 
if (!isset($rootDir)){
	$rootDir = $_SERVER['DOCUMENT_ROOT'];
}
require_once ($rootDir ."/DB/DB.php");
require_once ($rootDir ."/Modelo/Localizacion.php");
class LocalizacionDAO {
	public static function agregar($nuevo) {
		$cc=DB::getInstancia();
		$stSql = "INSERT INTO localizacion (id_localizacion,id_paciente,fecha_localizacion,codigo,longitud,latitud,activo) VALUES(:id_localizacion,:id_paciente,:fecha_localizacion,:codigo,:longitud,:latitud,:activo)";
		$rs = $cc->db->prepare($stSql);
		$params = self::getParams($nuevo);
		return $rs->execute($params);
	}
	public static function agregarAuto($nuevo) {
		$cc=DB::getInstancia();
		$stSql = "INSERT INTO localizacion (id_paciente,fecha_localizacion,codigo,longitud,latitud,activo) VALUES(:id_paciente,:fecha_localizacion,:codigo,:longitud,:latitud,:activo)";
		$rs = $cc->db->prepare($stSql);
		$params=self::getParamsAuto($nuevo);
		return $rs->execute($params);
	}
	public static function buscar($id) {
		$cc=DB::getInstancia();
		$stSql = "SELECT * FROM localizacion WHERE id_localizacion=:id_localizacion";
		$rs = $cc->db->prepare($stSql);
		$rs->execute(array('id_localizacion' => $id));
		$ba = $rs->fetch();
		$nuevo = new Localizacion($ba['id_localizacion'],$ba['id_paciente'],$ba['fecha_localizacion'],$ba['codigo'],$ba['longitud'],$ba['latitud'],$ba['activo']);
		return $nuevo; 
	}
	public static function actualizar($nuevo) {
		$cc=DB::getInstancia();
		$stSql = "UPDATE localizacion SET id_paciente=:id_paciente,fecha_localizacion=:fecha_localizacion,codigo=:codigo,longitud=:longitud,latitud=:latitud,activo=:activo WHERE id_localizacion=:id_localizacion";
		$rs = $cc->db->prepare($stSql);
		$params = self::getParams($nuevo);
		return $rs->execute($params);
	}
	public static function eliminar($nuevo){
		$cc=DB::getInstancia();
		$stSql = "DELETE FROM localizacion WHERE id_localizacion=:id_localizacion";
		$rs = $cc->db->prepare($stSql);
		return $rs->execute(array('id_localizacion'=>$nuevo->getId_localizacion()));
	}
	public static function buscarAll() {
		$cc=DB::getInstancia();
		$stSql = "SELECT * FROM localizacion ";
		$rs = $cc->db->prepare($stSql);
		$rs->execute();
		$c = $rs->fetchAll();
		$pila = array();
		foreach ($c as $ba) {
			$nuevo = new Localizacion($ba['id_localizacion'],$ba['id_paciente'],$ba['fecha_localizacion'],$ba['codigo'],$ba['longitud'],$ba['latitud'],$ba['activo']);
			array_push($pila, $nuevo);
		}
		return $pila; 
	}
	public static function contador() {
		$cc=DB::getInstancia();
		$stSql = "SELECT * FROM localizacion";
		$rs = $cc->db->prepare($stSql);
		$rs->execute();
		$cont = count($rs->fetchAll());
		return $cont; 
	}
	public static function getParams($nuevo){
		$params = array();
		$params['id_localizacion'] = $nuevo->getId_localizacion();
		$params['id_paciente'] = $nuevo->getId_paciente();
		$params['fecha_localizacion'] = $nuevo->getFecha_localizacion();
		$params['codigo'] = $nuevo->getCodigo();
		$params['longitud'] = $nuevo->getLongitud();
		$params['latitud'] = $nuevo->getLatitud();
		$params['activo'] = $nuevo->getActivo();
		return $params;
	}
	public static function getParamsAuto($nuevo){
		$params = array();
		$params['id_paciente'] = $nuevo->getId_paciente();
		$params['fecha_localizacion'] = $nuevo->getFecha_localizacion();
		$params['codigo'] = $nuevo->getCodigo();
		$params['longitud'] = $nuevo->getLongitud();
		$params['latitud'] = $nuevo->getLatitud();
		$params['activo'] = $nuevo->getActivo();
		return $params;
	}
}