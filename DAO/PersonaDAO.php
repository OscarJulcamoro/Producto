<?php 
if (!isset($rootDir)){
	$rootDir = $_SERVER['DOCUMENT_ROOT'];
}
require_once ($rootDir ."/DB/DB.php");
require_once ($rootDir ."/Modelo/Persona.php");
class PersonaDAO {
	public static function agregar($nuevo) {
		$cc=DB::getInstancia();
		$stSql = "INSERT INTO persona (id_persona,rut,nombres,apellidos,username,password,telefono,correo,id_tipo_usuario,activo) VALUES(:id_persona,:rut,:nombres,:apellidos,:username,:password,:telefono,:correo,:id_tipo_usuario,:activo)";
		$rs = $cc->db->prepare($stSql);
		$params = self::getParams($nuevo);
		return $rs->execute($params);
	}
	public static function agregarAuto($nuevo) {
		$cc=DB::getInstancia();
		$stSql = "INSERT INTO persona (rut,nombres,apellidos,username,password,telefono,correo,id_tipo_usuario,activo) VALUES(:rut,:nombres,:apellidos,:username,:password,:telefono,:correo,:id_tipo_usuario,:activo)";
		$rs = $cc->db->prepare($stSql);
		$params=self::getParamsAuto($nuevo);
		return $rs->execute($params);
	}
	public static function buscar($id) {
		$cc=DB::getInstancia();
		$stSql = "SELECT * FROM persona WHERE id_persona=:id_persona";
		$rs = $cc->db->prepare($stSql);
		$rs->execute(array('id_persona' => $id));
		$ba = $rs->fetch();
		$nuevo = new Persona($ba['id_persona'],$ba['rut'],$ba['nombres'],$ba['apellidos'],$ba['username'],$ba['password'],$ba['telefono'],$ba['correo'],$ba['id_tipo_usuario'],$ba['activo']);
		return $nuevo; 
	}
	public static function actualizar($nuevo) {
		$cc=DB::getInstancia();
		$stSql = "UPDATE persona SET rut=:rut,nombres=:nombres,apellidos=:apellidos,username=:username,password=:password,telefono=:telefono,correo=:correo,id_tipo_usuario=:id_tipo_usuario,activo=:activo WHERE id_persona=:id_persona";
		$rs = $cc->db->prepare($stSql);
		$params = self::getParams($nuevo);
		return $rs->execute($params);
	}
	public static function eliminar($nuevo){
		$cc=DB::getInstancia();
		$stSql = "DELETE FROM persona WHERE id_persona=:id_persona";
		$rs = $cc->db->prepare($stSql);
		return $rs->execute(array('id_persona'=>$nuevo->getId_persona()));
	}
	public static function buscarAll() {
		$cc=DB::getInstancia();
		$stSql = "SELECT * FROM persona ";
		$rs = $cc->db->prepare($stSql);
		$rs->execute();
		$c = $rs->fetchAll();
		$pila = array();
		foreach ($c as $ba) {
			$nuevo = new Persona($ba['id_persona'],$ba['rut'],$ba['nombres'],$ba['apellidos'],$ba['username'],$ba['password'],$ba['telefono'],$ba['correo'],$ba['id_tipo_usuario'],$ba['activo']);
			array_push($pila, $nuevo);
		}
		return $pila; 
	}
	public static function contador() {
		$cc=DB::getInstancia();
		$stSql = "SELECT * FROM persona";
		$rs = $cc->db->prepare($stSql);
		$rs->execute();
		$cont = count($rs->fetchAll());
		return $cont; 
	}
	public static function getParams($nuevo){
		$params = array();
		$params['id_persona'] = $nuevo->getId_persona();
		$params['rut'] = $nuevo->getRut();
		$params['nombres'] = $nuevo->getNombres();
		$params['apellidos'] = $nuevo->getApellidos();
		$params['username'] = $nuevo->getUsername();
		$params['password'] = $nuevo->getPassword();
		$params['telefono'] = $nuevo->getTelefono();
		$params['correo'] = $nuevo->getCorreo();
		$params['id_tipo_usuario'] = $nuevo->getId_tipo_usuario();
		$params['activo'] = $nuevo->getActivo();
		return $params;
	}
	public static function getParamsAuto($nuevo){
		$params = array();
		$params['rut'] = $nuevo->getRut();
		$params['nombres'] = $nuevo->getNombres();
		$params['apellidos'] = $nuevo->getApellidos();
		$params['username'] = $nuevo->getUsername();
		$params['password'] = $nuevo->getPassword();
		$params['telefono'] = $nuevo->getTelefono();
		$params['correo'] = $nuevo->getCorreo();
		$params['id_tipo_usuario'] = $nuevo->getId_tipo_usuario();
		$params['activo'] = $nuevo->getActivo();
		return $params;
	}
}