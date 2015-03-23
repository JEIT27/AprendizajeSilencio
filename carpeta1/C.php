<?PHP
include "sources/functions/conexion.php";
?>
<!Doctype html>
<html lang="en">
<head>
	<title>SocialStream</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="style4.css" type="text/css" media="screen" />
	<link rel="stylesheet" type="text/css" href="print.css" media="print" />
	<!--[if IE]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
    <style type="text/css">
<!--
.Estilo1 {font-size: 18}
.Estilo2 {
	color: #FFFF00;
	font-size: 24px;
}
-->
    </style>
</head>
<a href="senas.php"><input type="image" name="imageField2" src="senas_imagenes/iconos/home (2).png" width="30" height="30"></a><br>
<a href="glosario.php"><input type="image" name="imageField3" src="senas_imagenes/iconos/regresar-icono-6105-48.png" width="30" height="30"></a>
<body>

<form name="form2" method="post" action="">
  <label>
  
  </label>
  
</form>
<?PHP
session_start();
?>

<?php
                echo "<table class='log2' align='right'><tr>";
                if(isset($_SESSION['matricula']))
                {
                    // Si el usuario a entrado al sistema correctamente con usuario y contrase�a
                    if ($_SESSION['tipo']==0) 
                    {
                        echo "<td>Usuario :  &nbsp;&nbsp;&nbsp;&nbsp;<b>Administrador</b>&nbsp;&nbsp;&nbsp;&nbsp;</td>"; 
                    } 
                    else 
                    {
                        echo "<td>Usuario :  &nbsp;&nbsp;&nbsp;&nbsp;<b>Alumno regular</b></td>"; 
                    }
                    echo "<td>Bienvenido &nbsp;&nbsp;&nbsp;&nbsp;<b>".$_SESSION['nombre']."</b></td><td> &nbsp;&nbsp;&nbsp;&nbsp;<b><a href='cerrarSesion.php'><button class='botonbuscar' name='bt2' type='submit'>Salir</button></a></b></td>";
                }
                else
                {
                    // Si no se ha iniciado la sesi�n de trabajo
                   // echo "<td>&nbsp;&nbsp;&nbsp;&nbsp;<b> Visitante&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></td><td><a href='login.php'><button class='botonbuscar' name='bt2' type='submit'>Ingresar</button></a></td>";
                }
                echo "</tr></table>";
            ?>


             <?PHP
                    if(isset($_SESSION['matricula']))
                    {
                        if ($_SESSION['tipo']==0) 
                            {


                                echo "
                                
                               
                                "; 
                            }
                    }
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
                header("location:login.php");
            }
            else
            {
                echo "ERROR no existe el usuario";
            }
        }
    ?>
	<header>
		<h1 align="center" class="Estilo1">
		  <input type="image" name="imageField" src="senas_imagenes/iconos/maletin-icono-5158-128.png" width="60" height="60">
	    <span class="Estilo2"> PALABRAS CON LA LETRA &quot;C&quot;. </span></h1>
	    <form name="form1" method="post" action="">
	      <label></label>
      </form>
	</header>
	<nav>
		<ul>
			
		</ul>
	</nav>
	<div id="content">
				<article class="stream">
				
				
				
				<br />
					<section class="messages">
					
					<!-- this is a sample search script from twitter.com/goodies . feel free to put your own stream scripts here -->
					
<script src="http://widgets.twimg.com/j/2/widget.js"></script>
<script>
new TWTR.Widget({
  version: 2,
  type: 'search',
  search: 'html5 or css3',
  interval: 6000,
  title: 'HTML5 / CSS3',
  subject: 'Awesomeness',
  width: 670,
  height: 2200,
  theme: {
    shell: {
      background: '#82d9fd',
      color: '#ffffff'
    },
    tweets: {
      background: '#ffffff',
      color: '#444444',
      links: '#1bbf5f'
    }
  },
  features: {
    scrollbar: false,
    loop: true,
    live: true,
    hashtags: true,
    timestamp: true,
    avatars: true,
    behavior: 'default'
  }
}).render().start();
</script>




					<?PHP
    if(isset($_GET['clasificacion']))
    {
        $clasificacion = $_GET["clasificacion"];
        $sql="select * from imagenes    where palabra='".$clasificacion."';"; 
        $result=mysql_query($sql, $conexion); 
        $row=mysql_fetch_array($result);

        echo "<td>".$row['palabra']."</td><table bgcolor='white' border='4' bordercolor='green' cellpadding='0' cellspacing='0' align='center'> 
                  
                  	 
					 <td <h4>><b>".$row['definicion']."</h4></b></td>
				 	 
                  
                   <tr>
					 <td rowspan='7'><video width='420' height='340' align ='center' controls src = '".$row["video"] . "'></td>
				  <td rowspan='7'><img class='image3'width='150' height='150' src = '".$row["imagen"] . "'></td>
                
                  
              </table>";
    }
    ?>
       
					
					</section>
	  </article>
				
</div>
		
		<aside>
			<section>
				<ul>
					<!-- consulta  -->
<?php 
$sql="select * from imagenes where clasificacion='C' GROUP BY palabra ASC;"; 
$result=mysql_query($sql, $conexion); 
echo "<table class='tabla3'>";
$cont=0;
while ($row=mysql_fetch_array($result)) 
{ 
echo "<tr>";
if($cont%2==0)
{
    $color="white";
}
else
{
    $color="white";
}
echo "<td bgcolor='".$color."'><h4><a href = 'http://localhost/senas_senas/C.php?clasificacion=".$row["palabra"] . "'>".$row['palabra']."<h4></a></td>
<td bgcolor='".$color."'></td>";
echo "</tr>"; 
$cont++;
} 
echo "</table><br>";
?>
				</ul>
			</section>
			
		</aside>

	<footer>
		<br />
		<p>&copy; 2014 <a href="#" title="your site name">Enseñanza en Silencio</a></p>
	</footer>
<!-- Free template created by http://freehtml5templates.com -->
</body>
</html>
<?PHP
include "sources/functions/desconectar.php"; 
?>