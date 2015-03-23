<?php



$idImagen=$_POST['idImagen'];
$ruta="videos";
$archivo=$_FILES['nuevoVideo']['tmp_name'];
$nombreArchivo=$_FILES['nuevoVideo']['name'];
move_uploaded_file($archivo,$ruta."/".$nombreArchivo);
$ruta=$ruta."/".$nombreArchivo;


include "conexion.php";

$actualizar=mysql_query("UPDATE imagenes SET video='".$ruta."' WHERE id='".$idImagen."'",$conexion);

if ($actualizar)
{
	echo "
	<html>
		<head>
			<meta http-equiv='REFRESH' content='0 ; url=verVideo.php'>
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
			<meta http-equiv='REFRESH' content='0 ; url=verVideo.php'>
			<script>
				alert('La actualizacion fallo');
			
			</script>
		
		</head>
	
	
	</html>
	
	";
}



?>
