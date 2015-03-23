<?php

$video=$_GET['video'];

$idImagen=$_GET['idImagen'];

echo "
<html>
		<head>
			<meta charset='UTF-8'>
		</head>
		
		<body>
		
			<form method='POST' action='actualizar_video.php' enctype='multipart/form-data'>
				
				
				<input type='hidden' name='idImagen' value='$idImagen'>
				<br><br>
				<input type='file' name='nuevoVideo'>
				<br><br>
				
				<input  type='submit' value='Actualizar'>
			
			</form>
		
		
		</body>


</html>";


?>