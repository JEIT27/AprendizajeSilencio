<?php

include 'conexion.php';

$q=$_POST['q'];
$con=conexion();

$sql="select * from imagenes where palabra LIKE '".$q."%'";
$res=mysql_query($sql,$con);

if(mysql_num_rows($res)==0){

echo '<b>No hay sugerencias</b>';

}else{

echo '<b>Estas palabras son las que se encuentran en el glosario:</b><br />';

while($fila=mysql_fetch_array($res)){

echo "<h4><a href = 'http://localhost/senas_senas/buscar_palabra_seleccion.php?clasificacion=".$fila['palabra']."'>".$fila['palabra']."<h4></a>";


}

}

?>