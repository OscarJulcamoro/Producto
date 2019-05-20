<?php

$hostname='localhost';
$database='producto_bd';
$username='root';
$password='';

$conexion=new mysqli($hostname,$username,$password,$database);
if($conexion->connect_errno)
{
	echo"lo sentimos, el sitio esta en mantenimiento"
	}

?>