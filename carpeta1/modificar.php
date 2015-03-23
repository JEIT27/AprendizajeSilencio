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
<?php require_once('Connections/conexion_libros.php'); ?>
<?php
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $theValue = (!get_magic_quotes_gpc()) ? addslashes($theValue) : $theValue;

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE imagenes SET palabra=%s, definicion=%s, clasificacion=%s WHERE id=%s",
                       GetSQLValueString($_POST['palabra'], "text"),
                       GetSQLValueString($_POST['definicion'], "text"),
                       GetSQLValueString($_POST['clasificacion'], "text"),
                      /* GetSQLValueString($_POST['Precio'], "double"),*/
                       GetSQLValueString($_POST['id'], "text"));

  mysql_select_db($database_conexion_libros, $conexion_libros);
  $Result1 = mysql_query($updateSQL, $conexion_libros) or die(mysql_error());

  $updateGoTo = "modificar_exitoso.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

mysql_select_db($database_conexion_libros, $conexion_libros);
$valor = $_GET['id'];
$query_modificar_consulta = "SELECT * FROM imagenes where id=$valor";
$modificar_consulta = mysql_query($query_modificar_consulta, $conexion_libros) or die(mysql_error());
$row_modificar_consulta = mysql_fetch_assoc($modificar_consulta);
$totalRows_modificar_consulta = mysql_num_rows($modificar_consulta);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
</head>

<head>
 <a href="index_vista.php"><img src="senas_imagenes/iconos/regresar-icono-6105-48.png" width="60" height="60">
</head>

<body>
<form method="post" name="form1" action="<?php echo $editFormAction; ?>">
  <table align="center">
    <tr valign="baseline">
      <td nowrap align="right">id:</td>
      <td><?php echo $row_modificar_consulta['id']; ?></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">palabra:</td>
      <td><input type="text" name="palabra" value="<?php echo $row_modificar_consulta['palabra']; ?>" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">definicion:</td>
      <td><input type="text" name="definicion" value="<?php echo $row_modificar_consulta['definicion']; ?>" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">clasificacion:</td>
      <td><input type="text" name="clasificacion" value="<?php echo $row_modificar_consulta['clasificacion']; ?>" size="32"></td>
    </tr>
    <!--<tr valign="baseline">
      <td nowrap align="right">Precio:</td>
      <td><input type="text" name="Precio" value="<?php echo $row_modificar_consulta['Precio']; ?>" size="32"></td>
    </tr>-->
    <tr valign="baseline">
      <td nowrap align="right">&nbsp;</td>
      <td><input type="submit" value="Actualizar registro"></td>
    </tr>
  </table>
  <input type="hidden" name="MM_update" value="form1">
  <input type="hidden" name="id" value="<?php echo $row_modificar_consulta['id']; ?>">
</form>
<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($modificar_consulta);
?>
