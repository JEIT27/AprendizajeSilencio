<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta content="true" name="mssmarttagspreventparsing" />
	<meta http-equiv="imagetoolbar" content="no" />
	<title>Stylissimo Template</title>
	
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

body{
background-image:url(splash/images/bg.jpg);
margin: 0; font-family: Arial, Helvetica, sans-serif; font-size: 0.8em;
}
h1 { text-align: center; color: gray; margin-top: 10px; }
#boxwarning { display: none; border: solid 1px red; background: #FFD8CB; color: black; margin: 0 auto; width: 420px; padding: 10px; text-align: center; }
form { margin: 0; }
p { margin: 10px 0; }
form input, form textarea { margin-top: 5px; vertical-align: middle; }
form fieldset { background: #CCC; padding: 10px; margin: 10px auto 0 auto; border: 10px solid gray; width: 400px; }
.Estilo1 {color: #666666}
.Estilo3 {font-size: 14px}
    .Estilo4 {font-size: 36px}
    </style>

</head>

<body>
 <a href="splash/index.php">
 <input type="image" name="imageField2" src="senas_imagenes/iconos/doble-flecha-izquierda-icono-7845-48.png" width="30" height="30" />
 </a>
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
                       /* echo "<td>Usuario :  &nbsp;&nbsp;&nbsp;&nbsp;<b>Administrador</b>&nbsp;&nbsp;&nbsp;&nbsp;</td>"; */
                    } 
                    else 
                    {
                       /* echo "<td>Usuario :  &nbsp;&nbsp;&nbsp;&nbsp;<b>Alumno regular</b></td>"; */
                    }
                    echo "<td>Bienvenido &nbsp;&nbsp;&nbsp;&nbsp;<b>".$_SESSION['nombre']."</b></td><td> &nbsp;&nbsp;&nbsp;&nbsp;<b><a href='cerrarSesion.php'><button class='botonbuscar' name='bt2' type='submit'>Salir</button></a></b></td>";
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
<div id="boxwarning"></div>
  <nav>
  <form id="form3" name="form3" method="post" action="">
    <a href="senas.php">
    <label></label>
    </a>
  </form>
  <p>&nbsp;</p>
  <form id="form2" name="form2" method="post" action="">
    <a href="splash/index.php">
    <label>
    <a href="splash/index.php">
    <input name="imageField" type="image" src="senas_imagenes/iconos/microsoft-word-icono-8504-128.png" align="right" />
    </label>
    </a>
  </form>
  <p>&nbsp;</p>
  <form id="form1" name="form1" method="post" action="recibir_palabra.php" enctype="multipart/form-data">
                        
                        <p class="Estilo3">&nbsp;</p>
                        <p class="Estilo3">
                          <label></label>
                        </p>
    <FONT FACE="Impact">
<MARQUEE>
<span class="Estilo4">INGRESA TU PALABRA</span>
</MARQUEE>
</FONT>
                        <!--<p class="Estilo3"><span class="post_tit">Digite su clasificación:</span>
                          <input type="text" name="clasificacion" id="clasificacion"/>
                        </p>-->
						 <fieldset>                        <p class="Estilo3"><span class="page_num">Digite su palabra:</span> 
                          <input type="text" name="palabra" id="palabra"/> 
                          <label></label>
                          <br>
    </p>
                        <p class="Estilo3"><span class="page_num">Escriba su definicón:</span>                        <span class="Estilo3"><span class="Estilo3">
                        <!--<span class="Estilo4">
                          <input type="text" name="definicion" id="definicion"/>
                          </span></span></p>-->
                        <textarea name="definicion" rows="10" cols="40" id="definicion"></textarea>
                        </span>
                          <p class="Estilo3"><span class="page_num">Seleccione la imagen:
                          </span>
                            <input type="file" name="imagen"/>
    </p>
    <p class="Estilo3"><span class="page_num">Seleccione el video:
                          </span>
                          <input type="file" name="video"/>
    </p>
    
                        <p class="Estilo3">
                          <input type="submit" name="Submit" value="Aceptar" />
                          
                          <label></label>
						  
					     </fieldset>
    </p>
                                                                                    </p>
                       
                        
                                                                                    <label></label>
  </form>             
	<!-- Search form -->
	<!-- Logo -->
	<!-- Slogan -->
<p class="htit Estilo1">  </p> 

	<!-- Main Menu -->
</div>

<!-- Main Container -->
<!-- Footer -->
</body>
</html>
<?PHP
include "sources/functions/desconectar.php"; 
?>
