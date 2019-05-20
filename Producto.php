<?php
if (!isset($rootDir)) $rootDir = $_SERVER['DOCUMENT_ROOT'];
require_once($rootDir . "/DB/DB.php");
require_once($rootDir . "/Modelo/Evento.php");

class ProductoDAO {
    public static function lastValue(){
        $cc = DB::getInstancia();
        $stSql = "SELECT * FROM evento order by id_evento desc  limit 1";
        $rs = $cc->db->prepare($stSql);
        $rs->execute();
        $ba = $rs->fetch();      
      
        $nuevo = new Evento($ba['id_evento'],
                                $ba['nombre'],
                                $ba['fecha'],
                                $ba['hora'],
                                $ba['descripcion'],
                                $ba['id_tipo_e'],                                
                                $ba['id_estado'],
                                $ba['rut'],                                
                                $ba['id_sede'],
                                $ba['lider'],
                                $ba['telefono'],      
                                $ba['correo'],                            
                                $ba['fecha_inicio'],      
                                $ba['fecha_termino'], 
                                $ba['publico'],
                                $ba['activo']);                                
        if(empty($nuevo)){
            $num= 0;
        }else{
            $num = $nuevo->getId_evento();
        }
        return $num;       
    }
    
    //  #1 
    public static function buscar($id){
        $cc = DB::getInstancia();
        $stSql = "SELECT * FROM evento WHERE id_evento=:id_evento";
        $rs = $cc->db->prepare($stSql);
        $rs->execute(array('id_evento' => $id));
        $ba = $rs->fetch();
        $nuevo = new Evento($ba['id_evento'],
        $ba['nombre'],
        $ba['fecha'],
        $ba['hora'],
        $ba['descripcion'],
        $ba['id_tipo_e'],                                
        $ba['id_estado'],
        $ba['rut'],                                
        $ba['id_sede'],
        $ba['lider'],
        $ba['telefono'],      
        $ba['correo'],                            
        $ba['fecha_inicio'],      
        $ba['fecha_termino'], 
        $ba['publico'],
        $ba['activo']);
        return $nuevo;        
    }  
    
    //  #2
    public static function agregar($nuevo) {
        $cc=DB::getInstancia();
        $stSql = "INSERT INTO evento VALUES ";
        $stSql .= "(:id_evento, :nombre, :fecha, :hora, :descripcion, :id_tipo_e, :id_estado, :rut, :id_sede, :lider, :telefono, :correo,:fecha_inicio,:publico,:fecha_termino :activo)";
        $rs = $cc->db->prepare($stSql);
        $params = self::getParams($nuevo);
        return $rs->execute($params);
    }
    
    //  #2.1
    public static function agregarAutoTermino($nuevo) {
        $cc=DB::getInstancia();
        $stSql = "INSERT INTO evento(nombre,fecha,hora,descripcion,id_tipo_e,id_estado,rut,id_sede,lider,telefono,correo,fecha_inicio,fecha_termino,publico,activo) VALUES ";
        $stSql .= "(:nombre,:fecha,:hora,:descripcion,:id_tipo_e,:id_estado,:rut,:id_sede,:lider,:telefono,:correo,:fecha_inicio,:fecha_termino,:publico,:activo)";
        $rs = $cc->db->prepare($stSql);
        $params = self::getParamsAutoTermino($nuevo);
        return $rs->execute($params);
    }

    public static function agregarAutoSimple($nuevo) {
        $cc=DB::getInstancia();
        $stSql = "INSERT INTO evento(nombre,fecha,hora,descripcion,id_tipo_e,id_estado,rut,id_sede,lider,telefono,correo,fecha_inicio,publico,activo) VALUES ";
        $stSql .= "(:nombre,:fecha,:hora,:descripcion,:id_tipo_e,:id_estado,:rut,:id_sede,:lider,:telefono,:correo,:fecha_inicio,:publico,:activo)";
        $rs = $cc->db->prepare($stSql);
        $params = self::getParamsAutoSimple($nuevo);
        return $rs->execute($params);
    }
    //  #3
    
