<html>
	<head>
		<title>Consultas por nombre</title>
	<body>
		<form action="consulta.php" method="GET">
			Nombre:
			<input type="text" name="nombre">
			<input type="submit" value="consultar">
		</form>

		<!--Script php que recibe variables-->
		<?php
		
			$nombre= $_GET['nombre'];

			#Datos para la conexion a la base de datos
			$conn = @mysql_connect('127.0.0.1','root','');
			if(!$conn)
			{
			die('could not connect: ' . mysql_error());
			}
			mysql_select_db('cbta',$conn);

			$sql = "SELECT * FROM justificantes WHERE nombre = '$nombre'";
			$res = mysql_query($sql);
			if($res)
			{
				echo " consulta exitosa";
				while ($row= mysql_fetch_assoc($res))
				{
					
					echo  $row['id'];
					echo  $row['nombre'];
					echo  $row['carrera'];
					echo  $row['matricula'];
					echo  $row['fecha'];						 
					echo  $row['fecha'];
				    echo  $row['concepto'];
				    echo  $row['importe'];
					echo  $row['cantidad'];
					echo  $row['total'];
				}
			}
		
		?>
	</body>
</html>