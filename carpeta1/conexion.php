<?php


$conexion=mysql_connect("localhost","root","") or die("No hay conexion");

$conectBD=mysql_select_db("biblioteca",$conexion) or die("No existe BD");


?>