    public static function actualizarTerminado($nuevo) {
        $cc=DB::getInstancia();
        $stSql = "UPDATE evento SET "
                . "nombre=:nombre," 
                . "fecha=:fecha,"
                . "hora=:hora,"
                . "descripcion=:descripcion,"
                . "id_tipo_e=:id_tipo_e,"
                . "id_estado=:id_estado,"
                . "rut=:rut,"
                . "id_sede=:id_sede,"
                . "lider=:lider,"
                . "telefono=:telefono," 
                . "correo=:correo, "  
                . "fecha_inicio=:fecha_inicio," 
                . "fecha_termino=:fecha_termino," 
                . "publico=:publico," 
                . "activo=:activo"
                . " WHERE id_evento=:id_evento";
        $rs = $cc->db->prepare($stSql);
        $params = self::getParamsActualizarTermino($nuevo);      
        return $rs->execute($params);        
    }
    public static function getParamsActualizarTermino($nuevo){
        $params = array();      
        $params['id_evento'] = $nuevo->getId_evento();  
        $params['nombre'] = $nuevo->getNombre();
        $params['fecha'] = $nuevo->getFecha();
        $params['hora'] = $nuevo->getHora();
        $params['descripcion'] = $nuevo->getDescripcion();
        $params['lider'] = $nuevo->getLider();
        $params['id_tipo_e'] = $nuevo->getId_tipo_e();        
        $params['id_sede'] = $nuevo->getId_sede();
        $params['id_estado'] = $nuevo->getId_estado();
        $params['rut'] = $nuevo->getRut();
        $params['telefono'] = $nuevo->getTelefono();
        $params['correo'] = $nuevo->getCorreo(); 
        $params['publico'] = $nuevo->getPublico();
        $params['fecha_inicio'] = $nuevo->getFecha_inicio();
        $params['fecha_termino'] = $nuevo->getFecha_termino();
        $params['activo'] = $nuevo->getActivo();
        return $params;
    }

    public static function getParamsAutoTermino($nuevo){
        $params = array();      
        $params['nombre'] = $nuevo->getNombre();
        $params['fecha'] = $nuevo->getFecha();
        $params['hora'] = $nuevo->getHora();
        $params['descripcion'] = $nuevo->getDescripcion();
        $params['lider'] = $nuevo->getLider();
        $params['id_tipo_e'] = $nuevo->getId_tipo_e();        
        $params['id_sede'] = $nuevo->getId_sede();
        $params['id_estado'] = $nuevo->getId_estado();
        $params['rut'] = $nuevo->getRut();
        $params['telefono'] = $nuevo->getTelefono();
        $params['correo'] = $nuevo->getCorreo();
        $params['fecha_inicio'] = $nuevo->getFecha_inicio();
        $params['fecha_termino'] = $nuevo->getFecha_termino();
        $params['publico'] = $nuevo->getPublico();
        $params['activo'] = $nuevo->getActivo();
        return $params;
    }


     
    public static function actualizarSimple($nuevo) {
        $cc=DB::getInstancia();
        $stSql = "UPDATE evento SET "
                . "nombre=:nombre," 
                . "fecha=:fecha,"
                . "hora=:hora,"
                . "descripcion=:descripcion,"
                . "id_tipo_e=:id_tipo_e,"
                . "id_estado=:id_estado,"
                . "rut=:rut,"
                . "id_sede=:id_sede,"
                . "lider=:lider,"
                . "telefono=:telefono," 
                . "correo=:correo, "  
                . "fecha_inicio=:fecha_inicio,"   
                . "publico=:publico,"
                . "activo=:activo"
                . " WHERE id_evento=:id_evento";
        $rs = $cc->db->prepare($stSql);
        $params = self::getParamsActualizarSimple($nuevo);      
        return $rs->execute($params);        
    }
      
