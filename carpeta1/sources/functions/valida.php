<?php
	$host		=	'localhost';
	$user		=	'root';
	$password	=	'';
	$basedatos	=	'log';
	$name=$_POST['usuario'];
	$pass=$_POST['contrasena'];
	
	/*~~~~~~BEGIN CONECTANDOME A LA BASE DE DATOS~~~~~~~~~~~~~~~~*/
	if (!($conexion = mysqli_connect($host,$user,$password)))
	{ 
		printf("Fallo de conexión : %s\n", mysqli_connect_error());
        exit();
    }
	/*...CONECTANDO  MI BASE DE DATOS~~~~~~~~~~~~~~~~*/	
   	if (!mysqli_select_db($conexion,$basedatos))
   	{
		echo "<p>Imposible conectarse con la base de datos.</p>";
		exit();
    }
    /*~~~~~~BEGIN CONECTANDOME A LA BASE DE DATOS~~~~~~~~~~~~~~~~*/
	$sql	=	"SELECT * FROM usuario 
				WHERE usuario	='{$name}' 
				AND contraseña ='{$pass}';";	
	$rs 	= 	mysqli_query($conexion,$sql);
	/*..Para comprobar si el resultado es vacio..*/
	if (mysqli_num_rows($rs) == 0) {
		echo "<script language='javascript'>
			alert ('Por favor introduzca su nombre de usuario valido.');
			location.replace('senas.php');
		</script>";
	}
	else{echo "<script language='javascript'>
			location.replace('main.php');
		</script>";}
	
?>	