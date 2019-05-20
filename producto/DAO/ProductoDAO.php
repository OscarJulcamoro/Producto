<?php

require_once("./DB.php");
require_once("./Modelo/Producto.php");

class ProductoDAO {
    
    //  #1 
    public static function buscar($code){
        $cc = DB::getInstancia();
        $stSql = "SELECT * FROM producto WHERE codigo=:c";
        $rs = $cc->db->prepare($stSql);
        $rs->execute(array('c' => $code));
        $ba = $rs->fetch(); 
        $nuevo = new Producto($ba['codigo'],
                            $ba['producto'],
                            $ba['fabricante'],
                            $ba['precio']);
        return $nuevo;        
    }  

    public static function buscarJson($code){
        $cc = DB::getInstancia();
        $stSql = "SELECT * FROM producto WHERE codigo=:c";
        $rs = $cc->db->prepare($stSql);
        $rs->execute(array('c' => $code));
        $ba = $rs->fetch();     
        return $ba;        
    }  

    //  #2
    public static function agregar($nuevo) {
        $cc=DB::getInstancia();
        $stSql = "INSERT INTO producto VALUES ";
        $stSql .= "(:codigo, :producto, :fabricante, :precio)";
        $rs = $cc->db->prepare($stSql);
        $params = self::getParams($nuevo);
        return $rs->execute($params);
    }

    public static function getParams($nuevo){
        $params = array();      
        $params['codigo'] = $nuevo->getCodigo();  
        $params['producto'] = $nuevo->getProducto();
        $params['fabricante'] = $nuevo->getFabricante();
        $params['precio'] = $nuevo->getPrecio();
        return $params;
    }
    
    public static function actualizarTerminado($nuevo) {
        $cc=DB::getInstancia();
        $stSql = "UPDATE producto SET "
                . "fabricante=:fabricante," 
                . "producto=:producto,"
                . "precio=:precio,"
                . " WHERE codigo=:codigo";
        $rs = $cc->db->prepare($stSql);
        $params = self::getParams($nuevo);      
        return $rs->execute($params);        
    }
      
    public static function eliminar($nuevo) {
        $cc=DB::getInstancia();
        $stSql = "DELETE FROM producto WHERE codigo=:codigo";
        $rs = $cc->db->prepare($stSql);
        $rs->execute(array("codigo"=>$nuevo->getCodigo()));
        return $rs;
    }    
 
    public static function readAll() { 
        $cc = DB::getInstancia();
        $stSql = "SELECT * FROM producto";
        $rs = $cc->db->prepare($stSql);
        $rs->execute();
        $c = $rs->fetchAll();
        
        $pila = array();
        foreach ($c as $ba) {
            $nuevo = new Producto($ba['codigo'],
                        $ba['producto'],
                        $ba['fabricante'],
                        $ba['precio']);
            array_push($pila, $nuevo);
        }
        return $pila;
    }

     
    public static function readAllJson() { 
        $cc = DB::getInstancia();
        $stSql = "SELECT * FROM producto";
        $rs = $cc->db->prepare($stSql);
        $rs->execute();
        $c = $rs->fetchAll();   
        return $c;
    }

}
