<?php



$idImagen=$_POST['idImagen'];
$ruta="imagenes";
$archivo=$_FILES['nuevaImagen']['tmp_name'];
$nombreArchivo=$_FILES['nuevaImagen']['name'];
move_uploaded_file($archivo,$ruta."/".$nombreArchivo);
$ruta=$ruta."/".$nombreArchivo;


include "conexion.php";

$actualizar=mysql_query("UPDATE imagenes SET imagen='".$ruta."' WHERE id='".$idImagen."'",$conexion);

if ($actualizar)
{
	echo "
	<html>
		<head>
			<meta http-equiv='REFRESH' content='0 ; url=verImagen.php'>
			<script>
				alert('Actualizada con exito!!!');
			
			</script>
		
		</head>
	
	
	</html>
	
	";
	
}
else
{
	
	echo "
	<html>
		<head>
			<meta http-equiv='REFRESH' content='0 ; url=verImagen.php'>
			<script>
				alert('La actualizacion fallo');
			
			</script>
		
		</head>
	
	
	</html>
	
	";
}



?>
