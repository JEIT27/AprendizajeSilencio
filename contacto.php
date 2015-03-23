<?PHP
include "sources/functions/conexion.php";
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="contacto_stile.css">
	<title>::Contacto::</title>
  <STYLE type="text/css"> 
A:link {text-decoration:none;color:#0000cc; font-size: 150%;} 
A:visited {text-decoration:none;color:#B40404;  font-family: Comic Sans;} 
A:active {text-decoration:none;color:#ff0000;} 
A:hover {text-decoration:underline;color:#AEB404;font-weight:bold} 
</STYLE>
	</head>
	<body>
		<a href="index.html"><img src="images/cursos.png" alt="Logo"></a>
		<div id="entrada">
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
                    echo "<td>Bienvenido &nbsp;&nbsp;&nbsp;&nbsp;<b>".$_SESSION['nombre']."</b></td>

 



                    <td> &nbsp;&nbsp;&nbsp;&nbsp;<b><a href='cerrarSesion.php'><button class='botonbuscar' name='bt2' type='submit'>Salir</button><a href='index.php'><button class='botonbuscar' name='bt3' ntype='submit'>Ir a ..</button></a></b></td>";
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
                header("location:contacto.php");
            }
            else
            {
                echo "ERROR no existe el usuario";
            }
        }
    ?>
</div>
<!--<div id="menu">
	<ul id="button">
<li><a href="index.php">Inicio</a></li>
<li><a href="#">¿Qué son las señas?</a></li>
<li><a href="#">Glosario</a></li>
<li><a href="#">Alfabeto</a></li>
<li><a href="#">Clinicas y Escuelas</a></li>
<li><a href="#">Contacto</a></li>
<li><a href="#">¿Quienes somos?</a></li>
</ul>
</div>-->




<div id="menu">
<ul class="menu">
    <li><a href="index.php">Inicio</a></li>
<li><a href="post.html">¿Qué son las señas?</a></li>
<li><a href="glosario.html">Glosario</a></li>
<li><a href="alfabeto.html">Alfabeto</a></li>
<li><a href="clinicas_escuelas/index.html">Clinicas y Escuelas</a></li>

<li><a href="Quienes_Somos/Quienes_Somos.html">¿Quienes somos?</a></li>
    
</ul>


</div>



<div id="header">Nueva&nbsp;Actividad
  <p>Seleccione el tipo de actividad deseada</p>

</div>
</div>
<div id="contenedor">
<div id="row">
<!--<div id="izquierda">
<h4>Col. Izq.</h4>
<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Vestibulum rutrum, urna eget gravida auctor, mauris neque tempus lorem, non condimentum sem purus et eros. Donec non lectus. Phasellus eu massa. Praesent felis metus, tempor a, vehicula ut, interdum id, libero. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Cras nec est. Nulla facilisi. Integer a dolor. Duis vitae diam. Morbi laoreet tellus ut diam. Vestibulum lacinia congue nunc.</p>
</div>-->
<div id="central">
<h4></h4>
<p>

<table width="100%" height="50%">
  <tbody>
    <tr>
      <td rowspan="3"><img src="images/bases.png" width="400" height="700"></td>
      <td align="right"><h4><a href="#" title="Ver más información sobre el portátil">Tareas para realizar</a></h4>
      <p><strong><img src="images/FolderDocuments.png" alt="Imagen del ordenador portátil" width="90" heigth="90"/>Asignar una tarea <br> para realizar en el lugar <br> donde
        te encuentres.</strong></p></td>
    </tr>
    <tr>
     <td align="right"><h4><a href="#" title="Ver más información sobre el portátil">Exámen en Línea</a></h4>
      <p><img src="images/FolderNetwork.png" alt="Imagen del ordenador portátil" width="90" heigth="90"/><strong>Responder uno de los<br> cuestionarios en línea. </strong></p></td>
    </tr>


<tr>
     <td align="right"><h4><a href="prueba.php" title="Ver más información sobre el portátil">Actividades-Cursos</a></h4>
      <p><img src="images/Laptop.png" alt="Imagen del ordenador portátil" width="90" heigth="90"/><strong>Tomar los cursos,<br> para poder  realizar las tareas <br> y el examen.</strong></p></td>
    </tr>

  </tbody>
</table>



</p>
</div>
<!--<div id="derecha">
<p>
</p>
</div>-->
</div>
</div>
<div id="pie">
</div>
</body>

</html>
<?PHP
include "sources/functions/desconectar.php"; 
?>