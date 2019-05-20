<?php 

require_once("DAO/ProductoDAO.php");

if(isset($_GET['opc'])){
    $opcion = htmlspecialchars($_GET['opc']);

    if($opcion==1){
        //CREAR

        if(isset($_GET['codigo']) && isset($_GET['producto']) && isset($_GET['fabricante']) && isset($_GET['precio'])  ){

            $codigo = htmlspecialchars($_GET['codigo']);
            $producto = htmlspecialchars($_GET['producto']);
            $fabricante = htmlspecialchars($_GET['fabricante']);
            $precio = htmlspecialchars($_GET['precio']);

            $p = new Producto($codigo,$producto,$fabricante,$precio);
            $e = ProductoDAO::agregar($p);

            if($e){
                header('Content-type: application/json');
                echo 1;
            }else{
                header('Content-type: application/json');
                echo -1;
            }   
        }else{
            header('Content-type: application/json');
            echo -2;
        }

    }

    if($opcion==2){
        //Eliminar
    }

    if($opcion==3){
        //BUSCAR
        if(isset($_GET['codigo'])){
            $codigo = htmlspecialchars($_GET['codigo']);
            $e = ProductoDAO::buscar($codigo);
            // header('Content-type: application/json');
            echo $e->getPrecio();
        }
    }
    if($opcion==4){
        //BUSCAR JSON
        if(isset($_GET['codigo'])){
            $codigo = htmlspecialchars($_GET['codigo']);
            $e = ProductoDAO::buscarJson($codigo);
            header('Content-type: application/json');
            $json = json_encode($e);
            echo $json;
        }
    }

    if($opcion==5){           
        $e = ProductoDAO::readAllJson();
        header('Content-type: application/json');
        // $json = json_encode(array("producto" => $e));
        $json = json_encode($e);
        echo $json;
        
    }
    
}


if(isset($_GET['codigo'])){
    $codigo=htmlspecialchars($_GET['codigo']);



}






