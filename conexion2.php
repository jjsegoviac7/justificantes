<?php 
	$servidor ='127.0.0.1';
	$usuario ='root';
	$pass ='';
	$bd ='cbta';

	$conn = @mysql_connect($servidor, $usuario, $pass);
	if (!$conn)
	{
		die('could not connect: '.mysql_error());
	}
	mysql_select_db($bd, $conn);


 ?>