    public static function getParamsActualizarSimple($nuevo){
        $params = array();       
        $params['id_evento'] = $nuevo->getId_evento(); 
        $params['nombre'] = $nuevo->getNombre();
        $params['fecha'] = $nuevo->getFecha();
        $params['hora'] = $nuevo->getHora();
        $params['descripcion'] = $nuevo->getDescripcion();
        $params['lider'] = $nuevo->getLider();
        $params['id_tipo_e'] = $nuevo->getId_tipo_e();        
        $params['id_sede'] = $nuevo->getId_sede();
        $params['id_estado'] = $nuevo->getId_estado();
        $params['rut'] = $nuevo->getRut();
        $params['telefono'] = $nuevo->getTelefono();
        $params['correo'] = $nuevo->getCorreo();
        $params['fecha_inicio'] = $nuevo->getFecha_inicio();  
        $params['publico'] = $nuevo->getPublico();
        $params['activo'] = $nuevo->getActivo();
        return $params;
    }

    public static function getParamsAutoSimple($nuevo){
        $params = array();        
        $params['nombre'] = $nuevo->getNombre();
        $params['fecha'] = $nuevo->getFecha();
        $params['hora'] = $nuevo->getHora();
        $params['descripcion'] = $nuevo->getDescripcion();
        $params['lider'] = $nuevo->getLider();
        $params['id_tipo_e'] = $nuevo->getId_tipo_e();        
        $params['id_sede'] = $nuevo->getId_sede();
        $params['id_estado'] = $nuevo->getId_estado();
        $params['rut'] = $nuevo->getRut();
        $params['telefono'] = $nuevo->getTelefono();
        $params['correo'] = $nuevo->getCorreo();
        $params['publico'] = $nuevo->getPublico();
        $params['fecha_inicio'] = $nuevo->getFecha_inicio();
        $params['activo'] = $nuevo->getActivo();
        return $params;
    }
    

    public static function desactivar($nuevo) {
        $cc=DB::getInstancia();
        $stSql = "UPDATE evento SET "
                . "activo=:activo"
                . " WHERE id_evento=:id_evento";
        $rs = $cc->db->prepare($stSql);
        $params = self::getParamsDesactivar($nuevo);      
        return $rs->execute($params);        
    }
    public static function getParamsDesactivar($nuevo){
        $params = array();
        $params['id_evento'] = $nuevo->getId_evento();
        $params['activo'] = $nuevo->getActivo();
        return $params;
    }

    public static function activarPublico($nuevo) {
        $cc=DB::getInstancia();
        $stSql = "UPDATE evento SET "
                . "publico=:publico"
                . " WHERE id_evento=:id_evento";
        $rs = $cc->db->prepare($stSql);
        $params = self::getParamsPublico($nuevo);      
        return $rs->execute($params);        
    }
    public static function getParamsPublico($nuevo){
        $params = array();
        $params['id_evento'] = $nuevo->getId_evento();
        $params['publico'] = $nuevo->getPublico();
        return $params;
    }
    //  #4
    public static function eliminar($nuevo) {
        $cc=DB::getInstancia();
        $stSql = "DELETE FROM evento WHERE id_evento=:id_evento";
        $rs = $cc->db->prepare($stSql);
        $rs->execute(array("id_evento"=>$nuevo->getId_evento()));
    }
    
