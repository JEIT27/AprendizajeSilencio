<?php

$imagen=$_GET['imagen'];

$idImagen=$_GET['idImagen'];

echo "
<html>
		<head>
			<meta charset='UTF-8'>
		</head>
		
		<body>
		
			<form method='POST' action='actualizar.php' enctype='multipart/form-data'>
				<label>¿Quieres cambiar esta imagen?</label>
				<br><br>
				<img src='$imagen'>
				<br><br>
				
				<input type='hidden' name='idImagen' value='$idImagen'>
				<br><br>
				<input type='file' name='nuevaImagen'>
				<br><br>
				
				<input  type='submit' value='Actualizar'>
			
			</form>
		
		
		</body>


</html>";


?>
