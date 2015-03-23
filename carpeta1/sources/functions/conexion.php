<?php 
$host="localhost"; 
$usuario="root"; 
$password=""; 
$basedatos="biblioteca"; 
$conexion = @mysql_connect($host, $usuario, $password) or die(mysql_error()); 
mysql_set_charset("utf8");
$db = @mysql_select_db($basedatos, $conexion) or die(mysql_error()); 
?>