    //  #5
    public static function getParams($nuevo){
        $params = array();
        $params['id_evento'] = $nuevo->getId_evento();
        $params['nombre'] = $nuevo->getNombre();
        $params['fecha'] = $nuevo->getFecha();
        $params['hora'] = $nuevo->getHora();
        $params['descripcion'] = $nuevo->getDescripcion();
        $params['lider'] = $nuevo->getLider();
        $params['id_tipo_e'] = $nuevo->getId_tipo_e();        
        $params['id_sede'] = $nuevo->getId_sede();
        $params['id_estado'] = $nuevo->getId_estado();
        $params['rut'] = $nuevo->getRut();
        $params['telefono'] = $nuevo->getTelefono();
        $params['correo'] = $nuevo->getCorreo();   
        $params['publico'] = $nuevo->getPublico();       
        $params['fecha_inicio'] = $nuevo->getFecha_inicio();
        $params['fecha_termino'] = $nuevo->getFecha_termino();
        $params['activo'] = $nuevo->getActivo();
        return $params;
    }
    // #6
    public static function readAll() { 
        $cc = DB::getInstancia();
        $stSql = "SELECT * FROM evento where activo=1";
        $rs = $cc->db->prepare($stSql);
        $rs->execute();
        $c = $rs->fetchAll();
        
        $pila = array();
        foreach ($c as $ba) {
            $nuevo = new Evento($ba['id_evento'],
                                $ba['nombre'],
                                $ba['fecha'],
                                $ba['hora'],
                                $ba['descripcion'],
                                $ba['id_tipo_e'],                                
                                $ba['id_estado'],
                                $ba['rut'],                                
                                $ba['id_sede'],
                                $ba['lider'],
                                $ba['telefono'],      
                                $ba['correo'],        
                                $ba['fecha_inicio'],      
                                $ba['fecha_termino'], 
                                $ba['publico'],
                                $ba['activo']);
            array_push($pila, $nuevo);
        }
        return $pila;
    }

    public static function todoEventos($id_tipo_e) { 
        $cc = DB::getInstancia();
        $stSql = "SELECT * FROM evento where activo=1 and id_tipo_e=:id_tipo_e";
        $rs = $cc->db->prepare($stSql);
        $rs->execute(array("id_tipo_e" => $id_tipo_e));
        $c = $rs->fetchAll();
        
        $pila = array();
        foreach ($c as $ba) {
            $nuevo = new Evento($ba['id_evento'],
                                $ba['nombre'],
                                $ba['fecha'],
                                $ba['hora'],
                                $ba['descripcion'],
                                $ba['id_tipo_e'],                                
                                $ba['id_estado'],
                                $ba['rut'],                                
                                $ba['id_sede'],
                                $ba['lider'],
                                $ba['telefono'],      
                                $ba['correo'],        
                                $ba['fecha_inicio'],      
                                $ba['fecha_termino'],
                                $ba['publico'],
                                $ba['activo']);
            array_push($pila, $nuevo);
        }
        return $pila;
    }

    public static function readAllSede($sede) { 
        $cc = DB::getInstancia();
        $stSql = "SELECT * FROM evento where activo=1 and id_sede=:id_sede";
        $rs = $cc->db->prepare($stSql);
        $rs->execute(array("id_sede" => $sede));
        $c = $rs->fetchAll();
        
        $pila = array();
        foreach ($c as $ba) {
            $nuevo = new Evento($ba['id_evento'],
                                $ba['nombre'],
                                $ba['fecha'],
                                $ba['hora'],
                                $ba['descripcion'],
                                $ba['id_tipo_e'],                                
                                $ba['id_estado'],
                                $ba['rut'],                                
                                $ba['id_sede'],
                                $ba['lider'],
                                $ba['telefono'],      
                                $ba['correo'],        
                                $ba['fecha_inicio'],      
                                $ba['fecha_termino'],
                                $ba['publico'],
                                $ba['activo']);
            array_push($pila, $nuevo);
        }
        return $pila;
    }

    public static function largo() { 
        $cc = DB::getInstancia();
        $stSql = "SELECT * FROM evento where activo=1";
        $rs = $cc->db->prepare($stSql);
        $rs->execute();
        $c = $rs->fetchAll();
        
        $count = 0;
        foreach ($c as $ba) {
            $count = $count +1 ;
        }
        return $count;
    }

    public static function largoEstado($id_e) { 
        $cc = DB::getInstancia();
        $stSql = "SELECT * FROM evento where activo=1 and id_tipo_e=:id_tipo_e";
        $rs = $cc->db->prepare($stSql);
        $rs->execute(array("id_tipo_e" => $id_e));
        $c = $rs->fetchAll();        
        $count = 0;
        foreach ($c as $ba) {
            $count = $count +1 ;
        }
        return $count;
    }
}
