
<!DOCTYPE HTML>
<!-- Website template by freewebsitetemplates.com -->
<html>
<head>
	<meta charset="UTF-8">
	<title>News title - Zerotype Website Template</title>
	<link rel="stylesheet" href="../css/style_post.css" type="text/css">
	<style type="text/css">
	.boton{
        font-size:12px;
        font-family:Verdana,Helvetica;
        font-weight:bold;
        color:white;
        background:#638cb5;
        border-radius:5px;
        width:230px;
        height:19px;
       }
</style>
</head>
<body>
<img src="../images/li.png">
<div id="body">
			<?PHP
include "../sources/functions/conexion.php";
?>
<!DOCTYPE html>
<html>
<head>

	</head>
	<body>
<ul>




<?php 
$sql="select * from imagenes where clasificacion='I' GROUP BY palabra ASC;"; 
$result=mysql_query($sql, $conexion); 


$cont=0;
while ($row=mysql_fetch_array($result)) 
{ 

if($cont%2==0)
{
    $color="white";
}
echo "

	<a href = 
	'http://localhost/senas_senass/alfabeto/i.php?clasificacion=".$row["palabra"] . "'>".$row['palabra']."</a>&nbsp;&nbsp;&nbsp;";

$cont++;
} 
?>



<!--Se mandan a llamar las imagenes, definiciones y videos.-->
<?PHP
    if(isset($_GET['clasificacion']))
    {
        $clasificacion = $_GET["clasificacion"];
        $sql="select * from imagenes    where palabra='".$clasificacion."';"; 
        $result=mysql_query($sql, $conexion); 
        $row=mysql_fetch_array($result);


echo "<br><br>";

        echo " 

<table bgcolor='gray' bordercolor='gray' cellpadding='0' cellspacing='40px' align='center' border='1px' width='60%'>
<tr>
	<td rowspan='3'><video width='420' height='340' align ='center' controls src = '".$row["video"] . "'></td>

	<td height='100px'>".$row['definicion']."</td>
</tr>

<tr>
	<td height='200px' width='100px'><img width='150' height='150' align ='center'  src = '".$row["imagen"] . "'></td>
</tr>




        ";
    }
    ?>



				</ul>

	</div>
	
	</div>
<br>
				<br>
				<a href="../index.php"><input type="submit" value="Regresar a la página principal" class="boton"></a><br><br>
				<a href="../glosario.html"><input type="submit" value="Regresar al glosario" class="boton"></a>
			</div>
		</div>
	</div>




	
</body>
</html>