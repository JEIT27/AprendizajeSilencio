<?php require_once('Connections/conexion_libros.php'); ?>
<?php
$currentPage = $_SERVER["PHP_SELF"];

$maxRows_libros_consulta = 10;
$pageNum_libros_consulta = 0;
if (isset($_GET['pageNum_libros_consulta'])) {
  $pageNum_libros_consulta = $_GET['pageNum_libros_consulta'];
}
$startRow_libros_consulta = $pageNum_libros_consulta * $maxRows_libros_consulta;

mysql_select_db($database_conexion_libros, $conexion_libros);
$query_libros_consulta = "SELECT * FROM imagenes";
$query_limit_libros_consulta = sprintf("%s LIMIT %d, %d", $query_libros_consulta, $startRow_libros_consulta, $maxRows_libros_consulta);
$libros_consulta = mysql_query($query_limit_libros_consulta, $conexion_libros) or die(mysql_error());
$row_libros_consulta = mysql_fetch_assoc($libros_consulta);

if (isset($_GET['totalRows_libros_consulta'])) {
  $totalRows_libros_consulta = $_GET['totalRows_libros_consulta'];
} else {
  $all_libros_consulta = mysql_query($query_libros_consulta);
  $totalRows_libros_consulta = mysql_num_rows($all_libros_consulta);
}
$totalPages_libros_consulta = ceil($totalRows_libros_consulta/$maxRows_libros_consulta)-1;

$queryString_libros_consulta = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_libros_consulta") == false && 
        stristr($param, "totalRows_libros_consulta") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_libros_consulta = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_libros_consulta = sprintf("&totalRows_libros_consulta=%d%s", $totalRows_libros_consulta, $queryString_libros_consulta);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
</head>

<body>
<table border="1" align="center">
  <tr>
    <td>IdLibro</td>
    <td>Nombre</td>
  </tr>
  <?php do { ?>
    <tr>
      <td><?php echo $row_libros_consulta['id']; ?>&nbsp; </td>
      <td><a href="detalles_libros.php?recordID=<?php echo $row_libros_consulta['id']; ?>"> <?php echo $row_libros_consulta['palabra']; ?>&nbsp; </a> </td>
    </tr>
    <?php } while ($row_libros_consulta = mysql_fetch_assoc($libros_consulta)); ?>
</table>
<br>
<table border="0" width="50%" align="center">
  <tr>
    <td width="23%" align="center"><?php if ($pageNum_libros_consulta > 0) { // Show if not first page ?>
          <a href="<?php printf("%s?pageNum_libros_consulta=%d%s", $currentPage, 0, $queryString_libros_consulta); ?>">Primero</a>
          <?php } // Show if not first page ?>
    </td>
    <td width="31%" align="center"><?php if ($pageNum_libros_consulta > 0) { // Show if not first page ?>
          <a href="<?php printf("%s?pageNum_libros_consulta=%d%s", $currentPage, max(0, $pageNum_libros_consulta - 1), $queryString_libros_consulta); ?>">Anterior</a>
          <?php } // Show if not first page ?>
    </td>
    <td width="23%" align="center"><?php if ($pageNum_libros_consulta < $totalPages_libros_consulta) { // Show if not last page ?>
          <a href="<?php printf("%s?pageNum_libros_consulta=%d%s", $currentPage, min($totalPages_libros_consulta, $pageNum_libros_consulta + 1), $queryString_libros_consulta); ?>">Siguiente</a>
          <?php } // Show if not last page ?>
    </td>
    <td width="23%" align="center"><?php if ($pageNum_libros_consulta < $totalPages_libros_consulta) { // Show if not last page ?>
          <a href="<?php printf("%s?pageNum_libros_consulta=%d%s", $currentPage, $totalPages_libros_consulta, $queryString_libros_consulta); ?>">Último</a>
          <?php } // Show if not last page ?>
    </td>
  </tr>
</table>
Registros <?php echo ($startRow_libros_consulta + 1) ?> a <?php echo min($startRow_libros_consulta + $maxRows_libros_consulta, $totalRows_libros_consulta) ?> de <?php echo $totalRows_libros_consulta ?>
</body>
</html>
<?php
mysql_free_result($libros_consulta);
?>
