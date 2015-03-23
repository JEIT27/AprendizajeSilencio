<?PHP
include "sources/functions/conexion.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta content="true" name="mssmarttagspreventparsing" />
	<meta http-equiv="imagetoolbar" content="no" />
	<title>Stylissimo Template</title>
	<link href="css_administrador/style5.css" rel="stylesheet" type="text/css" />
	<!-- IE fixes -->
	<!--[if lte IE 6]>
	<style type="text/css">
		#ccnt {_height:1200px;}
		.post {padding:0 0 25px;}
	</style>
	<![endif]-->
	<script type="text/javascript">
	/*
	 * Simple JS function for setting the search value
	 */
	function clS(t){
		var srch = document.getElementById('s'), val = srch.value.toString().toLowerCase(), re = /^\s+$/;
		if(t) {
			if(val == 'search...' || val == 'search'){ 
				srch.value = '';
			}
		} else {
			if(val == 'search...' || val == 'search' || val == '' || re.test(val)) {
				srch.value = 'search...';
			}
		}
	}
	</script>

    <style type="text/css">
<!--
.Estilo1 {
	font-size: 24px;
	color: #FFFF00;
}
.Estilo2 {font-size: 9px}
-->
    </style>
</head>

<body>
 <?PHP
session_start();
?>




<?php
                echo "<table>";
                if(isset($_SESSION['matricula']))
                {
                    // Si el usuario a entrado al sistema correctamente con usuario y contraseña
                    if ($_SESSION['tipo']==0) 
                    {
                        /*echo "<td>Usuario :  &nbsp;&nbsp;&nbsp;&nbsp;<b>Administrador</b>&nbsp;&nbsp;&nbsp;&nbsp;</td>"; */
                    } 
                    else 
                    {
                        /*echo "<td>Usuario :  &nbsp;&nbsp;&nbsp;&nbsp;<b>Alumno regular</b></td>"; */
                    }
                    echo "<td>Bienvenido &nbsp;&nbsp;&nbsp;&nbsp;<b>".$_SESSION['nombre']."</b></td><td> &nbsp;&nbsp;&nbsp;&nbsp;<b><a href='cerrarSesion.php'><button class='botonbuscar' name='bt2' type='submit'>Salir</button><a href='senas.php'><button class='botonbuscar' name='bt3' ntype='submit'>Inicio ..</button></a></b></td>";
                }
                else
                {
                    // Si no se ha iniciado la sesión de trabajo
                   // echo "<td>&nbsp;&nbsp;&nbsp;&nbsp;<b> Visitante&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></td><td><a href='login.php'><button class='botonbuscar' name='bt2' type='submit'>Ingresar</button></a></td>";
                }
                echo "</table>";
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
<form id="form1" name="form1" method="post" action="">
  <label>
  <p>&nbsp;</p>
  <p>
    <input type="image" name="imageField" src="images_administrador/yourLogo2.png" />
    <br />
    <label> <br />
    </label>
    <br />
    </label>
</p>
</form>
    
    <input name="imageField2" type="image" src="images_administrador/movimiento.gif" align="right" width="350" height="250" hspace="0" vspace="150" />
    <input name="imageField22" type="image" src="images_administrador/movimiento.gif" align="left" width="350" height="250" hspace="0" vspace="150" />
    <div id="hdr">

	<!-- Search form -->
	<!-- Logo -->
	<!-- Slogan -->
<p class="htit Estilo1"> .**Apartado para el Glosario**. </p> 

	<!-- Main Menu -->
  <div id="menu">
    <p><a class="menu_freeb" href="altapalabras.php"><img src="images_administrador/icons/1211794746.png" width="54" height="72" />Alta de palabra con imagen y video.	  <a class="menu_grap" href="modificarpalabras.php"> <img src="images_administrador/icons/Run-64.png" width="51" height="54" />Modificar Palabra. </a> 
	  <a class="menu_frm" href="eliminarpalabras.php"><img src="images_administrador/icons/Delete-128.png" width="62" height="67" />Eliminar Palabra. </a></p>
	  <p>&nbsp;</p>
	  
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  
	  
	  
	  
  </div>
</div>

<!-- Main Container -->
<!-- Footer -->
</body>
</html>
<?PHP
include "sources/functions/desconectar.php"; 
?>
