<?php require_once('Connections/conexion_libros.php'); ?><?php
$maxRows_DetailRS1 = 10;
$pageNum_DetailRS1 = 0;
if (isset($_GET['pageNum_DetailRS1'])) {
  $pageNum_DetailRS1 = $_GET['pageNum_DetailRS1'];
}
$startRow_DetailRS1 = $pageNum_DetailRS1 * $maxRows_DetailRS1;

mysql_select_db($database_conexion_libros, $conexion_libros);
$recordID = $_GET['recordID'];
$query_DetailRS1 = "SELECT * FROM libros WHERE IdLibro = '$recordID'";
$query_limit_DetailRS1 = sprintf("%s LIMIT %d, %d", $query_DetailRS1, $startRow_DetailRS1, $maxRows_DetailRS1);
$DetailRS1 = mysql_query($query_limit_DetailRS1, $conexion_libros) or die(mysql_error());
$row_DetailRS1 = mysql_fetch_assoc($DetailRS1);

if (isset($_GET['totalRows_DetailRS1'])) {
  $totalRows_DetailRS1 = $_GET['totalRows_DetailRS1'];
} else {
  $all_DetailRS1 = mysql_query($query_DetailRS1);
  $totalRows_DetailRS1 = mysql_num_rows($all_DetailRS1);
}
$totalPages_DetailRS1 = ceil($totalRows_DetailRS1/$maxRows_DetailRS1)-1;
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
</head>

<body>
		
<table border="1" align="center">
  
  <tr>
    <td><strong>IdLibro</strong></td>
    <td><?php echo $row_DetailRS1['IdLibro']; ?> </td>
  </tr>
  <tr>
    <td><strong>Nombre</strong></td>
    <td><?php echo $row_DetailRS1['Nombre']; ?> </td>
  </tr>
  <tr>
    <td><strong>Autor</strong></td>
    <td><?php echo $row_DetailRS1['Autor']; ?> </td>
  </tr>
  <tr>
    <td><strong>Cantidad</strong></td>
    <td><?php echo $row_DetailRS1['Cantidad']; ?> </td>
  </tr>
  <tr>
    <td><strong>Precio</strong></td>
    <td><?php echo $row_DetailRS1['Precio']; ?> </td>
  </tr>
</table>

<p align="center"><a href="libros.php">Regresar</a></p>
</body>
</html><?php
mysql_free_result($DetailRS1);
?>
