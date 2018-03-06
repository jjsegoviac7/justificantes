<?php

//function consulta(){

$hostname = 'localhost';
$database = 'cbta';
$username = 'root';
$password = '';


// Conexión con los datos del 'config.ini' 
$conexion = new mysqli($hostname,$username,$password ,$database); 

// Si la conexión falla, aparece el error 
if($conexion ->connect_errno) { 
 return 'Felpo'; 
} else {
 return 'conectado';
}
//}

?>