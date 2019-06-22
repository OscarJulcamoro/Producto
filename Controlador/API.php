<?php
if (!isset($rootDir)){
	$rootDir = $_SERVER['DOCUMENT_ROOT'];
}
require_once($rootDir . "/DAO/LocalizacionDAO.php");

if(isset($_GET['code'])){
	$code=htmlspecialchars($_GET['code']);
	if($code=="12345"){
        $idP=htmlspecialchars($_GET['idp']);
        $lon=htmlspecialchars($_GET['lon']);
        $lat=htmlspecialchars($_GET['lat']);       
        $fecha = date("Y-m-d H:i:s");  
        // :id_paciente,:fecha_localizacion,:codigo,:longitud,:latitud,:activo
        $loca = new Localizacion(1,1,$fecha,$code,$lon,$lat,1);
        $activo = LocalizacionDAO::agregarAuto($loca);

        if($activo){
            header('Content-Type: application/json');
            echo json_encode(200);
           
        }else{
            header('Content-Type: application/json');
            echo json_encode(204);
        }

        // print_r($loca);
    }

	
}