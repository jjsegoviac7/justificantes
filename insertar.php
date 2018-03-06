<?php
	include 'conexion2.php';
	
	$fecha = $_POST['fecha'];
	$No_control= $_POST['No_control'];
	$nombre = $_POST['nombre'];
	$grupo = $_POST['grupo'];
	$f_inicio = $_POST['f_inicio'];
	$f_fin = $_POST['f_fin'];
	$hora_inicio = $_POST['hora_inicio'];
	$hora_fin = $_POST['hora_fin'];
	$motivo = $_POST['motivo'];
	


	
	
	
	$sql = "INSERT INTO 1er_semestre (No,fecha,No_control,nombre,grupo,f_inicio,f_fin,hora_inicio,hora_fin,motivo) 
	values (null,'$fecha','$No_control','$nombre','$grupo','$f_inicio','$f_fin','$hora_inicio','$hora_fin','$motivo')";
	$res = mysql_query($sql);
	if($res)
	{
		echo"<script>alert('Guardado exitoso');
                window.location.href=\"justificantes.html\"</script>";
	}
	else
	{
		die('error al guardar:' .mysql_error());
	}
	
?>