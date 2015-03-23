<?PHP
include "sources/functions/conexion.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Enseñanza en Silencio</title>
		<link rel="stylesheet" type="text/css" href="senas_style.css">
	</head>
	<body>
		<form name="form1" method="post" action="">
		  <label>
		    <input type="image" name="imageField" src="senas_imagenes/logo_senas.png">
	      </label>
          
		</form>
		<?PHP
session_start();
?>






<?php
                echo "<table class='log2' align='right'><tr>";
                if(isset($_SESSION['matricula']))
                {
                    // Si el usuario a entrado al sistema correctamente con usuario y contraseña
                    if ($_SESSION['tipo']==0) 
                    {
                       /* echo "<td>Usuario :  &nbsp;&nbsp;&nbsp;&nbsp;<b>Administrador</b>&nbsp;&nbsp;&nbsp;&nbsp;</td>"; */
                    } 
                    else 
                    {
                        /*echo "<td>Usuario :  &nbsp;&nbsp;&nbsp;&nbsp;<b>Alumno regular</b></td>"; */
                    }
                    echo "<td>Bienvenido &nbsp;&nbsp;&nbsp;&nbsp;<b>".$_SESSION['nombre']."</b></td><td> &nbsp;&nbsp;&nbsp;&nbsp;<b><a href='cerrarSesion.php'><button class='botonbuscar' name='bt2' type='submit'>Salir</button><a href='splash/index.php'><button class='botonbuscar' name='bt3' ntype='submit'>Ir a ..</button></a></b></td>";
                }
                else
                {
                    // Si no se ha iniciado la sesión de trabajo
                   // echo "<td>&nbsp;&nbsp;&nbsp;&nbsp;<b> Visitante&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></td><td><a href='login.php'><button class='botonbuscar' name='bt2' type='submit'>Ingresar</button></a></td>";
                }
                echo "</tr></table>";
            ?>

             
 

<?php
        
        if (isset($_POST['accesar']))
        { 

            include "sources/functions/conexion.php";
            $matricula=mysql_real_escape_string($_POST['matricula']);
            $password=mysql_real_escape_string($_POST['password']);

           //Realizar la consulta deseada (QUERY)
           // $query = "SELECT matricula, pasword, nombre, tipo FROM tablausuarios WHERE matricula='$matricula' and pasword='$password'";
           $sql="select matricula, pasword, nombre, tipo from tablausuarios where matricula='".$matricula."' and pasword='".$password."'"; 
           $result=mysql_query($sql, $conexion); 
           //Ejecutar el QUERY
           // $result=mysql_query($query, $conexion); 
           // $resultado = $conexion ->query($query) or die("Error en consulta de tabla" . mysqli_error($conexion));
           $encontrado=mysql_num_rows($result);

            if($encontrado==1)
            {
                // obtener los datos del ususario
                $datosUsuario = mysql_fetch_array($result);


                session_start();
                $_SESSION['matricula']=$matricula;
                $_SESSION['pasword']=$password;
                $_SESSION['nombre']=$datosUsuario[2];
                $_SESSION['tipo']=$datosUsuario[3];

                //redirigir a la pagina de inicio de mi proyecto
                header("location:splash/index.php");
            }
            else
            {
                echo "ERROR no existe el usuario";
            }
        }
    ?>
	
		<ul id="horizontal">
<li><a href="buscar_palabra/buscajax.php"><img src="senas_imagenes/iconos/buscar.png" width="40" height="40" />Buscar Palabra</a></li>
<li><a href="#"><img src="senas_imagenes/iconos/admin.png" width="40" height="40" />Administrador</a>
<ul>
<li><form name="form1" method="post" action="">
       
       <img src="senas_imagenes/iconos/user.png" width="30" height="30" />Usuario <input type="text" name="matricula">
       
       <br /> <img src="senas_imagenes/iconos/login.png" width="30" height="30" />Contraseña<input type="password" name="password">
        <input type="submit" name="accesar" value="entrar">
       
 </form></li>

</ul>

</li>
</ul>
		<div id="menu">
			<ul><li><a href="que_son_las_senas/que_son_las_senas.html"><img src="senas_imagenes/iconos/que.png" width="50" height="50">¿Qué son las señas?</li>
				<li><a href="glosario.php"><img src="senas_imagenes/iconos/glosario.png" width="50" height="50">Glosario</li>
				<li><a href="fotos.php"><img src="senas_imagenes/iconos/alfabeto.png" width="50" height="50">Alfabeto</li>
				<li><a href="#"><img src="senas_imagenes/iconos/clinicas.png" width="50" height="50">Clínicas y Escuelas</li>
				<li><a href="kitesurf/index.html"><img src="senas_imagenes/iconos/phone.png" width="50" height="50">Contacto</li>
				<li><a href="index.html"><img src="senas_imagenes/iconos/salir.png" width="50" height="50">¿Quienes Somos?</li>
			</ul>
		</div>
		
	</body>
</html>
<?PHP
include "sources/functions/desconectar.php"; 
?>