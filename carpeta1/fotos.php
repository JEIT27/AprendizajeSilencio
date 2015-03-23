<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en">
<html>
    <head>



        <title>I M A G E N</title>
        <meta charset="utf-8">
        <script type="text/javascript" src="includes/jquery-1.4.2.min.js"></script>
        <script type="text/javascript" src="includes/accordionGallery.js"></script>

        <style>
            body{
                padding:0;
            }
            ul{
                list-style: none;
            }
            li{
                float:left;
                margin-right: 10px;
            }
            li img{
                cursor: pointer;
                width:200px;
                height:200px;
                padding:5px;
                border:1px solid gray;
                background-color: white;
                margin-right: 5px;
                box-shadow:1px 1px 5px black;
            }
            .container{
                width:960px;
                height: 1000px;
                margin:0 auto;

            }
            #results{
                margin: 0 auto;
                position: relative;
                margin-top:250px;
            }
            .section{
                margin-bottom: 5px;
                box-shadow:1px 1px 3px black;
            }
            h1{
               border-bottom: 2px solid gray;
                color: silver;
                font-family: Comic Sans MS;
                padding-bottom: 15px;
                padding-left: 50px;
                text-shadow: 1px 1px black;
                margin-top:0;
            }
            .button{
                background-color: silver;
                border: 1px solid black;
                border-radius: 5px 5px 5px 5px;
                box-shadow: 1px 1px 5px black;
                color: black;
                float: right;
                padding: 8px;
                text-decoration: none;
            }
        </style>
    </head>
    <body>
        <div class="container">
       
        <h1>Galeria del abecedario con imagenes </h1>
        <h3>En este apartado solo le daras clic a las imagenes</h3>
            <form id="form1" name="form1" method="post" action="index01.php">
              <label><a href="senas.php"><img src="senas_imagenes/iconos/la-flecha-verde-de-la-izquierda-icono-6724-48.png" width="70" height="70" border="0" /></a></label>
            </form>
            <div class="imgParts">
                <ul>
                      <li><img src="fotos_senas/a.jpg" /></li>
                    <li><img src="fotos_senas/b.jpg" /></li>
                    <li><img src="fotos_senas/c.jpg" /></li>
                    <li><img src="fotos_senas/d.jpg" /></li>
                    <li><img src="fotos_senas/e.jpg" /></li>
                    <li><img src="fotos_senas/f.jpg" /></li>
                    <li><img src="fotos_senas/g.jpg" /></li>
                    <li><img src="fotos_senas/h.jpg" /></li>
                    <li><img src="fotos_senas/i.jpg" /></li>
                    <li><img src="fotos_senas/j.jpg" /></li>
                    <li><img src="fotos_senas/k.jpg" /></li>
                     <li><img src="fotos_senas/l.jpg" /></li>
                     <li><img src="fotos_senas/m.jpg" /></li>
                       <li><img src="fotos_senas/n.jpg" /></li>
                       <li><img src="fotos_senas/o.jpg" /></li>
                       <li><img src="fotos_senas/p.jpg" /></li>
                        <li><img src="fotos_senas/q.jpg" /></li>
                        <li><img src="fotos_senas/r.jpg" /></li>
                         <li><img src="fotos_senas/s.jpg" /></li>
                          <li><img src="fotos_senas/t.jpg" /></li>
                           <li><img src="fotos_senas/u.jpg" /></li>
                            <li><img src="fotos_senas/v.jpg" /></li>
                             <li><img src="fotos_senas/w.jpg" /></li>
                              <li><img src="fotos_senas/x.jpg" /></li>
                               <li><img src="fotos_senas/y.jpg" /></li>
                                <li><img src="fotos_senas/z.jpg" /></li>
                </ul>
            </div>
            <div id="results">
            </div>
    </div>
    </body>
</html>