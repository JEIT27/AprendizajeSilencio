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
	<head>
	<a href="splash/index.php"><img src="senas_imagenes/iconos/regresar-icono-6105-48.png" width="60" height="60" /></a>
	</head>
	
<?php

include "conexion.php";



$consultar=mysql_query("SELECT * FROM imagenes");


echo "<table border='2' width='40%' align='center'>
        <tr>
		<th>Palabra</th>
            <th>Video</th>
            
           
            <th>Cambiar</th>
        
        </tr>
";

while($imagenes=mysql_fetch_array($consultar))
{

$palabra = $imagenes['palabra'];
    $video=$imagenes['video'];
   
	$idImagen=$imagenes['id'];
	
    echo "<tr>
            <td>$palabra<td>
            <td><video controls src='$video' width='250' height='200'></td>
            
            
            <td><a href='cambiarVideo.php?idImagen=$idImagen&video=$video'>Cambiar</a></td>
        </tr>"  ;    


}


?>
