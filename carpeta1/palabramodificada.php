<!doctype html><head>
<meta charset="utf-8" />
<title>Enseñanza en silencio</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--

-->
</style>

</head>
<div class="container">
  <header>
   <!-- <div id="logo"><a href="#"><img src="images/logo.png" alt="your logo here" border="0" class="imagedropshadow" /></a></div>-->
    
    
  
             
    </nav> 
    <table width="718" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>

    
    <td>&nbsp;</td>
  </tr>
  <tr>
    <!--<td colspan="2"><div align="right">Usuario: <span class="Estilo6"><strong><? echo $_SESSION['nombres'];?></strong></span></div></td>-->
  </tr>
  <tr>
   
  </tr>
  <tr>
    <td colspan="2"><div align="center"></div></td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2"><div align="center">
     <!-- <p>Su apellido es: <? echo $apellidos; ?></p>
      <p>Su edad es: <? echo $edad; ?></p>-->
<form id="form1" name="form1" method="post" action="index.php">
  <label>
  <input type="submit" name="Submit" value="Regresar a la Plataforma Web" />
  </label>
</form>


<?php

include ("conexion1.php");
$con =mysql_connect($host, $user, $pw) or die ("problemas al conectar server");
mysql_select_db($db, $con) or die ("problemas al conectar con la base de datos");

mysql_query("UPDATE datos set palabra = '$_POST[cnuevo] ' where palabra= '$_POST[cviejo]'", $con) or die (mysql_error());


echo "Actualizacion correcta";

?>
  </form>
  </tr>
</table>
  
     </nav> 
   
    </div>
    </div>
 

    <aside>
     
</form>
      </div>
 </aside>
    
      
    </div> 
  </header>    
</div>
</body> 
</html>