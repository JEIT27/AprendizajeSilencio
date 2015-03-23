<?PHP
include "sources/functions/conexion.php";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Splash</title>
		<meta charset="UTF-8" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="css/slider.css" rel="stylesheet" type="text/css" />
<script src="js/jquery-1.4.min.js" type="text/javascript" charset="utf-8"></script>
<script src="js/loopedslider.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript" charset="utf-8">
	$(function(){
		$('#slider').loopedSlider({
			autoStart: 5000,
			restart: 4000
		});

	});

</script>
<style type="text/css">
<!--

body {
	background-image: url(images/bg.jpg);
	background-repeat: repeat;
}
-->
</style>

</head>
 <!--[if IE]>
<script src="http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE7.js"></script>

<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<!--[if IE 6]>
<script src="js/belatedPNG.js"></script>
<script>
	DD_belatedPNG.fix('*');
</script>
<![endif]-->
<body>
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
                    echo "<td>Bienvenido &nbsp;&nbsp;&nbsp;&nbsp;<b>".$_SESSION['nombre']."</b></td><td> &nbsp;&nbsp;&nbsp;&nbsp;<b></td>";
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
                header("location:splash/index.html");
            }
            else
            {
                echo "ERROR no existe el usuario";
            }
        }
    ?>
<div id="container">
  <div class="home"><a href="../senas.php"><span class="cursive">Inicio</span><img src="../senas_imagenes/iconos/home (2).png" alt="Home Page" width="64" height="64" border="0" /></a>
      <p class="cursive">&nbsp;</p>
  </div>
  <div class="about"><a href="#"><span class="cursive">Glosario</span><img src="../senas_imagenes/iconos/glosario.png" alt="About Us" width="62" height="63" /></a>
      <p class="cursive">&nbsp;</p>
  </div>
  <div id="main">
  <header>
    <nav>
  <h1 class="cursivebig"> A D M I N I S T R A D O R<img src="images/administrador-de-archivos-icono-6165-64.png" alt="Appication" width="126" height="125" /></h1>
  <p> &#10004;Apartado en el cual podrás dar de alta, modificar y elimar el glosario.</p>
  <div class="divider"></div>
  </nav>
</header>
 <div class="start">
   <p><a href="../altapalabras.php"><img src="images/nuevo-documento-icono-9161-64.png" alt="Appication" width="126" height="125" border="0" /></a></p>
   <p>DAR DE ALTA </p>
 </div>
    <div class="start">
      <p><a href="../index_vista.php"><img src="images/cambio-de-documentos-icono-6645-96.png" alt="Desin" width="92" height="137" border="0" /></a></p>
      <p>MODIFICAR PALABRA </p>
    </div> 
    <div class="start">
      <p><a href="../verImagen.php"><img src="images/imagen-foto-de-cara-pluma-icono-5084-96.png" alt="Download" width="111" height="132" /></a></p>
      <p>MODIFICAR IMAGEN </p>
    </div>
    <div class="start">
      <p><a href="../verVideo.php"><img src="images/video.png" alt="Time" width="153" height="129" /></a></p>
      <p>MODIFICAR VIDEO </p>
    </div>
      <div class="divider"></div>        
  </div>
</div>
<!-- Free template distributed by http://freehtml5templates.com -->
</body>
</html>
