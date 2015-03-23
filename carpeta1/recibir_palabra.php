<!doctype html><head>
<meta charset="utf-8" />
<title>Enseñanza en silencio</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />


<style type="text/css">
body{
background-image:url(senas_imagenes/oso.jpg);
}
#horizontal{
/*estilo de nuestra lista*/

list-style:none;
width:auto;
position:relative;
display:block;
height:36px;
}
#horizontal li{
/*estilo a cada uno de los elementos(li) de nuestro menu*/
float:right;/* propiedad importante para que nuestro menu tome la forma horizontal*/
display:block;
position:relative;
}
#horizontal li a{
/*estilo de los enlaces */
color:black;
text-decoration:none;
font-family:Helvetica, Arial, sans-serif;
font-size:14px;
line-height:1.3em;
padding:10px 14px 8px 16px;
display:block;
}
#horizontal li ul{
/*estilo de los submenus*/
width:220px;
background:#F8F8F8;
border:3px #ccc solid;
display:none; /*importante para que los submenus no estén visibles*/
position:absolute;
z-index:999;
margin-top:0px;
}
#horizontal li ul li{
/*estilo a cada uno de los elementos(li) de nuestro submenu*/
width:100%;
list-style:none;
display:block;
}
#horizontal li ul li a{
/*estilo a cada uno de los enlaces de nuestro submenu*/
color:#21759b;
font-size:14px;
line-height:1.3em;
display:block;
font-weight:normal;
padding:8px
}
#horizontal li ul li a:hover{
background-color:#FFF;
color:#444;
text-decoration:underline;
}
#horizontal li:hover ul{
display:block;
}

</style>

</head>
<div class="container">
  <header>
   <p>
     <!-- <div id="logo"><a href="#"><img src="images/logo.png" alt="your logo here" border="0" class="imagedropshadow" /></a></div>-->
     
     
     
     
     </nav> 
     <a href="senas.php"><img src="senas_imagenes/iconos/home (2).png" width="100" height="100" /></a>   </p>
   <p><a href="splash/index.php"><img src="splash/images/administrador-de-archivos-icono-6165-64.png" width="150" height="150" align="right" /></a>   </p>
   <table width="718" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>

   
    <td>&nbsp;</td>
  </tr>
  <tr>
    <!--<td colspan="2"><div align="right">Usuario: <span class="Estilo6"><strong><? echo $_SESSION['nombres'];?></strong></span></div></td>-->
  </tr>
  <tr>  </tr>
  <tr>
    <td colspan="2"><div align="center"></div></td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2"><div align="center">
        <?php

$conexion =mysql_connect('localhost', 'root','') or die ('No hay conexion a la base de datos');
$db =mysql_select_db('biblioteca',$conexion) or die ('No existe la base de datos.');

$rutaEnServidor1 = 'videos';
$rutaTemporal1 = $_FILES['video']['tmp_name'];
$nombreImagen1 = $_FILES['video']['name'];
$rutaDestino1 = $rutaEnServidor1.'/'.$nombreImagen1;
move_uploaded_file($rutaTemporal1,$rutaDestino1);


$rutaEnServidor = 'imagenes';
$rutaTemporal = $_FILES['imagen']['tmp_name'];
$nombreImagen = $_FILES['imagen']['name'];
$rutaDestino = $rutaEnServidor.'/'.$nombreImagen;
move_uploaded_file($rutaTemporal,$rutaDestino);

$palabra=$_POST['palabra'];
$defi=$_POST['definicion'];
//$clas=$_POST['clasificacion'];
$clas=substr($_POST['palabra'],0,1);
$sql="INSERT INTO imagenes (imagen, video, palabra, definicion, clasificacion) values ('".$rutaDestino."','".$rutaDestino1."','".$palabra."','".$defi."','".$clas."')";
$res=mysql_query($sql,$conexion);


if($res){
/*echo 'insercion con exito';*/
}else{
echo 'no se puede insertar';
}

?>
  <form id="form2" name="form2" method="post" action="">
    <label>
    <input type="image" name="imageField" src="senas_imagenes/iconos/Dialog-Apply-64.png" height="250" height="250"/>
    </label>
    </form>  </tr>
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