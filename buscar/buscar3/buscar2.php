<?php
//Archivo de conexión a la base de datos
require('conexion.php');


//Variable de búsqueda
$consultaBusqueda = $_POST['valorBusqueda'];

//Filtro anti-XSS
$caracteres_malos = array("<", ">", "\"", "'", "/", "<", ">", "'", "/");
$caracteres_buenos = array("& lt;", "& gt;", "& quot;", "& #x27;", "& #x2F;", "& #060;", "& #062;", "& #039;", "& #047;");
$consultaBusqueda = str_replace($caracteres_malos, $caracteres_buenos, $consultaBusqueda);

//Variable vacía (para evitar los E_NOTICE)
$mensaje = "";


//Comprueba si $consultaBusqueda está seteado
if (isset($consultaBusqueda)) {

	//Selecciona todo de la tabla mmv001 
	//donde el nombre sea igual a $consultaBusqueda, 
	//o el apellido sea igual a $consultaBusqueda, 
	//o $consultaBusqueda sea igual a nombre + (espacio) + apellido
	$consulta = mysqli_query($conexion, "SELECT * FROM mmv001
	WHERE nombre COLLATE UTF8_SPANISH_CI LIKE '%$consultaBusqueda%' 
	OR apellido COLLATE UTF8_SPANISH_CI LIKE '%$consultaBusqueda%'
	OR edad LIKE '%$consultaBusqueda%'
	OR CONCAT(nombre,' ',apellido) COLLATE UTF8_SPANISH_CI LIKE '%$consultaBusqueda%'
	");

	//Obtiene la cantidad de filas que hay en la consulta
	$filas = mysqli_num_rows($consulta);

	//Si no existe ninguna fila que sea igual a $consultaBusqueda, entonces mostramos el siguiente mensaje
	if ($filas === 0) {
		$mensaje = "<p>No hay ningún usuario con ese nombre y/o apellido</p>";
	} else {
		//Si existe alguna fila que sea igual a $consultaBusqueda, entonces mostramos el siguiente mensaje
		echo 'Resultados para <strong>'.$consultaBusqueda.'</strong>';

		
	$mensaje .= '	<table border="2px" width=70%>
  <tr>
    <th scope="col" width=25%>Nombre  </th>
    <th scope="col" width=25%>Apellido  </th>
    <th scope="col" width=25%>Edad  </th>
    <th scope="col" width=15%> Modificar </th>
	<th scope="col" width=10%> Eliminar </th>
  </tr>
 </table> ';
		
		
		//La variable $resultado contiene el array que se genera en la consulta, así que obtenemos los datos y los mostramos en un bucle
		while($resultados = mysqli_fetch_array($consulta)) {
			$nombre = $resultados['nombre'];
			$apellido = $resultados['apellido'];
			$edad = $resultados['edad'];
			$id = $resultados['id'];

			//Output
			$mensaje .= '
			
			<table border="2px" width=70%  >
   <tr>
    <td width=25%>' . $nombre . '</td>
    <td width=25%>' . $apellido . '</td>
    <td width=25%>' . $edad . '</td>
    <td width=15%><center><a href="modificar.php?id=' . $id . '">Editar </a></center></td>
	<td width=10%><center><a href="eliminar.php?id=' . $id . '">Eliminar </a></center></td>
  </tr>
 </table>
			';

		};//Fin while $resultados

	}; //Fin else $filas

};//Fin isset $consultaBusqueda

//Devolvemos el mensaje que tomará jQuery
echo $mensaje;
?>