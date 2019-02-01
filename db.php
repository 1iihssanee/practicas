<?php

$servidor = "localhost";
$usuario= "mensageria";
$password = "mensageria";
$base_datos = "mensageria";



$conexion = new mysqli($servidor, $usuario, $password, $base_datos);


function formatearFecha($fecha){
	return date('g:i a', strtotime($fecha));
}


?>